@extends('web.layout.app')
@section('content')
    <div class="bg-light mb-3">
        <div class="container">
            <nav class="d-flex justify-content-between">
              <h4>Home</h4>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="">
                        <img style="max-height: 38px" src="{{ asset('assets/img/admin-logo.png') }}" alt="Logo" class="img-fluid" style="opacity: .8">
                    </span>
                </button>
              </nav>
        </div>
    </div>
@endsection
