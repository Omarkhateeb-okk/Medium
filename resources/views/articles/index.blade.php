@extends('layouts.app')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
            <h2 class="text-muted">Welcome to our blog</h2>

    <a  class="btn" href="{{ view('articles.dash') }}  ">dashboard</a>
            <hr>
        </div>
        <div class="row">

                        @forelse ($articles as $article)
                <div class="col-md-8">
                    <div class="panel blog-container">
                        <div class="panel-body">
                            <div class="image-wrapper">
                                <a class="image-wrapper image-zoom cboxElement" href="#">
                                    <img src="{{ asset($article->getFirstMediaUrl('main_images'))}}" class="img" alt="Photo of Blog">
                                    <div class="image-overlay"></div>
                                </a>
                            </div>

                            <h4>{{ $article->title }}</h4>
                            <small class="text-muted">By <a href="#"><strong> {{ $article->author->name }}</strong></a> |  {{$article->created_at}}</small>

                            <p class="m-top-sm m-bottom-sm">

                            </p>
                            <a href={{ route('articles.destroy', $article->id) }}><i class="fa fa-angle-double-right"></i> Continue reading</a>
                            <a href={{ route('articles.edit', $article->id) }}><i class="fa fa-angle-double-right"></i> Continue reading</a>
                            <a href={{ route('articles.show', $article->id) }}><i class="fa fa-angle-double-right"></i> Continue reading</a>

                </span>
                        </div>
                    </div>
                        @empty
                            No articles yet.
                        @endforelse

{{--                I was trying something      {{ $articles->links() }}--}}

                </div>
        </div>
    </div>
    <div class="col-md-4">
        @include('articles.sidebar')
    </div>

    <style>
        .btn {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #005f95;
            color: #000000;
            padding: 4px 7px 4px 7px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
             }
        .img {
            height: 90px; width: auto;
        }

    </style>
@endsection
