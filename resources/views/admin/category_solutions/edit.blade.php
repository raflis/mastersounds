@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid">
        <div class="row layout-header">
            <div class="col-sm-12 header-content">
                <h1>
                    <i class="fas fa-user-shield fa-xs text-white2"></i> Categoría - Soluciones
                </h1>
                <span class="subtitle">
                    Crear, editar y eliminar.
                </span>
            </div>
        </div>
        <div class="row layout-body">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Editar
                        </span>
                    </div>
                    {!! Form::model($category_solution, ['route' => ['category_solutions.update', $category_solution->id], 'method' => 'PUT']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>
                        @include('admin.category_solutions.partials.form')
                    </div>
                </div>
            </div>
            <div class="col-sm-12 my-4">
                <span class="d-block mb-3 font-semibold"><code>*</code> Campos Obligatorios</span>
                {!! Form::submit('Guardar cambios',['class'=>'btn btn-success py-2 px-3']) !!}
                <a class="btn btn-danger py-2 px-3" href="{{ route('category_solutions.index') }}">Atrás</a>
                {!! Form::close() !!}
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
</div>

@endsection