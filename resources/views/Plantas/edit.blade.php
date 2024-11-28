@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card shadow-lg">
            <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
                Editar Planta
                <div class="float-end">
                    <a href="{{ route('plantas.index') }}" class="btn btn-success btn-sm">&larr; Voltar</a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('plantas.update', $planta->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <!-- Id -->
                    <div class="mb-3 row">
                        <label for="id" class="col-md-4 col-form-label text-md-end text-start">Id</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ $planta->id }}" disabled>
                            @if ($errors->has('id'))
                                <span class="text-danger">{{ $errors->first('id') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Espécie -->
                    <div class="mb-3 row">
                        <label for="Espécie" class="col-md-4 col-form-label text-md-end text-start">Espécie</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('Espécie') is-invalid @enderror" id="Espécie" name="Espécie" value="{{ $planta->Espécie }}" placeholder="Espécie da planta">
                            @if ($errors->has('Espécie'))
                                <span class="text-danger">{{ $errors->first('Espécie') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Tipo -->
                    <div class="mb-3 row">
                        <label for="Tipo" class="col-md-4 col-form-label text-md-end text-start">Tipo</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('Tipo') is-invalid @enderror" id="Tipo" name="Tipo" value="{{ $planta->Tipo }}" placeholder="Tipo da planta">
                            @if ($errors->has('Tipo'))
                                <span class="text-danger">{{ $errors->first('Tipo') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Porte -->
                    <div class="mb-3 row">
                        <label for="Porte" class="col-md-4 col-form-label text-md-end text-start">Porte</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('Porte') is-invalid @enderror" id="Porte" name="Porte" value="{{ $planta->Porte }}" placeholder="Porte da planta">
                            @if ($errors->has('Porte'))
                                <span class="text-danger">{{ $errors->first('Porte') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="mb-3 row">
                        <label for="Foto" class="col-md-4 col-form-label text-md-end text-start">Foto</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control" name="Foto" placeholder="Foto da planta">
                          <img src="/images/{{ $planta->Foto }}" width="300px" class="mt-2">
                        </div>
                    </div>

                    <!-- Botão de Atualizar -->
                    <div class="mb-3 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn" style="background-color: #90EE90; color: #000; border-radius: 20px; padding: 10px 20px; font-weight: bold;">
                                Atualizar Planta
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
