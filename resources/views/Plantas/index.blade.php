
@extends('plantas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Lista de Plantas</div>
            <div class="card-body">
                <a href="{{ route('plantas.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Adicionar nova Planta</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Espécie</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Porte</th>
                        <th scope="col">Foto</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($plantas as $planta)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $planta->code }}</td>
                            <td>{{ $planta->name }}</td>
                            <td>{{ $planta->quantity }}</td>
                            <td>{{ $planta->price }}</td>
                            <td>
                                <form action="{{ route('plantas.destroy', $planta->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('plantas.show', $planta->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Visualizar</a>

                                    <a href="{{ route('plantas.edit', $planta->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this planta?');"><i class="bi bi-trash"></i> Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Nenhuma Planta Encontrada!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $plantas->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection