@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="title float-left"><i class="fas fa-star"></i> Category x</div>
                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body collapse" id="collapseExample">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">
                                    titulo
                                </div>
                                <div class="card-body">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/YOa4DsgVJOA"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection