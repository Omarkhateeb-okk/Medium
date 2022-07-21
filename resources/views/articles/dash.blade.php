@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Newest articles <span> <a  class="btn" href="{{ route('articles.create') }}  ">add article</a></span></div>

                    <div class="card-body">

                        @forelse ($articles as $article)
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset($article->getFirstMediaUrl('main_images'))}}" class="img" />
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ route('articles.show', $article->id) }}"><h2>{{ $article->title }}</h2></a>
                                    <span>
                                         <a href="{{ route('articles.show', $article->id) }}
                                    </span>
                                    <p>
                                        <b>Author:</b> {{ $article->author->name }}
                                    </p>
                                    <p>
                                        <b>Tags:</b>
                                        @foreach($article->tags as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                        {!! $article->tags_links !!}
                                    </p>
                                    <p>{{ substr($article->article_text, 0, 200) }}...
                                        <a href="{{ route('articles.show', $article->id) }}">Read full article</a></p>
                                </div>
                            </div>
                            <hr />
                        @empty
                            No articles yet.
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('articles.sidebar')
            </div>
        </div>
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
