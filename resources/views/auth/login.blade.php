@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="col-lg-8 mr-auto ml-auto" style="background-color: #fff; color: #000; margin-top:20px;padding: 10px;">
            <div class="col-lg-12">
                <h3>Login<hr></h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    @if(session('status'))
                        <div class="col-lg-12 text-danger">{{ session('status') }}</div>
                    @endif

                    <div class="form-group">
                        <label for="control-label"><b>Email</b></label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <span class="text-danger">{{ $message; }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="control-label"><b>Password</b></label>
                        <input type="password" class="form-control" name="password" value="" />
                        @error('password')
                            <span class="text-danger">{{ $message; }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember"  />
                        <label for="control-label"><b>Remember Me</b></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-xs" name="btnSubmit" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
