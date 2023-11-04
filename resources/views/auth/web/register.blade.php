@extends('auth.web.layout')
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
            <form action="{{route('web.register')}}" method="POST">
                @csrf
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title">Register</h3>
                    </div>
                    <div class="card-body">
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
                        <button class="btn btn-info"> Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
