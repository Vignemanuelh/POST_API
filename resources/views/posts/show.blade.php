@extends('layouts.app')


@section('content')
    <div>
        <a class="btn btn-dark mt-2" href="{{ route('pindex') }}">Baack</a>
    </div>
    @if (session('status'))
    <div class="alert  alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="d-flex flex-wrap justify-content-center ">
            <div class="card  m-4 col-6">
                <div class="card-body">
                    <div>
                        <div class="btn btn-primary mb-2 ">
                            <h5 class="card-title"> {{ $post->title }} </h5>
                        </div>
                        <div class="float-end">
                            <a href="{{route('pedit',  $post->id)}} ">
                                <i class="fa-solid fa-pen" style="color: #8080ff;margin-right:10px">blue</i>
                            </a>
                            <a href="{{route('pdestroy',$post->id)}}">
                                <i class="fa-solid fa-trash" style="color: #ff0000;">red</i>
                            </a>
                        </div>
                    </div>

                    <p class="card-text">{{ $post->content }}</p>
                    <div>
                        <b>Signature</b>
                        <div class="float-end">
                            <h6>{{ $post->signature }}</h6>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
