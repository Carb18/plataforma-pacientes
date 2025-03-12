@extends('layouts.app')

@section('title', 'Crear Paciente')

@section('content')
    <h1 class="mb-4">Crear Nuevo Paciente</h1>

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
            <select name="tipo_documento_id" id="tipo_documento_id" class="form-control" required>
                @foreach ($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero_documento" class="form-label">Número de Documento</label>
            <input type="text" name="numero_documento" id="numero_documento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nombre1" class="form-label">Primer Nombre</label>
            <input type="text" name="nombre1" id="nombre1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nombre2" class="form-label">Segundo Nombre</label>
            <input type="text" name="nombre2" id="nombre2" class="form-control">
        </div>

        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido</label>
            <input type="text" name="apellido1" id="apellido1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido</label>
            <input type="text" name="apellido2" id="apellido2" class="form-control">
        </div>

        <div class="mb-3">
            <label for="genero_id" class="form-label">Género</label>
            <select name="genero_id" id="genero_id" class="form-control" required>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-control" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="municipio_id" class="form-label">Municipio</label>
            <select name="municipio_id" id="municipio_id" class="form-control" required>
                <!-- Los municipios se cargarán dinámicamente con JavaScript -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <!-- Script de AJAX -->
    <script>
        document.getElementById('departamento_id').addEventListener('change', function() {
            const departamentoId = this.value;
            const municipioSelect = document.getElementById('municipio_id');

            // Limpiar el select de municipios
            municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';

            if (departamentoId) {
                // Hacer la solicitud AJAX
                fetch(`/municipios/${departamentoId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Llenar el select con los municipios obtenidos
                        data.forEach(municipio => {
                            const option = document.createElement('option');
                            option.value = municipio.id;
                            option.text = municipio.nombre;
                            municipioSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endsection