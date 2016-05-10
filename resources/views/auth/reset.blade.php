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

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="" value="{{ old('email') }}">

    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

    <label for="password_confirmation" class="sr-only">Password confirmation</label>
    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Password confirmation" required="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
</form>
@endsection
