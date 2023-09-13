@extends('layouts.app')

@section('content')
    <div class="btn btn-primary mt-2  col-12  ">
        <h4 class="fw-bold  text-center">POST</h4>
    </div>

    <form action="{{ route('pupdate', $post->id) }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="d-flex flex-column">
            <label for="title"><b>Title</b></label>
            <input type="text" name="title" value="{{$post->title}}" placeholder="Enter the title of  your post">
            @error('title')
                <div class="text-danger">{{ $message . '*' }}</div>
            @enderror
            <label for="content"><b>Content</b></label>
            <textarea name="content" cols="30" rows="10"  placeholder="Enter the content of your post ">{{$post->content}}</textarea>
            @error('content')
                <div class="text-danger">{{ $message . '*' }}</div>
            @enderror
            <label for="signature"><b>Signature</b></label>
            <input type="text" name="signature" value="{{$post->signature}}" placeholder="Enter the signature of  your post">
            @error('signature')
                <div class="text-danger">{{ $message . '*' }}</div>
            @enderror
            <input class="m-3 fw-bold btn btn-primary" type="submit" value="Submit">
        </div>

    </form>
@endsection
