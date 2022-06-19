<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::when(isset(request()->search),function ($q){
        $search = request()->search;
        $q->orWhere("name","like","%$search%")->orWhere("description","like","%$search%");
    })->with(['stocks','category','photo','user'])->latest()->paginate(7);
//        $products = new Product();
//        $products = $products->with('stocks','category','photo','user');
//        $products = $products->latest()->paginate(5);

        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if (!$request->hasFile("photo")){
            return redirect()->back()->withErrors(["photo.*" => "Photo is required"]);
        }

        $request->validate([
            'name' => 'required|unique:products,name|max:255',
            'description' => 'required',
            'photo.*' => 'mimetypes:image/jpeg,image/png'
        ]);


        $fileNameArr= [];

//        if ($request->hasFile("photo")){
            foreach ($request->file("photo") as $file){
                $newFileName=uniqid()."_product.".$file->getClientOriginalExtension();
                array_push($fileNameArr,$newFileName);
                $dir="/public/product/";
                $file->storeAs($dir,$newFileName);
            }
//        }
//        return $request;


        $product = new Product();
        $product->name = $request->name;
//        $product->photo_id = $request->photo->id;
        $product->description = $request->description;
        $product->category_id = $request->category;
//        $product->stock_id = Stock::all()->count()+1;
        $product->user_id = Auth::user()->id;
        $product->save();


//        if ($request->hasFile("photo")){
            foreach ($fileNameArr as $f){
                $photo = New Photo();
                $photo->product_id = $product->id;
                $photo->path = $f;
                $photo->save();
            }
//        }

//        $stock = new Stock();
//        $stock->price = $request->price;
//        $stock->stock_total = $request->stock_total;
//        $stock->product_id = $product->count() ;
//        $stock->save();

//        $categorys = new Category();
//        $category = $categorys->find($request->category_id);

//        $data['product'] = $product;
//        $data['stock']   = $stock;
//        $data['category'] = $category;


        return redirect()->route('product.create')->with('status',"<b>$request->name</b> is added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("product.edit",compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name|max:255',
            'description' => 'required',
        ]);
        $product->name= $request->name;
        $product->description= $request->description;
        $product->update();

        return redirect()->route('product.index')->with('UpdateStatus',"<b>$request->name</b> is updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

//        if (Gate::allows('product-delete',$product)){
            if(isset($product->getPhotos)){
                $dir="/public/product/";
                foreach ($product->getPhotos as $p){
                    Storage::delete($dir.$p->path);
                }
                $toDel= $product->getPhotos->pluck("id");
                Photo::destroy($toDel);
            }
//        return $product;
            $title=$product->name;
            $product->delete();
            return redirect()->route('product.index',["page"=>request()->page])->with('status',"<b>$title</b> is deleted.");

//        }
        return abort(404);
    }
}
