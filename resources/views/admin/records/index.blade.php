@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid">
        <div class="row layout-header">
            <div class="col-sm-12 header-content">
                <h1>
                    <i class="fas fa-cloud-download-alt fa-xs text-white2"></i> Registros
                </h1>
            </div>
        </div>
        <div class="row layout-body">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Registros
                        </span>
                        <div class="d-flex align-items-center">
                            <div class="">
                                @if (validatePermission('records.excel', Auth::user()->permissions) == true)
                                <a class="btn btn-success btn-descargar" href="{{ route('records.excel', ['name' => request('name'), 'lastname' => request('lastname'), 'type' => request('type'), 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}">
                                    <span class="icon">
                                        <i class="fas fa-download px-2 py-1"></i>
                                    </span>
                                    <span class="text px-2 py-1">
                                        Descargar
                                    </span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body row justify-content-start">
                        <div class="buscar-descarga">
                            <form action="{{ route('records.index') }}" method="GET">
                            <div class="form-group mb-0 mx-1 col-md-3">
                                <label class="pr-1">Fecha de inicio:</label>
                                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="form-group mb-0 mx-1 col-md-3">
                                <label class="labelspan pr-1">Fecha de fin:</label>
                                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            <div class="form-group col-md-3 mb-0">
                                <label class="labelspan pr-1">Nombre:</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombres" value="{{ request('name') }}">
                            </div>
                            <div class="form-group col-md-3 mb-0">
                                <label class="labelspan pr-1">Nombre:</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Apellidos" value="{{ request('lastname') }}">
                            </div>
                            <div class="form-group col-md-2 mb-0">
                                <label class="labelspan pr-1"></label>
                                <button type="submit" class="btn btn-primary btn-buscar">
                                    Buscar &nbsp;&nbsp;<i class="fas fa-search"></i>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="px-3">
                        @include('admin.includes.alert')
                    </div>
                </div>
                <div class="tablaTotal">
                    <table class="table tableD">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Solución</th>
                                <th>Nombres</th>
                                <th>Email</th>
                                <th>Empresa</th>
                                <th>País</th>
                                <th>Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            <tr>
                                <td>{{ $records->firstItem() + $loop->index }}</td>
                                <td>{{ $record->item_solution->name }}</td>
                                <td>{{ $record->name }} {{ $record->lastname }}</td>
                                <td>{{ $record->email }}</td>
                                <td>{{ $record->company }}</td>
                                <td>{{ $record->country }}</td>
                                <td>{!! \Carbon\Carbon::parse($record->created_at)->format('d/m/Y H:i:s') !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginacionTotal d-flex justify-content-end">
                    {{ $records->withQueryString()->render() }}
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
</div>

@endsection