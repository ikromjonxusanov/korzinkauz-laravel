@extends('base')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>N</th>
            <th>image</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>rule</th>
            <th width="280px">Action</th>
        </tr>
        @if (count($users) !== 0 )
            @foreach ($users as $user)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><img src="/image/{{ $user->image }}" width="100px"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
{{--{{$user->links('pagination::bootstrap-4')}}--}}

@stop
