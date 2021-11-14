@extends('visitor.layouts.app')


@section('content')
  <section class="user-profile section">
    <div class="container">
      <div class="row">
        @include('member/layouts/partials/_left-sidebar')
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <div class="row">
            <div class="col-12">
              <!-- Change Password -->
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="widget personal-info">
                    <div class="widget-header user d-flex justify-content-between align-items-center">
                      <h3 class="m-0">Change Password</h3>
                      <button class="text-white my-button m-0 d-lg-block d-none" form="update-profile">
                        <i class="fa fa-refresh"></i><span class="ml-2">Change Password</span>
                      </button>
                    </div>
                    <form id="update-profile" action="{{route('member.change.password')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- Password -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input name="current_password" type="password" class="form-control" id="current_password">
                            @error('current_password')
                            <span class="text-danger"><b>{{$message}}</b></span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <!-- New Password -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input name="new_password" type="password" class="form-control" id="new_password">
                            @error('new_password')
                            <span class="text-danger"><b>{{$message}}</b></span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <!-- Confirm Password -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="new_password_confirmation">Confirm Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control"
                                   id="new_password_confirmation">
                          </div>
                        </div>
                      </div>

                      <button class="text-white my-button m-0 d-block d-lg-none w-100" form="update-profile">
                        <i class="fa fa-refresh"></i><span class="ml-2">Change Password</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- Location sharing request message -->
              <div class="widget alert alert-info" role="alert">
                <i class="fa fa-info-circle"></i> For better user experience please share your location by allowing the
                pop-up.
              </div>
              <!-- Change location Info -->
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div x-data="currentLoacation({{ $user->latitude }}, {{ $user->longitude }})" class="widget personal-info">
                    <div class="widget-header user d-flex justify-content-between align-items-center">
                      <h3 class="m-0">Location Information</h3>
                      <button class="text-white my-button m-0 d-lg-block d-none" form="set-location">
                        <i class="fa fa-refresh"></i><span class="ml-2">Update</span>
                      </button>
                    </div>
                    <form id="set-location" action="{{route('member.set.location')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- Latitude -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input name="latitude" type="text" class="form-control" id="latitude"
                                   :value="latitude">
                            @error('latitude')
                            <span class="text-danger"><b>{{$message}}</b></span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <!-- Longitude -->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input name="longitude" type="text" class="form-control" id="longitude"
                                   :value="longitude">
                            @error('longitude')
                            <span class="text-danger"><b>{{$message}}</b></span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <button class="text-white my-button col-lg-6" @click.prevent="setLocation">
                        <i class="fa fa-location-arrow"></i><span class="ml-2">Set Current Location</span>
                      </button>

                      <button class="text-white my-button m-0 d-block d-lg-none w-100" form="set-location">
                        <i class="fa fa-refresh"></i><span class="ml-2">Update Location</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('js')
  <script>

    function currentLoacation(lat = null, long = null)
    {
      return {
        latitude: lat,
        longitude: long,

        setLocation(){
          navigator.geolocation.getCurrentPosition((position) => {
            this.latitude = position.coords.latitude
            this.longitude = position.coords.longitude
          })
        }
      }

    }

  </script>
@endpush
