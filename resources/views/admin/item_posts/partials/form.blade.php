
<div class="form-group col-sm-3">
  {{ Form::label('category_post_id', 'Categoría:') }} <code>*</code>
  {{ Form::select('category_post_id', $category_posts, null, ['class' => 'custom-select', 'placeholder' => 'Seleccionar categoría', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('name1', 'Nombre [ES]:') }} <code>*</code>
  {{ Form::text('name1', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('name2', 'Nombre [PT]:') }} <code>*</code>
  {{ Form::text('name2', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>
<div class="form-group col-sm-3">
  {{ Form::label('slug', 'URL amigable') }} <code>*</code>
  {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group col-sm-6">
  {!! Form::label('image0', 'Imagen del listado:', ['class'=>'mt-3']) !!} <strong>(690 x 469px)</strong><code>*</code>
  <div class="input-group">
      <span class="input-group-btn">
          <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
          <i class="far fa-image"></i> Elegir
          </a>
      </span>
      {!! Form::text('image0', null, ['class' => 'form-control', 'id' => 'thumbnail2', 'required']) !!}
  </div>
  <div id="holder2" style="margin-top:15px;max-height:100px;">
    @if (Route::currentRouteName()=="item_posts.edit")
          <img src="{{ $item_post->image0 }}" alt="" style="height:3rem">
      @endif
    </div>
</div>

<div class="form-group col-sm-6">
  {!! Form::label('image', 'Banner de la noticia:',['class'=>'mt-3']) !!} <strong>(3841 x 1206px)</strong><code>*</code>
  <div class="input-group">
    <span class="input-group-btn">
        <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary text-white">
        <i class="far fa-image"></i> Elegir
        </a>
    </span>
    {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'thumbnail1', 'required']) !!}
  </div>
  <div id="holder1" style="margin-top:15px;max-height:100px;">
  @if (Route::currentRouteName()=="item_posts.edit")
        <img src="{{ $item_post->image }}" alt="" style="height:3rem">
    @endif
  </div>
</div>

<div class="form-group col-sm-12">
  {{ Form::label('body1', 'Detalle [ES]:') }} <code>*</code>
  {{ Form::textarea('body1', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Detalle', 'required']) }}
</div>
<div class="form-group col-sm-12">
  {{ Form::label('body2', 'Detalle [PT]:') }} <code>*</code>
  {{ Form::textarea('body2', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Detalle', 'required']) }}
</div>

<div class="form-group col-sm-6">
  {{ Form::label('date', 'Fecha a mostrar:') }} <code>*</code>
  {{ Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Fecha a mostrar', 'required']) }}
</div>

<div class="form-group col-sm-6">
  {{ Form::label('order', 'Orden:') }} <code>*</code>
  {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Orden', 'required']) }}
  <div class="invalid-feedback">
    Ingrese orden a mostrar
  </div>
</div>

@section('script')

<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });
	});
</script>

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
          $('<img>').css('height', '5rem').attr('src', item.thumb_url)
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
  $('#lfm1').filemanager('image', {prefix: route_prefix});
  $('#lfm2').filemanager('image', {prefix: route_prefix});
  // $('#lfm').filemanager('file', {prefix: route_prefix});
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