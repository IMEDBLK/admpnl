@extends('layouts.master')

@section('title', 'Ajouter un utilisateur')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Ajouter un utilisateur') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Ajouter') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
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
