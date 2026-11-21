@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-uns text-white fw-bold">Ficha Académica del Estudiante</div>
            <div class="card-body p-4">
                <h4 class="card-title text-uns fw-bold">
                    {{ $estudiante->apellidos }}, {{ $estudiante->nombres }}
                </h4>
                <p class="text-muted mb-3">
                    Código Matrícula: <strong>{{ $estudiante->codigo }}</strong>
                </p>

                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Correo Institucional:</span>
                        <strong>{{ $estudiante->email }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Nivel Académico:</span>
                        <span class="badge bg-secondary">Ciclo {{ $estudiante->ciclo }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Promedio Ponderado:</span>
                        <strong class="text-primary">{{ number_format($estudiante->promedio, 2) }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Registrado el:</span>
                        <span>{{ $estudiante->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                </ul>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver al listado</a>
                    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">Editar ficha</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection