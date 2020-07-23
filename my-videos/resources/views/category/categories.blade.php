@extends('layouts.app')

@section('active')
active
@endsection

@section('content')
<div class="container">

    <div class="row w-100">
        <div class="m-auto">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-success" data-toggle="modal" data-target="#add-video-modal">add category or video
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10" id="categories">
                    @foreach($categories as $category)
                    <div class="card mb-2">
                        <div class="card-header" data-toggle="collapse" href="#collapseExample{{$category->id}}"
                            role="button" aria-expanded="false" aria-controls="collapseExample">

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="title">{{$category->name}}</div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="float-right">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body collapse" id="collapseExample{{$category->id}}">
                            <div class="row">
                                @for($x = 1;$x <= 3; $x++) <div class="col-sm-4">
                                    <div class="media">
                                        <div class="mr-2">
                                            <div class="venobox video"
                                                style="background-image: url('https://img.youtube.com/vi/J7p4bzqLvCw/hqdefault.jpg');"
                                                data-vbtype="video" href="https://youtu.be/J7p4bzqLvCw">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <h5>titulo</h5>
                                                </li>
                                                <li class="list-group-item">
                                                    <h6>https://youtu.be/J7p4bzqLvCw</h6>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                            </div>
                            @endfor
                        </div>
                        <div class="row">
                            <div class="btn-group" role="group" aria-label="Exemplo básico">
                                <a href="#" class="btn btn-warning">Edit category</a>
                                <a href="#" class="btn btn-info">Show all videos</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

</div>

@include('category.modal.register')

@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {

    function videoPlayer(element) {
        video = element.venobox({
            framewidth: '720px', // default: ''
            frameheight: '400px', // default: ''
            // border: '10px', // default: '0'
            bgcolor: '#5dff5e', // default: '#fff'
            titleattr: 'data-title', // default: 'title'
            numeratio: true, // default: false
            infinigall: true, // default: false
            // share: ['facebook', 'twitter', 'download'] // default: []
        })

        return video
    }

})
</script>
@endsection