<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // 1. READ: Listado de estudiantes con paginación
    public function index()
    {
        $estudiantes = Estudiante::latest()->paginate(5);
        return view('estudiantes.index', compact('estudiantes'));
    }

    // 2. CREATE: Formulario de nuevo estudiante
    public function create()
    {
        return view('estudiantes.create');
    }

    // 3. STORE: Validación e inserción en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo'    => 'required|string|size:10|unique:estudiantes,codigo',
            'nombres'   => 'required|string|max:60',
            'apellidos' => 'required|string|max:60',
            'email'     => 'required|email|max:80|unique:estudiantes,email',
            'ciclo'     => 'required|string|max:10',
            'promedio'  => 'required|numeric|between:0,20.00',
        ]);

        Estudiante::create($validated);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante registrado exitosamente en el sistema.');
    }

    // 4. SHOW: Visualizar ficha individual del estudiante (Route Model Binding)
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    // 5. EDIT: Formulario de edición con datos cargados
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    // 6. UPDATE: Validación y actualización del registro existente
    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
            'codigo'    => 'required|string|size:10|unique:estudiantes,codigo,' . $estudiante->id,
            'nombres'   => 'required|string|max:60',
            'apellidos' => 'required|string|max:60',
            'email'     => 'required|email|max:80|unique:estudiantes,email,' . $estudiante->id,
            'ciclo'     => 'required|string|max:10',
            'promedio'  => 'required|numeric|between:0,20.00',
        ]);

        $estudiante->update($validated);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Datos del estudiante actualizados correctamente.');
    }

    // 7. DESTROY: Eliminación del registro
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Registro del estudiante eliminado satisfactoriamente.');
    }
}