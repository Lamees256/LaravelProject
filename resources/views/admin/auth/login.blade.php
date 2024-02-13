@extends('admin.layouts.app')

@section('content')

<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
  
      <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
        @csrf
        <div class="form-group has-feedback @error('email') has-error @enderror">
          <input type="email" class="form-control" name="email" placeholder="Email" >
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
          <span class="help-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group has-feedback @error('password') has-error @enderror">
          <input type="password" class="form-control" name="password" placeholder="Password" >
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @error('password')
          <span class="help-block" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  

  
      <a href="#">I forgot my password</a><br>
      
  
    </div>
    <!-- /.login-box-body -->
  </div>



@endsection
