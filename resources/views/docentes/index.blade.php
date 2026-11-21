@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-uns">Padrón de Docentes Universitarios</h5>
        <a href="{{ route('docentes.create') }}" class="btn btn-uns btn-sm shadow-sm">+ Nuevo Docente</a>
    </div>

    {{-- Barra de búsqueda y filtro combinado --}}
    <div class="card-body border-bottom bg-light py-3">
        <form action="{{ route('docentes.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <input type="text" name="buscar" class="form-control form-control-sm"
                       placeholder="Buscar por DNI exacto o apellidos..."
                       value="{{ request('buscar') }}">
            </div>

            <div class="col-md-4">
                <select name="categoria" class="form-select form-select-sm">
                    <option value="">Todas las categorías...</option>
                    @foreach(['Principal', 'Asociado', 'Auxiliar', 'Contratado'] as $cat)
                        <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-uns btn-sm flex-fill">Filtrar</button>
                <a href="{{ route('docentes.index') }}" class="btn btn-outline-secondary btn-sm flex-fill">Limpiar</a>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle m-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">DNI</th>
                        <th class="text-center">Código</th>
                        <th>Apellidos y Nombres</th>
                        <th>Correo Institucional</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Grado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($docentes as $docente)
                        <tr>
                            <td class="text-center fw-bold">{{ $docente->dni }}</td>
                            <td class="text-center">{{ $docente->codigo_docente }}</td>
                            <td>{{ $docente->apellidos }}, {{ $docente->nombres }}</td>
                            <td>{{ $docente->email_institucional }}</td>
                            <td class="text-center">
                                <span class="badge bg-info text-dark">{{ $docente->categoria }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $docente->grado_maximo }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm text-white">Ver</a>
                                <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar a este docente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No se encontraron docentes con los criterios seleccionados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-white py-2">
        {{ $docentes->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection