@extends('auth.web.layout')
@section('content')
<div class="row" style="margin-top:10%">
    <div class="col-md-4 col-sm-6 mx-auto">
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="text-bold text-center">Sign in to start your session</h4>
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
                        <a href="{{route('web.register.form')}}" class="btn btn-default">Register</a>
                        <button class="btn btn-primary float-right">Sign in</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
