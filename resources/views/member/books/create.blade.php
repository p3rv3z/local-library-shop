@extends('visitor.layouts.app')

@section('content')
  <section class="user-profile section">
    <div class="container">
      <div class="row">
        @include('member/layouts/partials/_left-sidebar')
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <!-- Edit Profile Welcome Text -->
          <div class="widget welcome-message">
            <h2>Add New Book</h2>
          </div>
          <!-- Edit Book Info -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="widget personal-info">
                <h3 class="widget-header user">Book Information</h3>
                <form method="POST" action="{{route('member.books.store')}}">
                  @csrf
                  <!-- Title -->
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}"
                           placeholder="Title">
                    @error('title')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--description--}}
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description"
                              rows="5">{{ old('description', 'Write description...') }}</textarea>
                    @error('description')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--isbn--}}
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input name="isbn" type="text" class="form-control" id="isbn" value="{{ old('isbn') }}"
                           placeholder="ISBN">
                    @error('isbn')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--edition--}}
                  <div class="form-group">
                    <label for="edition">Edition</label>
                    <input name="edition" type="text" class="form-control" id="edition" value="{{ old('edition') }}"
                           placeholder="Edition">
                    @error('edition')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--Pages--}}
                  <div class="form-group">
                    <label for="pages">Pages</label>
                    <input name="pages" type="number" class="form-control" id="pages" value="{{ old('pages') }}"
                           placeholder="Pages">
                    @error('pages')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--Price--}}
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="number" class="form-control" id="price" value="{{ old('price') }}"
                           placeholder="Price">
                    @error('price')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      {{--is free--}}
                      <div class="form-group">
                        <label for="is_free">is Free?</label><br>
                        <select name="is_free" type="number" class="form-control w-100" id="is_free">
                          <option value="" hidden>Choose...</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                        @error('is_free')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      {{--is sellable--}}
                      <div class="form-group">
                        <label for="is_lendable">is Lendable?</label><br>
                        <select name="is_lendable" class="form-control w-100" id="is_lendable">
                          <option value="" hidden>Choose...</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                        @error('is_lendable')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      {{--is sellable--}}
                      <div class="form-group">
                        <label for="is_sellable">is Sellable?</label><br>
                        <select name="is_sellable" class="form-control w-100" id="is_sellable">
                          <option value="" hidden>Choose...</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                        @error('is_sellable')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      {{--collection--}}
                      <div class="form-group">
                        <label for="collection_id">Collection</label><br>
                        <select name="collection_id" class="form-control w-100" id="collection_id">
                          <option value="" hidden>Choose...</option>
                          @foreach($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                          @endforeach
                        </select>
                        @error('collection_id')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      {{--author--}}
                      <div class="form-group">
                        <label for="author_id">Author</label><br>
                        <select name="author_id" class="form-control w-100" id="author_id">
                          <option value="" hidden>Choose...</option>
                          @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                          @endforeach
                        </select>
                        @error('author_id')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <!-- File chooser -->
                {{--                  <div class="form-group choose-file d-inline-flex">--}}
                {{--                    <i class="fa fa-user text-center px-3"></i>--}}
                {{--                    <input type="file" class="form-control-file mt-2 pt-1" id="input-file">--}}
                {{--                  </div>--}}
                <!-- Comunity Name -->
                {{--                  <div class="form-group">--}}
                {{--                    <label for="comunity-name">Comunity Name</label>--}}
                {{--                    <input type="text" class="form-control" id="comunity-name">--}}
                {{--                  </div>--}}
                <!-- Checkbox -->
                {{--                  <div class="form-check">--}}
                {{--                    <label class="form-check-label" for="hide-profile">--}}
                {{--                      <input class="form-check-input mt-1" type="checkbox" value="" id="hide-profile">--}}
                {{--                      Hide Profile from Public/Comunity--}}
                {{--                    </label>--}}
                {{--                  </div>--}}
                <!-- Zip Code -->
                {{--                  <div class="form-group">--}}
                {{--                    <label for="zip-code">Zip Code</label>--}}
                {{--                    <input type="text" class="form-control" id="zip-code">--}}
                {{--                  </div>--}}
                <!-- Submit button -->
                  <button class="btn btn-transparent">Save</button>
                </form>
              </div>
            </div>
          {{--            <div class="col-lg-6 col-md-6">--}}
          <!-- Change Password -->
          {{--              <div class="widget change-password">--}}
          {{--                <h3 class="widget-header user">Edit Password</h3>--}}
          {{--                <form action="#">--}}
          <!-- Current Password -->
          {{--                  <div class="form-group">--}}
          {{--                    <label for="current-password">Current Password</label>--}}
          {{--                    <input type="password" class="form-control" id="current-password">--}}
          {{--                  </div>--}}
          <!-- New Password -->
          {{--                  <div class="form-group">--}}
          {{--                    <label for="new-password">New Password</label>--}}
          {{--                    <input type="password" class="form-control" id="new-password">--}}
          {{--                  </div>--}}
          <!-- Confirm New Password -->
          {{--                  <div class="form-group">--}}
          {{--                    <label for="confirm-password">Confirm New Password</label>--}}
          {{--                    <input type="password" class="form-control" id="confirm-password">--}}
          {{--                  </div>--}}
          <!-- Submit Button -->
          {{--                  <button class="btn btn-transparent">Change Password</button>--}}
          {{--                </form>--}}
          {{--              </div>--}}
          {{--            </div>--}}
          {{--            <div class="col-lg-6 col-md-6">--}}
          <!-- Change Email Address -->
          {{--              <div class="widget change-email mb-0">--}}
          {{--                <h3 class="widget-header user">Edit Email Address</h3>--}}
          {{--                <form action="#">--}}
          <!-- Current Password -->
          {{--                  <div class="form-group">--}}
          {{--                    <label for="current-email">Current Email</label>--}}
          {{--                    <input type="email" class="form-control" id="current-email">--}}
          {{--                  </div>--}}
          <!-- New email -->
          {{--                  <div class="form-group">--}}
          {{--                    <label for="new-email">New email</label>--}}
          {{--                    <input type="email" class="form-control" id="new-email">--}}
          {{--                  </div>--}}
          <!-- Submit Button -->
            {{--                  <button class="btn btn-transparent">Change email</button>--}}
            {{--                </form>--}}
            {{--              </div>--}}
            {{--            </div>--}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
