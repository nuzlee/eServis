<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="background-color: yellow">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Hi Admin') }}
            </div>
        </div>
    </div>
</div>
