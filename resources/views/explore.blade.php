@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-1">
        <!-- NAV BAR -->
        <nav class="sidebar col-lg-2 col-md-2 col-sm-1">
          <div class="img-responsive text-center" id="logo">
            <img src="{{ asset('img/logo.png') }}" alt="handy logo" id="logo">
          </div>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item activate">
              <a class="nav-link activate" href="#"> <i class="fa fa-compass fa-fw" aria-hidden="true"></i><span class="hidden-sm">Explore</span> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link deactivate" href="#"><i class="fa fa-archive fa-fw" aria-hidden="true"></i><span class="hidden-sm">Items</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link deactivate" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hidden-sm">Profile</span></a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- col-sm-9 offset-sm-3 col-md-9 offset-md-3 pt-3 -->
      <main class="col-md-9 col-sm-10">
        <h1>Explore</h1>
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
        </div>
        <section class="row">

          @foreach($items as $item)

          <div class="cards col-lg-4 col-md-4 col-sm-6">
            <div class="image-item-card">
              <img src="{{ asset('img/'.$item->images['0']->name) }}" alt="{{ $item->images['0']->name}}" class="img-responsive">
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="row">
                <div class="title-details-item">
                  <div class="col-lg-6 col-md-6 col-sm-6 no-padding-left">
                    <p class="float-left item-desc">{{ $item->name }}</p>
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
                  <p>{{ $item->user->address->country }}km from you</p>
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

        </section>
      </main>
      <div class="col-md-1 col-sm-1">
        <div class="" id="btn-side-container">
          <div class="row btn-side-container-extra"><button type="button" name="button" class="btn-circle"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
          <div class="row btn-side-container-extra"><button type="button" name="button" class="btn-circle-light"><i class="fa fa-filter" aria-hidden="true"></i></button></div>
          <div class="row btn-side-container-extra"><button type="button" name="button" class="btn btn-circle-light tippy"><i class="fa fa-search fa-fw" aria-hidden="true"></i></button></div>
        </div>
      </div>
    </div>
  </div>
@endsection
