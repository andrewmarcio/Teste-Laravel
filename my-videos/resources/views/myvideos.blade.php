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
        @if(!count($videos))
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong>Warning</strong></div>
            <div class="card-body">
                <p class="card-title">You do not have any videos assigned to this category.</p>
                <p class="card-text">navigate to the category screen where you can assign videos to this category.</p>
            </div>
        </div>
        @else
        @foreach($videos as $video)

        <div class="card m-2" style="width: 18rem;">
            <a class="video venobox" data-vbtype="video" href="{{ route('video.show', ['videoId' => $video->id ]) }}">
                <img class="card-img-top" src="https://img.youtube.com/vi/{{substr($video->url, 17)}}/hqdefault.jpg"
                    alt="Imagem de capa do card">
            </a>
            <div class="card-body">
                <h5 class="card-title"><a href=""></a>{{$video->title}}</h5>
                <!-- <a href="#" class="btn btn-primary">Show comments</a> -->
            </div>
        </div>

        @endforeach
        @endif
    </div>
</div>
@endsection