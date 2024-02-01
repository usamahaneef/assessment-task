@extends('web.layout.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus-circle"></i> Create feedback</h3>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="card-body pt-0">    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control"
                                            data-placeholder="Select ">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category}}" {{old('Category') == $category?'selected':''}}>{{$category}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="text-danger text-sm pull-right">{{$errors->first('category')}}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="{{old('title')}}"
                                           placeholder="Enter ">
                                    @error('title')
                                    <span class="text-danger text-sm pull-right">{{$errors->first('title')}}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control h-100" rows="5" cols="5" id="description" name="description"
                                              placeholder="Enter ">{{old('description')}}</textarea>
                                    @error('description')
                                    <span
                                        class="text-danger text-sm pull-right">{{$errors->first('description')}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> 
    
                    <div class="card-footer">
                        <button class="btn btn-sm btn-info float-right"><i class="fas fa-save"></i> Save feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
