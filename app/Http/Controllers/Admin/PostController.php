<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required'
            ],
            [
                'title.required' => 'title è un campo obbligatorio',
                'description.required' => 'description è un campo obbligatorio',
            ],
        );
        $new_post = new Post();
        $data['slug'] = Post::generateSlug($data['title']);
        $new_post->fill($data);
        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if($post){
            return view('admin.posts.show', compact('post'));
        }
        abort(404, 'errore nella ricerca del post');
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
        if($post){
            return view('admin.posts.edit', compact('post'));
        }
        abort(404, 'Post non presente');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required'
            ],
            [
                'title.required' => 'title è un campo obbligatorio',
                'description.required' => 'description è un campo obbligatorio',
            ],
        );
        $data['slug'] = Post::generateSlug($data['title']);
        $post->update($data);
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', "Il post $post->title è stata eliminato");
    }
}
