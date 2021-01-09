@extends('templates.layout')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="card card-primary">	
			<div class="card-headear">Fiche d'utilisateur</div>
			<div class="card-body"> 
				<p>Nom : {{ $user->name }}</p>
				<p>Email : {{ $user->email }}</p>
				@if($user->admin == 1)
					Administrateur
				@endif
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="fa fa-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection