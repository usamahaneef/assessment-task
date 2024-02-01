@extends('auth.web.layout')
@section('content')
    <div class="row" style="height:100vh;">
        <div class="col-md-6 align-items-center justify-content-center d-none d-sm-flex"style="background-color:#4660ac;">

        </div>
        <div class="col-md-6 col-md-6 d-flex align-items-center justify-content-center bg-gray-light">
            <form action="{{route('web.register')}}" method="POST">
                @csrf
                <div class="card mt-5">
                    <div class="card-header">
                        <h5 class="text-bold text-center">Register to start your session</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{old('name')}}"
                                   placeholder="Enter ">
                            @error('name')
                            <span class="text-danger text-sm pull-right">{{$errors->first('name')}}</span>
                            @enderror
                        </div>
        
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
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                   value="{{old('password')}}"
                                   placeholder="Enter ">
                            @error('password')
                            <span class="text-danger text-sm pull-right">{{$errors->first('password')}}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                                   value="{{old('confirm_password')}}"
                                   placeholder="Enter ">
                            @error('confirm_password')
                            <span class="text-danger text-sm pull-right">{{$errors->first('confirm_password')}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-info float-right"> <i class="fas fa-sign-in-alt"></i> Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
