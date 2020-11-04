@extends('layouts.app')

@section('content')
<div class="register-box">
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
          <div class="input-group mb-3">
            <input  id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="Firstname">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            
            @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
            <div class="input-group mb-3">
              <input  id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Lastname">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
              
            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="input-group mb-3">
              <input  id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autofocus placeholder="Middlename">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
            </div>
            
            @error('middlename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input  id="employee_code" type="text" class="form-control @error('employee_code') is-invalid @enderror" name="employee_code" value="{{ old('employee_code') }}" required autofocus placeholder="Employee Code">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fa fa-briefcase"></span>
              </div>
            </div>
            
            @error('employee_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          <div class="input-group mb-3">
            <input  id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autofocus placeholder="Contact Number">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
          </div>
          
          @error('contact_number')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
          <div class="input-group mb-3">
            <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" required name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <br>
        <a href="/login" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  
@endsection