<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

class PostController extends Controller
{
    protected $postRepository;
    protected $nbrPerPage = 6;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => ['index', 'indexTag']]);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getWithUserAndTagsPaginate($this->nbrPerPage);
        $links = $posts->render();
        $active = 'blog';

        return \view('posts.list', \compact('posts', 'links', 'active'));
    }

    public function create()
    {
        return \view('posts.add')->withActive('blog');
    }

    public function store(PostRequest $request, TagRepository $tagRepository)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $post = $this->postRepository->store($inputs);

        if (isset($inputs['tags'])) {
            $tagRepository->store($post, $inputs['tags']);
        }

        return \redirect('/post');
    }

    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return \redirect()->back();
    }

    public function indexTag($tag)
    {
        $posts = $this->postRepository->getWithUserAndTagsForTagPaginate($tag, $this->nbrPerPage);
        $links = $posts->render();
        $active = 'blog';

        return \view('posts.list', \compact('posts', 'links', 'active'))->with('info', trans('blog.search').$tag);
    }

    public function language()
    {
        session()->put('locale', session('locale') === 'fr' ? 'en' : 'fr');

        return redirect()->back();
    }
}
