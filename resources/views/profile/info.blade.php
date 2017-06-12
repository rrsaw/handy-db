@extends('profile.main')

@section('info')

  @section('infoProfile','active')

    <div class="row">
      <div class="col-md-5 col-sm-9">
        <div class="reviewsProfile">
          <div class="col-md-6 col-sm-6">
            <div class="text-left">
              <h6>Name</h6>
              <h6>Surname</h6>
              <h6>E-mail</h6>
              <h6>Date of birthday</h6>
              <h6>Phone number</h6>
              @if ($url == "profile/info")
                <h6>Password</h6>
              @endif
            </div>
          </div>
          <div class="col-md-6 col-sm-3">
            <div class="text-right ">
              <h6>{{$user->name}}</h6>
              <h6>{{$user->surname}}</h6>
              <h6>{{$user->email}}</h6>
              <h6>{{$user->birth_date}}</h6>
              <h6>{{$user->phone_number}}</h6>
              @if ($url == "profile/info")
                <h6>{{$user->password}}</h6>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
