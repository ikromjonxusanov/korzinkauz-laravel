@extends('base')


@section('content')
    <div class="container">
        <div class="jumbotron bg-danger mt-5">
            <h1 class="text-center text-white">This is Category page</h1>
        </div>
        <a href="{{ route("category.create") }}" class="btn btn-success mb-4">+ add category</a>
        @if(count($categorys) !== 0)
            <table class="table table-bordered table-sm">
                <tr class="bg-danger text-white">
                    <th>#</th>
                    <th>name</th>
                    <th>description</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                @foreach($categorys as $category)
                    <tr style="background-color: #cecece">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="{{route('category.show', ['category'=>$category->id])}}" class="text-primary">{{$category->name}}</a>
                        </td>
                        <td>{{$category->description}}</td>
                        <th><a href="{{route('category.edit', ['category'=>$category->id])}}" class="text-info">update</a></th>
                        <th><a href="#" class="text-danger">delete</a></th>
                    </tr>
                @endforeach
            </table>
            {{$categorys->links('pagination::bootstrap-4')}}
        @endif
    </div>
@stop
