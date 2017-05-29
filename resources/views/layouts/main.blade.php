
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
          <li class="nav-item @yield('exploreMenu')">
            <a class="nav-link @yield('exploreMenu')" href="/explore"> <i class="fa fa-compass fa-fw" aria-hidden="true"></i><span class="hidden-sm">Explore</span> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item @yield('itemsMenu')">
            <a class="nav-link @yield('itemsMenu')" href="/items"><i class="fa fa-archive fa-fw" aria-hidden="true"></i><span class="hidden-sm">Items</span></a>
          </li>
          <li class="nav-item  @yield('userMenu')">
            <a class="nav-link  @yield('userMenu')" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hidden-sm">Profile</span></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="searchbar">
      <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
        <form class="" action="index.html" method="post">
          <input type="text" name="search" value="" placeholder="Search">
        </form>
      </div>
    </div>

    @yield('explorePage')

    @yield('itemsMain')

    <div class="col-md-1 col-sm-1">
      <div class="" id="btn-side-container">
        <div class="row btn-side-container-extra">
          <button type="button" name="button" class="btn-circle btn-add-item">
            <form class="" action="index.html" method="post">
              <i class="fa fa-plus" aria-hidden="true"></i>
            </form>
          </button>
        </div>
        <div class="row btn-side-container-extra">
          <button type="button" name="button" class="btn-circle-light btn-filter">
            <form class="" action="index.html" method="post">
              <i class="fa fa-filter" aria-hidden="true"></i>
            </form>
          </button>
        </div>
        <div class="row btn-side-container-extra">
          <button type="button" name="button" class="btn btn-circle-light tippy btn-search">
            <form class="" action="index.html" method="post">
              <i class="fa fa-search fa-fw" aria-hidden="true"></i>
            </form>
          </button>
        </div>
      </div>
    </div>
</div>
</div>

<div class="modal">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-lg-offset-2 col-md-offset-2">
        <div class="modal-body">
          <div class="modal-close">
            <i class="fa fa-times"></i>
          </div>
          <div class="modal-title">
            <h3>New item</h3>
          </div>
          <div class="col-lg-8 col-md-8 no-padding-left">
            <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
              <div class="name-input">
                  <input type="text" class="input" name="name" required>
                  <label class="label" for="name">Name</label>
              </div>
              <div class="col-lg-12 col-md-12 no-padding-left">
                <div class="col-lg-8 col-md-8 col-sm-8 no-padding-left">
                  <div class="period-add">
                    <h5>Period<h5>
                    <input type="date" name="startDate" min="1900-01-01" required>
                    <span>to</span>
                    <input type="date" name="endDate" min="1900-01-01" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                  <div class="price-add">
                    <h5>Price<h5>
                    <input type="number" name="price" required>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 no-padding-left">
                  <div class="categories-add">
                    <h5>Categories</h5>
                    <div class="option">
                      <input type="radio" name="category" value="1"/><span>Category 1</span>
                    </div>
                    <div class="option">
                      <input type="radio" name="category" value="2"/><span>Category 2</span>
                    </div>
                    <div class="option">
                      <input type="radio" name="category" value="3"/><span>Category 3</span>
                    </div>
                    <div class="option">
                      <input type="radio" name="category" value="4"/><span>Category 4</span>
                    </div>
                    <div class="option">
                      <input type="radio" name="category" value="5"/><span>Category 5</span>
                    </div>
                    <div class="option">
                      <input type="radio" name="category" value="6"/><span>Category 6</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 no-padding-left">
                  <div class="description-add">
                    <h5>Description</h5>
                    <textarea name="description"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="images-add">
                <h5>Images</h5>
                <div class="default-image">
                  <input type="file" name="image" name="image" required/>
                  <i class="fa fa-plus"></i>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-4 col-lg-offset-3 col-md-offset-3 col-sm-offset-4">
                <button type="submit" class="blueButton"> Done</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
