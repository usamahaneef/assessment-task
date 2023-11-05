@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card elevation-0">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-comment-alt"></i> Feedbacks</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body pt-0">    
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-borderless">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Comment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($feedbacks as $key => $feedback)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$feedback->title}}</td>
                                            <td>
                                                @if($feedback->comment_status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.feedback.detail' ,$feedback)}}" class="btn btn-sm btn-success"> <i class="fas fa-bars"></i></a>
                                                <button type="button" data-target="#modal-{{ $feedback->id }}"
                                                    data-toggle="modal" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <div id="modal-{{ $feedback->id }}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Feedback</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do you really wish to delete this Feedback?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{route('admin.feedback.delete' , $feedback)}}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="btn btn-sm btn-default"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        </section>
    </div>
@endsection

