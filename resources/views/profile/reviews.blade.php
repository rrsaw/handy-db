@extends('profile.main')

@section('reviews')

  @section('reviewsProfile','active')

    @if(count($reviews))

        @foreach($reviews as $review)
          <div class="reviewsProfile row">
            <div class="profile-image col-lg-2 col-md-2 col-sm-2">
              <a href="{{ url('profile/'.$review->reviewer->id) }}">
                <img id="profile_image_review" class="img-circle" src="{{ asset('images/personal-images/'.$review->reviewer->profileImage->name) }}" alt="{{$review->reviewer->profileImage->name}}">
              </a>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
              <div class="row">
                <div class="col-lg-10 profile_review">
                  <a href="{{ url('profile/'.$review->reviewer->id) }}">{{$review->reviewer->name}} {{$review->reviewer->surname}}</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                  <section class="rating">
                    <input type="radio" id="star5" name="rating{{$review->id}}" value="5" disabled @if ($review->value == "5") checked @endif/><label class = "block" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating{{$review->id}}" value="4" disabled @if ($review->value == "4") checked @endif/><label class = "block" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating{{$review->id}}" value="3" disabled @if ($review->value == "3") checked @endif/><label class = "block" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2" name="rating{{$review->id}}" value="2" disabled @if ($review->value == "2") checked @endif/><label class = "block" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating{{$review->id}}" value="1" disabled @if ($review->value == "1") checked @endif/><label class = "block" for="star1" title="Sucks big time - 1 star"></label>
                  </section>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                  <p class="comment">{{$review->description}}</p>
                </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <span class="date sub-text">{{ date('d M Y', strtotime($review->date)) }}</span>
                  </div>
              </div>
            </div>
          </div>
      @endforeach

    @else

      <div class="text-center">
        <h4> No confirmation to you yet </h4>
      </div>

    @endif

@endsection
