@extends('profile.main')

@section('reviews')

  @section('reviewsProfile','active')

    @if(count($reviews))

        @foreach($reviews as $review)
          <div class="reviewsProfile">
            <div class="profileImage">
              <img style="width:100%" src="{{ asset('images/personal-images/'.$review->reviewer->profileImage->name) }}" alt="{{$review->reviewer->profileImage->name}}">
            </div>
            <p class="commenter">{{$review->reviewer->name}} {{$review->reviewer->surname}}</p>
            <p class="comment">{{$review->description}}</p>
            <section class="rating">
              <input type="radio" id="star5" name="rating{{$review->id}}" value="5" disabled @if ($review->value == "5") checked @endif/><label class = "block" for="star5" title="Awesome - 5 stars"></label>
              <input type="radio" id="star4" name="rating{{$review->id}}" value="4" disabled @if ($review->value == "4") checked @endif/><label class = "block" for="star4" title="Pretty good - 4 stars"></label>
              <input type="radio" id="star3" name="rating{{$review->id}}" value="3" disabled @if ($review->value == "3") checked @endif/><label class = "block" for="star3" title="Meh - 3 stars"></label>
              <input type="radio" id="star2" name="rating{{$review->id}}" value="2" disabled @if ($review->value == "2") checked @endif/><label class = "block" for="star2" title="Kinda bad - 2 stars"></label>
              <input type="radio" id="star1" name="rating{{$review->id}}" value="1" disabled @if ($review->value == "1") checked @endif/><label class = "block" for="star1" title="Sucks big time - 1 star"></label>
            </section>

            <span class="date sub-text">{{ date('d M Y', strtotime($review->date)) }}</span>
          </div>
      @endforeach

    @else

      <div class="text-center">
        <h4> No confirmation to you yet </h4>
      </div>

    @endif

@endsection
