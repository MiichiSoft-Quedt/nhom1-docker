<?php

namespace App\Http\Controllers\Active;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function getAllProcduct(){
        try {
            $product = Product::all();
    
            return response()->json([
                'data' => $product 
            ]);

        }catch(Exception $e){
            throw new ModelNotFoundException('...');
        }
    }

    public function createProduct(ProductRequest $request){
        try {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'origin' => $request->origin,
            ]);
            $product->save();
    
            return response()->json([
                'message' => 'Create Product Successfully',
                'data' => $product,
            ]);
        }catch(Exception $e){
            throw new ModelNotFoundException('...');
        }
    }

    public function updateProduct(ProductRequest $request, $id){
        try {
            $product = Product::find($id);
            $product->update($request->all());
    
            return response()->json([
                'message' => 'Update Product Sucessfully',
                'data' => $product,
            ]);
        }catch(Exception $e){
            throw new ModelNotFoundException('...');
        }
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'message' => 'Delete Product Successdully',
        ]);
    }
}
