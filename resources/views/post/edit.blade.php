@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Edit Data Post</legend>
                <form action="{{route('post.update',$post->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->tittle}}" required>
                </div>
                <div class="mb-3">
                    <label for="">content</label>
                    <textarea name="content" class="form-control" required> {{$post->content}} </textarea>
                </div>
                <div class="mb3">
                    <button type="submit" class="btn btn-success">simpan</button>
                </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
@endsection