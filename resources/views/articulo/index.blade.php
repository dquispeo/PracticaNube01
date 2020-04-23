@extends('layouts.app')
@section('title','Artículos')
@section('content')
<div class="container" style="margin-top:70px;">
<div class="alert alert-success" role="alert">
 <strong>Artículos |</strong> <a href="#ModalCrearArt" data-toggle="modal" title="Agregar Artículo">
<i class="fas fa-plus-circle btn btn-success"></i></a>
</div>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Hecho:</strong> {{ session('status') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if (session('status2'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error:</strong> {{ session('status2') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if(count($indexartis)>0)
<table id="dataTable00" class="table table-hover dataTable">
    <thead>
        <tr>
            <th>Acciones</th>
            <th>ID</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($indexartis as $indexartisc)
        <tr>
            <td>
            <form action="{{ route('articulos.destroy', $indexartisc->id) }}" method="post" style="display:inline">
{{ csrf_field() }}
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Deseas eliminar esta artículo?')"><i class="fas fa-trash-alt"></i></button>
</form>
<a href="{{ route('articulos.edit', $indexartisc->id) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
            </td>
            <td>{{ $indexartisc->id }}</td>
            <td>{{ $indexartisc->descripcion }}</td>
            <td>{{ $indexartisc->precio }}</td>
            <td>{{ $indexartisc->stock }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<div class="jumbotron jumbotron-fluid">
<div class="container">
<h1 class="display-4"><center>No hay artículos agregados.</center></h1>
</div>
</div>
@endif
<!--Inicio Modal-->
<div class="container">
<div class="modal fade" id="ModalCrearArt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">
<div class="modal-header alert alert-success">
<h5 class="modal-title" id="exampleModalLabel">Nuevo Artículo</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
{!! Form::open(['route' => 'articulos.store', 'enctype'=>'multipart/form-data', 'method'=>'post']) !!}
{{ csrf_field() }}
<div class="form-row">
<div class="form-group col-md-4">
<label for="input1">Descripción</label>
<input id="input1" type="text" class="form-control" name="descripcion"
placeholder="Ejm: laptop" autofocus required>
</div>
<div class="form-group col-md-4">
<label for="input2">Precio</label>
<input type="number" step="any" class="form-control" id="input2"  name="precio" placeholder="Ejm: 123.45" required>
</div>
<div class="form-group col-md-4">
<label for="input3">Stock</label>
<input type="number" class="form-control" name="stock" id="input3"
placeholder="Ejm: 123" required>
</div>
</div>
<div class="form-group">
<div class="form-check">
<input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
<label class="form-check-label" for="invalidCheck3">
¿Está de acuerdo con los datos ingresados?
</label>
</div>
</div>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-success">Crear</button>
</div>
{!! Form::close() !!}
</div>
</div>
</div>
</div>
<!--Fin modal-->
</div>
@endsection
@section('datatable')
<script type="text/javascript">
$(document).ready(function() {
$('#dataTable00').DataTable( {
"language": {
"emptyTable":			"No hay datos disponibles en la tabla.",
"info":		   			"Del _START_ al _END_ de _TOTAL_ ",
"infoEmpty":			"Mostrando 0 registros de un total de 0.",
"infoFiltered":			"(filtrados de un total de _MAX_ registros)",
"lengthMenu":			"Mostrar _MENU_ registros",
"loadingRecords":		"Cargando...",
"processing":			"Procesando...",
"search":				"Buscar:",
"searchPlaceholder":	"Dato para buscar",
"zeroRecords":			"No se han encontrado coincidencias.",
"oPaginate": {
"sFirst":    "Primero",
"sLast":     "Último",
"sNext":     "Siguiente",
"sPrevious": "Anterior"
},
"oAria": {
"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
"sSortDescending": ": Activar para ordenar la columna de manera descendente"
}
},
"lengthMenu": [50, 100, 500],
"pageLength": 50
} );
} );
</script>
@endsection