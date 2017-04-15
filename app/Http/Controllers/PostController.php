<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use App\CatPost;

class PostController extends Controller
{
    public function getIndex()
    { // views the posts page in the front end
        $posts = Post::paginate(5); // fetch the data with pagination method
        foreach ($posts as $post) { // use the shortText function
            $post->body = $this->shortText($post->body, 20);
        }
        return view('frontend.blog.index', ['posts' => $posts]); // view the posts page in front end with the fetched data
    }
    public function getPostIndex()
    { // views the posts page in the back end end
        $posts = Post::paginate(5);// fetch the data with pagination method
        foreach ($posts as $post) {// use the shortText function
            $post->body = $this->shortText($post->body, 20);
        }
        return view('admin.blog.index', ['posts' => $posts]);// view the posts page in backend end with the fetched data
    }
    public function getSingle($postid)
    { // this is used to view single post page in the frontend
        $post = Post::find($postid);
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail'=>'Post Not Found']);
        }
        return view('frontend.blog.single', ['post' => $post]);
    }
    public function getSinglePostBackend($postid)
    { // this is used to view single post page in the Admin BackEnd
        $post = Post::find($postid);
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail'=>'Post Not Found']);
        }
        return view('admin.blog.single', ['post' => $post]);
    }
    public function getCreatePost()
    { // this function returns the view witch has the form to create post
        $cats = Category::all();
        return view('admin.blog.create_post', compact('cats'));
    }
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [ // vaildate the incoming data
            'title'     => 'required|max:50|unique:posts',
            'author'    => 'required',
            'body'      => 'required'
        ]);

        $post = new Post(); // call the posts class
        $post->title    = $request['title'];
        $post->author   = $request['author'];
        $post->body     = $request['body'];
        $post->save(); //save the received data

        foreach ($request['cat_select'] as $value) {
            $catpost = new CatPost();
            $catpost->post_id = $post->id;
            $catpost->category_id = $value;
            $catpost->save();
        }

        return redirect()->route('admin.blog.create_post')->with('success', 'Post Created');
    }


    public function getEditPost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail'=>'Post Not Found']);
        }
        return view('admin.blog.edit_post', compact('post'));
    }
    public function postEditPost(Request $request)
    {
        $id = $request['id'];
        $this->validate($request, [ // vaildate the incoming data
            'title'     => 'required|max:50|unique:posts,title,'.$id,
            'author'    => 'required',
            'body'      => 'required'
        ]);

        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('admin.index')->with(['fail'=>'Post Not Found']);
        }

        $post->title    = $request['title'];
        $post->author   = $request['author'];
        $post->body     = $request['body'];
        $post->save(); //save the received data
        return redirect()->back()->with('success', 'Post Updated');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail'=>'Post Not Found']);
        }
        $post->delete();
        return redirect()->route('admin.index')->with(['success'=>'Post Deleted Successfully']);
    }


    private function shortText($text, $words_count)
    { // function to determine the text length
        if (str_word_count($text, 0) > $words_count) {
            $words = str_word_count($text, 2);
            $pos  = array_keys($words);
            $text = substr($text, 0, $pos[$words_count]).'.....';
            return $text;
        }
    }

}
