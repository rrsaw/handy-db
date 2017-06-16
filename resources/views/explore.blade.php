@extends('layouts.main')

@section('exploreMenu','activate')
@section('itemsMenu','deactivate')
@section('userMenu','deactivate')

@section('explorePage')
      <main class="col-md-9 col-sm-10 col-md-offset-2 col-sm-offset-1">
        <h1>Explore</h1>

        {{--
        Filters
        <div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="active-filters-explore">
              <p class="filters">Categories</p>
              <p class="filters-result"> Category #1</p>
              <p class="filters">Date</p>
              <p class="filters-result">20 Jun to 30 Aug</p>
              <p class="filters">Price</p>
              <p class="filters-result">5 € to 15 €</p>
            </div>
          </div>
        </div> --}}
        <section class="row">

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
                    <p class="text-right item-price">{{ $item->price }} € Daily</p>
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
                  <i class="fa fa-map-marker fa-fw"></i>
                  <p>{{ $item->user->address->country }}</p>
                </div>
              </div>
              <div class="row">
                <div class="details-item">
                  <i class="fa fa-clock-o fa-fw"></i>
                  <p>{{ date('d M', strtotime($item->start_date)) }} - {{ date('d M', strtotime($item->end_date)) }}</p>
                </div>
              </div>
              <div class="row">
                <div class="details-item user-item">
                  <a href="{{ url('profile/'.$item->user->id) }}"><img src="{{ asset('images/personal-images/'.$item->user->profileImage->name) }}" alt="{{ $item->user->profileImage->name}}" class="img-responsive img-circle profile_image_explore">
                  <p>{{$item->user->name}} {{$item->user->surname}}</p></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        </section>
      </main>

@endsection
