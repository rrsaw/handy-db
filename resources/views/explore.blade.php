@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 col-md-2">
        <!-- NAV BAR -->
        <nav class="sidebar col-2">
          <div class="img-fluid text-center" id="logo">
            <img src="{{ asset('img/logo.png') }}" alt="handy logo" id="logo">
          </div>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item activate">
              <a class="nav-link activate" href="#"> <i class="fa fa-compass fa-fw" aria-hidden="true"></i>Explore <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link deactivate" href="#"><i class="fa fa-archive fa-fw" aria-hidden="true"></i>Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link deactivate" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- col-sm-9 offset-sm-3 col-md-9 offset-md-3 pt-3 -->
      <main class="col-md-9">
        <h1>Explore</h1>
        <div class="col-12">
          <div class="row">
            <p class="filters">Categories</p>
            <p class="filters-result"> Category #1</p>
            <p class="filters">Date</p>
            <p class="filters-result">20 Jun to 30 Aug</p>
            <p class="filters">Price</p>
            <p class="filters-result">5 € to 15 €</p>
          </div>
        </div>
        <section class="row">

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>

          <div class="cards col-4">
            <img src="http://bit.ly/2pUcUlQ" alt="" class="img-fluid item-image">
            <div class="col-12">
              <div class="row">
                <div class="col-6 no-padding-left">
                  <p class="float-left item-desc">HERO2</p>
                </div>
                <div class="col-6 no-padding-right">
                  <p class="text-right item-price">11 € Daily</p>
                </div>
              </div>
              <div class="row item-divider col-6">
              </div>
              <div class="row">
                <i class="fa fa-map-marker fa-fw"></i>
                <p>4km from you</p>
              </div>
              <div class="row">
                <i class="fa fa-clock-o fa-fw"></i>
                <p>25 jan - 30 Jun</p>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="col-md-1">
        <div class="" id="btn-side-container">
          <div class="row btn-side-container-extra"><button type="button" name="button" class="btn-circle"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
          <div class="row btn-side-container-extra"><button type="button" name="button" class="btn-circle-light"><i class="fa fa-filter" aria-hidden="true"></i></button></div>
          <div class="row btn-side-container-extra"><button type="button" name="button" class="btn btn-circle-light tippy"><i class="fa fa-search fa-fw" aria-hidden="true"></i></button></div>
        </div>
      </div>
    </div>
  </div>
@endsection
