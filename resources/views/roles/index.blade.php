@extends('layouts.app')

@section('content')
<div class="card shadow-lg">
    <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
        Gerenciar Funções
    </div>
    <div class="card-body">
        <!-- Botão Adicionar Nova Função -->
        @can('create-role')
            <a href="{{ route('roles.create') }}" class="btn btn-success mb-3" style="border-radius: 25px; font-weight: bold; padding: 10px 20px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <i class="bi bi-plus-circle"></i> Adicionar Nova Função
            </a>
        @endcan

        <!-- Tabela -->
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <thead class="thead-light" style="background-color: #e2f8e2;">
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Nome</th> <!-- Diminuir largura da coluna 'Nome' -->
                        <th scope="col" style="width: 400px;">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr style="transition: all 0.3s ease;">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <div class="d-flex gap-2">
                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success btn-sm" style="border-radius: 25px; padding: 8px 15px; font-weight: bold; transition: background-color 0.3s;">
                                        <i class="bi bi-eye"></i> Visualizar
                                    </a>

                                    @if ($role->name != 'Super Admin')
                                        @can('edit-role')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm" style="border-radius: 25px; padding: 8px 15px; font-weight: bold; transition: background-color 0.3s;">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                        @endcan

                                        @can('delete-role')
                                            @if ($role->name != Auth::user()->hasRole($role->name))
                                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 25px; padding: 8px 15px; font-weight: bold; transition: background-color 0.3s;" onclick="return confirm('Você tem certeza que deseja excluir esta Função?');">
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
                        <td colspan="3" class="text-center">
                            <span class="text-danger">
                                <strong>Nenhuma Função Encontrada!</strong>
                            </span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="d-flex justify-content-center mt-3">
            {{ $roles->links() }}
        </div>
    </div>
</div>
@endsection
