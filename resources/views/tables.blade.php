@extends('layouts.master')

@section('title')
    Liste des packs
@endsection

@section('title_content')
packs
@endsection

@section('content')
    <h1>Liste des packs</h1>
    <a href="{{ route('packs.create') }}" class="btn btn-primary btn-sm">Ajouter un pack</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packs as $pack)
                <tr>
                    <td>{{ $pack->id }}</td>
                    <td>{{ $pack->nom }}</td>
                    <td>{{ $pack->description }}</td>
                    <td>{{ $pack->prix }}</td>
                    <td>
                        <a href="{{ route('packs.edit', $pack->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('packs.destroy', $pack->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('style')
@endsection
