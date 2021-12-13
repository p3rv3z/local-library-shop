@extends('visitor.layouts.app')

@section('content')
  <section class="popular-deals section bg-gray pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2>{{ $collection->name }}</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- offer 01 -->
        <div class="col-lg-12">
          <div class="trending-ads-slide">
            @forelse($books as $book)
              <div class="col-sm-12 col-lg-4">
                <!-- product card -->
                <div class="product-item bg-light">
                  <div class="card">
                    <div class="thumb-content p-2">
                      <!-- <div class="price">$200</div> -->
                      <a href="{{ route('visitor.show.book.details', $book->id) }}">
                        <img class="ml-auto mr-auto w-100" src="{{ $book->getFirstMediaUrl('book-covers') ? $book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/312x400'}}"
                             alt="Card image cap" height="250px">
                      </a>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title"><a href="{{ route('visitor.show.book.details', $book->id) }}">{{ Str::limit($book->title, 12) }}</a></h4>
                      <p class="text-primary">Distance: {{ toKilometer($book->distance) }}km  away</p>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <h3 class="text-center mb-5">No books found!</h3>
            @endforelse
          </div>
        </div>


      </div>
    </div>
  </section>
@endsection
