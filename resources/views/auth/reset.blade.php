@extends('layouts.master')

@section('head_extra_styles')
    body {
    padding-bottom: 40px;
    background-color: #eee;
    }

    .form-reset {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }
    .form-reset .form-reset-heading,
    .form-reset .checkbox {
    margin-bottom: 10px;
    }
    .form-reset .checkbox {
    font-weight: normal;
    }
    .form-reset .form-control {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
    }
    .form-reset .form-control:focus {
    z-index: 2;
    }
    .form-reset input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }
@endsection
@section('content')
<form method="POST" action="{{ route('public.postReset') }}" class="form-reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email" class="sr-only">{{ trans('forms.field.email') }}</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="{{ trans('forms.field.email') }}" required="" autofocus="" value="{{ old('email') }}">

    <label for="password" class="sr-only">{{ trans('forms.field.password') }}</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('forms.field.password') }}" required="">

    <label for="password_confirmation" class="sr-only">{{ trans('forms.field.password_confirmation') }}</label>
    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="{{ trans('forms.field.password_confirmation') }}" required="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('forms.actions.reset_password') }}</button>
</form>
@endsection
