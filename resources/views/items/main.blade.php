@extends('layouts.main')

@section('exploreMenu','deactivate')
@section('itemsMenu','activate')
@section('userMenu','deactivate')

@section('itemsMain')

<main class="col-md-9 col-sm-10 col-md-offset-2 col-sm-offset-1">
  <h1>Items</h1>
  <div class="col-lg-12 col-md-12">
    <div class="row">
      <div class="filters-items">
        <ul>
          <li><a class="@yield('publishedFilter')" href="/items">Published</a></li>
          <li><a class="@yield('currentFilter')" href="/current">Current loans</a></li>
          <li><a class="@yield('confirmationFilter')" href="/confirmation">Confirmation</a></li>
          <li><a class="@yield('historyFilter')" href="/history">History</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="filters-items select-user">
        <ul>
          <li><a class="@yield('mine')" href="@yield('mineUrl')">Mine</a></li>
          <li><a class="@yield('other')" href="@yield('otherUrl')">Other</a></li>
        </ul>
      </div>
    </div>
  </div>

  <section class="row">

    @yield('published')
    @yield('current')
    @yield('confirmation')
    @yield('history')

  </section>
</main>

@endsection
