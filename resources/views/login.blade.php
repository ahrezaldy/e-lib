@extends(backpack_view('layouts.auth'))

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4 text-center">
            <div class="mb-4 display-6 auth-logo-container">
                {!! backpack_theme_config('project_logo') !!}
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="text-danger">
                        {{ session('message') }}
                    </div>
                    <div>
                        <a href="{{ url('auth/redirect') }}" type="button" class="btn btn-block btn-outline-dark">
                            <i class="la la-google"></i>Sign In with Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection