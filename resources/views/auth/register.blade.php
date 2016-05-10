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
    <form method="POST" action="{{ route('public.postRegister') }}" class="form-signin">
        {!! csrf_field() !!}
        @if ($errors->count())
            <p>
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </p>
        @endif

        <h2 class="form-signin-heading">{{ trans('forms.headers.register') }}</h2>
        <label for="inputEmail" class="sr-only">{{ trans('forms.field.email') }}</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="{{ trans('forms.field.email') }}" required="" autofocus="" value="{{ old('email') }}">

        <label for="password" class="sr-only">{{ trans('forms.field.password') }}</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('forms.field.password') }}" required="">

        <label for="password_confirmation" class="sr-only">{{ trans('forms.field.password_confirmation') }}</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ trans('forms.field.password_confirmation') }}" required="">

        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('forms.actions.register') }}</button>
        <div>
            <a href="{{ route('public.getLogin') }}">{{ trans('forms.actions.login') }}</a>
        </div>
    </form>
@endsection
