@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('panel.locale.edit', $item->id) }}">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4><span class="text-muted fw-light">{!! __('locale.title.modelname') !!} /</span> Listar</h4>
                </div>
                <div class="col-12 col-md-6  mb-5 text-end">
                    
                    <a class="btn btn-primary btn-sm" href="{{ route('panel.locale') }}"><i
                            class="bx bx-left-arrow-alt"></i>&nbsp;{!! __('global.actions.backtolist') !!}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @include('admin.status')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">{!! __('global.title.name') !!}</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="{!! __('locale.placeholder.name') !!}" value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="code" class="form-label">{!! __('locale.title.code') !!}</label>
                                <input type="text" class="form-control" name="code" id="code"
                                    placeholder="{!! __('locale.placeholder.code') !!}" value="{{ $item->code }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    @if ($item->enabled) checked="checked" @endif name="enabled"
                                    id="enabled">
                                <label class="form-check-label" for="enabled">
                                    {!! __('locale.title.enabled') !!} </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="reset" class="btn btn-danger" name="" value="{!! __('global.actions.reset') !!}" />
                    <input type="submit" class="btn btn-primary" name="submit" value="{!! __('global.actions.save') !!}" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
