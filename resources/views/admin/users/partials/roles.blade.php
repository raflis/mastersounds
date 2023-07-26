@foreach (user_permissions() as $item)
<div class="col-sm-3 d-flex">
  <div class="card w-100 mb-3">
    <div class="card-header p-2">
      <p class="card-title m-0 h6">{{ $item['title'] }}</p>
    </div>
    <div class="card-body p-2">
      <ul class="list-unstyled m-0">
        @foreach ($item['key'] as $k => $j)
        <li>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $k }}" id="defaultCheck{{ $k }}" @if (validatePermission($k, $user->permissions)) checked @endif>
            <label class="form-check-label" for="defaultCheck{{ $k }}">
              {{ $j }}
            </label>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endforeach


