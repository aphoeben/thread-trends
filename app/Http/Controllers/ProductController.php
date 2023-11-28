<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;    
use Illuminate\Support\Carbon;
use File;

class ProductController extends Controller
{
    // Shows all records
    public function show()
    {
        $categories = Product::latest()->paginate('5');;
        return view('category.index', ['categories' => $categories]);
    }

    // Create form for category
    public function create()
    {
        $categories = Product::all(); 
        return view('category.create', ['categories' => $categories]);
    }

    // Saves the record
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:1|max:255',
            'description' => 'required|min:1|max:255',
            'price' => 'required|min:1|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);  

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $fileName);

        $category = new Product;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->image = $fileName;
        $category->section = $request->section;
        $category->qty = $request->qty;
        $category->save();

        return redirect('/category')->with('status', 'Item added.');
    }

    // Edits the record
    public function update(Request $request, $id)
    {   
        $category = Product::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->section = $request->section;
        $category->qty = $request->qty;
        if($request->hasfile('image'))
        {
            $destination = 'storage/products'.$category->image;

            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'edited'.'.'.$extension;
            $file->move('storage/products', $filename);
            $category->image = $filename;
        }
    
        $category->update();
        
        return redirect('/category')->with('status', 'Item updated.');
    }

    // Delete the record
    public function destroy($id)
    {
        $category = Product::find($id);
        $category->delete();
        return redirect('/category')->with('status','Item deleted successfully.');
    }
    
}
