@extends('visitor.layouts.app')


@section('content')

  <section class="page-search">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Advance Search -->
          <div class="advance-search">
            <form action="{{ route('visitor.search') }}" method="GET">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <input value="{{ request()->get('query') }}" name="query" type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                         placeholder="Book title, author">
                </div>
                <div class="form-group col-md-3">
                  <select name="category" class="w-100 form-control mt-lg-1 mt-md-2">
                    <option value="">Categories</option>
                    @foreach($collections as $collection)
                      <option value="{{$collection->id}}" @if(request()->get('category') == $collection->id) selected @endif>{{$collection->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <select name="city" class="w-100 form-control mt-lg-1 mt-md-2">
                    <option value="">Cities</option>
                    @foreach($cities as $city)
                      <option value="{{$city->id}}" @if(request()->get('city') == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-2 align-self-center">
                  <input type="submit" class="btn btn-outline-warning" style="color: white; border-color: white" value="Search"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="popular-deals section bg-gray pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2>Search results for "{{ request()->get('query') }}"</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- offer 01 -->
        <div class="col-lg-12">
          <div class="row">
            @forelse($books as $book)
              <div class="col-3">
                <!-- product card -->
                <div class="bg-light">
                  <div class="card">
                    <div class="p-2">
                      <!-- <div class="price">$200</div> -->
                      <a href="{{ route('visitor.show.book.details', $book->id) }}">
                        <img class="w-100" src="{{ $book->getFirstMediaUrl('book-covers') ? $book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/312x400'}}"
                             alt="Card image cap"  height="300px">
                      </a>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title"><a href="{{ route('visitor.show.book.details', $book->id) }}">{{ $book->title }}</a></h4>
                      <h6>Price: {{ $book->price }} TK.</h6>
                      <h6>Lending rate: {{ $book->lending_rate }} TK. per day</h6>
                      <h6>Distance: {{ toKilometer($book->distance) }}km  away</h6>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <h3 class="text-center mb-5">No results found!</h3>
            @endforelse
          </div>
        </div>


      </div>
    </div>
  </section>
@endsection
