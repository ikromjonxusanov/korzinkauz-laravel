
@extends('base')
@section('content')
    <div class="jumbotron bg-danger my-5 text-white">
        <h1 class="text-center">Create Product page</h1>
        <form method="post" action="{{route("product.update", ['product'=>$product])}}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="id_name">Product name</label>
                <input type="text" class="form-control" name="name" id="id_name" placeholder="Product name" value="{{ $product->name  }}">
                @error('name')
                <small class="text-white">
                    <b>
                        {{ $message }}
                    </b>
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_description">Product description</label>
                <input type="text" class="form-control" name="description" id="id_description" placeholder="Product description" value="{{$product->description}}">
                @error('description')
                <small class="text-white">
                    <b>
                        {{ $message }}
                    </b>
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_price">Product price</label>
                <input type="text" class="form-control" name="price" id="id_price" placeholder="Product price" value="{{$product->price}}">
                @error('price')
                <small class="text-white">
                    <b>
                        {{ $message }}
                    </b>
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="id_category">Example select</label>
                <select class="form-control" id="id_category" name="category_id">
                    <option value="">---</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}"
                        @if ($category->id === $product->category_id)
                            selected
                        @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <small class="text-white">
                    <b>
                        {{ $message }}
                    </b>
                </small>
                @enderror
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="id_status" value="1" name="status"
                @if ($product->status)
                    checked
                @endif
                >
                <label class="form-check-label" for="id_status">Product status</label>
            </div>
            <button type="submit" class="btn btn-light text-danger"><b>Submit</b></button>
        </form>
    </div>
@endsection
