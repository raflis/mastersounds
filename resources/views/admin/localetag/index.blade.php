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
                    @include('admin.status')
                        <div class="card-body">
                            <form method="get" action="{{ route('panel.localetag') }}" id="filterZone">
                                <div class="mb-3">
                                    <label for="module" class="form-label">Nombre largo</label>
                                    <input type="text" class="form-control" id="longname"
                                        placeholder="Nombre largo" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="module" class="form-label">Módulo</label>
                                    <input type="text" class="form-control" name="module" id="module"
                                        value="{{ $filter['module'] }}" placeholder="Módulo" />
                                </div>
                                <div class="mb-3">
                                    <label for="action" class="form-label">Acción</label>
                                    <input type="text" class="form-control" name="action" id="action"
                                        value="{{ $filter['action'] }}" placeholder="Acción" />
                                </div>
                                <div class="mb-3">
                                    <label for="tag" class="form-label">Etiqueta</label>
                                    <input type="text" class="form-control" name="tag" id="tag"
                                        value="{{ $filter['tag'] }}" placeholder="Etiqueta" />
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('panel.localetag') }}" class="btn btn-success"
                                        name="filter">Limpiar el Filtro</a>
                                    <button type="submit" class="btn btn-primary"
                                        name="filter">Filtrar</button>
                                </div>
                            </form>
                        
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Modulo
                                </th>
                                <th>
                                    Acción
                                </th>
                                <th>
                                    Etiqueta
                                </th>
                                <th>Traducido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('panel.localetag.details', $item->id) }}">{{ $item->id }}</a>
                                    </td>
                                    <td>{{ $item->module }}</td>
                                    <td>{{ $item->action }}</td>
                                    <td>{{ $item->tag }}</td>
                                    <td>
                                        @foreach ($item->localetranslate as $localetranslate)
                                            @if (isset($localetranslate->locale))
                                                {{ $localetranslate->locale->code }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('panel.localetag.translate', $item->id) }}"
                                            class="btn btn-primary"><i
                                                class='bx bx-planet'></i>&nbsp;Traducir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="col-12 text-center">
                                            <div class="alert alert-warning text-dark" role="alert">
                                                No hay items
                                              
                                            </div>
                                            @if(isset($filter['module'])&&isset($filter['action'])&&isset($filter['tag']))
                                            <a class="btn btn-primary btn-sm" href="{{ route('panel.localetag.add',['module'=>$filter['module'],'action'=>$filter['action'],'tag'=>$filter['tag']]) }}"><i
                                                class='bx bx-plus'></i>&nbsp;Agregar Faltante</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {!! $items->appends(\Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var _token = "{{ csrf_token() }}";


jQuery("#longname").on("input", function(){
var t = (jQuery(this).val().toString().toLowerCase());
var slices =t.split(".");
console.log(slices);
if(slices.length==3){
jQuery("#module").val(slices[0]);
jQuery("#action").val(slices[1]);
jQuery("#tag").val(slices[2]);
}
});

//var expanded = {{ $expanded > 0 ? 'true' : 'false' }};

</script>
@endsection
