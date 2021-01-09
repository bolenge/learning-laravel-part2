@extends('templates.layout')

@section('title')
    Edition de l'utilisateur
@endsection

@section('content')
    <div class="offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un utilisateur</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
                    
                    <form action="{{ route('user.update', $user->id) }}" method="post" class="form-horizontal panel">
                        <input type="hidden" name="method" value="PUT">
                        {!! csrf_field() !!}
                        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                            <input type="text" name="name" class="form-control" placeholder"Nom" value="{{ $user->name }}" />
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            <input type="email" name="email" class="form-control" placeholder"Email" value="{{ $user->email }}" />
                            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="admin" value="1" {{ $user->admin ? 'checked' : '' }}>Administrateur
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