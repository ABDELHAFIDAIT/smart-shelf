<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Create
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if($validator->fails()){
            return response([
                'message' => 'Invalid Nom de Catégorie'
            ]);
        }

        $validatedData = $validator->validate();

        $category = Category::create($validatedData);

        return response()->json([
            'message' => 'Catégorie créée avec succès',
            'category' => $category,
        ], 201);
    }

    // get All
    public function index(){
        $categories = Category::all();
        return response()->json($categories,200);
    }

    // show One
    public function show(Category $category){
        return response()->json($category);
    }

    // delete
    public function destroy(Category $category){
        $category->delete();
        return response()->json([
            "message" => "Categorie Supprimé avec Succés !" 
        ]);
    }

    //update
    public function update(Request $request, Category $category){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if($validator->fails()){
            return response([
                'message' => 'Invalid Nom de Catégorie'
            ]);
        }

        $validatedData = $validator->validate();

        $category->update([
            "name" => $validatedData['name']
        ]);

        return response()->json([
            'message' => 'Catégorie mise à jour avec succès',
            'category' => $category,
        ], 201);
    }
}
