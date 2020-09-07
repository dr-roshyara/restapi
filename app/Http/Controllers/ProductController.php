<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Model\Product;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $fillable = ['name', 'description', 'price1', 'price2', 'summary']; 
    public function __construct(){
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return ProductResource::collection(Product::all());
        return ProductCollection::Collection(Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //  $validate =[
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'description' => 'required',
        //     'price1' => 'required',
        //     'price2'=>'required',
        //     'stock' => 'required',
        //     'discount' => 'required',
        //     'summary' => 'required'
             
        //  ];
        //  $validateData =$request->validate($validate);
         $validateData =$request->all();
         $product =new Product; 
         $product->name= $validateData['name'];
         $product->slug= $validateData['slug'];
         $product->description = $validateData['description'];
         $product->price1 = $validateData['price1']; 
         $product->price2 = $validateData['price2'];
         $product->stock = $validateData['stock'];
         $product->discount = $validateData['discount'];
         $product->summary = $validateData['summary'];
         $product->save();

         return response([
             'data'=> new ProductResource($product)
         ], Response::HTTP_CREATED);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        // return $product;
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $update= $request->all();
        if ($update['name']) {
            $product['name'] = $update['name'];
            unset($request['name']);
        }
            if($update['description']){
                   $product['description'] =$update['description']; 
                   unset($request['description']);
            }
            // $product->update($update);
            
       return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        
        $product->delete();
         return response(null, Response::HTTP_NO_CONTENT);
    }
   
}
