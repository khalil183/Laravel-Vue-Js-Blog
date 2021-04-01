<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Str;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('category')->get();
        return response()->json($posts);
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'category_id'=>'required',
            'details'=>'required',
            'image'=>'required'
        ]);

        $file=explode(';',$request->image);
        $file=explode('/',$file[0]);
        $ext=end($file);
        $image_name=date('Y-m-d-F-s-h').'.'.$ext;

        $upload_path="uploads/".$image_name;
        Image::make($request->image)
            ->resize(300,150)
            ->save($upload_path);
        Post::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'category_id'=>$request->category_id,
            'details'=>$request->details,
            'image'=>$upload_path
        ]);

        return response()->json(['success'=>'Inserted Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'category_id'=>'required',
            'details'=>'required',
        ]);

        if($request->updateImage){
            $file=explode(';',$request->updateImage);
            $file=explode('/',$file[0]);
            $ext=end($file);
            $image_name=date('Y-m-d-F-s-h').'.'.$ext;
            $upload_path="uploads/".$image_name;
            Image::make($request->updateImage)
                ->resize(300,150)
                ->save($upload_path);
            unlink($request->image);
        }else{
            $upload_path=$request->image;
        }

        Post::where('id',$id)->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'category_id'=>$request->category_id,
            'details'=>$request->details,
            'image'=>$upload_path
        ]);

        return response()->json(['success'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $image=$post->image;
        $post->delete();
        unlink($image);

        return response()->json(['success'=>'Deleted Successfully']);

    }
}
