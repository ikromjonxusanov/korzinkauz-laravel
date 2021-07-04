@extends('base')


@section('content')
    <div class="container mt-3">
        <a href="{{route('product.index')}}" class="btn btn-outline-danger"> <- Back</a>
        <div class="jumbotron bg-danger mt-3">
            <h1 class="text-center text-white">This is Product detail page</h1>
        </div>
        <h4 class="text-center">
            {{$product->name}}
        </h4>
        <table class="table table-bordered table-sm">

            <tr class="bg-danger text-light">
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
                <tr style="background-color: #cecece">
                    <td>{{$product->name}}</td>
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

                </tr>
        </table>

    </div>
@stop
