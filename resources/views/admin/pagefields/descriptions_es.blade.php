@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Meta Descriptions [ES]</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Meta Descriptions [ES]
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', 1], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_description', 'Descriptions para la página Principal [ES]:') }} <code>*</code>
                            {{ Form::text('meta_description[1]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_description', 'Descriptions para la página Soluciones [ES]:') }} <code>*</code>
                            {{ Form::text('meta_description[2]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_description', 'Descriptions para la página Episodios [ES]:') }} <code>*</code>
                            {{ Form::text('meta_description[3]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_description', 'Descriptions para la página Noticias [ES]:') }} <code>*</code>
                            {{ Form::text('meta_description[4]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_description', 'Descriptions para la página Contacto [ES]:') }} <code>*</code>
                            {{ Form::text('meta_description[5]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                            {{ Form::label('meta_description', 'Descriptions para la página Newsletter [ES]:') }} <code>*</code>
                            {{ Form::text('meta_description[6]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
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