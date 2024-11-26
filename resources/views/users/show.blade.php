@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg" style="border-radius: 12px;">
            <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
                Informações do Usuário
                <div class="float-end">
                <a href="{{ route('users.index') }}" class="btn btn-success btn-sm">&larr; Voltar</a>
            </div>
            </div>
            
            <div class="card-body" style="line-height: 1.8;">
                
                <!-- Nome do Usuário -->
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nome:</strong></label>
                    <div class="col-md-6">
                        <span class="form-control-plaintext">{{ $user->name }}</span>
                    </div>
                </div>

                <!-- E-mail do Usuário -->
                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Endereço de E-mail:</strong></label>
                    <div class="col-md-6">
                        <span class="form-control-plaintext">{{ $user->email }}</span>
                    </div>
                </div>

                <!-- Papéis do Usuário -->
                <div class="mb-3 row">
                    <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Papéis:</strong></label>
                    <div class="col-md-6">
                        @forelse ($user->getRoleNames() as $role)
                            <span class="badge bg-success">{{ $role }}</span>
                        @empty
                            <span class="text-muted">Sem papéis atribuídos</span>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>    
@endsection
