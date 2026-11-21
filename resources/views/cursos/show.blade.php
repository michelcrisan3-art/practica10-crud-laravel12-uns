@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-uns text-white fw-bold">Ficha de Asignatura</div>
            <div class="card-body p-4">
                <h4 class="card-title text-uns fw-bold">{{ $curso->nombre }}</h4>
                <p class="text-muted mb-3">Código Curricular: <strong>{{ $curso->codigo }}</strong></p>

                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Ciclo Académico:</span>
                        <span class="badge bg-secondary">Ciclo {{ $curso->ciclo }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tipo de Asignatura:</span>
                        <span class="badge {{ $curso->tipo === 'Obligatorio' ? 'bg-primary' : 'bg-success' }}">
                            {{ $curso->tipo }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Créditos:</span>
                        <strong>{{ $curso->creditos }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Distribución Horaria:</span>
                        <span>{{ $curso->horas_teoria }}h Teoría + {{ $curso->horas_practica }}h Práctica</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Horas Totales Semanales:</span>
                        <strong class="text-primary">{{ $curso->horas_totales }} horas</strong>
                    </li>
                </ul>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Volver al listado</a>
                    <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning">Editar curso</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection