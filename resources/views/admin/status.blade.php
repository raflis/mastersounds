<div class="row ">
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('status'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::has('info'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('info') }}
        </div>
        @endif
    </div>
</div>
