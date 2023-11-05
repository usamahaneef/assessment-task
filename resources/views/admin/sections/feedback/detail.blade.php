@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-comment-alt"></i> Feedback details</h3>
                        <div class="card-tools">
                            <button type="button" data-target="#modal-{{ $feedback->id }}"
                                data-toggle="modal"class="btn btn-success btn-sm">Ativate
                            </button>
                            <div id="modal-{{ $feedback->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Activate Feedback</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you really wish to activate this Feedback?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('admin.feedback.activate' , $feedback)}}"
                                                method="post">
                                                @csrf
                                                @method('post')
                                                <button type="button" class="btn btn-sm btn-default"
                                                    data-dismiss="modal">No</button>
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-target="#modal-de-{{ $feedback->id }}"
                                data-toggle="modal"class="btn btn-danger btn-sm"> Inativate
                            </button>
                            <div id="modal-de-{{ $feedback->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Inctivate Feedback</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you really wish to Inactivate this Feedback?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('admin.feedback.inactivate' , $feedback)}}"
                                                method="post">
                                                @csrf
                                                @method('post')
                                                <button type="button" class="btn btn-sm btn-default"
                                                    data-dismiss="modal">No</button>
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex justify-content-between">
                                <h6><strong>Title:</strong> {{ $feedback->title }}</h6>
                                <h6>By: <strong class="text-info">{{$feedback->user->name ?? ''}}</strong></h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Category: {{$feedback->category}}</h6>
                            <h6>Comment Status:
                                @if($feedback->comment_status)
                                    <span class="badge badge-success">Active</span>
                                @else 
                                    <span class="badge badge-danger">Inactive</span>

                                @endif
                            </h6>

                        </div>
                        <div class="mt-3">
                            <strong>Description</strong> <br>
                            <p>{{ $feedback->description }}</p>
                        </div>
                    </div>
    
                    @if($feedback->comments)
                    <div class="card-footer">
                        <h5>Comments</h5>
                        @foreach ($feedback->comments as $comment)
                            <div class="d-flex bg-white p-2 rounded">
                                <div>
                                    <button class="btn btn-default btn-sm">
                                        <img style="max-height: 38px" src="{{ asset('assets/img/avatar-user.png') }}" class="img-circle">
                                        <small>{{ $comment->user->name }}</small>
                                    </button>
                                </div>
                                <div class="mt-auto pl-2">
                                    <p>{!! $comment->content !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection

