@extends('base')


@section('content')
<div class="container">
    <div class="jumbotron bg-danger mt-5 text-light">
        <h1>This is category detail page</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h1 class="card-title text-center">{{$category->name}}</h1>

                    <p class="card-text">{{$category->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            @if(count($products) !== 0)
                <table class="table table-bordered table-sm">
                    <tr class="bg-danger text-white">
                        <th>#</th>
                        <th>name</th>
                        <th>description</th>
                        <th>status</th>
                        <th>price</th>
                    </tr>

                    @foreach($products as $product)
                        <tr style="background-color: #cecece">
                            <td>{{$loop->index+1}}</td>
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

                        </tr>
                    @endforeach
                </table>
                {{$products->links('pagination::bootstrap-4')}}

            @else
                <div class="alert alert-danger">
                    Not found products
                </div>
            @endif

        </div>
    </div>
</div>
@stop
