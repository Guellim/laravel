<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class PostController extends Controller
{
    public function index(){
        $posts = Posts::latest()->paginate(5);

        return view('post.index',compact('posts'));
        //return View::make('post.index', array('posts' => $posts));
    }

    public function show($id)
    {
        $post = Posts::find($id);
        return response()->json($post);
    }

    public function addPost(Request $request){
        $rules = array(
            'title' => 'required',
            'body' => 'required',
        );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

        else {
            $post = new Posts;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();
             return response()->json($post);
            //return redirect('post')->with('status', 'Post added!');
        }
    }

    public function editPost(request $request){
        $post = Posts::find ($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return response()->json($post);
    }

    public function deletePost(Request $request){
        $post = Posts::find ($request->id)->delete();
        return response()->json();
    }
}
