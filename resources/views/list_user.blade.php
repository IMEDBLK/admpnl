@extends('layouts.master')

@section('title')
Liste des utilisateurs
@endsection

@section('title_content')
Utilisateurs
@endsection

@section('content')
<h1>Liste des utilisateurs</h1>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Nom</th>
<th>Email</th>

<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>

    <td>

        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
    </td>
</tr>
@endforeach

</tbody>
</table>
</div>
<a href="{{ route('users.create') }}" class="btn btn-success">Ajouter un utilisateur</a>
@endsection
