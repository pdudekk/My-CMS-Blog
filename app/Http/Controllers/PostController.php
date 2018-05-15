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
            'title' => 'required',
            'Content' => 'required'
        ]);

        //Tworzenie posta
        $post = new makePost();
        $post->postname2 = $request-> input('title');
        $post->adminid2 =1;
        $post->postcontent2 = $request-> input('Content');

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
          'title' => 'required',
          'Content' => 'required'
      ]);
      return redirect('/admin');
    }

}
