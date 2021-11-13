@extends('visitor.layouts.app')


@section('content')
  <section class="user-profile section">
    <div class="container">
      <div class="row">
        @include('member/layouts/partials/_left-sidebar')
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <!-- Edit Profile Welcome Text -->
          <div class="widget alert alert-info" role="alert">
            <i class="fa fa-info-circle"></i> For better user experience please share your location by allowing the
            pop-up.
          </div>
          <!-- Edit Personal Info -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="widget personal-info">
                <div class="widget-header user d-block d-lg-flex justify-content-between align-items-center">
                  <h3 class="m-0">Personal Information</h3>
                  <a class="text-white" href="{{route('member.profile.edit')}}">
                    <span class="text-primary">Edit information</span>
                  </a>
                </div>
                <form>
                  <!-- Name -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" value="{{ $user->name }}" disabled>
                      </div>
                    </div>
                  </div>
                  <!-- Date of birth -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" value="{{ $user->date_of_birth }}"
                               disabled>
                      </div>
                    </div>
                  </div>
                  <!-- Gender -->
                  <div class="form-group">
                    <label for="first-name">Gender</label>
                    <div>
                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" id="male" @if($user->gender == 'MALE') checked
                               @else disabled @endif>
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" id="female" @if($user->gender == 'FEMALE') checked
                               @else disabled @endif >
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" id="other" @if($user->gender == 'OTHER') checked
                               @else disabled @endif>
                        <label class="form-check-label" for="other">Other</label>
                      </div>
                    </div>
                  </div>
                  <!-- Profession -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="profession">Profession</label>
                        <input class="form-control" id="profession" value="{{ $user->profession }}" disabled>
                      </div>
                    </div>
                  </div>
                  <!-- Phone -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" id="phone" value="{{ $user->phone }}" disabled>
                      </div>
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" value="{{ $user->email }}" disabled>
                      </div>
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="city">City</label>
                        <input class="form-control" id="city" value="{{ $user->city ? $user->city->name : '' }}" disabled>
                      </div>
                    </div>
                  </div>
                  <!-- Address -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address"
                                  rows="3" disabled>{{ $user->address }}</textarea>
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
                {{--                    <input class="form-control" id="comunity-name">--}}
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
                {{--                    <input class="form-control" id="zip-code">--}}
                {{--                  </div>--}}
                <!-- Submit button -->
                  {{--                  <button class="btn btn-transparent">Save My Changes</button>--}}
                </form>
              </div>
            </div>
          {{--            <div class="col-lg-6 col-md-6">--}}
          {{--              <!-- Change Password -->--}}
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
          {{--                  <!-- Submit Button -->--}}
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
  <script>
    function testLocation() {
      navigator.geolocation.getCurrentPosition((position) => {
        console.log(position.coords.longitude)
        console.log(position.coords.latitude)
      })
    }

    testLocation();

    var x = document.getElementById("demo");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      lat = position.coords.latitude;
      lon = position.coords.longitude;
      displayLocation(lat, lon);
    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          x.innerHTML = "User denied the request for Geolocation."
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML = "Location information is unavailable."
          break;
        case error.TIMEOUT:
          x.innerHTML = "The request to get user location timed out."
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML = "An unknown error occurred."
          break;
      }
    }

    function displayLocation(latitude, longitude) {
      var geocoder;
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(latitude, longitude);

      geocoder.geocode(
        {'latLng': latlng},
        function (results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              var add = results[0].formatted_address;
              var value = add.split(",");

              count = value.length;
              country = value[count - 1];
              state = value[count - 2];
              city = value[count - 3];
              x.innerHTML = "city name is: " + city;
            } else {
              x.innerHTML = "address not found";
            }
          } else {
            x.innerHTML = "Geocoder failed due to: " + status;
          }
        }
      );
    }
  </script>
@endsection

