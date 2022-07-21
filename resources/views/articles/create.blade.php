@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new article</div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            Article title*:
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                            <br />

                            Article text*:
                            <textarea name="description" class="form-control" rows="10"> {{ old('description') }}</textarea>
                            <br />

{{--                           to tell user how to write tags  --}}
                            Tags (comma-separated):
                            <input type="text" name="tags" class="form-control" />
                            <br />

                            Main image:
                            <br />
                            <input type="file" name="main_image" />
                            <br />
                            gallery images:
                            <br />
                            <input type="file" name="gallery_images" />
                            <br/>
                            <br/>
                            <input type="submit" value=" Save article " class="btn btn-primary" />
                            <br/>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
