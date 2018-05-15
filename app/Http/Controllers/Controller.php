<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\makePost;
use Illuminate\View\View;
use App\comments;
use Illuminate\Pagination\Paginator;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPosts(){

        $page =1;
        $perPage = 5;

        $posts_count = count(makePost::all());

        $skip = $posts_count - 5*1;


        $posts = new Paginator(DB::table('make_posts')->skip($skip)->take($perPage)->get()->reverse(), $perPage, $page);

        $posts_count = ceil($posts_count/5);

        return view('showPost')->with('make_posts', $posts)->with('posts_count', $posts_count);

    }

    public function pagei($i){

        $page = $i;
        $perPage = 5;

        $posts_count = count(makePost::all());

        $skip = $posts_count - 5*$i;

        if($skip < 0){
            $perPage = $posts_count - 5*floor($posts_count/5);
            $skip = 0;
        }




        $post = new Paginator(DB::table('make_posts')->skip($skip)->take($perPage)->get()->reverse(), $perPage, $page);

        $posts_count = ceil($posts_count/5);



        return view('showPost')->with('make_posts', $post)->with('posts_count', $posts_count);


    }


    public function singlePost($id) {

        $post = makePost::where('id', '=', $id)->first();

        $comments = comments::all()->where('postid', '=', $post->id);

        return view('singlePost')->withPost($post)->with('comments', $comments);
}
}
