<div class="col-md-7">
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('category_solution_id', 'Categoría:') }} <code>*</code>
            {{ Form::select('category_solution_id', $category_solutions, null, ['class' => 'custom-select', 'placeholder' => 'Seleccionar categoría', 'required']) }}
        </div>

        <div class="form-group col-md-4">
            {{ Form::label('name', 'Nombre [ES]:') }} <code>*</code>
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('slug', 'URL amigable') }} <code>*</code>
            {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
        </div>
    </div>
    <div class="form-group col-md-12">
      {{ Form::label('description1', 'Resumen [ES]:') }} <code>*</code>
      {{ Form::textarea('description1', null, ['class' => 'form-control', 'placeholder' => 'Resumen', 'rows' => 3, 'maxlength' => 220, 'required']) }}
  </div>
  <div class="form-group col-md-12">
      {{ Form::label('description2', 'Resumen [PT]:') }} <code>*</code>
      {{ Form::textarea('description2', null, ['class' => 'form-control', 'placeholder' => 'Resumen', 'rows' => 3, 'maxlength' => 220, 'required']) }}
  </div>
  <div class="form-group col-md-12">
  {{ Form::label('minuserforsale', 'Mínimo Usuarios:') }} <code>*</code>
  {{ Form::select('minuserforsale', [
      "10"=>"Hasta 10",
      "100"=>"Hasta 100",
      "101"=>"Más de 100",
      ], null,['class' => 'custom-select', 'placeholder' => 'Selecciona', 'required']) }}
  </div>


  </div>

    <div class="form-group col-md-5">
    <div class="row">
    <div class="col-md-6">
        {{ Form::label('countries', 'Países:') }} <code>*</code>
        {{ Form::select('countries[]', $countries, $currentCountries, ['class' => 'custom-select form-select vh-50', 'placeholder' => 'Selecciona los Países', 'required','multiple' => 'multiple','size'=>20]) }}
    </div>
    
    <div class="col-md-6">
        {{ Form::label('industry', 'Industria:') }} <code>*</code>
        {{ Form::select('industries[]', $industries, $currentIndustries, ['class' => 'custom-select form-select vh-50', 'placeholder' => 'Selecciona las industrías', 'required','multiple' => 'multiple','size'=>20]) }}
    </div>
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

<div class="form-group col-sm-4">
    {!! Form::label('slider', 'Banner superior:', ['class' => 'mt-3']) !!} <strong>(3840 x 1981px)</strong><code>*</code>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary text-white">
                <i class="far fa-image"></i> Elegir
            </a>
        </span>
        {!! Form::text('slider', null, ['class' => 'form-control', 'id' => 'thumbnail1', 'required']) !!}
    </div>
    <div id="holder1" style="margin-top:15px;max-height:100px;">
        @if (Route::currentRouteName() == 'item_solutions.edit')
            <img src="{{ $item_solution->slider }}" alt="" style="height:3rem">
        @endif
    </div>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('pdf1', 'Infografía [ES]:', ['class' => 'mt-3']) !!} <code>*</code>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
                <i class="far fa-image"></i> Elegir
            </a>
        </span>
        {!! Form::text('pdf1', null, ['class' => 'form-control', 'id' => 'thumbnail2', 'required']) !!}
    </div>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('pdf2', 'Infografía [PT]:', ['class' => 'mt-3']) !!} <code>*</code>
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
                <i class="far fa-image"></i> Elegir
            </a>
        </span>
        {!! Form::text('pdf2', null, ['class' => 'form-control', 'id' => 'thumbnail2', 'required']) !!}
    </div>
</div>

<div class="form-group col-sm-12">
    {{ Form::label('podcast1', 'Texto Podcast [ES]:') }} <code>*</code>
    {{ Form::textarea('podcast1', null, ['class' => 'form-control', 'placeholder' => 'Texto Podcast [ES]', 'rows' => 3, 'maxlength' => 220, 'required']) }}
</div>
<div class="form-group col-sm-12">
    {{ Form::label('podcastlink1', 'Link Podcast [ES]:') }} <code>*</code>
    {{ Form::text('podcastlink1', null, ['class' => 'form-control', 'placeholder' => 'Link Podcast [ES]', 'rows' => 3, 'required']) }}
