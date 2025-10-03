@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
<fieldset>
        <legend>data post</legend>
        <a href="{{route('post.create')}}" class="btn btn-sm btn-primary" style="align:float-right">
            tambah data
        </a>
        <div class="table-responsive py-2">
        <table class="table" border="1">
            <tr>
                <th>no</th>
                <th>title</th>
                <th>content</th>
                <th>action</th>
            </tr>
            @foreach ($post as $data)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$data->title}}</th>
                <th>{{Str::limit($data->content,100)}}</th>
                <th>
                    <form action="{{route('post.delete',$data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                      <a href="{{route('post.edit',$data->id)}}" class="btn btn-sm btn-success">
                        edit
                    </a> |
                    <button type="submit" onclick="return confirm('apakah anda yakin')"  class="btn  btn-sm btn-danger">delete</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>
        </div>
    </fieldset>
        </div>
    </div>
</div>
    
@endsection