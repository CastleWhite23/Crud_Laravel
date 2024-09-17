
@extends('plantas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Adicionar nova Planta
                </div>
                <div class="float-end">
                    <a href="{{ route('plantas.index') }}" class="btn btn-primary btn-sm">&larr; Voltar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('plantas.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="Espécie" class="col-md-4 col-form-label text-md-end text-start">Espécie</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('Espécie') is-invalid @enderror" id="Espécie" name="Espécie" value="{{ old('Espécie') }}">
                            @if ($errors->has('Espécie'))
                                <span class="text-danger">{{ $errors->first('Espécie') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Tipo" class="col-md-4 col-form-label text-md-end text-start">Tipo</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('Tipo') is-invalid @enderror" id="Tipo" name="Tipo" value="{{ old('Tipo') }}">
                            @if ($errors->has('Tipo'))
                                <span class="text-danger">{{ $errors->first('Tipo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Porte" class="col-md-4 col-form-label text-md-end text-start">Porte</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('Porte') is-invalid @enderror" id="Porte" name="Porte" value="{{ old('Porte') }}">
                            @if ($errors->has('Porte'))
                                <span claqss="text-danger">{{ $errors->first('Porte') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Planta">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection