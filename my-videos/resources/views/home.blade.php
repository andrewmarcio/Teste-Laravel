@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Favorite Categories</li>
        </ol>
    </nav>
    <div class="row justify-content-center">

        @foreach($listFavoriteCategoryVideos as $favorite)

        <div class="col-sm-4">
            <div class="card w-100">
                <div class="card-header"><i class="fas fa-star"></i> <a href="{{ route('category.videos', ['categoryId' => $favorite->id]) }}"> {{ $favorite->name   }}</a></div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection