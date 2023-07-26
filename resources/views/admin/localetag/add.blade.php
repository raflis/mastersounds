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
            <form method="post" action="{{ route('panel.localetag.add') }}">
                {{ csrf_field() }}
                <div class="card mb-4">
                    <div class="card-body">
                        @include('admin.status')
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="module" class="form-label">{!! __('localetag.title.longname') !!}</label>
                                    <input type="text" class="form-control" id="longname" 
                                        placeholder="{!! __('localetag.placeholder.longname') !!}" value="">
                                </div>
                            </div>
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
@endsection
@section("scriptbs")
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
@endsection