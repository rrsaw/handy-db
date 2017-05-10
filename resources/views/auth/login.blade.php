@extends('layouts.app')

@section('content')
<div class="backgroundLogin">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-4 col-sm-10 col-md-offset-4 col-sm-offset-1">
              <div class="popup">
                  <div class="popup-heading text-center">
                    <a class="active" href="#">Sign in</a>
                    <a class="inactive" href="/register">Register</a>
                  </div>
                  <div class="popup-body">
                      <form role="form" method="POST" action="{{ route('login') }}" autocomplete="off">
                          {{ csrf_field() }}

                          <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                              <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                  <input id="email" type="email" class="input" pattern=".+" name="email" value="{{ old('email') }}" required>
                                  <label class="label" for="email">Email</label>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 input-container">
                                  <input id="password" type="password" class="" name="password" required>
                                  <label class="label" for="password">Password</label>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                              <button type="submit" class="blueButton">
                                Login
                              </button>
                          </div>

                          <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                              <div class="rememberMe">
                                  <label class="checkbox">
                                      <input type="checkbox" class="off-screen" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                      <span class="checkbox__visual">
                                        Remember Me
                                      </span>
                                  </label>
                              </div>
                          </div>

                          <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                            <hr>
                          </div>


                          <div class="text-center forgotPassword">
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                              </a>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
