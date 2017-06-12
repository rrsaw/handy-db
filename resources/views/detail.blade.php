@extends('layouts.main')

@section('exploreMenu','deactivate')
@section('itemsMenu','activate')
@section('userMenu','deactivate')

@section('detailItem')
      <!-- col-sm-9 offset-sm-3 col-md-9 offset-md-3 pt-3 -->
      <main class="col-md-9 col-sm-10 col-md-offset-2 col-sm-offset-1">
        <div class="col-md-12 col-sm-12 no-padding-left no-padding-right">
          <div class="image-detail">
            <img src="{{ asset('images/items/'.$item->images['0']->name) }}" alt="{{ $item->images['0']->name }}">
          </div>
        </div>
        <section class="col-md-8 col-sm-8 no-padding-left">
          <div class="title-detail">
            <h1>{{$item->name}}</h1>
            <h3>{{$item->category->name}}</h3>
            <div class="total-reviews-detail">

            </div>
          </div>
          <div class="description-detail">
            <p>{{$item->description}}</p>
          </div>
          <div class="reviews-detail">
            <h4>Reviews</h4>
            <div class="item-divider"></div>

              @if(count($reviews))

                  @foreach($reviews as $review)
                    <div class="reviewsProfile">
                      <div class="profileImage">
                      </div>
                      <p class="commenter">{{$review->reviewer->name}} {{$review->reviewer->surname}}</p>
                      <p class="comment">{{$review->description}}</p>
                      <section class="rating">
                        <input type="radio" id="star5" name="rating{{$review->id}}" value="5" @if ($review->value == 5) checked @endif/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="rating{{$review->id}}" value="4" @if ($review->value == 4) checked @endif/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="rating{{$review->id}}" value="3" @if ($review->value == 3) checked @endif/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="rating{{$review->id}}" value="2" @if ($review->value == 2) checked @endif/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating{{$review->id}}" value="1" @if ($review->value == 1) checked @endif/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                      </section>

                      <span class="date sub-text">{{ date('d M Y', strtotime($review->date)) }}</span>
                    </div>
                @endforeach

              @else

                <div class="text-center">
                  <h4> No confirmation to you yet </h4>
                </div>


              @endif
          </div>
        </section>

        <section class="col-md-4 col-sm-4 no-padding-right">
          <div class="row">
            <div class="price-detail">
              <h2>€ {{$item->price}}</h2>
            </div>
            <div class="rent-btn-detail">
              {{-- <form role="form" method="POST" action="{{ route('requestLoan')}}">
                {{ csrf_field() }}
                <input type="hidden" name="item" value="{{$item->id}}"> --}}
                @if ($item->user->id == Auth::user()->id)
                  <button type="submit" class="blueButton edit-item" data-attr="{{$item->id}}" data-image="{{$item->images['0']->id}}">Edit</button>
                @else
                  <button type="submit" class="blueButton rentButton" data-attr="{{$item->id}}">Rent</button>
                @endif
              {{-- </form> --}}
            </div>
          </div>
          <div class="row">
            <div class="owner-detail">
              <h4>Owner</h4>
              <div class="item-divider"></div>
              <div class="left-part">
                <div class="owner-image">
                  <img src="{{ asset('images/personal-images/'.$item->user->profileImage->name) }}" alt="">
                </div>
                <div class="owner-name-address">
                  <h5>{{$item->user->name}}</h5>
                  <h5>{{$item->user->surname}}</h5>
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span>{{$item->user->address->city}}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="details-detail">
              <h4>Details</h4>
              <div class="item-divider"></div>
              <div class="col-md-6 col-sm-6 no-padding-left">
                <div class="owner-name-address">
                  <h5>Period</h5>
                  <h5>Distance</h5>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 no-padding-left">
                <div class="owner-name-address">
                  <span>{{ date('d M', strtotime($item->start_date)) }} - {{ date('d M', strtotime($item->end_date)) }}</span>
                  <span>Distance</span>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

@endsection
