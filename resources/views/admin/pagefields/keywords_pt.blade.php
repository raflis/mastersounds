@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Meta Keywords [PT]</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Meta Keywords [PT]
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', 2], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_keyword', 'Keywords para la página Principal [PT]:') }} <code>*</code>
                            {{ Form::text('meta_keyword[1]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_keyword', 'Keywords para la página Soluciones [PT]:') }} <code>*</code>
                            {{ Form::text('meta_keyword[2]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_keyword', 'Keywords para la página Episodios [PT]:') }} <code>*</code>
                            {{ Form::text('meta_keyword[3]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_keyword', 'Keywords para la página Noticias [PT]:') }} <code>*</code>
                            {{ Form::text('meta_keyword[4]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_keyword', 'Keywords para la página Contacto [PT]:') }} <code>*</code>
                            {{ Form::text('meta_keyword[5]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_keyword', 'Keywords para la página Newsletter [PT]:') }} <code>*</code>
                            {{ Form::text('meta_keyword[6]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 my-4 px-0">
                    {!! Form::submit('Actualizar cambios',['class'=>'btn btn-success btn-sm py-2 px-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection