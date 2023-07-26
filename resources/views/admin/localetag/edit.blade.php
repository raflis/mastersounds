@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="container-xxl flex-grow-1 container-p-y">
      <form method="post" action="{{route("panel.localetag.edit",$item->id)}}">
        <div class="row">
            <div class="col-12 col-md-6">
                <h4><span class="text-muted fw-light">{!! __('localetag.title.modelname') !!} /</span> Listar</h4>
            </div>
            <div class="col-12 col-md-6  mb-5 text-end">
                <a class="btn btn-primary btn-sm" href="{{ route('panel.localetag.add') }}"><i
                        class='bx bx-plus'></i>&nbsp;{!! __('global.actions.add') !!}</a>
                <span class="btn btn-primary btn-sm" id="callFilter"><i
                        class="bx bx-filter-alt"></i>&nbsp;{!! __('global.actions.filter') !!}</span>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <a class="btn btn-primary btn-sm" href="{{ route('panel.localetag') }}"><i
                            class="bx bx-left-arrow-alt"></i>&nbsp;{!! __('global.actions.backtolist') !!}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('admin.status')
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="module" class="form-label">{!! __('localetag.title.module') !!}</label>
                        <input type="text" class="form-control" name="module" id="module"
                            placeholder="{!! __('localetag.placeholder.module') !!}" value="{{ $item->module }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="action" class="form-label">{!! __('localetag.title.action') !!}</label>
                        <input type="text" class="form-control" name="action" id="action"
                            placeholder="{!! __('localetag.placeholder.action') !!}" value="{{ $item->action }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="tag" class="form-label">{!! __('localetag.title.tag') !!}</label>
                        <input type="text" class="form-control" name="tag" id="tag"
                            placeholder="{!! __('localetag.placeholder.tag') !!}" value="{{ $item->tag }}">
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
</div>
</div>
@endsection
