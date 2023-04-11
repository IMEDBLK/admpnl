@extends('layouts.master')
@section('title')
    PROFIL
@endsection


@section('title_content')
profil
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">

                @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif





<form action="{{ route('dashboard.update-profile') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required>
        @error('name')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
    </div>




    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required>
        @error('email')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
    </div>




    <div class="form-group">
        <label for="current_password">Mot de passe actuel</label>
        <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
        @error('current_password')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
    </div>


    <div class="form-group">
        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
    </div>



    <div class="form-group">
        <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
    </div>



    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">Enregistrer les modifications</button>
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
