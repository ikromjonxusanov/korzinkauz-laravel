@extends('base')

@section('content')
    <?php
    use \Illuminate\Support\Facades\Auth;
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-danger text-white my-5">
                <div class="card-header border-white">Dashboard</div>

                <div class="card-body">
                    This is home page
                    @if (Auth::user())
                        {{Auth::user()['name']}}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
