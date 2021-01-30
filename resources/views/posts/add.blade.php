@extends('templates.layout')

@section('content')
	<br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="card card-info">
			<div class="card-header">Ajout d'un article</div>
			<div class="card-body">
				<form action="/post/add" method="POST">
					<div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
						<input type="text" name="title" id="title" class="form-control">
						{!! $errors->first('title', '<small class="help-block">:message</small>') !!}
					</div>

					<div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
						<textarea name="content" id="content" class="form-control"></textarea>
						{!! $errors->first('content', '<small class="help-block">:message</small>') !!}
					</div>
					<button type="submit" class="btn btn-info float-right">Envoyer !</button>
				</form>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="fa fa-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection