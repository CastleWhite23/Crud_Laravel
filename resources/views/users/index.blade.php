@extends('layouts.app')

@section('content')

<div class="card shadow-lg">
    <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
        Gerenciar Usuários
    </div>
    <div class="card-body">

        <!-- Botão Adicionar Novo Usuário -->
        @can('create-user')
            <a href="{{ route('users.create') }}" class="btn" style="background-color: #90EE90; color: #000; border-radius: 20px; font-weight: bold; padding: 10px 20px; transition: all 0.3s ease-in-out;">
                <i class="bi bi-plus-circle"></i> Adicionar Novo Usuário
            </a>
        @endcan

        <!-- Tabela Responsiva -->
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Papéis</th>
                        <th scope="col" style="width: 250px;">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @forelse ($user->getRoleNames() as $role)
                                <span class="badge bg-success" style="font-size: 1rem; margin-right: 5px;">{{ $role }}</span>
                            @empty
                                <span class="text-muted">Sem papéis atribuídos</span>
                            @endforelse
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <div class="d-grid gap-2 d-md-block">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm" style="border-radius: 20px; padding: 5px 10px;">
                                        <i class="bi bi-eye"></i> Exibir
                                    </a>

                                    @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                                        @if (Auth::user()->hasRole('Super Admin'))
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm" style="border-radius: 20px; padding: 5px 10px;">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                        @endif
                                    @else
                                        @can('edit-user')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm" style="border-radius: 20px; padding: 5px 10px;">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                        @endcan

                                        @can('delete-user')
                                            @if (Auth::user()->id != $user->id)
                                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 20px; padding: 5px 10px;" onclick="return confirm('Deseja excluir este usuário?');">
                                                    <i class="bi bi-trash"></i> Excluir
                                                </button>
                                            @endif
                                        @endcan
                                    @endif
                                </div>

                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <span class="text-danger">
                                    <strong>Nenhum Usuário Encontrado!</strong>
                                </span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>

    </div>
</div>

@endsection
