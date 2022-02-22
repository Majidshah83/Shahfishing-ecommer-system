<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{   public function index()
    {
       return view('Dashboard.addProduct');

   }
   public function store(Request $request)
   { 

    $product=new Product;
    $product->name=$request->productname;
    $product->quantity=$request->quantity;
    $product->categorie_id =$request->categorie_id ;
    $product->price=$request->price;
    $product->description=$request->description;
    if($request->hasfile('image'))
    { 
        $file=$request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename=  time().'.'. $extension;
        $file->move('ProductImages/', $filename);
        $product->image= $filename;

    }

    $product->save();

}
public function fetchdata()
{   

    $products = Product::all();

    return response()->json(['products'=>$products,]);
}

public function editProduct($id)
{
    $product=Product::where('id',$id)->first();
    if($product)
    {
       return response()->json([
        'status'=>200,
        'product'=> $product,
    ]);
   }
   else
   {
    return response()->json([
        'status'=>400,
        'message'=>'No Product Found',

    ]);
}

}
public function updateProduct(Request $request,$id)
{
    $product=Product::find($id);
    if($product){
    $product->name=$request->productname;
    $product->quantity=$request->quantity;
    $product->categorie_id =$request->categorie_id ;
    $product->price=$request->price;
    $product->description=$request->description;
    if($request->hasfile('image'))
    { 
    $path='ProductImages/'.$product->image;
        if(File::exits($path))
        {
          File::delete();
        }
        $file=$request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename=  time().'.'. $extension;
        $file->move('ProductImages/', $filename);
        $product->image= $filename;
        

    }
    $product->save();
    return response()->json([
            'status'=>200,
             'message'=>'Product data update Successfully',    
        ]);
    }
    else{
      return response()->json([
            'status'=>400,
             'message'=>'Product data not found',    
        ]);
    }
}

public function delete($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Product Deleted Successfully.'
            ]);
           

        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Product Found.'
            ]);
        }
    }
}