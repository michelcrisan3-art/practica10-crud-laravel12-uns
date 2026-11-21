@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold text-uns">Listado General de Estudiantes</h5>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-uns btn-sm shadow-sm">+ Nuevo Estudiante</a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle m-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Código</th>
                        <th>Apellidos y Nombres</th>
                        <th>Correo Electrónico</th>
                        <th class="text-center">Ciclo</th>
                        <th class="text-center">Promedio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($estudiantes as $estudiante)
                        <tr>
                            <td class="text-center fw-bold">{{ $estudiante->codigo }}</td>
                            <td>{{ $estudiante->apellidos }}, {{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->email }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary">{{ $estudiante->ciclo }}</span>
                            </td>
                            <td class="text-center fw-bold text-primary">
                                {{ number_format($estudiante->promedio, 2) }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-info btn-sm text-white">Ver</a>
                                <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar a este estudiante?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No hay estudiantes registrados en el sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-white py-2">
        {{ $estudiantes->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection