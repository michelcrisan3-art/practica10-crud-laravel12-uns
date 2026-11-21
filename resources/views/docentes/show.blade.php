@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-uns text-white fw-bold">Ficha del Docente Universitario</div>
            <div class="card-body p-4">
                <h4 class="card-title text-uns fw-bold">
                    {{ $docente->apellidos }}, {{ $docente->nombres }}
                </h4>
                <p class="text-muted mb-3">
                    DNI: <strong>{{ $docente->dni }}</strong> &bull;
                    Plaza: <strong>{{ $docente->codigo_docente }}</strong>
                </p>

                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Correo Institucional:</span>
                        <strong>{{ $docente->email_institucional }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Categoría:</span>
                        <span class="badge bg-info text-dark">{{ $docente->categoria }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Dedicación:</span>
                        <span>{{ $docente->dedicacion }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Grado Máximo:</span>
                        <span class="badge bg-secondary">{{ $docente->grado_maximo }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Registrado el:</span>
                        <span>{{ $docente->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                </ul>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver al listado</a>
                    <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning">Editar docente</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection