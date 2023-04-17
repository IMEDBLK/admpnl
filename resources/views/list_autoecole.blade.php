@extends('layouts.master')

@section('title', 'Liste des auto-écoles')

@section('title_content')
Auto-écoles
@endsection

@section('content')

<a href="{{ route('autoecoles.create') }}" class="btn btn-sm btn-primary btn-ajouter">ajouter auto école</a>

<div class="d-flex justify-content-between">

  <form action="{{ route('autoecoles.index') }}" method="GET" class="form-inline form-recherche flex-grow-1 mr-2">
    <div class="input-group">
      <input type="text" class="form-control form-control-sm flex-grow-1" id="search" name="search"  placeholder="Rechercher..." onchange="this.form.submit()">
      <div class="input-group-append">
        <button type="submit" class="btn btn-sm btn-primary">Rechercher</button>
      </div>
    </div>
  </form>

  <form method="GET" action="{{ route('autoecoles.index') }}" class="form-inline mb-2" style="width: 10%;">
  <label for="perPage" class="mr-sm-2">Afficher</label>
  <select name="perPage" id="perPage" class="form-control flex-grow-1" onchange="this.form.submit()"  >
    <option value="2" {{ request('perPage') == 2 ? 'selected' : '' }}>2</option>
    <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
    <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
  </select>
</form>

</div>



<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Région</th>
      <th>Matricule fiscale</th>
      <th>Email</th>
      <th>Pack</th>
      <th>Date d'activation</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($autoecoles as $autoecole)
      <tr>
        <td>{{ $autoecole->id }}</td>
        <td>{{ $autoecole->nom }}</td>
        <td>{{ $autoecole->region }}</td>
        <td>{{ $autoecole->matricule_fiscale }}</td>
        <td>{{ $autoecole->email }}</td>
        <td>{{ $autoecole->pack->nom }}</td>
        <td>{{ $autoecole->date_activation_pack }}</td>
        <td>
          <a href="{{ route('autoecoles.edit', $autoecole->id) }}" class="btn btn-sm btn-primary">Modifier</a>
          <a href="" class="btn btn-sm btn-success">Exporter vers Excel</a>
          <form action="{{ route('autoecoles.destroy', $autoecole->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette auto-école ?')">Supprimer</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>

</table>


<div class="d-flex justify-content-between align-items-center mt-10 mr-10">
  <div style="width: 80%;"></div>
  <div style="float: right;">
  {{ $autoecoles->appends(request()->input())->links() }}

  </div>
</div>



@endsection

@section('style')
    <style>
        /* Ajoutez ici votre code CSS personnalisé pour cette section */
        .form-recherche {
  width: 20%;
  float: right;
  margin-left: 10px; /* facultatif : pour ajouter un peu d'espace entre la zone de recherche et le tableau */
}
.form-recherche.input-group {
  display: flex;
  align-items: center;
}

.form-recherche.input-group input.form-control {
  flex: 1;
}

.btn-ajouter {
  background-color: green;
  width: 150px;

    margin-right:5%;
    margin-bottom:3%;
}




    </style>
@endsection
