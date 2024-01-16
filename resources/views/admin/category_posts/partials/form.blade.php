<div class="form-group col-sm-12 m-0">
  <label class="m-0"><strong>SEO</strong></label>
</div>
<div class="form-group col-sm-12">
  {{ Form::label('meta', 'Título de la página [ES]:') }} <code>*</code>
  {{ Form::text('meta[11]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('meta', 'Título de la página [PT]:') }} <code>*</code>
  {{ Form::text('meta[12]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('meta', 'Keywords de la página [ES]:') }} <code>*</code>
  {{ Form::text('meta[21]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('meta', 'Keywords de la página [PT]:') }} <code>*</code>
  {{ Form::text('meta[22]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('meta', 'Description de la página [ES]:') }} <code>*</code>
  {{ Form::text('meta[31]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('meta', 'Description de la página [PT]:') }} <code>*</code>
  {{ Form::text('meta[32]', null, ['class' => 'form-control', 'placeholder' => '', 'required']) }}
</div>
<hr style="width: 97%">

<div class="form-group col-sm-12">
  {{ Form::label('name1', 'Nombre [ES]:') }} <code>*</code>
  {{ Form::text('name1', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('name2', 'Nombre [PT]:') }} <code>*</code>
  {{ Form::text('name2', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('order', 'Orden:') }} <code>*</code>
  {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden', 'required']) }}
</div>