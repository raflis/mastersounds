@extends('admin.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 col-md-6">
            <h4><span class="text-muted fw-light">{!! __('locale.title.modelname') !!} /</span> Listar</h4>
        </div>
        <div class="col-12 col-md-6  mb-5 text-end">
            
            <a class="btn btn-primary btn-sm" href="{{ route('panel.locale') }}"><i
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
                                <td>
                                    {{ $item->id }} </td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.name') !!}</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td>{!! __('locale.title.code') !!}</td>
                                <td>{{ $item->code }}</td>
                            </tr>
                            <tr>
                                <td>{!! __('locale.title.enabled') !!}</td>
                                <td>
                                    @if ($item->enabled)
                                        {!! __('global.values.yes') !!}
                                    @else
                                        {!! __('global.values.no') !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.created_at') !!}</td>
                                <td>
                                    @if (!is_null($item->created_at))
                                        {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.updated_at') !!}</td>
                                <td>
                                    @if (!is_null($item->updated_at))
                                        {{ Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{!! __('global.title.deleted_at') !!}</td>
                                <td>
                                    @if (!is_null($item->deleted_at))
                                        {{ Carbon\Carbon::parse($item->deleted_at)->format('d/m/Y H:i') }}
                                    @endif
                                </td>
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
@section('scriptbs')
var _token = "{{ csrf_token() }}";
@endsection
