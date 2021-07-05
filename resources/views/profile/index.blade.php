@extends('base')
@section('body')

    <div style="background-color: #dfdfdf">

        <div class="container pt-5">
            @if ($message = Session::get('success'))
                <div class="my-3 alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card" style="border-color: silver">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="/image/{{$user->image}}/" alt="Admin" class="rounded"
                                         width="150">
                                    <div class="mt-3">
                                        <h4>{{$user->name}}</h4>
                                        <hr>
                                        @if (\Illuminate\Support\Facades\Auth::user() === $user)
                                        <a href="/profile/{{\Illuminate\Support\Facades\Auth::user()->id}}/edit/" class="btn btn-primary">Edit Profile</a>
                                        <hr>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3" style="border-color: silver">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->phone}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user->email}}
                                    </div>
                                </div>
                                <hr>
{{--                                {% if request.user == user %}--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <a href="{% url 'changeProfile' %}" class="w-75 btn btn-primary">{% trans "Change Profile" %}</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 mb-3">--}}
{{--                                        <a href="{% url 'changePassword' %}" class="w-75 btn btn-primary">{% trans "Change Password" %}</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                {% endif %}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
