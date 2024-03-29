@extends('visitor.layouts.app')

@section('content')
  <section class="user-profile section">
    <div class="container">
      <div class="row">
        @include('member/layouts/partials/_left-sidebar')
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
          <!-- Edit Book Info -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="widget personal-info">
                <!-- Edit Profile Welcome Text -->
                <div class="widget-header user d-flex justify-content-between align-items-center">
                  <h3 class="m-0">Edit Book Information</h3>
                </div>
                <form method="POST" action="{{route('member.books.update', $book->id)}}" enctype="multipart/form-data"
                      id="save-book-info" class="needs-validation">
                @csrf
                @method('PATCH')
                <!-- Title -->
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old('title', $book->title) }}"
                           placeholder="Title">
                    @error('title')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--description--}}
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description"
                              rows="5">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--isbn--}}
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input name="isbn" type="text" class="form-control" id="isbn" value="{{ old('isbn', $book->isbn) }}"
                           placeholder="ISBN">
                    @error('isbn')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--edition--}}
                  <div class="form-group">
                    <label for="edition">Edition</label>
                    <input name="edition" type="text" class="form-control" id="edition" value="{{ old('edition', $book->edition) }}"
                           placeholder="Edition">
                    @error('edition')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--Pages--}}
                  <div class="form-group">
                    <label for="pages">Pages</label>
                    <input name="pages" type="number" class="form-control" id="pages" value="{{ old('pages', $book->pages) }}"
                           placeholder="Pages">
                    @error('pages')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--Price--}}
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="number" class="form-control" id="price" value="{{ old('price', $book->price) }}"
                           placeholder="Price">
                    @error('price')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  {{--Lending Rate--}}
                  <div class="form-group">
                    <label for="lending_rate">Lending Rate</label>
                    <input name="lending_rate" type="number" class="form-control" id="lending_rate" value="{{ old('lending_rate', $book->lending_rate) }}"
                           placeholder="Price" min="0">
                    @error('lending_rate')
                    <span class="text-danger"><b>{{$message}}</b></span>
                    @enderror
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      {{--collection--}}
                      <div class="form-group">
                        <label for="collection_id">Category</label><br>
                        <select name="collection_id" class="form-control w-100" id="collection_id">
                          <option value="" hidden>Choose...</option>
                          @foreach($collections as $collection)
                            <option value="{{ $collection->id }}" @if($book->collection_id == $collection->id) selected @endif>{{ $collection->name }}</option>
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
                            <option value="{{ $author->id }}" @if($book->author_id == $author->id) selected @endif>{{ $author->name }}</option>
                          @endforeach
                        </select>
                        @error('author_id')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <!-- Book Cover -->
                  <div class="form-group">
                    <label for="book_cover">Book Cover</label>

                    <div class="form-group choose-file d-flex align-items-center">
                      <input name="book_cover" type="file" accept="image/png, image/jpeg, image/jpg"
                             class="ml-2 form-control-file" id="book_cover">
                      @error('book_cover')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>

                  <!-- Book Sample Pdf -->
                  <div class="form-group">
                    <label for="sample_pdf">Book Sample PDF</label>

                    <div class="form-group choose-file d-flex align-items-center">
                      <input name="sample_pdf" type="file" accept="application/pdf" class="ml-2 form-control-file"
                             id="sample_pdf">
                      @error('sample_pdf')
                      <span class="text-danger"><b>{{$message}}</b></span>
                      @enderror
                    </div>
                  </div>

                  <div>
                    <button class="text-white my-button float-right" form="save-book-info">
                      <i class="fa fa-save"></i><span class="ml-2">Update</span>
                    </button>
                  </div>
                  <br>
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
