@extends('layouts.app')


@section('content')
    <div>
        <a class="btn btn-dark mt-2" href="{{ route('pcreate') }}">Create Post</a>
    </div>
    @if (session('status'))
        <div class="alert  alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="d-flex flex-wrap justify-content-center ">
        @foreach ($posts as $post)
            <div class="card  m-4 col-4">
                <a href="{{ route('pshow', $post) }}" style="text-decoration: none; color: black ">
                    <div class="card-body">
                        <div class="d-flex justify-content-center ">
                            <div class="btn btn-dark mb-2 ">
                                <h6 class="card-title"> {{ $post->title }} </h6>
                            </div>
                        </div>
                        {{ $post->id }}
                        <p class="card-text">Afficher plus...</p>
                        <div>
                            <b>Signature</b>
                            <div class="float-end">
                                <h6>{{ $post->signature }}</h6>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
