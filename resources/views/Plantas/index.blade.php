
@extends('Plantas.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">planta List</div>
            <div class="card-body">
                <a href="{{ route('Plantas.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New planta</a>
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
                        @forelse ($Plantas as $planta)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $planta->code }}</td>
                            <td>{{ $planta->name }}</td>
                            <td>{{ $planta->quantity }}</td>
                            <td>{{ $planta->price }}</td>
                            <td>
                                <form action="{{ route('Plantas.destroy', $planta->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('Plantas.show', $planta->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('Plantas.edit', $planta->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this planta?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No planta Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $Plantas->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection