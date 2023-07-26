@extends("admin.master")@section("content")<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-12">
              <form method="post" action="{{route("panel.locale.add")}}">
                {{ csrf_field() }}
               <div class="card text-bg-dark ">
                <div class="card-header">
                  <div class="row g-0">
                  <div class="col-6">
                  {!! __("global.actions.add") !!} {!! __("locale.title.modelname") !!}
                </div>
                <div class="col-6 text-end">
                  <a class="btn btn-primary btn-sm" href="{{route("panel.locale")}}"><i class="bx bx-left-arrow-alt"></i>&nbsp;{!! __("global.actions.backtolist") !!}</a>
                </div>
                </div>
                </div>
              <div class="card-body">
                @include('admin.status')
<div class="row">
    <div class="col-12">
                <div class="mb-3">
  <label for="name" class="form-label">{!!__("global.title.name")!!}</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="{!!__("locale.placeholder.name")!!}" value="{{$item->name}}">
  </div>
              </div>
    <div class="col-12">
                <div class="mb-3">
  <label for="code" class="form-label">{!!__("locale.title.code")!!}</label>
    <input type="text" class="form-control" name="code" id="code" placeholder="{!!__("locale.placeholder.code")!!}" value="{{$item->code}}">
  </div>
              </div>
    <div class="col-12">
                <div class="form-check">
          <input class="form-check-input" type="checkbox" @if($item->enabled) checked="checked" @endif name="enabled" id="enabled">
          <label class="form-check-label" for="enabled">
            {!!__("locale.title.enabled")!!}          </label>
        </div>
              </div>
  
              </div>
              </div>
<div class="card-footer">
<input type="reset" class="btn btn-danger" name="" value="{!! __("global.actions.reset") !!}"/>
<input type="submit" class="btn btn-primary" name="submit" value="{!! __("global.actions.save") !!}"/>
            </div>
            </div>
          </form>
        </div>
        </div>
    </div>
</div>
@endsection