@extends('admin.master')
@section('content')
    <div class="layoutContent">
        <div class="container-fluid profile">
            <div class="row show-header">
                <div class="col-sm-12">
                    <h1>
                        <i class="fas fa-home fa-xs"></i> <span>Traducciones</span>
                    </h1>
                </div>
            </div>
            <div class="row show-content mt-3">
                <div class="col-sm-12 col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <span>
                                Traducciones
                            </span>
                        </div>

                        <form method="post" action="">
                            {{ csrf_field() }}
                            @include('admin.status')
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Campo</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Modulo</td>
                                            <td>{{ $item->module }}</td>
                                        </tr>
                                        <tr>
                                            <td>Acción</td>
                                            <td>{{ $item->action }}</td>
                                        </tr>
                                        <tr>
                                            <td>Etiqueta</td>
                                            <td>{{ $item->tag }}</td>
                                        </tr>
                                        @foreach ($locales as $locale)
                                            <tr>
                                                <td>{{ $locale->name }}</td>
                                                <td>
                                                    <textarea class="form-control" name="locale-{{ $locale->code }}" id="locale-{{ $locale->code }}">{!! $translates[$locale->code] !!}</textarea>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="id" value="{{ $id }}" />
                                <input type="reset" class="btn btn-danger" name=""
                                    value="Reset" />
                                <input type="submit" class="btn btn-primary" name="submit"
                                    value="Guardar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
        @section('scriptbs')
            var _token = "{{ csrf_token() }}";
            @if ($hasEditor)
                var conf = {
                height: 300,
                fontColor: {
                colors: [{
                color: 'hsl(0, 0%, 0%)',
                label: 'Black'
                }]
                },
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                options: [{
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
                },
                {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
                },
                {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
                },
                {
                model: 'heading4',
                view: 'h4',
                title: 'Heading 4',
                class: 'ck-heading_heading4'
                }
                ]
                }
                };
                @foreach ($locales as $locale)
                    ClassicEditor
                    .create(document.querySelector('#locale-{{ $locale->code }}'), conf)
                    .catch(error => {
                    console.error(error);
                    });
                @endforeach
            @endif
        @endsection
