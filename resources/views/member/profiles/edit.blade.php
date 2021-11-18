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
                <div class="widget-header user d-flex justify-content-between align-items-center">
                  <h3 class="m-0">Edit Information</h3>
                  <button class="text-white my-button m-0 d-lg-block d-none" form="update-profile">
                    <i class="fa fa-refresh"></i><span class="ml-2">Update Info</span>
                  </button>
                </div>
                <form id="update-profile" action="{{route('member.profile.update')}}" method="POST"
                      enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- Name -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name"
                               value="{{ old('name', $user->name) }}">
                      </div>
                      @error('name')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>
                  <!-- Date of birth -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input name="date_of_birth" type="date" class="form-control" id="date_of_birth"
                               value="{{ old('date_of_birth', $user->date_of_birth) }}">
                      </div>
                      @error('date_of_birth')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>
                  <!-- Gender -->
                  <div class="form-group">
                    <label for="first-name">Gender</label>
                    <div>
                      <div class="form-check form-check-inline mb-0">
                        <input name="gender" value="MALE" class="form-check-input" type="radio" id="male"
                               @if(old('gender', $user->gender) == 'MALE') checked @endif>
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="form-check form-check-inline mb-0">
                        <input name="gender" value="FEMALE" class="form-check-input" type="radio" id="female"
                               @if(old('gender', $user->gender) == 'FEMALE') checked @endif >
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                      <div class="form-check form-check-inline mb-0">
                        <input name="gender" value="OTHER" class="form-check-input" type="radio" id="other"
                               @if(old('gender', $user->gender) == 'OTHER') checked @endif>
                        <label class="form-check-label" for="other">Other</label>
                      </div>
                    </div>
                    @error('gender')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>
                  <!-- Profession -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="profession">Profession</label>
                        <select name="profession" class="form-control w-100" id="profession">
                          <option value="" hidden>Choose one...</option>
                          <option value="AUTHOR" @if(old('profession', $user->profession) == 'AUTHOR') selected @endif>
                            Author
                          </option>
                          <option value="STUDENT"
                                  @if(old('profession', $user->profession) == 'STUDENT') selected @endif>Student
                          </option>
                          <option value="OTHER" @if(old('profession', $user->profession) == 'OTHER') selected @endif>
                            Other
                          </option>
                        </select>
                        @error('profession')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <!-- Phone -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input name="phone" type="text" class="form-control" id="date_of_birth"
                               value="{{ old('phone', $user->phone) }}">
                      </div>
                      @error('phone')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="date_of_birth"
                               value="{{ old('email', $user->email) }}">
                      </div>
                      @error('email')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>

                  <!-- City -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="city_id">City</label><br>
                        <select name="city_id" class="form-control my-select w-100" data-live-search="true" id="city_id">
                          <option value="" hidden>Choose one...</option>
                          @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                                    @if(old('city_id', $user->city_id) == $city->id) selected @endif>{{ $city->name }}</option>
                          @endforeach
                        </select>
                        @error('city_id')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <!-- Address -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address"
                                  rows="3">{{ old('address', $user->address) }}</textarea>
                      </div>
                      @error('address')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>

                  <!-- File chooser -->
                  <div class="form-group">
                    <label for="avatar">Avatar</label>

                    <div x-data="imageViewer('{{ $user->getFirstMediaUrl('user-avatars') ?? asset('assets/images/user/user-thumb.jpg') }}')"
                         class="form-group choose-file d-flex align-items-center">
                      <template x-if="imageUrl">
                        <div class="profile-thumb">
                          <img :src="imageUrl" width="80" height="80" alt=""
                               class="rounded-circle">
                        </div>
                      </template>
                      <input name="avatar" type="file" accept="image/*" class="ml-2 form-control-file" id="avatar"
                             @change="fileChosen">
                    </div>
                    @error('avatar')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  <button class="text-white my-button m-0 d-block d-lg-none w-100" form="update-profile">
                    <i class="fa fa-refresh"></i><span class="ml-2">Update Information</span>
                  </button>
                </form>
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
    $(document).ready(function() {
      $('#city_id').niceSelect('destroy');
      $('#city_id').selectpicker();
      // $('#city_id').select2(
      //   {theme: "classic"}
      // );
    });

    function imageViewer(src = '') {
      return {
        imageUrl: src,

        fileChosen(event) {
          this.fileToDataUrl(event, src => this.imageUrl = src)
        },

        fileToDataUrl(event, callback) {
          if (!event.target.files.length) return

          let file = event.target.files[0], reader = new FileReader()

          reader.readAsDataURL(file)
          reader.onload = e => callback(e.target.result)
        },
      }
    }

  </script>
@endpush
