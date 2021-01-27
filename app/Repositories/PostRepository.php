<?php
    namespace App\Repositories;

    use App\Models\Post;

    class PostRepository {
        /**
         * Instance de Post
         * @var Post
         */
        protected $post;

        public function __construct(Post $post)
        {
            $this->post = $post;
        }

        public function getPaginate($n)
        {
            return $this->post->with('user')
                ->orderBy('posts.created_at', 'desc')
                ->paginate($n);
        }

        public function store($inputs)
        {
            $this->post->create($inputs);
        }

        public function destroy($id)
        {
            $this->post->findOrFail($id)->delete();
        }
    }