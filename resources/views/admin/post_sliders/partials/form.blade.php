<div class="form-group col-sm-12">
  {!! Form::label('image_desktop', 'Selecciona una imagen para desktop:', ['class' => 'mt-3']) !!} <strong>(1280 x 720 px)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_" data-input="thumbnail_" data-preview="holder_" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image_desktop',null,['class'=>'form-control','id'=>'thumbnail_']) !!}
  </div>
<div id="holder_" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="post_sliders.edit")
        <img src="{{ $post_slider->image_desktop }}" alt="" style="height:5rem">
    @endif
</div>
</div>

<div class="form-group col-sm-12">
  {!! Form::label('image_mobile', 'Selecciona una imagen para mobile:', ['class' => 'mt-3']) !!} <strong>(400 x 720 px)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm_mobile" data-input="thumbnail_mobile" data-preview="holder_mobile" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image_mobile',null,['class'=>'form-control','id'=>'thumbnail_mobile']) !!}
  </div>
<div id="holder_mobile" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="post_sliders.edit")
        <img src="{{ $post_slider->image_mobile }}" alt="" style="height:5rem">
    @endif
</div>
</div>

<div class="form-group col-sm-12">
  {{ Form::label('description1', 'Detalle [ES]:') }}
  {{ Form::textarea('description1', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Detalle']) }}
</div><div class="form-group col-sm-12">
  {{ Form::label('description2', 'Detalle [PT]:') }}
  {{ Form::textarea('description2', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Detalle']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('button_name1', 'Nombre del botón [ES]:') }}
  {{ Form::text('button_name1', null, ['class' => 'form-control', 'placeholder' => 'Nombre del botón']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('button_name2', 'Nombre del botón [PT]:') }}
  {{ Form::text('button_name2', null, ['class' => 'form-control', 'placeholder' => 'Nombre del botón']) }}
</div>

<div class="form-group col-sm-12">
  {{ Form::label('button_link1', 'Link del botón [ES]:') }}
  {{ Form::text('button_link1', null, ['class' => 'form-control', 'placeholder' => 'Link del botón']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('button_link2', 'Link del botón [PT]:') }}
  {{ Form::text('button_link2', null, ['class' => 'form-control', 'placeholder' => 'Link del botón']) }}
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