@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="col-lg-8 mr-auto ml-auto" style="background-color: #fff; color: #000; margin-top:20px;padding: 10px;">
            <div class="col-lg-12">
                <h3>Register<hr></h3>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="control-label"><b>Name</b></label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-danger">{{ $message; }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="control-label"><b>Username</b></label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" />
                        @error('username')
                            <span class="text-danger">{{ $message; }}</span>
                        @enderror
                    </div>
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
                        <label for="control-label"><b>Confirm Password</b></label>
                        <input type="password" class="form-control" name="password_confirmation" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-xs" name="btnSubmit" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
