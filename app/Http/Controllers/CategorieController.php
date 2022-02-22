<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    public function index()
    {
        return view('Dashboard.addCategries');
    }
    public function store(Request $request)
    {
        $categrie= new Categorie;
        $categrie->name=$request->name;
        if($categrie)
        {
         $categrie->save();
         return response()->json([
        'status'=>200,
        'message'=>"Add  Categrie Sucssfully",
    ]);
        }
        else {
        return response()->json([
        'status'=>400,
        'message'=>"Not found Categrie",
    ]);
        }
    }

    public function fetchCategries()
    {
        $categrie=Categorie::all();
        return response()->json(['categrie'=>$categrie]);
    }
    public function editCategries($id)
    {
      $categrie=Categorie::where('id',$id)->first();
      if($categrie)
      {
        return response()->json([
             'status'=>200,
             'categrie'=>$categrie,
        ]);
      }
      else{
        return response()->json([
            'status'=>400,
            'message'=>'Categrie not found',
        ]);
      }

    }
    public function updateCategries(Request $request,$id)
    {
        $categrie=Categorie::find($id);
        if($categrie)
        {
            $categrie->name=$request->name;
             $categrie->save();
             return response()->json([
            'status'=>200,
            'message'=>'Categrie data update Successfully',    
        ]);
        }
        else{
            return response()->json([
            'status'=>400,
            'message'=>'Pcategies Not found ',
            ]);  
        }

    }
    public function delete($id)
    {
        $categrie = Categorie::find($id);
        if($categrie)
        {
            $categrie->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Categrie Deleted Successfully.'
            ]);
           

        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Categrie Found.'
            ]);
        }
    }
}
