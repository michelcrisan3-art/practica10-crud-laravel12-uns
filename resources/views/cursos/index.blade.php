@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
        <h5 class="m-0 fw-bold text-uns">Catálogo de Asignaturas (Malla Curricular)</h5>

        <div class="d-flex align-items-center gap-2">
            {{-- Filtro por ciclo académico (petición GET) --}}
            <form action="{{ route('cursos.index') }}" method="GET" class="d-flex align-items-center gap-2">
                <select name="ciclo" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">Todos los ciclos</option>
                    @foreach(['I','II','III','IV','V','VI','VII','VIII','IX','X'] as $c)
                        <option value="{{ $c }}" {{ request('ciclo') == $c ? 'selected' : '' }}>
                            Ciclo {{ $c }}
                        </option>
                    @endforeach
                </select>
                @if(request('ciclo'))
                    <a href="{{ route('cursos.index') }}" class="btn btn-outline-secondary btn-sm">Limpiar</a>
                @endif
            </form>

            <a href="{{ route('cursos.create') }}" class="btn btn-uns btn-sm shadow-sm">+ Nuevo Curso</a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle m-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Código</th>
                        <th>Asignatura</th>
                        <th class="text-center">Ciclo</th>
                        <th class="text-center">Créditos</th>
                        <th class="text-center">HT / HP (Total)</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cursos as $curso)
                        <tr>
                            <td class="text-center fw-bold">{{ $curso->codigo }}</td>
                            <td>{{ $curso->nombre }}</td>
                            <td class="text-center"><span class="badge bg-secondary">{{ $curso->ciclo }}</span></td>
                            <td class="text-center fw-bold">{{ $curso->creditos }}</td>
                            <td class="text-center">
                                {{ $curso->horas_teoria }}T / {{ $curso->horas_practica }}P
                                <span class="badge bg-dark ms-1">{{ $curso->horas_totales }} hrs</span>
                            </td>
                            <td class="text-center">
                                @if($curso->tipo === 'Obligatorio')
                                    <span class="badge bg-primary">Obligatorio</span>
                                @else
                                    <span class="badge bg-success">Electivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info btn-sm text-white">Ver</a>
                                <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Está seguro de eliminar esta asignatura?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No se encontraron asignaturas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-white py-2">
        {{ $cursos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection