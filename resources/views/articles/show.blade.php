@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ $article->title }}</h1></div>

                    <div class="card-body">

                        <p>
                            <img src="{{ asset($article->getFirstMediaUrl('main_images'))}}" style="height: 200px; width: auto;" />
                        </p>
{{--                        //$article->getFirstMediaUrl('main_images--}}
                        <p>
                            <img src="{{ asset($article->getFirstMediaUrl('gallery_images'))}}" style="height: 25px; width: auto;" />
                        </p>
                        <p>
                            <b>Author:</b> {{ $article->author->name }}
                        </p>
                        <p>
                            <b>Tags:</b>
                            @foreach($article->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                        </p>
                        <b>Description:</b>
                        <p>{!! nl2br($article->description) !!}</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('articles.sidebar')
            </div>
        </div>
    </div>

@endsection
