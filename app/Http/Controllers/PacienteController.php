<?php

namespace App\Http\Controllers;
use App\Models\Paciente;
use App\Models\TipoDocumento;
use App\Models\Genero;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;



class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::with(['tipoDocumento', 'genero', 'departamento', 'municipio'])->get();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumento = TipoDocumento::all();
        $generos = Genero::all();
        $departamentos = Departamento::all();
        return view('pacientes.create', compact('tiposDocumento', 'generos', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documento,id',
            'numero_documento' => 'required|unique:paciente,numero_documento',
            'nombre1' => 'required|string|max:255',
            'nombre2' => 'nullable|string|max:255',
            'apellido1' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'genero_id' => 'required|exists:genero,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'municipio_id' => 'required|exists:municipios,id',
        ]);

        $paciente = new Paciente($request->all());



        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        $tiposDocumento = TipoDocumento::all();
        $generos = Genero::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::where('departamento_id', $paciente->departamento_id)->get();
        return view('pacientes.edit', compact('paciente', 'tiposDocumento', 'generos', 'departamentos', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Paciente $paciente)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documento,id',
            'numero_documento' => 'required|unique:paciente,numero_documento,' . $paciente->id,
            'nombre1' => 'required|string|max:255',
            'nombre2' => 'nullable|string|max:255',
            'apellido1' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'genero_id' => 'required|exists:genero,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'municipio_id' => 'required|exists:municipios,id',
        ]);

       
        $paciente->update($request->all());

        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente.');
    }
}
