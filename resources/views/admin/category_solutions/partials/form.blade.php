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
  {!! Form::label('icon', 'Ícono:', ['class' => 'mt-3']) !!} <strong>(Ancho 130px)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_" data-input="thumbnail_" data-preview="holder_" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('icon',null,['class'=>'form-control','id'=>'thumbnail_']) !!}
  </div>
<div id="holder_" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="category_solutions.edit")
        <img src="{{ $category_solution->icon }}" alt="" style="height:5rem">
    @endif
</div>
</div>

<div class="form-group col-sm-12">
  {{ Form::label('name1', 'Nombre [ES]:') }} <code>*</code>
  {{ Form::text('name1', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('description1', 'Detalle [ES]:') }} <code>*</code>
  {{ Form::textarea('description1', null, ['class' => 'form-control', 'placeholder' => 'Detalle', 'maxlength' => 220, 'required']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('name2', 'Nombre [PT]:') }} <code>*</code>
  {{ Form::text('name2', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('description2', 'Detalle [PT]:') }} <code>*</code>
  {{ Form::textarea('description2', null, ['class' => 'form-control', 'placeholder' => 'Detalle', 'maxlength' => 220, 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('order', 'Orden:') }} <code>*</code>
  {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el orden', 'required']) }}
</div>

@section('script')

<script>
    (function( $ ){

  $.fn.filemanager = function(type, options) {
    type = type || 'file';

    this.on('click', function(e) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = $('#' + $(this).data('input'));
      var target_preview = $('#' + $(this).data('preview'));
      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=1100,height=600');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');

        // set the value of the desired input to image url
        target_input.val('').val(file_path).trigger('change');

        // clear previous preview
        target_preview.html('');

        // set or change the preview image src
        items.forEach(function (item) {
          target_preview.append(
            $('<img>').css('height', '5rem').attr('src', item.url)
          );
        });

        // trigger change event
        target_preview.trigger('change');
      };
      return false;
    });
  }

})(jQuery);

  </script>
  <script>
    $('#lfm_').filemanager('image', {prefix: route_prefix});
    $('#lfm_mobile').filemanager('image', {prefix: route_prefix});
  </script>

  <script>
    var lfm = function(id, type, options) {
      let button = document.getElementById(id);

      button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');

          // set the value of the desired input to image url
          target_input.value = file_path;
          target_input.dispatchEvent(new Event('change'));

          // clear previous preview
          target_preview.innerHtml = '';

          // set or change the preview image src
          items.forEach(function (item) {
            let img = document.createElement('img')
            img.setAttribute('style', 'height: 5rem')
            img.setAttribute('src', item.thumb_url)
            target_preview.appendChild(img);
          });

          // trigger change event
          target_preview.dispatchEvent(new Event('change'));
        };
      });
    };

    //lfm('lfm2', 'file', {prefix: route_prefix});
  </script>
@endsection