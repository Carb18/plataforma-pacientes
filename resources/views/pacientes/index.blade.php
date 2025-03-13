@extends('layouts.app')

@section('title', 'Listado de Pacientes')

@section('content')

    <h1 class="mb-4">Listado de Pacientes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">Crear Nuevo Paciente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
                <th>Nombre</th>
                <th>Género</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->tipoDocumento->nombre }}</td>
                    <td>{{ $paciente->numero_documento }}</td>
                    <td>{{ $paciente->nombre1 }} {{ $paciente->nombre2 }} {{ $paciente->apellido1 }} {{ $paciente->apellido2 }}</td>
                    <td>{{ $paciente->genero->nombre }}</td>
                    <td>{{ $paciente->departamento->nombre }}</td>
                    <td>{{ $paciente->municipio->nombre }}</td>
                    <td>
                        <div class="mb-4">
                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">Eliminar</button>
                            </form>
                        </div>
                       
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection