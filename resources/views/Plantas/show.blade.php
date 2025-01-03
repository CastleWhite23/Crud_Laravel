@extends('layouts.app')


@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
                <div class="float-start">
                    plantas Information
                </div>
                <div class="float-end">
                    <a href="{{ route('plantas.index') }}" class="btn btn-success btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Id:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $planta->id }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Espécie:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $planta->Espécie }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Porte:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $planta->Porte }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Tipo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $planta->Tipo }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Foto:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <td><img src="/images/{{ $planta->Foto }}" width="100px"></td>
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection