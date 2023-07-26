@extends('admin.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-6">
            <h4><span class="text-muted fw-light">{!! __('localetag.title.modelname') !!} /</span> Listar</h4>
        </div>
        <div class="col-12 col-md-6  mb-5 text-end">
            <a class="btn btn-primary btn-sm" href="{{ route('panel.localetag.add') }}"><i
                    class='bx bx-plus'></i>&nbsp;{!! __('global.actions.add') !!}</a>
            <a class="btn btn-primary btn-sm" href="{{ route('panel.localetag') }}"><i
                    class="bx bx-left-arrow-alt"></i>&nbsp;{!! __('global.actions.backtolist') !!}</a>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    @include('admin.status')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{!! __('global.events.field') !!}</th>
                                <th>{!! __('global.events.value') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{!! __('global.values.id') !!}</td>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <td>{!! __('localetag.title.module') !!}</td>
                                <td>{{ $item->module }}</td>
                            </tr>
                            <tr>
                                <td>{!! __('localetag.title.action') !!}</td>
                                <td>{{ $item->action }}</td>
                            </tr>
                            <tr>
                                <td>{!! __('localetag.title.tag') !!}</td>
                                <td>{{ $item->tag }}</td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.created_at') !!}</td>
                                <td>@if (!is_null($item->created_at))
                                        {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                                    @endif</td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.updated_at') !!}</td>
                                <td>@if (!is_null($item->updated_at))
                                        {{ Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i') }}
                                    @endif</td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.deleted_at') !!}</td>
                                <td>@if (!is_null($item->deleted_at))
                                        {{ Carbon\Carbon::parse($item->deleted_at)->format('d/m/Y H:i') }}
                                    @endif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
var _token = "{{ csrf_token() }}";
@endsection
