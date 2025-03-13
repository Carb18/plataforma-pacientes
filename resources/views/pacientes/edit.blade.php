@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('content')
    <h1 class="mb-4">Editar Paciente</h1>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" onsubmit="return validarFormulario()">
        @csrf
        @method('PUT')

        <!-- Tipo de Documento -->
        <div class="mb-3">
            <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
            <select name="tipo_documento_id" id="tipo_documento_id" class="form-control" required>
                @foreach ($tiposDocumento as $tipo)
                    <option value="{{ $tipo->id }}" {{ $paciente->tipo_documento_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Número de Documento  -->
        <div class="mb-3">
            <label for="numero_documento" class="form-label">Número de Documento</label>
            <input type="text" name="numero_documento" id="numero_documento" class="form-control" value="{{ $paciente->numero_documento }}" pattern="\d+" title="Solo se permiten números" required>
        </div>

        <!-- Primer Nombre  -->
        <div class="mb-3">
            <label for="nombre1" class="form-label">Primer Nombre</label>
            <input type="text" name="nombre1" id="nombre1" class="form-control" value="{{ $paciente->nombre1 }}" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required>
        </div>

        <!-- Segundo Nombre  -->
        <div class="mb-3">
            <label for="nombre2" class="form-label">Segundo Nombre</label>
            <input type="text" name="nombre2" id="nombre2" class="form-control" value="{{ $paciente->nombre2 }}" pattern="[A-Za-z\s]*" title="Solo se permiten letras y espacios">
        </div>

        <!-- Primer Apellido  -->
        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido</label>
            <input type="text" name="apellido1" id="apellido1" class="form-control" value="{{ $paciente->apellido1 }}" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required>
        </div>

        <!-- Segundo Apellido  -->
        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido</label>
            <input type="text" name="apellido2" id="apellido2" class="form-control" value="{{ $paciente->apellido2 }}" pattern="[A-Za-z\s]*" title="Solo se permiten letras y espacios">
        </div>

        <!-- Género -->
        <div class="mb-3">
            <label for="genero_id" class="form-label">Género</label>
            <select name="genero_id" id="genero_id" class="form-control" required>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ $paciente->genero_id == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Departamento -->
        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-control" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ $paciente->departamento_id == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Municipio -->
        <div class="mb-3">
            <label for="municipio_id" class="form-label">Municipio</label>
            <select name="municipio_id" id="municipio_id" class="form-control" required>
              
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <!-- Script de AJAX y Validación -->
    <script>
        // Función para cargar los municipios
        function cargarMunicipios(departamentoId, municipioIdSeleccionado = null) {
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
                            if (municipio.id == municipioIdSeleccionado) {
                                option.selected = true;
                            }
                            municipioSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        // Cargar los municipios al cargar la página
        const departamentoId = document.getElementById('departamento_id').value;
        const municipioIdSeleccionado = {{ $paciente->municipio_id }};
        cargarMunicipios(departamentoId, municipioIdSeleccionado);

        // Escuchar cambios en el select de departamentos
        document.getElementById('departamento_id').addEventListener('change', function() {
            const departamentoId = this.value;
            cargarMunicipios(departamentoId);
        });

        // Función para validar el formulario antes de enviar
        function validarFormulario() {
            const numeroDocumento = document.getElementById('numero_documento').value;
            const nombre1 = document.getElementById('nombre1').value;
            const apellido1 = document.getElementById('apellido1').value;

            // Validar que el número de documento solo contenga números
            if (!/^\d+$/.test(numeroDocumento)) {
                alert('El número de documento solo puede contener números.');
                return false;
            }

            // Validar que el primer nombre solo contenga letras y espacios
            if (!/^[A-Za-z\s]+$/.test(nombre1)) {
                alert('El primer nombre solo puede contener letras y espacios.');
                return false;
            }

            // Validar que el primer apellido solo contenga letras y espacios
            if (!/^[A-Za-z\s]+$/.test(apellido1)) {
                alert('El primer apellido solo puede contener letras y espacios.');
                return false;
            }

            return true;
        }
    </script>
@endsection