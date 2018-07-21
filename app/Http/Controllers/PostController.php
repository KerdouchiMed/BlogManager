<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts', Post::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count()>0)
          return view('admin.post.create')->with('categories', $categories)
                                          ->with('tags',Tag::all());
        else
        {
          Session::flash('info','you don\'t have any category');
          return redirect()->back();
        }
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
        'title' => 'required',
        'featured' => 'required|image',
        'content' => 'required',
        'category_id' => 'required'
      ]);

      $featured = $request->featured;
      $featured_new_name = time() . $featured->getClientOriginalName();

      $featured->move('uploads/posts', $featured_new_name);


      $post = Post::Create([
        'title' => $request->title,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'featured' => '/uploads/posts/' . $featured_new_name,
        'slug' => str_slug($request->title)

      ]);

      $post->tags()->attach($request->tags);

        Session::flash('success','Post Created succesfully');
        return redirect()->route('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit')->with('post', $post)->with('categories', Category::all())->with('tags',Tag::all());
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
          'title' => 'required',
          'featured' => 'required|image',
          'content' => 'required',
          'category_id' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);


        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->featured = '/uploads/posts/' . $featured_new_name;
        $post->slug = str_slug($request->title);

        $post->tags()->sync($request->tags);
        $post->save();

        return redirect()->back();
    }


    //show trashed posts
    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts',$posts);
    }

    //trash post
    public function trash($id)
    {
        $post=Post::find($id);
        $post->delete();

        Session::flash('success','Post Deleted succesfully');
        return redirect()->route('post');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        Session::flash('success','Post Deleted succesfully');
        return redirect()->back();
    }


    public function restore($id)
    {
      $post=Post::withTrashed()->where('id',$id)->first();
      $post->restore();

      Session::flash('success','Post Deleted succesfully');
      return redirect()->back();
    }

}
