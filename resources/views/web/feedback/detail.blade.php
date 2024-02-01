@extends('web.layout.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-comment-alt"></i> Feedback details</h3>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <h6><strong>Title:</strong> {{ $feedback->title }}</h6>
                            <h6><i class="fas fa-user"></i> Author: <strong class="text-info">{{$feedback->user->name ?? ''}}</strong></h6>
                        </div>
                    </div>
                    <div class="">
                        <strong>Category: {{$feedback->category}}</strong>
                    </div>
                    <div class="mt-3">
                        <strong>Description</strong> <br>
                        <p>{{ $feedback->description }}</p>
                    </div>
                </div>

                @if($feedback->comments)
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h5>Comments</h5>
                    </div>
                    @foreach ($feedback->comments as $comment)
                        <div class="d-flex bg-white p-2 rounded">
                            <div class="">
                                <button class="btn btn-default btn-sm d-flex">
                                    <img style="max-height: 38px" src="{{ asset('assets/img/avatar-user.png') }}" class="img-circle">
                                    <div class="d-flex flex-column">
                                        <small>{{ $comment->user->name }}</small>       
                                        <small class="text-info">{{ \Carbon\Carbon::parse($comment->date)->format('D m Y')}}</small>
                                    </div>
                                </button>
                            </div>
                            <div class="mt-auto pl-2">
                                <p>{!! $comment->content !!}</p>
                            </div>
                        </div>
                        {{-- <div class="d-flex bg-white p-2 rounded">
                            <div>
                                <button class="btn btn-default btn-sm">
                                    <img style="max-height: 38px" src="{{ asset('assets/img/avatar-user.png') }}" class="img-circle">
                                    <small>{{ $comment->user->name }}</small>
                                </button>
                            </div>
                            <div class="mt-auto pl-2">
                                <p>{!! $comment->content !!}</p>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
                @endif
                <div class="p-2">
                    <a href="{{route('web.feedback.comment.create', $feedback)}}" class="btn btn-sm btn-info float-right">Add Comment</a>
                </div>
            </div>
        </div>
    </div>
@endsection
