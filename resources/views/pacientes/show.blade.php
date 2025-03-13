@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('content')
    <h1 class="mb-4">Editar Paciente</h1>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

       
        <div class="mb-3">
            <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
            <select name="tipo_documento_id" id="tipo_documento_id" class="form-control" required>
                @foreach ($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}" {{ $paciente->tipo_documento_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

      

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection