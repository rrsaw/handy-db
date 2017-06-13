@extends('layouts.app')

@section('content')
  <div class="backgroundLogin">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-10 col-md-offset-4 col-sm-offset-1">
            <div class="popup">
                <div class="row">
                  <div class="popup-heading text-center">
                    <a class="inactive" href="/login">Log in</a>
                    <a class="active" href="#">Register</a>
                  </div>
                </div>
                <div class="popup-body">
                    <form role="form" method="POST" action="{{ route('secondStep') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                            <div class="popup-image text-center">
                              <div class="personal-image {{ $errors->has('image') ? ' has-error' : '' }}">
                                  <img src="{{ asset("images/personal-images/".session('image')."") }}" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="{{ $errors->has('street') ? ' has-error' : '' }}">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="street" type="text" class="input" pattern=".+" name="street" value="{{ old('street') }}" required>
                                <label class="label" for="street">Street</label>

                                @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('civic') ? ' has-error' : '' }}">
                            <div class="col-lg-2 col-md-2 col-sm-2 input-container">
                                <input id="civic" type="number" class="input" pattern=".+" name="civic" value="{{ old('civic') }}" required>
                                <label class="label" for="civic">Civic</label>

                                @if ($errors->has('civic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('civic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('city') ? ' has-error' : '' }}">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="city" type="text" class="input" pattern=".+" name="city" value="{{ old('city') }}" required>
                                <label class="label" for="city">City</label>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('country') ? ' has-error' : '' }}">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="country" type="text" class="input" pattern=".+" name="country" value="{{ old('country') }}" required>
                                <label class="label" for="country">Country</label>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="password" type="password" class="input" pattern=".+" name="password" value="{{ old('password') }}" required>
                                <label class="label" for="password">Password</label>
                                <div class="visibility-password">
                                  <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                        @if (session('status'))
                            <span class="error-block">
                                <strong>{{ session('status') }}</strong>
                            </span>
                        @endif
                      </div>

                        <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                            <button type="submit" class="blueButton">
                              Done
                            </button>
                        </div>

                    </form>
                </div>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
