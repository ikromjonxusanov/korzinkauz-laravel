@extends('base')

@section('content')
    <div class="container">
        <div class="jumbotron bg-danger mt-5">
            <h1 class="text-center text-white">This is Product page</h1>
        </div>
        <a href="{{ route("product.create") }}" class="btn btn-success mb-4">+ add product</a>
        @if(count($products) !== 0)
            <table class="table table-bordered table-sm">
                <tr class="bg-danger text-white">
                    <th>#</th>
                    <th>name</th>
                    <th>description</th>
                    <th>status</th>
                    <th>price</th>
                    <th>category</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                @foreach($products as $product)
                    <tr style="background-color: #cecece">
                        <td>{{$loop->index+1}}</td>
                        <td><a href="{{route('product.show', ['product'=>$product->id])}}" class="text-primary">{{$product->name}}</a></td>
                        <td>{{$product->description}}</td>
                        <td>
                            @if ($product->status === 1)
                                True
                            @else
                                False
                            @endif
                        </td>
                        <td>{{$product->price}}</td>
                        <td>
                            <?php
                            $count = 0;
                            ?>
                            @foreach($categorys as $category)

                                @if ($category->id === $product->category_id)
                                    {{$category->name}}
                                    <?php $count = 1;?>
                                @endif
                            @endforeach
                            <?php if ($count === 0) {echo "Null";}?>
                        </td>
                        <th><a href="{{route('product.edit', ['product'=>$product->id])}}" class="text-info">update</a></th>
                        <th>
                            <form method="post" action="{{route("product.destroy", ['product'=>$product])}}">
                                @method("DELETE")
                                @csrf
                                <button class="btn">DELETE</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
            {{$products->links('pagination::bootstrap-4')}}
        @endif

    </div>
@stop
