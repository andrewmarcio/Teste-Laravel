@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Videos</li>
        </ol>
    </nav>

    <div class="row justify-content-center" id="list-videos">
        <div class="col-md-7">
            <div class="card m-2">
                <div class="card-body">
                    <h4 class="card-title"><a href=""></a>{{$video->title}}</h4>
                    <iframe style="width: 100%; height:315px"
                        src="https://www.youtube.com/embed/{{substr($video->url, 17)}}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <!-- <a href="#" class="btn btn-primary">Show comments</a> -->
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card m-2">
                <div class="card-body">
                    <form action="{{route('comment.store', ['videoId' => $video->id ])}}" method="post">
                        @csrf
                        <h5 class="card-title">Add comment</h5>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">comment</button>
                    </form>
                </div>
                <div class="container">
                    <h5 class="card-title">comments</h5>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($comments as $comment)

                            <div class="p-0 mb-3">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 m-auto">
                                        <strong>{{$comment->username}} - {{$comment->created_at}}</strong>
                                    </div>
                                    <div class="col-sm-12">{{$comment->comment}}</div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection