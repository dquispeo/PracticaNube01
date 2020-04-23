@extends('layouts.app')
@section('title','Editar Artículo')
@section('content')
<div class="container" style="margin-top:70px;">
<div class="alert alert-success" role="alert">
 <strong>Editar Artículo |</strong> <a href="{{ route('articulos.index')}}" title="Volver">
 <i class="fas fa-arrow-circle-left btn btn-primary"> Volver</i></a>
</div>
{!! Form::model($editartis, array('route'=>['articulos.update', $editartis->id], 'method'=>'put')) !!}
{{ csrf_field() }}
{{ method_field('PATCH') }}
<div class="form-row">
<div class="form-group col-md-12">
{!! Form::label('ID') !!}
<input type="text" class="form-control" value="{{ $editartis->id }}" disabled>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
{!! Form::label('Descripción') !!}
<input type="text" class="form-control" name="descripcion" value="{{ $editartis->descripcion }}"
placeholder="Ingrese el nombre del artículo" required autofocus>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
{!! Form::label('Precio') !!}
<input type="text" class="form-control" step="any" name="precio" value="{{ $editartis->precio }}"
placeholder="Ingrese el precio del artículo" required>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12">
{!! Form::label('Stock') !!}
<input type="text" class="form-control" name="stock" value="{{ $editartis->stock }}"
placeholder="Ingrese el stock del artículo" required>
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
<a href="{{ route('articulos.index') }}" class="btn btn-secondary">Atras</a>
{!! Form::submit('Guardar', ['class'=>'btn btn-success']) !!}
{!! Form::close() !!}
</div>
@endsection