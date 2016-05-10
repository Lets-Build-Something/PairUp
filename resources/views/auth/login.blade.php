@extends('layouts.master')

@section('head_extra_styles')
    body {
    padding-bottom: 40px;
    background-color: #eee;
    }

    .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
    margin-bottom: 10px;
    }
    .form-signin .checkbox {
    font-weight: normal;
    }
    .form-signin .form-control {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
    }
    .form-signin .form-control:focus {
    z-index: 2;
    }
    .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    }
@endsection
@section('content')
    <form method="POST" action="{{ route('public.postLogin') }}" class="form-signin">
        {!! csrf_field() !!}
        <h2 class="form-signin-heading">{{ trans('forms.headers.login') }}</h2>
        <label for="inputEmail" class="sr-only">{{ trans('forms.field.email') }}</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="{{ trans('forms.field.email') }}" required="" autofocus="" value="{{ old('email') }}">

        <label for="password" class="sr-only">{{ trans('forms.field.password') }}</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('forms.field.password') }}" required="">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('forms.actions.login') }}</button>
        <div>
            <a href="{{ route('public.getEmail') }}">Lost Password?</a>
            <a href="{{ route('public.getRegister') }}">{{ trans('forms.actions.register') }}</a>
        </div>
    </form>
@endsection
