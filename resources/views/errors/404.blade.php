@extends('templates.error')

@section('title')
    Page Not Found - 404
@endsection

@section('content')
    <br>
    <div class="offset-4 col-sm-4">
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title">Il y a un problème !</h3>
			</div>
			<div class="card-body"> 
                <p>Nous sommes désolés mais la page que vous désirez n'existe pas...</p>
                
                <a href="/" class="btn btn-primary"><- Retour au site</a>
			</div>
		</div>
	</div>
@endsection