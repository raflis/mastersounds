<div class="form-group col-sm-3">
  {{ Form::label('name', 'Nombre:') }} <code>*</code>
  {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>
<div class="form-group col-sm-3">
  {{ Form::label('lastname', 'Apellido:') }} <code>*</code>
  {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) }}
</div>
<div class="form-group col-sm-3">
  {{ Form::label('role', 'Tipo de perfil:') }} <code>*</code>
  {{ Form::select('role', getRoles(), null, ['class' => 'custom-select', 'placeholder' => 'Tipo de perfil', 'required']) }}
</div>
<div class="form-group col-sm-3">
  {{ Form::label('email', 'Email:') }} <code>*</code>
  @if (Route::currentRouteName() == 'users.edit')
  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required', 'readonly']) }}
  @else
  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
  @endif
</div>
<div class="form-group col-sm-12">
  {{ Form::label('avatar_front', 'Foto:') }}
  {{ Form::file('avatar_front', ['class' => 'form-control', 'placeholder' => 'Foto']) }}
</div>
<div class="form-group col-sm-12">
@if (Route::currentRouteName() == 'users.edit')
  <img src="{{ asset('images/profiles/'.$user->avatar) }}" alt="" height=70>
@endif
</div>
@if (Route::currentRouteName() == 'users.edit')
<div class="form-group col-sm-6">
  {{ Form::label('newpassword', 'Contraseña:') }}
  {{ Form::password('newpassword', ['class' => 'form-control', 'placeholder' => 'Contraseña']) }}
</div>
<div class="form-group col-sm-6">
  {{ Form::label('renewpassword', 'Repita Contraseña:') }}
  {{ Form::password('renewpassword', ['class' => 'form-control', 'placeholder' => 'Repita Contraseña']) }}
</div>
@else
<div class="form-group col-sm-6">
  {{ Form::label('newpassword', 'Contraseña:') }} <code>*</code>
  {{ Form::password('newpassword', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'required']) }}
</div>
<div class="form-group col-sm-6">
  {{ Form::label('renewpassword', 'Repita Contraseña:') }} <code>*</code>
  {{ Form::password('renewpassword', ['class' => 'form-control', 'placeholder' => 'Repita Contraseña', 'required']) }}
</div>
@endif


