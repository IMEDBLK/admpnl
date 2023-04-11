@extends('layouts.master')

@section('title')
    Liste des packs
@endsection


@section('title_content')
packs
@endsection


@section('content')

    <a href="{{ route('packs.create') }}" class="btn btn-success">Ajouter un pack</a>

    <table class="table table-striped table-bordered dataTable" style="width: 100%;">

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
                    <div class="btn-group" role="group" aria-label="Actions">
                    <form method="GET" action="{{ route('packs.edit', $pack->id) }}">
        @csrf
        <button type="submit" class="btn btn-info"> Modifier</button>
    </form>



<form action="{{ route('packs.destroy', $pack->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce pack ?')" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-action">Supprimer</button>
</form>
</div>


     </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



@section('style')
<style>
.btn-group {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.btn-group form {
  margin-bottom: 1px;
}

 .fa-trash:before {
    content: "\f1f8";
}

   .custom-btn {
        background-color: blue;
        color: white;
    }
   .card-header {
        display: flex;
        align-items: center;
    }
    .dataTables_length {
        margin-bottom: 10px;
    }
    .dataTables_info {
        margin-top: 10px;
        margin-bottom: 10px;
    }



.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
}

.btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}





.content {
  width: 30%;
  float: right;
}

#pack_id {
    display: inline-block;
    width: 50%;
    margin-right: 2px;
}

.btn-primary {
    display: inline-block;

}

</style>
@endsection
