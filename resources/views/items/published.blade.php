@extends('items.main')

@section('publishedFilter','active')
@section('mine','active')
@section('other','hidden')

@section('published')

  @if(count($items))

      @foreach($items as $item)

      <div class="cards col-lg-4 col-md-4 col-sm-6">
        <div class="image-item-card">
          <img src="{{ asset('images/items/'.$item->images['0']->name) }}" alt="{{ $item->images['0']->name}}" class="img-responsive">
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="title-details-item">
              <div class="col-lg-6 col-md-6 col-sm-6 no-padding-left">
                <p class="float-left item-desc">{{ $item->name }}</p>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 no-padding-right">
                <div class="edit-cancel-published text-right">
                  <i class="fa fa-pencil"></i>
                  {{ Form::open(array('url' => 'items/'.$item->id, 'class' => 'pull-right')) }}
                      {{ Form::hidden('_method', 'DELETE') }}
                      <button type="submit">
                        <i class="fa fa-pencil no-padding-right"></i>
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

@endsection
