@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg">
            <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
                Informações do Função
                <div class="float-end">
                    <a href="{{ route('roles.index') }}" class="btn btn-success btn-sm" style="border-radius: 20px; padding: 5px 15px;">
                        &larr; Voltar
                    </a>
                </div>
            </div>
            <div class="card-body">

                <!-- Nome -->
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nome:</strong></label>
                    <div class="col-md-6" style="line-height: 35px; font-weight: bold; color: #4CAF50;">
                        {{ $role->name }}
                    </div>
                </div>

                <!-- Permissões -->
                <div class="mb-3 row">
                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Permissões:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        @if ($role->name == 'Super Admin')
                            <span class="badge bg-success" style="font-size: 1rem;">Todas</span>
                        @else
                            @forelse ($rolePermissions as $permission)
                                <span class="badge bg-success" style="font-size: 1rem; margin-right: 5px;">{{ $permission->name }}</span>
                            @empty
                                <span class="text-muted">Sem permissões atribuídas.</span>
                            @endforelse
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
