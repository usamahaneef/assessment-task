@extends('auth.web.layout')
@section('content')
<div class="row" style="height:100vh;">
    <div class="col-md-6 align-items-center justify-content-center d-none d-sm-flex"style="background-color:#4660ac;">
        {{-- <img src="{{asset('admin/img/login-image.png')}}" alt="" style="" class="img-fluid"> --}}
    </div>
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-gray-light">
        <form action="{{route('web.login')}}" method="POST">
            @csrf
            <div class="card py-2">
                <div class="card-header">
                    <h4 class="text-center">Sign in to start your session</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control"
                               value="{{old('email')}}"
                               placeholder="Enter ">
                        @error('email')
                        <span class="text-danger text-sm pull-right">{{$errors->first('email')}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Pasword</label>
                        <input type="password" id="password" name="password" class="form-control"
                               value="{{old('password')}}"
                               placeholder="Enter ">
                        @error('password')
                        <span class="text-danger text-sm pull-right">{{$errors->first('password')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('web.register.form')}}" class="btn btn-sm btn-default"><i class="fas fa-user-plus"></i> Register</a>
                        <button class="btn btn-sm btn-info float-right"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
