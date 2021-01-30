<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $postRepository;
    protected $nbrPerPage = 6;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $links = $posts->render();
        $active = 'blog';

        return \view('posts.list', \compact('posts', 'links', 'active'));
    }

    public function create()
    {
        return \view('posts.add')->withActive('blog');
    }

    public function store(PostRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $this->postRepository->store($inputs);

        return \redirect('/post');
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return \redirect()->back();
    }
}
