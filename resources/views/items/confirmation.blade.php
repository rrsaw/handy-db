@extends('items.main')

@section('confirmationFilter','active')
@if ($url == "confirmation")
  @section('mine','active')
  @section('other','deactive')
@elseif ($url == "confirmation/other")
  @section('mine','deactive')
  @section('other','active')
@endif

@section('mineUrl','/confirmation')
@section('otherUrl','/confirmation/other')

@section('confirmation')

  @if(count($loans))

      @foreach($loans as $loan)

      <div class="cards col-lg-4 col-md-4 col-sm-6">
          <div class="image-item-card">
            <a href="{{ url('items/'.$loan->item->id) }}">
              <img src="{{ asset('images/items/'.$loan->item->images['0']->name) }}" alt="{{ $loan->item->images['0']->name}}" class="img-responsive">
            </a>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="row">
              <div class="title-details-item">
                <div class="col-lg-6 col-md-6 col-sm-6 no-padding-left">
                  <a href="{{ url('items/'.$loan->item->id) }}">
                    <p class="float-left item-desc">{{ $loan->item->name }}</p>
                  </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 no-padding-right">
                  <div class="edit-cancel-published text-right">
                    @if ($url == "confirmation")
                      {{ Form::open(array('url' => 'confirmation/'.$loan->id, 'class' => 'refuse-loan pull-right')) }}
                          {{ Form::hidden('_method', 'DELETE') }}
                          <button type="submit" class="times_button">
                            <i class="fa fa-times no-padding-right"></i>
                          </button>
                      {{ Form::close() }}
                      {{ Form::open(array('url' => 'confirmation/'.$loan->id, 'class' => 'pull-right')) }}
                          {{ Form::hidden('_method', 'POST') }}
                          <button type="submit" class="times_button">
                            <i class="fa fa-check no-padding-right"></i>
                          </button>
                      {{ Form::close() }}
                    @elseif ($url == "confirmation/other")
                      <i class="fa fa-hourglass-half"></i>
                    @endif

                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 no-padding-left">
                <div class="item-divider"></div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 no-padding-left">
              <div class="row">
                <div class="details-item">
                  <i class="fa fa-map-marker"></i>
                  @if ($url == "confirmation")
                  <p>{{ $loan->receiver->address->city }}</p>
                  @elseif ($url == "confirmation/other")
                  <p>{{ $loan->owner->address->city }}</p>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="details-item">
                  <i class="fa fa-clock-o fa-fw"></i>
                  <p>{{ date('d M', strtotime($loan->start_date)) }} - {{ date('d M', strtotime($loan->end_date)) }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 no-padding-right">
              <div class="row">
              <div class="details-item text-right">
                <i class="fa fa-eur fa-fw"></i>
                <p>{{ $loan->item->price }}</p>
              </div>
            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding-left">
              <div class="row">
                <div class="details-item user-item">
                  @if ($url == "confirmation")
                    <a href="{{ url('profile/'.$loan->receiver->id) }}"><img src="{{ asset('images/personal-images/'.$loan->receiver->profileImage->name) }}" alt="{{ $loan->receiver->profileImage->name}}" class="img-responsive img-circle profile_image_explore">
                    <p>{{$loan->receiver->name}} {{$loan->receiver->surname}}</p></a>
                  @elseif ($url == "confirmation/other")
                    <a href="{{ url('profile/'.$loan->owner->id) }}"><img src="{{ asset('images/personal-images/'.$loan->owner->profileImage->name) }}" alt="{{ $loan->owner->profileImage->name}}" class="img-responsive img-circle profile_image_explore">
                    <p>{{$loan->owner->name}} {{$loan->owner->surname}}</p></a>
                  @endif

                </div>
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
