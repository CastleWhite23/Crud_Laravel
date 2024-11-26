@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg">
            <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
                Editar Função
                <div class="float-end">
                    <a href="{{ route('roles.index') }}" class="btn btn-success btn-sm" style="border-radius: 20px; padding: 5px 15px;">
                        &larr; Voltar
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <!-- Nome do Role -->
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nome</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name }}" style="border-radius: 25px;">
                            @if ($errors->has('name'))
                                <span class="text-danger" style="font-weight: bold;">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Permissões -->
                    <div class="mb-3 row">
                        <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">Permissões</label>
                        <div class="col-md-6">           
                            <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissões" id="permissions" name="permissions[]" style="height: 210px; border-radius: 25px;">
                                @forelse ($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                        {{ $permission->name }}
                                    </option>
                                @empty
                                    <option disabled>Nenhuma permissão disponível</option>
                                @endforelse
                            </select>
                            @if ($errors->has('permissions'))
                                <span class="text-danger" style="font-weight: bold;">{{ $errors->first('permissions') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Botão Atualizar -->
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-success" value="Atualizar Função" style="border-radius: 25px; padding: 10px 20px;">
                    </div>

                </form>
            </div>
        </div>
    </div>    
</div>

@endsection
