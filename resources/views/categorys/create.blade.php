@extends('base')
@section('content')
    <div class="jumbotron bg-danger my-5 text-white">
        <h1 class="text-center">Create Category page</h1>
        <form method="post" action="{{route("category.store")}}">
            @csrf

            <div class="form-group">
                <label for="id_name">Category name</label>
                <input type="text" class="form-control"  value="{{old('name')}}" name="name" id="id_name" placeholder="Category name">
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
                <input type="text" class="form-control" value="{{old('description')}}" name="description" id="id_description" placeholder="Category description">
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
