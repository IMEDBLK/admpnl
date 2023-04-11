@extends('layouts.master')

@section('title', 'Modifier un pack')


@section('title_content')
packs / modifier pack
@endsection

@section('content')
    <h1>Modifier un pack</h1>

    <form method="POST" action="{{ route('packs.update', $pack->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ $pack->nom }}">
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $pack->description }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="text" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ $pack->prix }}">
            @error('prix')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>

    </form>

@endsection

@section('style')
@endsection
