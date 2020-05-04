<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CategoryController extends Controller
{
    public function AddCategory()
    {
        return view('categories.add_category');
    }

    public function SaveCategory(Request $request)
    {
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if ($category)
        {
            session()->flash('success', 'Category Created Successfully!');
            return Redirect()->route('category.all');
        }

    }

    public function AllCategory()
    {
        $category=DB::table('categories')->paginate(3);
        return view('categories.all_category',compact('category'));
    }

    public function ViewCategory($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        return view('categories.view_category')->with('category', $category);
    }
    public function EditCategory($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        return view('categories.edit_category')->with('category', $category);
    }

    public function UpdateCategory(Request $request, $id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id', $id)->update($data);
        if ($category)
        {
            session()->flash('success', 'Category Updated Successfully!');
            return Redirect()->back();
        }
        else{
            session()->flash('warning', 'Category Not Updated!');
            return Redirect()->back();
        }
    }

    public function DeleteCategory($id)
    {
        $category=DB::table('categories')->where('id', $id)->delete();
        session()->flash('success', 'Category Deleted Successfully!');
        return Redirect()->back();
    }
}
