@extends('layouts.master')

@section('title', 'Ajouter un pack')


@section('title_content')
    Packs / Ajouter pack
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('packs.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                    @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prix">Prix:</label>
                    <input type="number" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}">
                    @error('prix')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Ajouter pack</button>
            </form>
        </div>
    </div>
@endsection
@section('style')
<style>

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-left:15%;
.alrt
{
    height:50%;
}

}

.form-group {
 margin:auto;
    margin-bottom: 20px;
  width: 70%;
}



label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"], /* <-- Add this line */
textarea,
select {
    width: 70%; /* <-- Change from 70% to 100% */
    font-size: 16px;
    border: 2px solid #ddd;
    border-radius: 20px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="number"]:focus, /* <-- Add this line */
textarea:focus,
select:focus {
    outline: none;
    border-color: #2ecc71;
}

button[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    font-size: 18px;

    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #27ae60;
    padding: 1%;
}

.form-text-input {
    width: 50%;
    padding: 10px;
    font-size: 16px;
    border: 2px solid #ddd;
    border-radius: 5px;
}

.form-text-input:focus {
    outline: none;
    border-color: #2ecc71;
}





/* Style pour les champs d'entrée avec une erreur de validation */
.is-invalid {
    border-color: #dc3545; /* Couleur rouge */
    box-shadow: 0 0 10px red;
    border: 1px solid red;
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: 50% calc(.75em + .375rem);
}

.alert {
    width: 70%;

}



/* Style pour le message d'erreur */
.invalid-feedback {
    display: block;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545; /* Couleur rouge */
}

input[type="number"], /* <-- Add this line */
textarea { /* <-- Add this line */
    border-radius: 20px;
    width: 70%;
    /* <-- Add this line */
}


.form-control {
    width: 70%;
}

    </style>

@endsection
