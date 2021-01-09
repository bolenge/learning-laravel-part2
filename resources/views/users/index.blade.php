@extends('templates.layout')

@section('title')
    Liste des utilisateurs
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-sm-4 offset-4 mb-3">
            <a href="{!! route('user.create') !!}" class="btn btn-info float-right">Ajouter un utilisateur</a>
        </div>
        <div class="offset-4 col-sm-4">

            @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
            @endif
            <div class="card card-primary">
                <div class="card-headear">
                    <h3 class="card-title">Liste des utilisateurs</h3>
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
                        @foreach ($users as $user)
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td class="text-primary"><strong>{!! $user->name !!}</strong></td>
                                <td>{!! route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                                <td>{!! route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                <td>
                                    <form action="{!! route(user.destroy, $user->id) !!}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm(\'Vraiment supprimer cet utilisateur ?\')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $links !!}
        </div>
    </div>
@endsection