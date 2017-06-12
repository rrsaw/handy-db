@extends('profile.main')

@section('profileContent')

  @if ($url == "profile")

  @section('itemsProfile','active')

    @if(count($items))

        @foreach($items as $item)

        <div class="cards col-lg-4 col-md-4 col-sm-6">
            <div class="image-item-card">
              <a href="{{ url('items/'.$item->id) }}">
                <img src="{{ asset('images/items/'.$item->images['0']->name) }}" alt="{{ $item->images['0']->name}}" class="img-responsive">
              </a>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="row">
                <div class="title-details-item">
                  <div class="col-lg-6 col-md-6 col-sm-6 no-padding-left">
                    <a href="{{ url('items/'.$item->id) }}">
                      <p class="float-left item-desc">{{ $item->name }}</p>
                    </a>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 no-padding-right">
                    <div class="edit-cancel-published text-right">
                      <i class="fa fa-pencil edit-item" data-attr="{{$item->id}}" data-image="{{$item->images['0']->id}}"></i>
                      {{ Form::open(array('url' => 'items/'.$item->id, 'class' => 'delete-item pull-right')) }}
                          {{ Form::hidden('_method', 'DELETE') }}
                          <button type="submit">
                            <i class="fa fa-times no-padding-right"></i>
                          </button>
                      {{ Form::close() }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 no-padding-left">
                  <div class="item-divider"></div>
                </div>
              </div>
              <div class="row">
                <div class="details-item">
                  <i class="fa fa-eur"></i>
                  <p>{{ $item->price }}</p>
                </div>
              </div>
              <div class="row">
                <div class="details-item">
                  <i class="fa fa-clock-o fa-fw"></i>
                  <p>{{ date('d M', strtotime($item->start_date)) }} - {{ date('d M', strtotime($item->end_date)) }}</p>
                </div>
              </div>
            </div>

        </div>
      @endforeach

    @else

      <div class="text-center">
        <h4> No object yet </h4>
      </div>


    @endif


  @elseif ($url == "profile/info")

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
              <h6>Password</h6>
            </div>
          </div>
          <div class="col-md-6 col-sm-3">
            <div class="text-right ">
              <h6>{{$user->name}}</h6>
              <h6>{{$user->surname}}</h6>
              <h6>{{$user->email}}</h6>
              <h6>{{$user->birth_date}}</h6>
              <h6>{{$user->phone_number}}</h6>
              <h6>{{$user->password}}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

  @elseif ($url == "profile/reviews")

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
              <input type="radio" id="star5" name="rating{{$review->id}}" value="5" @if ($review->value == "5") checked @endif/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
              <input type="radio" id="star4" name="rating{{$review->id}}" value="4" @if ($review->value == "4") checked @endif/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
              <input type="radio" id="star3" name="rating{{$review->id}}" value="3" @if ($review->value == "3") checked @endif/><label class = "full" for="star3" title="Meh - 3 stars"></label>
              <input type="radio" id="star2" name="rating{{$review->id}}" value="2" @if ($review->value == "2") checked @endif/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
              <input type="radio" id="star1" name="rating{{$review->id}}" value="1" @if ($review->value == "1") checked @endif/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            </section>

            <span class="date sub-text">{{ date('d M Y', strtotime($review->date)) }}</span>
          </div>
      @endforeach

    @else

      <div class="text-center">
        <h4> No confirmation to you yet </h4>
      </div>


    @endif

  @endif

@endsection
