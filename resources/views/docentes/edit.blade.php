@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-uns text-white fw-bold">Editar Datos del Docente</div>
            <div class="card-body p-4">
                <form action="{{ route('docentes.update', $docente) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">DNI (8 dígitos):</label>
                            <input type="text" name="dni" maxlength="8"
                                   class="form-control @error('dni') is-invalid @enderror"
                                   value="{{ old('dni', $docente->dni) }}">
                            @error('dni') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Código de Plaza Docente:</label>
                            <input type="text" name="codigo_docente" maxlength="10"
                                   class="form-control @error('codigo_docente') is-invalid @enderror"
                                   value="{{ old('codigo_docente', $docente->codigo_docente) }}">
                            @error('codigo_docente') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nombres:</label>
                            <input type="text" name="nombres" maxlength="60"
                                   class="form-control @error('nombres') is-invalid @enderror"
                                   value="{{ old('nombres', $docente->nombres) }}">
                            @error('nombres') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Apellidos:</label>
                            <input type="text" name="apellidos" maxlength="60"
                                   class="form-control @error('apellidos') is-invalid @enderror"
                                   value="{{ old('apellidos', $docente->apellidos) }}">
                            @error('apellidos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Correo Institucional (@uns.edu.pe):</label>
                        <input type="email" name="email_institucional" maxlength="80"
                               class="form-control @error('email_institucional') is-invalid @enderror"
                               value="{{ old('email_institucional', $docente->email_institucional) }}">
                        @error('email_institucional') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Categoría:</label>
                            <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
                                @foreach(['Principal', 'Asociado', 'Auxiliar', 'Contratado'] as $cat)
                                    <option value="{{ $cat }}" {{ old('categoria', $docente->categoria) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                            @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Dedicación:</label>
                            <select name="dedicacion" class="form-select @error('dedicacion') is-invalid @enderror">
                                @foreach(['Exclusiva', 'Tiempo Completo', 'Tiempo Parcial'] as $ded)
                                    <option value="{{ $ded }}" {{ old('dedicacion', $docente->dedicacion) == $ded ? 'selected' : '' }}>{{ $ded }}</option>
                                @endforeach
                            </select>
                            @error('dedicacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Grado Máximo:</label>
                            <select name="grado_maximo" class="form-select @error('grado_maximo') is-invalid @enderror">
                                @foreach(['Licenciado', 'Magister', 'Doctor'] as $grado)
                                    <option value="{{ $grado }}" {{ old('grado_maximo', $docente->grado_maximo) == $grado ? 'selected' : '' }}>{{ $grado }}</option>
                                @endforeach
                            </select>
                            @error('grado_maximo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">Actualizar Docente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection