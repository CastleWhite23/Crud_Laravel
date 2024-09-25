
@extends('plantas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit planta
                </div>
                <div class="float-end">
                    <a href="{{ route('plantas.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('plantas.update', $planta->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="id" class="col-md-4 col-form-label text-md-end text-start">Id</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('id') is-invalid @enderror"  id="id" name="id" value="{{ $planta->id }}">
                            @if ($errors->has('id'))
                                <span class="text-danger">{{ $errors->first('id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Espécie" class="col-md-4 col-form-label text-md-end text-start">Espécie</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('Espécie') is-invalid @enderror" id="Espécie" name="Espécie" value="{{ $planta->Espécie }}">
                            @if ($errors->has('Espécie'))
                                <span class="text-danger">{{ $errors->first('Espécie') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Tipo" class="col-md-4 col-form-label text-md-end text-start">Tipo</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('Tipo') is-invalid @enderror" id="Tipo" name="Tipo" value="{{ $planta->Tipo }}">
                            @if ($errors->has('Tipo'))
                                <span class="text-danger">{{ $errors->first('Tipo') }}</span>
                            @endif
                        </div>
                    </div>-

                    <div class="mb-3 row">
                        <label for="Porte" class="col-md-4 col-form-label text-md-end text-start">Porte</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('Porte') is-invalid @enderror" id="Porte" name="Porte" value="{{ $planta->Porte }}">
                            @if ($errors->has('Porte'))
                                <span class="text-danger">{{ $errors->first('Porte') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Foto" class="col-md-4 col-form-label text-md-end text-start">Foto</label>
                        <div class="col-md-6">
                          <input type="file" placeholder="Foto" class="form-control" name="Foto">
                          <img src="/images/{{ $planta->Foto }}" width="300px">
                        </div>
                    </div>

            </div>

                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection