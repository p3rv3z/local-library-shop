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
                @php
                  $type = (request()->is('member/requests-by-type/Buy')) ? 'Buy' : 'Lend'
                @endphp
                {{ $type }} Requests
              </h3>
              <hr>
              <form action="{{ route('member.requests-by-type.index', $type) }}" method="GET" id="filter-request">
                <div class="row">
                  <div class="col-md-8">
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
                          <h6 class="card-subtitle mb-2 text-muted"><b>Sender: </b>{{ $request->sender->name }}</h6>
                          @if($request->type == 'Buy')
                            <h6 class="card-subtitle mb-2 text-muted"><b>Price: </b>@if($request->is_free) Free @else {{ $request->book->price }} TK. @endif </h6>
                          @else
                            <h6 class="card-subtitle mb-2 text-muted"><b>Lending Rate: </b>{{ $request->book->price }}
                              TK. per day</h6>
                          @endif
                          <h6 class="card-subtitle mb-2 text-muted"><b>Status: </b>{{ $request->status }}</h6>
                          <h6 class="card-subtitle mb-2 text-muted"><b>Requested
                              at: </b>{{$request->created_at->format('d M, Y')}}</h6>
                          @if($request->status == 'Accepted')
                            <h6 class="card-subtitle mb-2 text-muted">
                              <b>Start From: </b>{{ date('d M, Y h:i A', strtotime($request->from_date)) }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                              <b>End To: </b>{{ date('d M, Y h:i A', strtotime($request->to_date)) }}</h6>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-3 d-flex justify-content-center">
                        <div class="align-self-center">
                          <button type="button"
                                  class="btn btn-success py-2 px-3"
                                  data-toggle="modal" data-target="#updateRequest-{{$request->id}}">Update
                          </button>
                          <p></p>
                          <button type="button"
                                  class="btn btn-danger py-2 px-3"
                                  data-toggle="modal" data-target="#cancelRequest-{{$request->id}}">Cancel
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- update Request Modal -->
                  <div class="modal fade" id="updateRequest-{{$request->id}}" tabindex="-1" role="dialog"
                       aria-labelledby="updateRequestLabel-{{$request->id}}"
                       aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                      <div class="modal-content p-2">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateRequestLabel-{{$request->id}}">
                            Update {{ strtolower($type) }} request</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="{{ route('member.request.update', $request->id) }}"
                                id="update-request-{{$request->id}}">
                            @csrf
                            @if($type == 'Lend')
                              {{--from date--}}
                              <div class="form-group">
                                <label for="from_date">From</label>
                                <input name="from_date" type="datetime-local" value="{{ old('from_date', date('Y-m-d\TH:i', strtotime($request->from_date))) }}"
                                       class="form-control" id="from_date">
                                @error('from_date')
                                <p class="text-danger"><b>{{$message}}</b></p>
                                @enderror
                              </div>

                              {{--to date--}}
                              <div class="form-group">
                                <label for="to_date">To</label>
                                <input name="to_date" type="datetime-local" value="{{ old('to_date', date('Y-m-d\TH:i', strtotime($request->to_date))) }}"
                                       class="form-control" id="to_date">
                                @error('to_date')
                                <p class="text-danger"><b>{{$message}}</b></p>
                                @enderror
                              </div>
                            @endif

                            {{--is free--}}
                            <div class="form-group">
                              <label for="status" class="">Status</label>
                              <select name="status" class="form-control w-100" id="status">
                                <option value="" hidden>Choose...</option>
                                <option value="Pending" @if(old('status', $request->status) == 'Pending') selected @endif >Pending</option>
                                <option value="Accepted" @if(old('status', $request->status) == 'Accepted') selected @endif >Accepted</option>
                              </select>
                              @error('status')
                              <p class="text-danger"><b>{{$message}}</b></p>
                              @enderror
                            </div>

                            {{--is free--}}
                            <div class="form-group">
                              <label for="is_free" class="">Is Free ?</label>
                              <select name="is_free" class="form-control w-100" id="is_free">
                                <option value="" hidden>Choose...</option>
                                <option value="1" @if(old('is_free', $request->is_free)) selected @endif >Yes</option>
                                <option value="0" @if(!old('is_free', $request->is_free)) selected @endif >No</option>
                              </select>
                              @error('type')
                              <p class="text-danger"><b>{{$message}}</b></p>
                              @enderror
                            </div>
                            {{--                            note--}}
                            <div class="form-group">
                              <label for="receiver_note">Note</label>
                              <textarea name="receiver_note" class="form-control" id="receiver_note"
                                        rows="5"
                                        placeholder="Write a note"
                              >{{ old('receiver_note', $request->receiver_note) }}</textarea>
                              @error('receiver_note')
                              <span class="text-danger"><b>{{$message}}</b></span>
                              @enderror
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger px-3 py-2" data-dismiss="modal">Close</button>
                          <button class="btn btn-primary px-3 py-2" form="update-request-{{$request->id}}">Update
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
