<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // 1. LISTADO + FILTRO POR CICLO + PAGINACIÓN
    public function index(Request $request)
    {
        $cursos = Curso::when($request->ciclo, fn ($q, $ciclo) => $q->where('ciclo', $ciclo))
            ->latest()
            ->paginate(5)
            ->appends($request->query());

        return view('cursos.index', compact('cursos'));
    }

    // 2. FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('cursos.create');
    }

    // 3. VALIDAR Y GUARDAR NUEVO CURSO
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo'         => 'required|string|max:10|unique:cursos,codigo',
            'nombre'         => 'required|string|max:100',
            'creditos'       => 'required|integer|between:1,6',
            'horas_teoria'   => 'required|integer|min:0|max:20',
            'horas_practica' => 'required|integer|min:0|max:20',
            'ciclo'          => 'required|in:I,II,III,IV,V,VI,VII,VIII,IX,X',
            'tipo'           => 'required|in:Obligatorio,Electivo',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Asignatura registrada exitosamente.');
    }

    // 4. VER DETALLE DE UN CURSO
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    // 5. FORMULARIO DE EDICIÓN
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    // 6. VALIDAR Y ACTUALIZAR CURSO
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'codigo'         => 'required|string|max:10|unique:cursos,codigo,' . $curso->id,
            'nombre'         => 'required|string|max:100',
            'creditos'       => 'required|integer|between:1,6',
            'horas_teoria'   => 'required|integer|min:0|max:20',
            'horas_practica' => 'required|integer|min:0|max:20',
            'ciclo'          => 'required|in:I,II,III,IV,V,VI,VII,VIII,IX,X',
            'tipo'           => 'required|in:Obligatorio,Electivo',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Asignatura actualizada correctamente.');
    }

    // 7. ELIMINAR CURSO
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Asignatura eliminada satisfactoriamente.');
    }
}