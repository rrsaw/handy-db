@extends('layouts.main')

@section('exploreMenu','deactivate')
@section('itemsMenu','deactivate')
@section('userMenu','activate')

@section('mineProfilePage')
<main class="col-md-9 col-md-offset-2 col-sm-10 col-sm-offset-1">
  <h1 class="page-header">Profile</h1>
  <div class="row">
    <div class="placeholder">
      <div class="col-sm-3 col-md-2">
        <img src="{{ asset('images/personal-images/'.$user->profileImage->name) }}" alt="profile image" class="img-responsive profileImg">
      </div>
      <div class="col-sm-4 col-md-3">
        <h4 class="user">{{$user->name}} {{$user->surname}}</h4>
        <p class="place"><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i>&nbsp;{{$user->address->city}}</p>
        <section class="rating">
          <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
          <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
          <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
          <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
          <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
        </section>
      </div>
      <div class="col-md-1 col-md-offset-3 col-sm-2">
        <div class="text-center">
          <h5>{{$borrow}}</h5>
          <span>Borrowed</span>
        </div>
      </div>
      <div class="col-md-1 col-sm-1">
        <div class="text-center">
          <h5>{{$lend}}</h5>
          <span>Landed</span>
        </div>
      </div>
      <div class="col-md-1 col-sm-1">
        <div class="text-center">
          <h5>{{$review}}</h5>
          <span>Reviews</span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-9">
      <ul class="tabProfile">
        <li>
          <a class="buttonTabProfile" href="/profile">Items</a>
        </li>
        <li>
          <a class="buttonTabProfile" href="reviews.html">Reviews</a>
        </li>
        <li>
          <a class="buttonTabProfile active" href="/profile/info">Info</a>
        </li>
      </ul>
    </div>
  </div>

  @yield('items')
  @yield('info')


</main>

@endsection
