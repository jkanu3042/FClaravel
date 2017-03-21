<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth')->except('show');
      //유효성 검사 테스트를 위해 삭제.
      //$this->middleware('hasFile:img')->only('store');

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
      // ## 폼 리퀘스트 파일을 생성 함으로서 필요없어진 구문 StorePostRequest ##
      // $messages = [
      //   'required' => ':attribute 는/은 필수입니다.',
      //   'image' => ':attribute 는/은 이미지 파일이여야 합니다.',
      // ];
      // $attributes = [
      //   'description' => '설명',
      //   'img' => '이미지'
      // ];
      //
      // $this->validate($request, [
      //   'description' => 'required',
      //   'img' => 'required|image'
      // ],$messages,$attributes);

      $imgPath = $request->img->store('images','public');

      $description = $request->input('description');

      $user = $request->user();

        $post = $user->posts()->create([
            'img_path' => $imgPath,
            'description' => $description,
        ]);

        $tagsInput = $request->input('tags');
        if($tagsInput) {
            $tags = explode(',',$tagsInput);

            foreach($tags as $tag) {
                $tag = \App\Tag::firstOrCreate([
                    'name' => trim($tag)
                ]);

                $post->tags()->attach($tag->id);
            }

        }



      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('comments.user');

        return view('posts.show',['post'=>$post]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
