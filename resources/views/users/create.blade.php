@extends('templates.layout')

@section('title')
    Création d'un nouvel utilisateur
@endsection

@section('content')
	<div class="offset-4 col-sm-4">
		<br>
		<div class="card card-primary">	
			<div class="card-header">Création d'un utilisateur</div>
			<div class="card-body"> 
				<div class="col-sm-12">
                    <form action="{{ route('user.store') }}" method="post" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                            <input type="text" name="name" class="form-control" placeholder="Nom" />
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            <input type="email" name="email" class="form-control" placeholder="Email" />
                            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" />
                            {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation Mot de passe" />
                            {!! $errors->first('password_confirmation', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="admin" value="1"> Administrateur
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Envoyer</button>
                    </form>
					
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="fa fa-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection