@extends('admin.layout.auth')

@section('meta')
    @include('layouts.meta')
@endsection

@section('title')
    SEND RESET PASSWORD LINK: Technical Test
@endsection

@section('head')
    @include('layouts.head')
@endsection

@section('theme')
    @include('layouts.theme')
@endsection

@section('header')
    @include('layouts.header')
@endsection

{{--@section('sidebar')--}}
{{--    @include('layouts.sidebar')--}}
{{--@endsection--}}

@section('content')


    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5" style="margin-top: 100pxpx;">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">RESET PASSWORD</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" class="rounded-circle" height="34" width="80">
                                            </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <br>
                                    <div class="alert alert-warning text-center mb-4" role="alert">
                                        Enter your Email and instructions will be sent to you!
                                    </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                                    {{ csrf_field() }}


                                    <div class="form-label {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="emai" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" autofocus placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <span class="alert-danger">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Send Password Reset Link</button>
                                            </div>
                                </form>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>





@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')
    @include('layouts.script')
@endsection


