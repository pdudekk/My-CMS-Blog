<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\makePost;
use Illuminate\View\View;
use App\comments;
use Illuminate\Pagination\Paginator;
use DB;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:admin');

    }

    public function index(){

        return view('post');
    }

    public function addPost(Request $request){

        //walidacja
        $this->validate($request, [
            'image' => 'required',
            'title' => 'required',
            'Content' => 'required'
        ]);



          $file = $request->file('image');
          $ext = strtolower($file->getClientOriginalExtension());

          $myExt = (string)$ext;


        $lastpost = makePost::orderBy('created_at', 'desc')->first();

        //return (string)(((0)+1).'.'.$myExt);


        if(!is_object($lastpost)){
          $img_name = ('1'.'.'.$myExt);
        }
        else{
         $img_name = ((string)(($lastpost->id)+1).'.'.$myExt);
        }



        $file->storeAs('public/images/post', $img_name);
        //Tworzenie posta
        $post = new makePost();
        $post->postname2 = $request->input('title');
        $post->adminid2 = Auth::guard('admin')->user()->id;
        $post->postcontent2 = $request->input('Content');
        $post->img = $img_name;

        $post->save();

        return redirect('/');

    }
    public function showPost(){

      $data['data'] = DB::table('make_posts')->get();

    //if(count($data[0]) > 0){

      return view('showPosts', $data);

    }

    public function showEditPost($id){

      $post = makePost::where('id', '=', $id)->first();

      return view('showEditPost')->withPost($post);
    }


    public function editPost(Request $request){
      $this->validate($request, [
          'id' => 'required',
          'title' => 'required',
          'Content' => 'required'
      ]);

      $post = makePost::where('id', '=', $request->input('id'))->first();

      $post->postname2 = $request->input('title');
      $post->adminid2 = 1;
      $post->postcontent2= $request->input('Content');

      $post->save();

      return redirect('/admin');
    }

    public function showDeletePost($id){

      $post = makePost::where('id', '=', $id)->first();

      $comments = comments::all()->where('postid', '=', $post->id);

      return view('deletePost')->withPost($post)->with('comments', $comments);

    }
    public function deletePost($id){

      makePost::where('id', '=', $id)->delete();
      comments::where('postid', '=', $id)->delete();

      return redirect()->route('show.posts');

    }
    public function dontDelete(){
      return redirect()->route('show.posts');
    }

    public function deleteComment(Request $request){

      $this->validate($request, [
          'com_id' => 'required',
      ]);

      comments::where('id', '=', $request->input('com_id'))->delete();

      return back();
    }
}
