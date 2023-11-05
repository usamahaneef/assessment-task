@extends('web.layout.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-comment-alt"></i> Feedbacks</h3>
                    <div class="card-tools">
                        <a href="{{route('web.feedback.create')}}" class="btn btn-info">Submit Feedback</a>
                    </div>
                </div>
                <div class="card-body pt-0">    
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-borderless">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $key => $feedback)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$feedback->title}}</td>
                                        <td><small>{{$feedback->description}}</small></td>
                                        <td>
                                            <a title="View details" href="{{route('web.feedback.detail',$feedback->id)}}" class="btn btn-secondary btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
