@extends('base')
@section('content')
    <div class="jumbotron bg-danger my-5 text-white">
        <h1 class="text-center">Update Category page</h1>
        <h3>Update {{$category->name}}</h3>
        <form method="post" action="{{route("category.update", ['category'=>$category->id])}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_name">Category name</label>
                <input type="text" class="form-control" value="{{$category->name}}" name="name" id="id_name" placeholder="Category name">
                @error('name')
                <small class="text-white">
                    <b>
                        {{ $message }}
                    </b>
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_description">Category description</label>
                <input type="text" class="form-control"  value="{{$category->description}}" name="description" id="id_description" placeholder="Category description">
                @error('description')
                <small class="text-white">
                    <b>
                        {{ $message }}
                    </b>
                </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-light text-danger"><b>Submit</b></button>
        </form>
    </div>
@endsection

