@extends('visitor.layouts.app')


@section('content')
  <section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Header Contetnt -->
          <div class="content-block">
            <h1>Share Your Book Collections With Your Friend & Neighbours</h1>
            {{--          <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>--}}
            <div class="short-popular-category-list text-center">
              <h2>Popular Categories</h2>
              <ul class="list-inline">
                <li class="list-inline-item">
                  @foreach($collections as $collection)
                    <a href="{{ route('visitor.show.books.by.categories', $collection->id) }}">{{$collection->name}}</a>
                  @endforeach
                </li>
              </ul>
            </div>

          </div>
          <!-- Advance Search -->
          <div class="advance-search">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 align-content-center">
                  <form action="{{ route('visitor.search') }}" method="GET">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <input name="query" type="text" class="form-control my-2 my-lg-1" id="inputtext4"
                               placeholder="Book title, author">
                      </div>
                      <div class="form-group col-md-3">
                        <select name="category" class="w-100 form-control mt-lg-1 mt-md-2">
                          <option value="">Categories</option>
                          @foreach($collections as $collection)
                            <option value="{{$collection->id}}">{{$collection->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <select name="city" class="w-100 form-control mt-lg-1 mt-md-2">
                          <option value="">Cities</option>
                          @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-2 align-self-center">
                        <input type="submit" class="btn btn-warning" value="Search"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Container End -->
  </section>

{{--  latest books--}}
  <section class="popular-deals section bg-gray pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2>Latest Books</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- offer 01 -->
        <div class="col-lg-12">
          <div class="trending-ads-slide">
            @foreach($latest_books as $book)
              <div class="col-sm-12 col-lg-4">
                <!-- product card -->
                <div class="product-item bg-light">
                  <div class="card">
                    <div class="thumb-content p-2">
                      <!-- <div class="price">$200</div> -->
                      <a href="single.html">
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
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </section>

{{--  popular books--}}
  <section class="popular-deals section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2>Popular Books</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- offer 01 -->
        <div class="col-lg-12">
          <div class="trending-ads-slide">
            @foreach($popular_books as $book)
            <div class="col-sm-12 col-lg-4">
              <!-- product card -->
              <div class="product-item bg-light">
                <div class="card">
                  <div class="thumb-content p-2">
                    <!-- <div class="price">$200</div> -->
                    <a href="single.html">
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
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </section>

  <section class=" section">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section title -->
          <div class="section-title">
            <h2>Popular Authors</h2>
            {{--            <p>The Book itself is fun, it's enhanced by the iterative process. Which is great....</p>--}}
          </div>
          <div class="row">
            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
              <div class="category-block">
                <div class="header">
                  <!--<i class="fa fa-briefcase icon-bg-5"></i>-->
                  <img src="{{asset('assets/images/team/team 1.jpg')}}" alt="" width="120" height="140"
                       class="rounded-circle">
                  <h4>Humayun Ahmed</h4>
                </div>
                <ul class="category-list">
                  <li><a href="category.html">Novel <span>93</span></a></li>
                  <li><a href="category.html">Romance <span>233</span></a></li>
                  <li><a href="category.html"> Liberation War <span>183</span></a></li>
                  <li><a href="category.html">Literature <span>343</span></a></li>
                </ul>
              </div>
            </div> <!-- /Category List -->
            <!-- Category list -->
            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
              <div class="category-block">
                <div class="header">
                  <!--<i class="fa fa-car icon-bg-6"></i> -->
                  <img src="{{asset('assets/images/team/team 2.jpg')}}" alt="" width="120" height="140"
                       class="rounded-circle">
                  <h4>Rabindranath Tagor</h4>
                </div>
                <ul class="category-list">
                  <li><a href="category.html">Literature <span>193</span></a></li>
                  <li><a href="category.html">Romance <span>23</span></a></li>
                  <li><a href="category.html">Novel <span>33</span></a></li>
                  <li><a href="category.html"> Liberation War <span>73</span></a></li>
                </ul>
              </div>
            </div> <!-- /Category List -->
            <!-- Category list -->
            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
              <div class="category-block">
                <div class="header">
                  <!--<i class="fa fa-car icon-bg-6"></i> -->
                  <img src="{{asset('assets/images/team/team 3.jpg')}}" alt="" width="120" height="140"
                       class="rounded-circle">
                  <h4>Muhammod Zafar Iqbal</h4>
                </div>
                <ul class="category-list">
                  <li><a href="category.html"> Liberation War <span>6</span></a></li>
                  <li><a href="category.html">Romance <span>23</span></a></li>
                  <li><a href="category.html">Novel <span>113</span></a></li>
                  <li><a href="category.html">Literature <span>43</span></a></li>
                </ul>
              </div>
            </div> <!-- /Category List -->
            <!-- Category list -->
            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
              <div class="category-block">

                <div class="header">
                  <!--<i class="fa fa-car icon-bg-6"></i> -->
                  <img src="{{asset('assets/images/team/team 4.jpg')}}" alt="" width="120" height="140"
                       class="rounded-circle">
                  <h4>Anisul Hoque</h4>
                </div>
                <ul class="category-list">
                  <li><a href="category.html">Literature <span>93</span></a></li>
                  <li><a href="category.html">Novel <span>233</span></a></li>
                  <li><a href="category.html">Romance <span>183</span></a></li>
                  <li><a href="category.html">Liberation War<span>43</span></a></li>
                </ul>
              </div>
            </div> <!-- /Category List -->


          </div>
        </div>
      </div>
    </div>
    <!-- Container End -->
  </section>



  {{--  <section class=" section">--}}
  {{--    <!-- Container Start -->--}}
  {{--    <div class="container">--}}
  {{--      <div class="row">--}}
  {{--        <div class="col-12">--}}
  {{--          <!-- Section title -->--}}
  {{--          <div class="section-title">--}}
  {{--            <h2>All Categories</h2>--}}
  {{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>--}}
  {{--          </div>--}}
  {{--          <div class="row">--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-laptop icon-bg-1"></i>--}}
  {{--                  <h4>Electronics</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Laptops <span>93</span></a></li>--}}
  {{--                  <li><a href="category.html">Iphone <span>233</span></a></li>--}}
  {{--                  <li><a href="category.html">Microsoft <span>183</span></a></li>--}}
  {{--                  <li><a href="category.html">Monitors <span>343</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-apple icon-bg-2"></i>--}}
  {{--                  <h4>Restaurants</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Cafe <span>393</span></a></li>--}}
  {{--                  <li><a href="category.html">Fast food <span>23</span></a></li>--}}
  {{--                  <li><a href="category.html">Restaurants <span>13</span></a></li>--}}
  {{--                  <li><a href="category.html">Food Track<span>43</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-home icon-bg-3"></i>--}}
  {{--                  <h4>Real Estate</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Farms <span>93</span></a></li>--}}
  {{--                  <li><a href="category.html">Gym <span>23</span></a></li>--}}
  {{--                  <li><a href="category.html">Hospitals <span>83</span></a></li>--}}
  {{--                  <li><a href="category.html">Parolurs <span>33</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-shopping-basket icon-bg-4"></i>--}}
  {{--                  <h4>Shoppings</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Mens Wears <span>53</span></a></li>--}}
  {{--                  <li><a href="category.html">Accessories <span>212</span></a></li>--}}
  {{--                  <li><a href="category.html">Kids Wears <span>133</span></a></li>--}}
  {{--                  <li><a href="category.html">It & Software <span>143</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-briefcase icon-bg-5"></i>--}}
  {{--                  <h4>Jobs</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">It Jobs <span>93</span></a></li>--}}
  {{--                  <li><a href="category.html">Cleaning & Washing <span>233</span></a></li>--}}
  {{--                  <li><a href="category.html">Management <span>183</span></a></li>--}}
  {{--                  <li><a href="category.html">Voluntary Works <span>343</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-car icon-bg-6"></i>--}}
  {{--                  <h4>Vehicles</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Bus <span>193</span></a></li>--}}
  {{--                  <li><a href="category.html">Cars <span>23</span></a></li>--}}
  {{--                  <li><a href="category.html">Motobike <span>33</span></a></li>--}}
  {{--                  <li><a href="category.html">Rent a car <span>73</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}
  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-paw icon-bg-7"></i>--}}
  {{--                  <h4>Pets</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Cats <span>65</span></a></li>--}}
  {{--                  <li><a href="category.html">Dogs <span>23</span></a></li>--}}
  {{--                  <li><a href="category.html">Birds <span>113</span></a></li>--}}
  {{--                  <li><a href="category.html">Others <span>43</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}
  {{--            <!-- Category list -->--}}
  {{--            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">--}}
  {{--              <div class="category-block">--}}

  {{--                <div class="header">--}}
  {{--                  <i class="fa fa-laptop icon-bg-8"></i>--}}
  {{--                  <h4>Services</h4>--}}
  {{--                </div>--}}
  {{--                <ul class="category-list">--}}
  {{--                  <li><a href="category.html">Cleaning <span>93</span></a></li>--}}
  {{--                  <li><a href="category.html">Car Washing <span>233</span></a></li>--}}
  {{--                  <li><a href="category.html">Clothing <span>183</span></a></li>--}}
  {{--                  <li><a href="category.html">Business <span>343</span></a></li>--}}
  {{--                </ul>--}}
  {{--              </div>--}}
  {{--            </div> <!-- /Category List -->--}}


  {{--          </div>--}}
  {{--        </div>--}}
  {{--      </div>--}}
  {{--    </div>--}}
  {{--    <!-- Container End -->--}}
  {{--  </section>--}}


  {{--<section class="call-to-action overly bg-3 section-sm">--}}
  {{--  <!-- Container Start -->--}}
  {{--  <div class="container">--}}
  {{--    <div class="row justify-content-md-center text-center">--}}
  {{--      <div class="col-md-8">--}}
  {{--        <div class="content-holder">--}}
  {{--          <h2>Start today to get more exposure and--}}
  {{--            grow your business</h2>--}}
  {{--          <ul class="list-inline mt-30">--}}
  {{--            <li class="list-inline-item"><a class="btn btn-main" href="ad-listing.html">Add Listing</a></li>--}}
  {{--            <li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser Listing</a></li>--}}
  {{--          </ul>--}}
  {{--        </div>--}}
  {{--      </div>--}}
  {{--    </div>--}}
  {{--  </div>--}}
  {{--  <!-- Container End -->--}}
  {{--</section>--}}
@endsection
