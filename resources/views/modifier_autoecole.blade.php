@extends('layouts.master')


@section('title_content')
auto-ecole / modifier auto-école
@endsection



@section('script')
    <script>
        document.getElementById('nom').style.color = 'red';
    </script>
@endsection

@section('content')
<h1>Modifier l'auto-école {{ old('nom', $autoEcole->nom) }}</h1>

<form method="POST" action="{{ route('autoecoles.update', $autoEcole->id) }}">

    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $autoEcole->id }}">

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $autoEcole->nom) }}">
        @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <textarea name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror">{{ old('adresse', $autoEcole->adresse) }}</textarea>
        @error('adresse')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="matricule_fiscale">Matricule fiscale:</label>
        <input type="text" name="matricule_fiscale" id="matricule_fiscale" class="form-control @error('matricule_fiscale') is-invalid @enderror" value="{{ old('matricule_fiscale', $autoEcole->matricule_fiscale) }}">
        @error('matricule_fiscale')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $autoEcole->email) }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $autoEcole->password) }}">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="pack_id">Pack:</label>
        <select name="pack_id" id="pack_id" class="form-control @error('pack_id') is-invalid @enderror">
            @foreach($packs as $pack)
                <option value="{{ $pack->id }}" {{ old('pack_id', $autoEcole->pack_id) == $pack->id ? 'selected' : '' }}>{{ $pack->nom }}</option>
            @endforeach
        </select>
        @error('pack_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
    <label for="date_activation_pack">Date d'activation du pack:</label>
    <input type="date" name="date_activation_pack" id="date_activation_pack" class="form-control @error('date_activation_pack') is-invalid @enderror" value="{{ old('date_activation_pack', $autoEcole->date_activation_pack) }}">
    @error('date_activation_pack')
        <div class="invalid-feedback">{{ $message }}</div>

    @enderror
</div>
<button type="submit" class="btn btn-primary">Modifier</button>

</form>

@endsection



@section('style')
@endsection
