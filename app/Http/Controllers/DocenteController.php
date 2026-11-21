<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // 1. LISTADO + BUSCADOR POR DNI/APELLIDO + FILTRO POR CATEGORÍA + PAGINACIÓN PERSISTENTE
    public function index(Request $request)
    {
        $docentes = Docente::when($request->buscar, function ($q, $buscar) {
                $q->where(function ($sub) use ($buscar) {
                    $sub->where('apellidos', 'like', "%{$buscar}%")
                        ->orWhere('dni', $buscar);
                });
            })
            ->when($request->categoria, fn ($q, $cat) => $q->where('categoria', $cat))
            ->latest()
            ->paginate(5)
            ->appends($request->query());

        return view('docentes.index', compact('docentes'));
    }

    // 2. FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('docentes.create');
    }

    // 3. VALIDAR Y GUARDAR NUEVO DOCENTE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dni'                 => ['required', 'regex:/^[0-9]{8}$/', 'unique:docentes,dni'],
            'codigo_docente'      => 'required|string|max:10|unique:docentes,codigo_docente',
            'nombres'             => 'required|string|max:60',
            'apellidos'           => 'required|string|max:60',
            'email_institucional' => 'required|email|max:80|ends_with:@uns.edu.pe|unique:docentes,email_institucional',
            'categoria'           => 'required|in:Principal,Asociado,Auxiliar,Contratado',
            'dedicacion'          => 'required|in:Exclusiva,Tiempo Completo,Tiempo Parcial',
            'grado_maximo'        => 'required|in:Licenciado,Magister,Doctor',
        ], [
            'dni.regex'                     => 'El DNI debe contener exactamente 8 dígitos numéricos.',
            'email_institucional.ends_with' => 'El correo debe terminar en @uns.edu.pe.',
        ]);

        Docente::create($validated);

        return redirect()->route('docentes.index')
            ->with('success', 'Docente registrado exitosamente en el padrón.');
    }

    // 4. VER DETALLE DEL DOCENTE
    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    // 5. FORMULARIO DE EDICIÓN
    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    // 6. VALIDAR Y ACTUALIZAR DOCENTE
    public function update(Request $request, Docente $docente)
    {
        $validated = $request->validate([
            'dni'                 => ['required', 'regex:/^[0-9]{8}$/', 'unique:docentes,dni,' . $docente->id],
            'codigo_docente'      => 'required|string|max:10|unique:docentes,codigo_docente,' . $docente->id,
            'nombres'             => 'required|string|max:60',
            'apellidos'           => 'required|string|max:60',
            'email_institucional' => 'required|email|max:80|ends_with:@uns.edu.pe|unique:docentes,email_institucional,' . $docente->id,
            'categoria'           => 'required|in:Principal,Asociado,Auxiliar,Contratado',
            'dedicacion'          => 'required|in:Exclusiva,Tiempo Completo,Tiempo Parcial',
            'grado_maximo'        => 'required|in:Licenciado,Magister,Doctor',
        ], [
            'dni.regex'                     => 'El DNI debe contener exactamente 8 dígitos numéricos.',
            'email_institucional.ends_with' => 'El correo debe terminar en @uns.edu.pe.',
        ]);

        $docente->update($validated);

        return redirect()->route('docentes.index')
            ->with('success', 'Datos del docente actualizados correctamente.');
    }

    // 7. ELIMINAR DOCENTE
    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Registro del docente eliminado satisfactoriamente.');
    }
}