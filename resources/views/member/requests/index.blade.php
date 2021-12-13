@extends('visitor.layouts.app')

@section('content')
  <section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
      <!-- Row Start -->
      <div class="row">
        @include('member/layouts/partials/_left-sidebar')
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <div class="widget dashboard-container my-adslist">
            <div class="widget-header">
              <h3 class="">
                My Requests
              </h3>
              <hr>
              <form action="{{ route('member.requests.index') }}" method="GET" id="filter-request">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group d-flex align-items-baseline">
                      <label for="type" class="">Type</label>
                      <select name="type" class="ml-2 form-control w-100" id="type">
                        <option value="" hidden>All</option>
                        <option value="Buy" @if(request()->get('type') == 'Buy') selected @endif >Buy</option>
                        <option value="Lend" @if(request()->get('type') == 'Lend') selected @endif >Lend</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group d-flex align-items-baseline">
                      <label for="status" class="">Status</label>
                      <select name="status" class="ml-2 form-control w-100" id="status">
                        <option value="" hidden>All</option>
                        <option value="Pending" @if(request()->get('status') == 'Pending') selected @endif >Pending
                        </option>
                        <option value="Accepted" @if(request()->get('status') == 'Accepted') selected @endif >Accepted
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <button form="filter-request" class="btn btn-primary ml-4" style="padding: 11px 34px !important;">
                      Filter
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div>
              @forelse($requests as $request)
                <div class="card w-100 mb-1">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <img class="w-100" height="156.24px"
                             src="{{ $request->book->getFirstMediaUrl('book-covers') ? $request->book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/110x157'}}"
                             alt="">
                      </div>
                      <div class="col-md-6 text-left d-flex">
                        <div class="align-self-center">
                          <h5 class="card-title">{{ $request->book->title }}</h5>
                          <h6 class="card-subtitle mb-2 text-muted"><b>Owner: </b>{{ $request->owner->name }}</h6>
                          <h6 class="card-subtitle mb-2 text-muted"><b>Request Type: </b>{{ $request->type }}</h6>
                          @if($request->type == 'Buy')
                            <h6 class="card-subtitle mb-2 text-muted"><b>Price: </b>{{ $request->book->price }} TK.</h6>
                          @else
                            <h6 class="card-subtitle mb-2 text-muted"><b>Lending Rate: </b>{{ $request->book->price }}
                              TK. per day</h6>
                          @endif
                          <h6 class="card-subtitle mb-2 text-muted"><b>Status: </b>{{ $request->status }}</h6>
                          <h6 class="card-subtitle mb-2 text-muted"><b>Requested
                              at: </b>{{$request->created_at->format('d F, Y')}}</h6>
                        </div>
                      </div>
                      <div class="col-md-3 d-flex justify-content-center">
                        <div class="align-self-center">
                          <button type="button"
                                  class="btn btn-danger py-2 px-3"
                                  data-toggle="modal" data-target="#cancelRequest-{{$request->id}}">Cancel
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cancelRequest-{{$request->id}}" tabindex="-1" role="dialog"
                       aria-labelledby="cancelRequestLabel-{{$request->id}}"
                       aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                      <div class="modal-content p-2">
                        <div class="modal-header">
                          <h5 class="modal-title" id="cancelRequestLabel-{{$request->id}}">
                            Cancel {{ strtolower($request->type) }} request</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h3>Are you sure?</h3>
                          <form class="d-none" method="POST" action="{{ route('member.request.cancel', $request->id) }}"
                                id="cancel-request-{{$request->id}}">
                            @csrf
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                          <button class="btn btn-primary" form="cancel-request-{{$request->id}}">Yes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <p class="text-center">No requests found</p>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
