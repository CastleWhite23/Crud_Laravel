@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        <!-- Notificação de Sucesso -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg">
            <div class="card-header" style="background-color: #90EE90; color: #000; font-weight: bold; font-size: 1.25rem; border-bottom: 2px solid #5b9a63;">
                Lista de Plantas
            </div>
            <div class="card-body">

                <!-- Botão para adicionar nova planta -->
                <a href="{{ route('plantas.create') }}" class="btn" style="background-color: #90EE90; color: #000; border-radius: 20px; font-weight: bold; padding: 10px 20px; transition: all 0.3s ease-in-out;">
                    <i class="bi bi-plus-circle"></i> Adicionar Nova Planta
                </a>

                <!-- Tabela de Plantas -->
                <table class="table table-striped table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Espécie</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Porte</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plantas as $planta)
                        <tr>
                            <th scope="row">{{ $planta->id }}</th>
                            <td>{{ $planta->Espécie }}</td>
                            <td>{{ $planta->Tipo }}</td>
                            <td>{{ $planta->Porte }}</td>
                            <td><img src="/images/{{ $planta->Foto }}" alt="{{ $planta->Espécie }}" class="img-thumbnail" width="100px"></td>
                            <td>
                                <form action="{{ route('plantas.destroy', $planta->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <!-- Botões de ação -->
                                    <a href="{{ route('plantas.show', $planta->id) }}" class="btn btn-warning btn-sm me-2" style="border-radius: 20px; padding: 5px 10px;" title="Visualizar"><i class="bi bi-eye"></i>Exibir</a>

                                    <a href="{{ route('plantas.edit', $planta->id) }}" class="btn btn-success btn-sm me-2" style="border-radius: 20px; padding: 5px 10px;" title="Editar"><i class="bi bi-pencil-square"></i>Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 20px; padding: 5px 10px;" onclick="return confirm('Deseja excluir esta planta?');" title="Deletar"><i class="bi bi-trash"></i>Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <span class="text-danger"><strong>Nenhuma Planta Encontrada!</strong></span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Paginação -->
                {{ $plantas->links() }}

            </div>
        </div>
    </div>    
</div>

@endsection