</div>
<div class="form-group col-sm-12">
    {{ Form::label('podcast2', 'Texto Podcast [PT]:') }} <code>*</code>
    {{ Form::textarea('podcast2', null, ['class' => 'form-control', 'placeholder' => 'Texto Podcast [PT]', 'rows' => 3, 'maxlength' => 220, 'required']) }}
</div>
<div class="form-group col-sm-12">
    {{ Form::label('podcastlink2', 'Link Podcast [PT]:') }} <code>*</code>
    {{ Form::text('podcastlink2', null, ['class' => 'form-control', 'placeholder' => 'Link Podcast [PT]', 'rows' => 3,'required']) }}
</div>

<div class="px-3 col-sm-12 mb-3">
    <div class="card shadow col-sm-12 px-0">
        <div class="card-header py-3 card-into">
            <h6 class="m-0 font-weight-bold text-primary float-left">Beneficios:</h6>
            <p class="btn btn-success m-0 btn-icon-split float-right añadir">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text text-white">Añadir</span>
            </p>
        </div>
        <div class="texto row px-3">
            @if (Route::currentRouteName() == 'item_solutions.create')
                <div class="card-body col-md-4 pt-1">
                    {!! Form::label('details', 'Selecciona una imagen:', ['class' => 'mt-1']) !!} <small><strong>(alto 70px)</strong></small><code>*</code>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_images0" data-input="thumbnail_images0" data-preview="holder_images0"
                                class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                            </a>
                        </span>
                        {!! Form::text('details[0][image]', null, ['class' => 'form-control', 'id' => 'thumbnail_images0', 'required']) !!}
                    </div>
                    <div id="holder_images0" style="margin-top:15px;max-height:100px;">
                    </div>
                    {!! Form::label('details', 'Nombre [ES]:', ['class' => 'mt-1']) !!} <code>*</code>
                    {!! Form::text('details[0][name1]', null, ['class' => 'form-control', 'required']) !!}
                    {!! Form::label('details', 'Nombre [PT]:', ['class' => 'mt-1']) !!} <code>*</code>
                    {!! Form::text('details[0][name2]', null, ['class' => 'form-control', 'required']) !!}
                    {!! Form::label('details', 'Orden:', ['class' => 'mt-1']) !!} <code>*</code>
                    {!! Form::text('details[0][order]', null, ['class' => 'form-control', 'required']) !!}
                    <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">
                </div>
            @endif

            @if (Route::currentRouteName() == 'item_solutions.edit')

                @foreach ($item_solution->details as $item)
                    @php $var_col = (count($item_solution->details)>1)?'col-md-4':'col-md-4'; @endphp
                    <div class="card-body {{ $var_col }} pt-1">
                        @if ($loop->index >= 1)
                            <a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                        {!! Form::label('details', 'Selecciona una imagen:', ['class' => 'mt-1']) !!} <small><strong>(alto 70px)</strong></small> <code>*</code>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm_images{{ $loop->iteration }}"
                                    data-input="thumbnail_images{{ $loop->iteration }}"
                                    data-preview="holder_images{{ $loop->iteration }}"
                                    class="btn btn-primary text-white">
                                    <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('details[' . $loop->index . '][image]', $item['image'], [
                                'class' => 'form-control',
                                'id' => 'thumbnail_images' . $loop->iteration,
                                'required',
                            ]) !!}
                        </div>
                        <div id="holder_images{{ $loop->iteration }}" style="margin-top:15px;max-height:100px;">
                            <img src="{{ $item['image'] }}" alt="" style="height:5rem">
                        </div>
                        {!! Form::label('details', 'Nombre [ES]:', ['class' => 'mt-1']) !!} <code>*</code>
                        {!! Form::text('details[' . $loop->index . '][name1]', isset($item['name']) ? $item['name'] : $item['name1'], [
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                        {!! Form::label('details', 'Nombre [PT]:', ['class' => 'mt-1']) !!} <code>*</code>
                        {!! Form::text('details[' . $loop->index . '][name2]', isset($item['name2']) ? $item['name2'] : '', [
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                        {!! Form::label('details', 'Orden:', ['class' => 'mt-1']) !!} <code>*</code>
                        {!! Form::number('details[' . $loop->index . '][order]', $item['order'], [
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                        <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="form-group col-sm-12">
    {{ Form::label('order', 'Orden:') }} <code>*</code>
    {{ Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Orden', 'required']) }}
    <div class="invalid-feedback">
        Ingrese orden a mostrar
    </div>
</div>

@section('script')
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name, #slug").stringToSlug({
                callback: function(text) {
                    $('#slug').val(text);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            @if (Route::currentRouteName() == 'item_solutions.edit')
                var i = {{ count($item_solution->details) + 1 }};
            @else
                var i = 1;
            @endif

            $('.añadir').on('click', function(e) {
                e.preventDefault();
                var template = '<div class="card-body col-md-4 pt-1">' +
                    '<a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">' +
                    '<i class="fas fa-trash"></i>' +
                    '</a>' +
                    '<label for="details" class="mt-1">Selecciona una imagen:</label> <small><strong>(alto 70px)</strong></small> <code>*</code>' +
                    '<div class="input-group">' +
                    '<span class="input-group-btn">' +
                    '<a id="lfm_images' + i + '" data-input="thumbnail_images' + i +
                    '" data-preview="holder_images' + i + '" class="btn btn-primary text-white">' +
                    '<i class="far fa-image"></i> Elegir' +
                    '</a>' +
                    '</span>' +
                    '<input class="form-control" id="thumbnail_images' + i + '" name="details[' + i +
                    '][image]" type="text" required>' +
                    '</div>' +
                    '<div id="holder_images' + i + '" style="margin-top:15px;max-height:100px;"></div>' +
                    '<label for="details" class="mt-1">Nombre:</label> <code>*</code>' +
                    '<input class="form-control" name="details[' + i + '][name]" type="text" required>' +
                    '<label for="details" class="mt-1">Orden:</label> <code>*</code>' +
                    '<input class="form-control" name="details[' + i + '][order]" type="number" required>' +
                    '<hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">' +
                    '</div>' +
                    '<\script>$(\'#lfm_images' + i +
                    '\').filemanager(\'image\', {prefix: route_prefix});<\/script>';

                $('.texto').append(template);
                i++;
            });

            $(document).on('click', '.eliminar', function(e) {
                e.preventDefault();

                $(this).parent('.card-body').remove();
            });
        });
    </script>

    <script>
        (function($) {

            $.fn.filemanager = function(type, options) {
                type = type || 'file';

                this.on('click', function(e) {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                    var target_input = $('#' + $(this).data('input'));
                    var target_preview = $('#' + $(this).data('preview'));
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=1100,height=600');
                    window.SetUrl = function(items) {
                        var file_path = items.map(function(item) {
                            return item.url;
                        }).join(',');

                        // set the value of the desired input to image url
                        target_input.val('').val(file_path).trigger('change');

                        // clear previous preview
                        target_preview.html('');

                        // set or change the preview image src
                        items.forEach(function(item) {
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
        $('#lfm1').filemanager('image', {
            prefix: route_prefix
        });
        $('#lfm2').filemanager('file', {
            prefix: route_prefix
        });
        $('#lfm_images0').filemanager('image', {
            prefix: route_prefix
        });
        @if (Route::currentRouteName() == 'item_solutions.edit')
            @foreach ($item_solution->details as $item)
                $('#lfm_images{{ $loop->iteration }}').filemanager('image', {
                    prefix: route_prefix
                });
            @endforeach
        @endif
        // $('#lfm').filemanager('file', {prefix: route_prefix});
    </script>

    <script>
        var lfm = function(id, type, options) {
            let button = document.getElementById(id);

            button.addEventListener('click', function() {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));

                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                    'width=900,height=600');
                window.SetUrl = function(items) {
                    var file_path = items.map(function(item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));

                    // clear previous preview
                    target_preview.innerHtml = '';

                    // set or change the preview image src
                    items.forEach(function(item) {
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
