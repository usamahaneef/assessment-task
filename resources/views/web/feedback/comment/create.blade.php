@extends('web.layout.app')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="card pb-3">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-comment-alt"></i> Feedback details</h3>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <h6><strong>Title:</strong> {{ $feedback->title }}</h6>
                            <h6>By: <strong class="text-info">{{$feedback->user->name ?? ''}}</strong></h6>
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
                        <a href="{{route('web.feedback.vote' ,$feedback)}}" class="btn btn-info"><i></i>Vote {{ $feedback->votes_count }}</a>
                    </div>
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

                <form action="" method="POST">
                    @csrf
                    <div class="p-3">
                        <div class="">
                            <div class="form-group">
                                <textarea class="form-control editor" rows="5" id="" name="content"
                                          placeholder="">{{old('content')}}</textarea>
                                @error('content')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('content')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-info float-right" >Save Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('.editor');

    // Function to search users (to be implemented)
    function searchUsers(term) {
        // This should make a request to the server and return a promise with the search results
        // For now, we will just simulate it with a timeout
        return new Promise((resolve) => {
            setTimeout(() => resolve(['user1', 'user2', 'user3'].filter(u => u.includes(term))), 500);
        });
    }

    // Function to insert the chosen username
    function insertUsername(username) {
        const cursorPos = textarea.selectionStart;
        const textBefore = textarea.value.substring(0, cursorPos);
        const textAfter  = textarea.value.substring(cursorPos);
        const lastAt = textBefore.lastIndexOf('@');
        
        textarea.value = textBefore.substring(0, lastAt) + '@' + username + ' ' + textAfter;
        textarea.focus();
    }

    // Event listener for keyup in textarea
    textarea.addEventListener('keyup', (e) => {
        const text = e.target.value;
        const cursorPos = e.target.selectionStart;
        const textBeforeCursor = text.substring(0, cursorPos);
        const lastAtPos = textBeforeCursor.lastIndexOf("@");

        if (lastAtPos !== -1 && (textBeforeCursor.length === lastAtPos + 1 || textBeforeCursor[lastAtPos + 1].match(/\s/))) {
            const searchTerm = textBeforeCursor.substring(lastAtPos + 1);
            searchUsers(searchTerm).then(users => {
                // Show user suggestions and allow the user to select one
                // This will require additional UI and event handling
            });
        }
    });
});

    </script>
@endpush
