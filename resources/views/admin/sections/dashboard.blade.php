@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-3">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <a href="{{route('admin.users')}}">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-info elevation-1">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content text-dark">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number">{{$userCount ?? ''}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
