<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPostRequest;
use App\Http\Requests\updatePostRequest;
use Illuminate\Http\Request;

use App\Post;

class postController extends Controller
{
  public function index()
  {
    $posts = Post::orderBy('id','desc')->paginate(10);
    return view('post.index')->with(['posts' => $posts]);
  }
  
  public function show(Post $post)
  {
    
    //    $post = Post::find($postId);
    //
    //    if( is_null($post) ) {
    //      abort('404');
    //    }
    
    return view('post.show')->with(['post' => $post]);
  }
  
  public function create()
  {
    return view('post.create');
  }
  
  public function save(createPostRequest $request) {
    
    $post = new Post();
    
//    $post->title = $request->get('title');
//    $post->description = $request->get('description');
//    $post->url= $request->get('url');
//    $post->save();

    $post = Post::create($request->only('title','description','url'));
    
    return redirect()->route('posts_path');
  }
  
  public function edit(Post $post_id)
  {
    return view('post.edit')->with(['post_id' => $post_id]);
  }
  
  public function update(Post $post , updatePostRequest $request )
  {
    $post->title = $request->get('title');
    $post->description = $request->get('description');
    $post->url = $request->get('url');
    $post->save();
    
    $post->update(
      $request->only('title', 'description', 'url')
    );
    
    return redirect()->route('post_path',['post'=> $post->id]);
  }
  
  public function delete (Post $post) {
    $post->delete();
    
    return redirect()->route('posts_path');
  }
}
