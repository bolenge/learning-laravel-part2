@extends('templates.layout')

@section('title')
    Liste des utilisateurs
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-sm-6 offset-3 mb-3">
            <a href="{!! route('user.create') !!}" class="btn btn-info float-right">Ajouter un utilisateur</a>
        </div>
        <div class="col-sm-6 offset-3">

            @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
            @endif
            <div class="card card-primary">
                <div class="card-headear">
                    <h3 class="card-title text-center">Liste des utilisateurs</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td class="text-primary"><strong>{!! $user->name !!}</strong></td>
                                <td><a href="{!! route('user.show', $user->id) !!}" class="btn btn-success btn-block">Voir</a></td>
                                <td><a href="{!! route('user.edit', $user->id) !!}" class="btn btn-warning btn-block">Modifier</a></td>
                                <td>
                                    <form action="{!! route('user.destroy', $user->id) !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm(\'Vraiment supprimer cet utilisateur ?\')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            {!! $links !!}
        </div>
    </div>
@endsection