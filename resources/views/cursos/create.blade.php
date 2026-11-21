@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-uns text-white fw-bold">Registrar Nueva Asignatura</div>
            <div class="card-body p-4">
                <form action="{{ route('cursos.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Código Curricular:</label>
                            <input type="text" name="codigo" maxlength="10"
                                   class="form-control @error('codigo') is-invalid @enderror"
                                   value="{{ old('codigo') }}" placeholder="Ej. IS-601">
                            @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Nombre de la Asignatura:</label>
                            <input type="text" name="nombre" maxlength="100"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre') }}" placeholder="Ej. Aplicaciones Distribuidas I">
                            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Créditos (1 - 6):</label>
                            <input type="number" name="creditos"
                                   class="form-control @error('creditos') is-invalid @enderror"
                                   value="{{ old('creditos') }}" placeholder="Ej. 4">
                            @error('creditos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Horas de Teoría:</label>
                            <input type="number" name="horas_teoria"
                                   class="form-control @error('horas_teoria') is-invalid @enderror"
                                   value="{{ old('horas_teoria', 0) }}">
                            @error('horas_teoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Horas de Práctica:</label>
                            <input type="number" name="horas_practica"
                                   class="form-control @error('horas_practica') is-invalid @enderror"
                                   value="{{ old('horas_practica', 0) }}">
                            @error('horas_practica') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ciclo Académico:</label>
                            <select name="ciclo" class="form-select @error('ciclo') is-invalid @enderror">
                                <option value="">Seleccione ciclo...</option>
                                @foreach(['I','II','III','IV','V','VI','VII','VIII','IX','X'] as $c)
                                    <option value="{{ $c }}" {{ old('ciclo') == $c ? 'selected' : '' }}>
                                        Ciclo {{ $c }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ciclo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Carácter / Tipo:</label>
                            <select name="tipo" class="form-select @error('tipo') is-invalid @enderror">
                                <option value="Obligatorio" {{ old('tipo', 'Obligatorio') == 'Obligatorio' ? 'selected' : '' }}>Obligatorio</option>
                                <option value="Electivo" {{ old('tipo') == 'Electivo' ? 'selected' : '' }}>Electivo</option>
                            </select>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-uns px-4">Guardar Asignatura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection