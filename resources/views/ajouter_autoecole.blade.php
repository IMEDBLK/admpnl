@extends('layouts.master')

@section('title', 'Ajouter une auto-école')







@section('title_content')
auto-ecole / ajouter auto-école
@endsection

@section('content')

    <form method="POST" action="{{ route('autoecoles.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
            @error('nom')
                <div class="alert alert-danger text-white rounded">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('nom') }}">
            @error('adresse')
                <div class="alert alert-danger text-white rounded">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="matricule_fiscale">Matricule fiscale:</label>
            <input type="text" name="matricule_fiscale" id="matricule_fiscale" class="form-control @error('matricule_fiscale') is-invalid @enderror" value="{{ old('matricule_fiscale') }}">
            @error('matricule_fiscale')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger " id="alrt">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pack_id">Pack:</label>
            <select name="pack_id" id="pack_id" class="form-control @error('pack_id') is-invalid @enderror">
                @foreach($packs as $pack)
                    <option value="{{ $pack->id }}" {{ old('pack_id') == $pack->id ? 'selected' : '' }}>{{ $pack->nom }}</option>
                @endforeach
            </select>
            @error('pack_id')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_activation_pack">Date d'activation du pack:</label>
            <input type="date" name="date_activation_pack" id="date_activation_pack" class="form-control @error('date_activation_pack') is-invalid @enderror" value="{{ old('date_activation_pack') }}">
            @error('date_activation_pack')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="card-tools mx-auto" style="text-align: center;">
    <button type="submit">Ajouter l'auto-école</button>
</div>



</form>


@endsection


@section('style')
<style>


/* Styles pour le formulaire */
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
textarea,
select {
  width: 70%;

  font-size: 16px;
  border: 2px solid #ddd;
  border-radius: 20px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
textarea:focus,
select:focus {
  outline: none;
  border-color: #2ecc71;
}

button[type="submit"] {
  background-color: #2ecc71;
  color: #fff;
  font-size: 18px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;

}

button[type="submit"]:hover {
  background-color: #27ae60;
  padding:1%;
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

select[name="pack_id"],
input[type="date"] {
  width: 70%;

  font-size: 16px;
  border: 2px solid #ddd;
  border-radius: 5px;
}

select[name="pack_id"]:focus,
input[type="date"]:focus {
  outline: none;
  border-color: #2ecc71;
}

select[name="pack_id"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;


  color: #666;
  text-indent: 0.01px;
  text-overflow: '';
}

input[type="date"]::-webkit-calendar-picker-indicator {
  filter: invert(1);
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

    </style>

@endsection
