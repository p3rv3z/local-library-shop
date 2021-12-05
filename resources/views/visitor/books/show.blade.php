@extends('visitor.layouts.app')


@section('content')


  <section class="section bg-gray">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <!-- Left sidebar -->
        <div class="col-md-12">
          <div class="card p-4 rounded">
            <div class="row">
              <div class="col-md-4">
                <img class=""
                     src="{{ $book->getFirstMediaUrl('book-covers') ? $book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/110x157'}}"
                     alt="product-img" width="280px" height="350px">
              </div>
              <div class="col-md-8">
                <div class="product-details">
                  <h1 class="product-title">{{ $book->title }}</h1>
                  <div class="product-meta">
                    <ul class="list-inline">
                      <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a
                          href="">{{ $book->author->name }}</a></li>
                      <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a
                          href="">{{ $book->category->name }}</a></li>
                      {{--                      <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href=""></a></li>--}}
                    </ul>
                  </div>
                  <h3 class="mt-4">Price: {{ $book->price }} TK.</h3>
                  <h3>Lending rate: {{ $book->lending_rate }} TK. per day</h3>
                  <div class="mt-4">
                    <a class="btn btn-success">Take A Look</a>
                  </div>
                  <div class="mt-4">
                    <a class="btn btn-warning">Request to Buy</a>
                    <a class="btn btn-info">Request to Lend</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="product-details">
          {{--            <h1 class="product-title">Hp Dual Core 2gb Ram-Slim Laptop Available In Very Low Price</h1>--}}
          {{--            <div class="product-meta">--}}
          {{--              <ul class="list-inline">--}}
          {{--                <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">Andrew</a></li>--}}
          {{--                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">Electronics</a></li>--}}
          {{--                <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="">Dhaka Bangladesh</a></li>--}}
          {{--              </ul>--}}
          {{--            </div>--}}

          <!-- product slider -->

          {{--            <div class="product-slider">--}}

          {{--              <div class="product-slider-item my-4" data-image="{{ $book->getFirstMediaUrl('book-covers') ? $book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/110x157'}}">--}}
          {{--                <img class="img-fluid w-100" src="{{ $book->getFirstMediaUrl('book-covers') ? $book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/110x157'}}" alt="product-img">--}}
          {{--              </div>--}}
          {{--            </div>--}}
          <!-- product slider -->

            <div class="content mt-5 pt-5">
              <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                     aria-controls="pills-home"
                     aria-selected="true">Product Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                     aria-controls="pills-profile"
                     aria-selected="false">Specifications</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                     aria-controls="pills-contact"
                     aria-selected="false">Reviews</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <h3 class="tab-title">Description</h3>
                  <p>{{ $book->description }}</p>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <h3 class="tab-title">Product Specifications</h3>
                  <table class="table table-bordered product-table">
                    <tbody>
                    <tr>
                      <td>Category</td>
                      <td>{{ $book->category->name }}</td>
                    </tr>
                    <tr>
                      <td>ISBN</td>
                      <td>{{ $book->isbn }}</td>
                    </tr>
                    <tr>
                      <td>Edition</td>
                      <td>{{ $book->edition }}</td>
                    </tr>
                    <tr>
                      <td>Number of Pages</td>
                      <td>{{ $book->pages }}</td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td>{{ $book->price }} TK.</td>
                    </tr>
                    <tr>
                      <td>Lending Rate</td>
                      <td>{{ $book->lending_rate }} TK. per day.</td>
                    </tr>
                    <tr>
                      <td>Added</td>
                      <td>{{ $book->created_at->format('d M, Y') }}</td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td>{{ $book->category->name }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                  <h3 class="tab-title">Product Review</h3>
                  <div class="product-review">
                    <div class="media">
                      <!-- Avater -->
                      <img src="images/user/user-thumb.jpg" alt="avater">
                      <div class="media-body">
                        <!-- Ratings -->
                        <div class="ratings">
                          <ul class="list-inline">
                            <li class="list-inline-item">
                              <i class="fa fa-star"></i>
                            </li>
                            <li class="list-inline-item">
                              <i class="fa fa-star"></i>
                            </li>
                            <li class="list-inline-item">
                              <i class="fa fa-star"></i>
                            </li>
                            <li class="list-inline-item">
                              <i class="fa fa-star"></i>
                            </li>
                            <li class="list-inline-item">
                              <i class="fa fa-star"></i>
                            </li>
                          </ul>
                        </div>
                        <div class="name">
                          <h5>Jessica Brown</h5>
                        </div>
                        <div class="date">
                          <p>Mar 20, 2018</p>
                        </div>
                        <div class="review-comment">
                          <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant
                            tota rem ape
                            riamipsa eaque.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="review-submission">
                      <h3 class="tab-title">Submit your review</h3>
                      <!-- Rate -->
                      <div class="rate">
                        <div class="starrr"></div>
                      </div>
                      <div class="review-submit">
                        <form action="#" class="row">
                          <div class="col-lg-6">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                          </div>
                          <div class="col-lg-6">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                          </div>
                          <div class="col-12">
                            <textarea name="review" id="review" rows="10" class="form-control"
                                      placeholder="Message"></textarea>
                          </div>
                          <div class="col-12">
                            <button type="submit" class="btn btn-main">Sumbit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{--        <div class="col-md-4">--}}
        {{--          <div class="sidebar">--}}
        {{--            <div class="widget price text-center">--}}
        {{--              <h4>Price</h4>--}}
        {{--              <p>$230</p>--}}
        {{--            </div>--}}
        {{--            <!-- User Profile widget -->--}}
        {{--            <div class="widget user text-center">--}}
        {{--              <img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">--}}
        {{--              <h4><a href="">Jonathon Andrew</a></h4>--}}
        {{--              <p class="member-time">Member Since Jun 27, 2017</p>--}}
        {{--              <a href="">See all ads</a>--}}
        {{--              <ul class="list-inline mt-20">--}}
        {{--                <li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>--}}
        {{--                <li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an--}}
        {{--                    offer</a></li>--}}
        {{--              </ul>--}}
        {{--            </div>--}}
        {{--            <!-- Map Widget -->--}}
        {{--            <div class="widget map">--}}
        {{--              <div class="map">--}}
        {{--                <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--            <!-- Rate Widget -->--}}
        {{--            <div class="widget rate">--}}
        {{--              <!-- Heading -->--}}
        {{--              <h5 class="widget-header text-center">What would you rate--}}
        {{--                <br>--}}
        {{--                this product</h5>--}}
        {{--              <!-- Rate -->--}}
        {{--              <div class="starrr"></div>--}}
        {{--            </div>--}}
        {{--            <!-- Safety tips widget -->--}}
        {{--            <div class="widget disclaimer">--}}
        {{--              <h5 class="widget-header">Safety Tips</h5>--}}
        {{--              <ul>--}}
        {{--                <li>Meet seller at a public place</li>--}}
        {{--                <li>Check the item before you buy</li>--}}
        {{--                <li>Pay only after collecting the item</li>--}}
        {{--                <li>Pay only after collecting the item</li>--}}
        {{--              </ul>--}}
        {{--            </div>--}}
        {{--            <!-- Coupon Widget -->--}}
        {{--            <div class="widget coupon text-center">--}}
        {{--              <!-- Coupon description -->--}}
        {{--              <p>Have a great product to post ? Share it with--}}
        {{--                your fellow users.--}}
        {{--              </p>--}}
        {{--              <!-- Submii button -->--}}
        {{--              <a href="" class="btn btn-transparent-white">Submit Listing</a>--}}
        {{--            </div>--}}

        {{--          </div>--}}
        {{--        </div>--}}

      </div>
    </div>
    <!-- Container End -->
  </section>
@endsection
