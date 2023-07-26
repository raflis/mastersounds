@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Nosotros</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                          Nosotros
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', $id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('file1', 'Aviso Legal:', ['class' => '']) !!} <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('file1', null, ['class' => 'form-control','id' => 'thumbnail1']) !!}
                          </div>
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('file2', 'Datos Personales:', ['class' => '']) !!} <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('file2', null, ['class' => 'form-control','id' => 'thumbnail2']) !!}
                          </div>
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('file3', 'Cookies:', ['class' => '']) !!} <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm3" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('file3', null, ['class' => 'form-control','id' => 'thumbnail3']) !!}
                          </div>
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('file4', 'Newsletter:', ['class' => '']) !!} <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm4" data-input="thumbnail4" data-preview="holder4" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('file4', null, ['class' => 'form-control','id' => 'thumbnail4']) !!}
                          </div>
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('file5', 'Seguridad:', ['class' => '']) !!} <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm5" data-input="thumbnail5" data-preview="holder5" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('file5', null, ['class' => 'form-control','id' => 'thumbnail5']) !!}
                          </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 my-4 px-0">
                    {!! Form::submit('Actualizar cambios', ['class' => 'btn btn-success btn-sm py-2 px-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

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
    $('#lfm1').filemanager('file', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
    $('#lfm3').filemanager('file', {prefix: route_prefix});
    $('#lfm4').filemanager('file', {prefix: route_prefix});
    $('#lfm5').filemanager('file', {prefix: route_prefix});
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