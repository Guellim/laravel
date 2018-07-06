@extends('layouts.app')
@section('content')
    <h1>Simple Laravel CRUD Ajax</h1>
    <div class=" table-responsive">
        @if ($message = Session::get('status'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div id="hello-world">
            @include('post.posts')
        </div>
    </div>



    <!-- Modal add post -->
    <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                     @include('post.post')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection