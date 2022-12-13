
@extends("Admin.AdminLayout.app")
@section('title', 'Blog Comment')


@section('content')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">

<div class="content-page">
    <div class="content">

        <div class="container-fluid">

            <!-- breadcrum-->
            <x-AdminComps.adminBreadcrum
                pageTitle="Blog Comment"
                urlTitle="Blog"
                url="{{ route('adminblogView') }}"
            />

            {{-- //success message --}}
            <x-GuestComps.successMessage/>


            <div class="row">
                <div class="col-lg-7">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Comments</h5>

                        @if (count($blog->comments) > 0)
                            @foreach ($blog->comments as $comment)
                            <div class="eachComment mb-4">
                                <div class="commBody">
                                    <div class="d-flex justify-content-start mb-2">
                                        <div class="imgSide">
                                            <span>{{ ucwords(Str::substr($comment->first_name, 0, 1)) }}{{ Str::substr($comment->last_name, 0, 1) }}</span>
                                        </div>
                                        <div class="ml-2">
                                            <h5 class="mb-0 mt-0">{{ $comment->first_name }} {{ $comment->last_name }} </h5>
                                            <p class="text-muted mb-0">
                                                {{ date('M d, Y', strtotime($comment->created_at)) }}
                                                <a href="{{ route('editCommentView', $comment->id) }}" class="badge badge-success pointer ml-2">Edit</a>
                                                <a href="#commentForm" onclick="deleteThis({{ $comment->id }})" class="badge badge-danger pointer ml-2">Delete</a>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mb-0">{{ $comment->comment }}</p>

                                    {{-- REPLY --}}
                                    @if($comment->replies)
                                    @foreach ($comment->replies as $replyOne)

                                    <div class="replies mt-4">
                                        <h6 class="mb-1">REPLIES</h6>
                                        <div class="eachComment d-flex justify-content-start">
                                            <div class="commBody" style="background: #f8f8f8">
                                                <div class="d-flex justify-content-start mb-2">
                                                    <div class="imgSide">
                                                        <span>{{ ucwords(Str::substr($replyOne->first_name, 0, 1)) }}{{ Str::substr($replyOne->last_name, 0, 1) }}</span>
                                                    </div>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0 mt-0">{{ $replyOne->first_name }} {{ $replyOne->last_name }} </h5>
                                                        <p class="text-muted mb-0">
                                                            {{ date('M d, Y', strtotime($replyOne->created_at)) }}
                                                            <a href="{{ route('editCommentView', $replyOne->id) }}" class="badge badge-success pointer ml-2">Edit</a>
                                                            <a href="#commentForm" onclick="deleteThis({{ $replyOne->id }})" class="badge badge-danger pointer ml-2">Delete</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <p class="mb-0">{{ $replyOne->comment }}</p>

                                                {{-- REPLY --}}
                                                @if($replyOne->replies)
                                                @foreach ($replyOne->replies as $replyTwo)
                                                <div class="replies mt-4">
                                                    <h6 class="mb-1">REPLIES</h6>
                                                    <div class="eachComment d-flex justify-content-start">
                                                        <div class="commBody" style="background: #fff">
                                                            <div class="d-flex justify-content-start mb-2">
                                                                <div class="imgSide">
                                                                    <span>{{ ucwords(Str::substr($replyTwo->first_name, 0, 1)) }}{{ Str::substr($replyTwo->last_name, 0, 1) }}</span>
                                                                </div>
                                                                <div class="ml-2">
                                                                    <h5 class="mb-0 mt-0">{{ $replyTwo->first_name }} {{ $replyTwo->last_name }} </h5>
                                                                    <p class="text-muted mb-0">
                                                                        {{ date('M d, Y', strtotime($replyTwo->created_at)) }}
                                                                        <a href="{{ route('editCommentView', $replyTwo->id) }}" class="badge badge-success pointer ml-2">Edit</a>
                                                                        <a href="#commentForm" onclick="deleteThis({{ $replyTwo->id }})" class="badge badge-danger pointer ml-2">Delete</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">{{ $replyTwo->comment }}</p>
                                                            <div class="replies">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                    @endif

                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No Comments</p>
                        @endif
                    </div>
                </div>

                @if ($comm)
                <div class="col-lg-5">
                    <div class="card-box">
                        <h5 class="text-uppercase mt-0 mb-1 bg-light p-2 mb-4">Edit Comment</h5>

                        <form action="{{ route('updateThiscomment') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="{{ $comm->first_name }}" name="first_name">
                                <input type="hidden" class="form-control" value="{{ $comm->id }}" name="id">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="{{ $comm->last_name }}" name="last_name">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @if ($comm->status == 1) selected @endif value="1">Active</option>
                                    <option @if ($comm->status == 0) selected @endif value="0">Pending</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input" @if ($comm->anonymous == 1) checked @endif name="anonymous" value="1" id="anonymous">
                                    <label for="anonymous" class="custom-control-label">Anonymous</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Comment</label>
                                <textarea name="comment" class="form-control" rows="5">{{ $comm->comment }}</textarea>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">UPDATE COMMENT</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

            </div>




        </div>

    </div>
</div>


{{-- DELETE MODAL --}}
<!-- The Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Warning</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center">
                <p>Are you sure you want to delete this comment?</p>
                <form method="post" action="{{ route('deleteComment') }}">
                    @csrf
                    <input type="hidden" name="dleteID" id="commID">

                    <button class="btn btn-danger btn-sm mr-3">YES</button>
                    <button type="button" class="btn btn-success btn-sm ml-3" data-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function deleteThis($id){
        $('#deleteModal').modal();
        document.getElementById('commID').value = $id;
    }
</script>
@endsection
