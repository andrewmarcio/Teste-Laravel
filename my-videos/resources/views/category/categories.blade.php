@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">My Categories</li>
        </ol>
    </nav>
    <div class="row justify-content-center">

        @foreach($listCategoryVideos as $categoryVideo)

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header"><a href="{{ route('category.videos', ['categoryId' => $categoryVideo->id]) }}">
                        {{ $categoryVideo->name   }}</a></div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection