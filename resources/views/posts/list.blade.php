@extends('templates.layout')

@section('title')
    Super Blog
@endsection

@section('content')
	<div class="container mt-5">		
		@if (isset($info))
			<div class="alert alert-info">
				{{ $info }}
			</div>
		@endif

		@if (!empty($posts))
			<div class="row">
				@foreach ($posts as $post)
					<div class="col-lg-4 mb-3">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">{{ $post->title }}</h3>
								<div class="float-right">
									@foreach ($post->tags as $tag)
										<a href="/post/tag/{{ $tag->tag_url }}" class="btn btn-info btn-sm">{{ $tag->tag }}</a>
									@endforeach
								</div>
							</div>
							<div class="card-body">
								<p>{{ $post->content }}</p>
							</div>
							<div class="card-footer">
								@if(Auth::check() and Auth::user()->admin)
									<form action="{{ route('post.destroy', $post->id) }}" method="post">
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
										@csrf
									</form>
								@endif

								<em class="float-right">
									<span class="fa fa-pencil"></span> {{ $post->user->name . ' ' . trans('blog.on') . ' ' . $post->created_at }}
								</em>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="container">
				{!! $links !!}
			</div>
		@endif
	</div>
@endsection