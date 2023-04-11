@extends('layouts.master')

@section('title')
    Modifier l'utilisateur {{ $user->name }}
@endsection

@section('title_content')
Modifier l'utilisateur {{ $user->name }}
@endsection

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" class="form-control" >
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

        </div>

        <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
              </div>
              @error('password-confirm')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


        <button type="submit" class="btn btn-primary">Modifier</button>
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
