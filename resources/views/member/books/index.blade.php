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
              <thead>
              <tr>
                <th>Image</th>
                <th>Book Title</th>
                <th class="text-center">Collection</th>
                <th class="text-center">Action</th>
              </tr>
              </thead>
              <tbody>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="{{asset("assets/images/products/products-1.jpg")}}" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title">A Time to kill</h3>
                  <span class="add-id"><strong>Author</strong> Humayun</span>
                  <span><strong>Added on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>City</strong>Dhaka,Bangladesh</span>
                </td>
                <td class="product-category"><span class="categories">Fictions</span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="" class="view" href="category.html" data-original-title="view">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Edit">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Delete">
                          <i class="fa fa-trash"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="{{asset("assets/images/products/products-2.jpg")}}" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title">A time to kill</h3>
                  <span class="add-id"><strong>Author</strong> Humayun</span>
                  <span><strong>Added on: </strong><time>Feb 12, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>City</strong>Dhaka, Bangladesh</span>
                </td>
                <td class="product-category"><span class="categories">Fictions</span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="" class="view" href="category.html" data-original-title="View">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Edit">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Delete">
                          <i class="fa fa-trash"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="product-thumb">
                  <img width="80px" height="auto" src="{{asset("assets/images/products/products-3.jpg")}}" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title">A Time to kill</h3>
                  <span class="add-id"><strong>Author</strong> Humayun</span>
                  <span><strong>Added on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>City</strong>Dhaka,Bangladesh</span>
                </td>
                <td class="product-category"><span class="categories">Fictions</span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="" class="view" href="category.html" data-original-title="View">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Edit">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Delete">
                          <i class="fa fa-trash"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="{{asset("assets/images/products/products-4.jpg")}}" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title">A Time to kill</h3>
                  <span class="add-id"><strong>Author</strong> Humayun</span>
                  <span><strong>Added on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>City</strong>Dhaka, Bangladesh</span>
                </td>
                <td class="product-category"><span class="categories">Fictions</span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="" class="view" href="category.html" data-original-title="View">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Edit">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Delete">
                          <i class="fa fa-trash"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="{{asset("assets/images/products/products-1.jpg")}}" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title">A Time to kill</h3>
                  <span class="add-id"><strong>Author</strong> Humayun</span>
                  <span><strong>Added on: </strong><time>Jun 27, 2017</time> </span>
                  <span class="status active"><strong>Status</strong>Active</span>
                  <span class="location"><strong>City</strong>Dhaka,Bangladesh</span>
                </td>
                <td class="product-category"><span class="categories">Fictions</span></td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a href="category.html" data-toggle="tooltip" data-placement="top" title="" class="view" data-original-title="View">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="edit" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Edit">
                          <i class="fa fa-pencil"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" data-toggle="tooltip" data-placement="top" title="" href="" data-original-title="Delete">
                          <i class="fa fa-trash"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>

          </div>

          <!-- pagination -->
          <div class="pagination justify-content-center">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- pagination -->

        </div>
      </div>
      <!-- Row End -->
    </div>
    <!-- Container End -->
  </section>
@endsection


