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
                        <div class="card-body">
                            @include('admin.status')
                            <div class="row">
                                <div class="col-12">
                                    <form method="get" action="{{ route('panel.locale') }}" id="filterZone">
                                        <div class="mb-3">
                                            <label for="id" class="form-label">{!! __('global.values.id') !!}</label>
                                            <input type="input" class="form-control" size="4"
                                                name="id" value="" placeholder="{!! __('global.filter.id') !!}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="code" class="form-label">{!! __('local.filter.code') !!}</label>
                                            <input type="text" class="form-control" name="code"
                                                id="code" value="{{ $filter['code'] }}"
                                                placeholder="{!! __('local.filter.code') !!}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="enabled" class="form-label">{!! __('local.filter.enabled') !!}</label>
                                            <input type="text" class="form-control" name="enabled"
                                                id="enabled" value="{{ $filter['enabled'] }}"
                                                placeholder="{!! __('local.filter.enabled') !!}" />
                                        </div>
                                        <div class="mb-3">
                                            <a href="{{ route('panel.localetag') }}" class="btn btn-success"
                                                name="filter">{!! __('global.actions.filterclear') !!}</a>
                                            <button type="submit" class="btn btn-primary"
                                                name="filter">{!! __('global.actions.filter') !!}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@sortablelink('id', __('global.values.id'))</th>
                                        <th>@sortablelink('name', __('global.title.name'))</th>
                                        <th>@sortablelink('code', __('locale.title.code'))</th>
                                        <th>@sortablelink('enabled', __('locale.title.enabled'))</th>
                                        <th>{!! __('global.actions.title') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $item)
                                        <tr>
                                            <td>
                                                <a
                                                    href="{{ route('panel.locale.details', $item->id) }}">{{ $item->id }}</a>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>
                                                @if ($item->enabled)
                                                    {!! __('global.values.yes') !!}
                                                @else
                                                    {!! __('global.values.no') !!}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('panel.locale.edit', $item->id) }}"
                                                    class="btn btn-primary"><i
                                                        class="fa-duotone fa-pencil"></i>&nbsp;{!! __('global.actions.edit') !!}</a>
                                                <span
                                                    onclick="confirmAction('delete','{{ route('panel.locale.delete', $item->id) }}')"
                                                    class="btn btn-danger"><i
                                                        class="fa-duotone fa-trash-can"></i>&nbsp;{!! __('global.actions.delete') !!}</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="col-12 text-center">
                                                    <div class="alert alert-warning text-dark" role="alert">
                                                        {!! __('global.events.noitems') !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            </form>
                        </div>
                        <div class="card-footer">
                            {!! $items->appends(\Request::except('page'))->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var _token = "{{ csrf_token() }}";
    </script>
@endsection
