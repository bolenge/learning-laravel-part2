@extends('templates.error')

@section('title')
    Internal Error Server - Error 500
@endsection

@section('content')
    <br>
    <div class="offset-4 col-sm-4">
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title">Erreur serveur !</h3>
			</div>
			<div class="card-body"> 
                <p>Une erreur est survenue coté serveur...</p>
                
                <a href="/" class="btn btn-primary"><- Retour au site</a>
			</div>
		</div>
	</div>
@endsection