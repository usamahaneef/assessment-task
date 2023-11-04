@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card elevation-0">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Students</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body pt-0">    
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-borderless">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                <a href="mailto:{{ $user->email }}" class="badge badge-info">{{ $user->email }}</a>
                                            </td>
                                            <td>
                                                <button type="button" data-target="#modal-{{ $user->id }}"
                                                    data-toggle="modal" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <div id="modal-{{ $user->id }}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Record</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do you really wish to delete this record?</p>
                                                                <p style="color: red">Please note that this will permanently
                                                                    delete the record.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{route('admin.user.delete' , $user)}}"
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

