@extends('visitor.layouts.app')

@section('content')
  <section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
      <!-- Row Start -->
      <div class="row">
        @include('member/layouts/partials/_left-sidebar')
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <!-- Recently Favorited -->
          <div class="widget dashboard-container my-adslist">
            <div class="widget-header d-flex justify-content-between">
              <h3>
                My Books
              </h3>
              <a href="{{ route('member.books.create') }}" class="btn btn-main-sm">Add New</a>
            </div>
            <table class="table table-responsive product-dashboard-table">
              <tbody>
              @foreach($books as $book)
                <tr>
                  <td class="product-thumb">
                    <img width="109.2px" height="156.24px" src="{{ $book->getFirstMediaUrl('book-covers') ? $book->getFirstMediaUrl('book-covers') : 'http://via.placeholder.com/110x157'}}" alt="image description"></td>
                  <td class="pl-2 product-details">
                    <h3 class="title">{{$book->title}} </h3>
                    <span class="add-id"><strong>Price: </strong>{{$book->price}} TK</span>
                    <span class="add-id"><strong>Lending rate:</strong>{{$book->lending_rate}} TK per day</span>
                    <span class="add-id"><strong>Category</strong>{{$book->category->name}}</span>
                    <span class="add-id"><strong>Author</strong>{{$book->author->name}}</span>
                    <span><strong>Added on: </strong><time>{{$book->created_at->format('d F, Y')}}</time> </span>
{{--                    <span class="status active"><strong>Status</strong>Active</span>--}}
{{--                    <span class="location"><strong>City</strong>Dhaka,Bangladesh</span>--}}
                  </td>
                  <td class="product-category d-none"><span class="categories"></span></td>
                  <td class="action" data-title="Action">
                    <div class="">
                      <ul class="list-inline justify-content-center">
                        <li class="list-inline-item">
                          <a data-toggle="tooltip" data-placement="top" title="" class="view" href="{{ route('member.books.show', $book->id) }}" data-original-title="view">
                            <i class="fa fa-eye"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="edit" data-toggle="tooltip" data-placement="top" title="" href="{{ route('member.books.edit', $book->id) }}" data-original-title="Edit">
                            <i class="fa fa-pencil"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="delete" data-toggle="modal" data-target="#delete-modal-{{$book->id}}"  title="" href="javascript:{}" >
                            <i class="fa fa-trash"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- Modal -->
                      <div class="modal fade" id="delete-modal-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-left">Do you really want to delete these records? This process cannot be undone.</div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-book-{{$book->id}}').submit();" >Delete</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <form method="POST" action="{{ route('member.books.destroy', $book->id) }}" id="delete-book-{{$book->id}}" class="d-none">
                        @csrf
                        @method('DELETE')
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

          </div>

          <!-- pagination -->
          {{ $books->links() }}
{{--          <div class="pagination justify-content-center">--}}
{{--            <nav aria-label="Page navigation example">--}}
{{--              <ul class="pagination">--}}
{{--                <li class="page-item">--}}
{{--                  <a class="page-link" href="#" aria-label="Previous">--}}
{{--                    <span aria-hidden="true">«</span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
{{--                  </a>--}}
{{--                </li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item">--}}
{{--                  <a class="page-link" href="#" aria-label="Next">--}}
{{--                    <span aria-hidden="true">»</span>--}}
{{--                    <span class="sr-only">Next</span>--}}
{{--                  </a>--}}
{{--                </li>--}}
{{--              </ul>--}}
{{--            </nav>--}}
{{--          </div>--}}
          <!-- pagination -->

        </div>
      </div>
      <!-- Row End -->
    </div>
    <!-- Container End -->
  </section>
@endsection


