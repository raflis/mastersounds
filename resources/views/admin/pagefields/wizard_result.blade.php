@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Wizard página de gracias</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                          Wizard
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', 1], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('wizard_result_text1', 'Texto gracias [ES]:') }} <code>*</code>
                          {{ Form::textarea('wizard_result_text1', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Texto', 'rows' => 6, 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('wizard_result_text2', 'Texto gracias [PT]:') }} <code>*</code>
                          {{ Form::textarea('wizard_result_text2', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Texto', 'rows' => 6, 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('wizard_result_button1', 'Nombre del botón [ES]:') }} <code>*</code>
                          {{ Form::text('wizard_result_button1', null, ['class' => 'form-control', 'placeholder' => 'Nombre del botón [ES]', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('wizard_result_button2', 'Nombre del botón [PT]:') }} <code>*</code>
                          {{ Form::text('wizard_result_button2', null, ['class' => 'form-control', 'placeholder' => 'Nombre del botón [PT]', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('wizard_result_link1', 'Link Calendly [ES]:') }} <code>*</code>
                          {{ Form::text('wizard_result_link1', null, ['class' => 'form-control', 'placeholder' => 'Link Calendly [ES]', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('wizard_result_link2', 'Link Calendly [PT]:') }} <code>*</code>
                          {{ Form::text('wizard_result_link2', null, ['class' => 'form-control', 'placeholder' => 'Link Calendly [PT]', 'required']) }}
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
    $('#lfm1').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('image', {prefix: route_prefix});
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