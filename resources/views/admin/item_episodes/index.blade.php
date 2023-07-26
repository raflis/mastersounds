@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid">
        <div class="row layout-header">
            <div class="col-sm-12 header-content">
                <h1>
                    <i class="fas fa-bullhorn fa-xs text-white2"></i> Episodios
                </h1>
                <span class="subtitle">
                    Crear, editar y eliminar.
                </span>
            </div>
        </div>
        <div class="row layout-body">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Soluciones
                        </span>
                        <div>
                            @if (validatePermission('item_episodes.create', Auth::user()->permissions) == true)
                            <a class="btn btn-success" href="{{ route('item_episodes.create') }}">
                                <span class="icon">
                                    <i class="fas fa-plus px-2 py-1"></i>
                                </span>
                                <span class="text px-2 py-1">
                                    Crear
                                </span>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="px-3">
                        @include('admin.includes.alert')
                    </div>
                </div>
                <div class="tablaTotal">
                    <table class="table tableD">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Categoría</th>
                                <th>Idioma</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Orden</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item_episodes as $item)
                            <tr>
                                <td>{{ $item_episodes->firstItem() + $loop->index }}</td>
                                <td>
                                    @if($item->locale->id==1)
                                    {{ $item->category_episode->name1 }}
                                    @else
                                    {{ $item->category_episode->name2 }}
                                    @endif
                                </td>
                                <td>
                                    {{ $item->locale->name}}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td><img src="{{ $item->image }}" alt="" height=40></td>
                                <td>{{ $item->order }}</td>
                                <td>
                                    <div style="display: inline-flex">
                                        @if (validatePermission('item_episodes.edit', Auth::user()->permissions) == true)
                                        <a class="btn btn-primary text-white btn-sm mr-1" href="{{ route('item_episodes.edit', $item->id) }}">
                                            <i class="far fa-edit pr-1"></i> Editar
                                        </a>
                                        @endif
                                        @if (validatePermission('item_episodes.delete', Auth::user()->permissions) == true)
                                        <a class="btn btn-danger btn-sm btn-eliminar" href="" ideliminar="{{ $item->id }}"><i class="far fa-trash-alt pr-1"></i> Eliminar</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginacionTotal d-flex justify-content-end">
                    {{ $item_episodes->withQueryString()->render() }}
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
</div>

<div class="modal fade" id="deleting" tabindex="-1" role="dialog" aria-labelledby="deletingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fas fa-exclamation-circle fa-5x text-warning mb-3"></i>
            <p class="mb-0 font-bold first">¿Estás seguro?</p>
            <p class="mb-0 font-light second">El registro seleccionado será eliminado y no podrá recuperarse.</p>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            {!! Form::open(['route' => ['item_episodes.destroy', ''], 'method' => 'DELETE', 'id' => 'form-eliminar']) !!}
                <button class="btn btn-danger">
                    Sí, eliminar
                </button>                           
            {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')

<script>

var base = location.protocol+'//'+location.host;

$('document').ready(function(){
    $('.btn-eliminar').click(function(e){
        e.preventDefault();
        var id = $(this).attr('ideliminar');
        var base = '{{ route('item_episodes.destroy', '') }}';
        var url = base + '/' +id;
        $('#form-eliminar').attr('action', url);
        $('#deleting').modal('show');
    });

    $('#department').on('change', function(e){
        e.preventDefault();
        var id_department = $(this).val();
        $.ajax({
            type: "POST",
            url: base + '/admin/provinces',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id_department,
            },
            //dataType: 'json',
            success: function success(response) {
                if (response.length > 0) {
                    var options = '<option value="" selected>Provincia</option>';

                    for (var r = 0; r < response.length; r++) {
                        options += '<option value="' + response[r].id + '">' + response[r].name + '</option>';
                    }

                    $('#province').html(options);
                    $('#district').html('<option value="" selected>Distrito</option>');
                }
            },
            beforeSend: function beforeSend() {
                var option = '<option value="" disabled selected>Cargando ...</option>';
                $('#province').html(option);
                $('#district').html(option);
            },
            error: function error(_error3, e) {
                console.log(_error3);
                console.log(e);
            }
        });
    });

    $('#province').on('change', function(e){
        e.preventDefault();
        var id_province = $(this).val();
        $.ajax({
            type: "POST",
            url: base + '/admin/districts',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id_province,
            },
            //dataType: 'json',
            success: function success(response) {
                if (response.length > 0) {
                    var options = '<option value="" selected>Distrito</option>';

                    for (var r = 0; r < response.length; r++) {
                        options += '<option value="' + response[r].id + '">' + response[r].name + '</option>';
                    }

                    $('#district').html(options);
                }
            },
            beforeSend: function beforeSend() {
                var option = '<option value="" disabled selected>Cargando ...</option>';
                $('#district').html(option);
            },
            error: function error(_error3, e) {
                console.log(_error3);
                console.log(e);
            }
        });
    });
})
</script>

<script>

    $(function($){
    
    @if(request('department') != '')
        let timerDepartment = setInterval(function(e) {
            if($('#department option').length > 1){
                $('#department').val('{{ request('department') }}').trigger('change');
                clearInterval(timerDepartment);
            }
        }, 100);
    @endif
    
    @if(request('province') != '')
        let timerProvince = setInterval(function(e) {
            if($('#province option').length > 1){
                $('#province').val('{{ request('province') }}').trigger('change');
                clearInterval(timerProvince);
            }
        }, 100);
    @endif
    
    @if(request('district') != '')
        let timerDistrict = setInterval(function(e) {
            if($('#district option').length > 1){
                $('#district').val('{{ request('district') }}').trigger('change');
                clearInterval(timerDistrict);
            }
        }, 100);
    @endif
    
    })
    
</script>

@endsection