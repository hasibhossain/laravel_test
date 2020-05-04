<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function AddPost()
    {
        $category=DB::table('categories')->get();
        return view('posts.add_post',compact('category'));
    }
    public function PostCategory(Request $request)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['title']=$request->title;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            session()->flash('success', 'Post Inserted Successfully!');
            return Redirect()->back();

        }else{
            DB::table('posts')->inset($data);
            session()->flash('success', 'Post Inserted Successfully!');
            return Redirect()->back();
        }
    }

    public function AllPost()
    {
        $post=DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->paginate(3);

        return view('posts.all_post',compact('post'));
    }

    public function ViewPost($id)
    {
        $post=DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->where('posts.id', $id)
            ->first();

        return view('posts.view_post',compact('post'));
    }

    public function EditPost($id)
    {
        $category=DB::table('categories')->get();
        $post=DB::table('posts')->where('id', $id)->first();
        return view('posts.edit_post',compact('category', 'post'));
    }

    public function UpdatePost(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/frontend/image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id', $id)->update($data);
            session()->flash('success', 'Post Inserted Successfully!');
            return Redirect()->route('post.all');

        } else {
            $data['image']=$request->old_photo;
            DB::table('posts')->where('id', $id)->update($data);
            session()->flash('success', 'Post Inserted Successfully!');
            return Redirect()->route('post.all');
        }
    }

    public function DeletePost($id)
    {
        $post=DB::table('posts')->where('id', $id)->first();
        $image=$post->image;
        $post=DB::table('posts')->where('id', $id)->delete();
        unlink($image);
        session()->flash('success', 'Category Deleted Successfully!');
        return Redirect()->back();
    }
}
