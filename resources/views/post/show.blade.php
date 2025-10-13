@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>show Data Post</legend>
                
                <div class="mb-3">
                    <label for="">title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->tittle}}" disable>
                </div>
                <div class="mb-3">
                    <label for="">content</label>
                    <textarea name="content" class="form-control" disable> {{$post->content}} </textarea>
                </div>
                <div class="mb3">
                    <button type="submit" class="btn btn-success">simpan</button>
                </div>
            </fieldset>
        </div>
    </div>
</div>
@endsection