<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
  <div class="sidebar">
    <!-- User Widget -->
    <div class="widget user-dashboard-profile">
      <!-- User Image -->
      <div class="profile-thumb">
        <img src="{{ asset('assets/images/user/user-thumb.jpg') }}" alt="" class="rounded-circle">
      </div>
      <!-- User Name -->
      <h5 class="text-center">{{auth()->user()->name}}</h5>
      {{--      <p>Joined February 06, 2017</p>--}}
      <p>Joined at {{auth()->user()->created_at->format('M d, Y')}}</p>
    </div>
    <!-- Dashboard Links -->
    @php
      $total_Books = \App\Models\Book::where('owner_id', auth()->id())->count();
      $total_requests = \App\Models\BookRequest::where('sender_id', auth()->id())->count();
      $total_buy_requests = \App\Models\BookRequest::where('receiver_id', auth()->id())->where('type', 'Buy')->count();
      $total_lend_requests = \App\Models\BookRequest::where('receiver_id', auth()->id())->where('type', 'Lend')->count();
    @endphp
    <div class="widget user-dashboard-menu">
      <ul>
        <li @if (request()->is('member/profile*')) class="active" @endif><a href="{{ route('member.profile') }}"><i
              class="fa fa-user"></i> My Profile</a></li>
        <li @if (request()->is('member/books*')) class="active" @endif><a href="{{ route('member.books.index') }}"><i
              class="fa fa-book"></i> My Books <span>{{ $total_Books }}</span></a></li>
        <li @if (request()->is('member/requests')) class="active" @endif><a href="{{ route('member.requests.index') }}"><i
              class="fa fa-envelope"></i> My requests <span>{{ $total_requests }}</span></a></li>
        <li @if (request()->is('member/requests-by-type/Buy')) class="active" @endif><a href="{{ route('member.requests-by-type.index', 'Buy') }}"><i
              class="fa fa-envelope"></i> Buy requests <span>{{ $total_buy_requests }}</span></a></li>
        <li @if (request()->is('member/requests-by-type/Lend')) class="active" @endif><a href="{{ route('member.requests-by-type.index', 'Lend') }}"><i
              class="fa fa-envelope"></i> Lend requests <span>{{ $total_lend_requests }}</span></a></li>
      </ul>
    </div>

    <!-- delete-account modal -->
    <!-- delete account popup modal start-->
    <!-- Modal -->
    <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
            <h6 class="py-2">Are you sure you want to delete your account?</h6>
            <p>Do you really want to delete these records? This process cannot be undone.</p>
            <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
          </div>
          <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <!-- delete account popup modal end-->
    <!-- delete-account modal -->

  </div>
</div>
