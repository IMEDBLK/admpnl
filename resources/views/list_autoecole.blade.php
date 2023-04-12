@extends('layouts.master')

@section('title', 'Liste des auto-écoles')


@section('title_content')
auto-ecoles
@endsection


@section('content')

<div class="card">
    <div class="card-header">

        <div class="card-tools">
            <a href="{{ route('autoecoles.create') }}" class="btn btn-success">Ajouter une auto-école</a>
        </div>






    </div>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-sm table-responsive">
            <thead>
                <tr>
                    <th class="text-wrap">ID</th>
                    <th class="text-wrap">Nom</th>
                    <th class="text-wrap">Region</th>
                    <th class="text-wrap">Matricule fiscale</th>
                    <th class="text-wrap">Email</th>
                    <th class="text-wrap">Pack</th>
                    <th class="text-wrap">Date d'activation du pack</th>
                    <th class="text-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autoecoles as $autoecole)
                    <tr>
                        <td class="wrap">{{ $autoecole->id }}</td>
                        <td class="wrap">{{ $autoecole->nom }}</td>

                        <td class="wrap">{{ $autoecole->region }}</td>
                        <td class="wrap">{{ $autoecole->matricule_fiscale }}</td>
                        <td class="wrap">{{ $autoecole->email }}</td>
                        <td class="wrap">{{ $autoecole->pack->nom }}</td>
                        <td class="wrap">{{ $autoecole->date_activation_pack }}</td>
                        <td >
                        <div class="btn-group d-flex flex-wrap" role="group" aria-label="Actions">
    <form method="GET" action="{{ route('autoecoles.edit', $autoecole->id) }}">
        @csrf
        <button type="submit" class="btn btn-info"> Modifier</button>
    </form>
    <form action="{{ route('autoecoles.destroy', $autoecole->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette auto-école ?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Supprimer</button>
    </form>
    <a href="{{ route('autoecoles.export', ['id' => $autoecole->id]) }}" class="btn btn-primary">Exporter en Excel</a>
</div>

                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        </div>
        <div class="pagination d-flex justify-content-end">
    {{ $autoecoles->links() }}
</div>
        <div class="content"><form action="{{ route('autoecoles.index') }}" method="GET">

        <div class="form-group">

  <select class="form-control d-inline-block" name="pack_id" id="pack_id">
    <option value="">Tous les packs</option>
    @foreach($packs as $pack)
      <option value="{{ $pack->id }}" @if(request('pack_id') == $pack->id) selected @endif>{{ $pack->nom }}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary d-inline-block ">Filtrer</button>
</div>


</form></div>


    </div>
</div>
@endsection
@section('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<style>




.btn-group {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.btn-group form {
  margin-bottom: 1px;
}


.wrap {
    white-space: normal !important;
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
        margin-bottom: auto;
    }
    .dataTables_info {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .dataTables_paginate {
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


.pagination {
  width: 25%;
  float: right;
padding-right:5%;
padding-top:5%;
}

.form-group
{padding-top:20%;}
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
@section('script')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>


$(document).ready(function() {
    $('.dataTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        columnDefs: [{
            targets: 5, // Indice de la colonne de Pack
            render: function(data, type, row, meta) {
                return data.nom;
            }
        }]
    });
});
</script>
<script>$(document).ready(function() {
    $('.dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json"
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
        "pageLength": 10,
        "order": [[ 0, "asc" ]]
    });
});
</script>


<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "dom": '<"top"i>rt<"bottom"flp><"clear">'
    } );
} );
    </script>
@endsection

