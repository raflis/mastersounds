<div class="form-group col-sm-12">
  {{ Form::label('name1', 'Nombre [ES]:') }} <code>*</code>
  {{ Form::text('name1', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div><div class="form-group col-sm-12">
  {{ Form::label('name2', 'Nombre [PT]:') }} <code>*</code>
  {{ Form::text('name2', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('order', 'Orden:') }} <code>*</code>
  {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden', 'required']) }}
</div>