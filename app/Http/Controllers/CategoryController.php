<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;// when using query builder

class CategoryController extends Controller
{
    public function AllCat(){
        //$categories = Category::latest()->get(); //fetches and presents the latest data first
       // $categories = Category::all(); // just displays all data
      // $categories = DB::table('categories')->latest()->paginate(5); //using query
      $categories = Category::latest()->paginate(5); 
        return view('admin.category.index', compact('categories'));
    } 

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],

        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.required' => 'Category Less than 255Chars',
        ]);

        // Category::insert([

        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        //      return Redirect()->back()->with('success','Category insrted successfully');


        // ]);

        //using queries
        // $data['category_name'] = $request->category_name;
        //$data['user_id] = Auth:: Auth::user()->id;
        //DB::table('categories')->insert($data);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id; 
        $category->save();
        return back()->with('success','successfull submission');


    
}
}
