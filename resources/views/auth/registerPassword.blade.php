@extends('layouts.app')

@section('content')
  <div class="backgroundLogin">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-10 col-md-offset-4 col-sm-offset-1">
            <div class="popup">
              <div class="row">
                <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                  <div class="popup-image text-center">
                    <div class="personalImage">
                      <a href="javascript:void(0);">
                        <img src="{{ asset('img/defaultImage.png') }}" alt="">
                      </a>
                      <input type="file" name="image" class="add-personal-image"/>
                    </div>
                  </div>
                </div>
              </div>

                <div class="row">
                  <div class="popup-heading text-center">
                    <a class="inactive" href="/login">Sign in</a>
                    <a class="active" href="#">Register</a>
                  </div>
                </div>
                <div class="popup-body">
                    <form role="form" method="POST" action="{{ route('login') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="name" type="text" class="input" pattern=".+" name="name" value="{{ old('name') }}" required>
                                <label class="label" for="name">Name</label>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="surname" type="text" class="input" pattern=".+" name="surname" value="{{ old('surname') }}" required>
                                <label class="label" for="surname">Surname</label>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
                            <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="phoneNumber" type="number" class="" name="phoneNumber" required>
                                <label class="label" for="phoneNumber">Phone number</label>

                                @if ($errors->has('phoneNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 input-container">
                                <input id="birthday" type="date" name="birthday" min="1900-01-01" required>
                                <label class="label dateLabel" for="birthday">Birthday</label>

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                            <button type="submit" class="blueButton">
                              Next
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
