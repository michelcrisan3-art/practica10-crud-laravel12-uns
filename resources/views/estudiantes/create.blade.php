@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-uns text-white fw-bold">Registrar Nuevo Estudiante</div>
            <div class="card-body p-4">
                <form action="{{ route('estudiantes.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Código Universitario (10 dígitos):</label>
                            <input type="text" name="codigo" maxlength="10"
                                   class="form-control @error('codigo') is-invalid @enderror"
                                   value="{{ old('codigo') }}" placeholder="Ej. 0202214001">
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Correo Electrónico:</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="estudiante@uns.edu.pe">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nombres:</label>
                            <input type="text" name="nombres"
                                   class="form-control @error('nombres') is-invalid @enderror"
                                   value="{{ old('nombres') }}">
                            @error('nombres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Apellidos:</label>
                            <input type="text" name="apellidos"
                                   class="form-control @error('apellidos') is-invalid @enderror"
                                   value="{{ old('apellidos') }}">
                            @error('apellidos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ciclo Académico:</label>
                            <select name="ciclo" class="form-select @error('ciclo') is-invalid @enderror">
                                <option value="">Seleccione ciclo...</option>
                                @foreach(['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'] as $c)
                                    <option value="{{ $c }}" {{ old('ciclo') == $c ? 'selected' : '' }}>
                                        Ciclo {{ $c }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ciclo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Promedio Ponderado (0.00 - 20.00):</label>
                            <input type="number" step="0.01" name="promedio"
                                   class="form-control @error('promedio') is-invalid @enderror"
                                   value="{{ old('promedio') }}" placeholder="Ej. 15.50">
                            @error('promedio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-uns px-4">Guardar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection