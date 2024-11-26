@extends('plantas.layouts')

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

        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #4CAF50; font-weight: bold;">
                Lista de Plantas
            </div>
            <div class="card-body">

                <!-- Botão para adicionar nova planta -->
                <a href="{{ route('plantas.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Adicionar Nova Planta</a>

                <!-- Tabela de Plantas -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-light">
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
                                    <a href="{{ route('plantas.show', $planta->id) }}" class="btn btn-warning btn-sm me-2" title="Visualizar"><i class="bi bi-eye"></i></a>

                                    <a href="{{ route('plantas.edit', $planta->id) }}" class="btn btn-primary btn-sm me-2" title="Editar"><i class="bi bi-pencil-square"></i></a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir esta planta?');" title="Deletar"><i class="bi bi-trash"></i></button>
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
