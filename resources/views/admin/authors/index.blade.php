@extends('admin.layouts.app')

@section('title', __('Authors'))

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ __('Authors') }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Authors') }}</li>
      </ol>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="row mb-2">
  <div class="col-md-12 text-right">
    <a href="{{ route('admin.authors.create') }}" class="btn btn-sm btn-primary">{{ __('Add Author') }}</a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">{{ __('Authors List') }}</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 250px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="{{ __('Search') }}">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
          <tr>
            <th>{{ __('Sl') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Status') }}</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @forelse($authors as $author)
            <tr>
              <td>{{ $author->sl }}</td>
              <td>{{ $author->name }}</td>
              <td>{{ $author->description }}</td>
              <td>
                @if($author->status)
                  <span class="badge badge-success">{{ __('Active') }}</span>
                @else
                  <span class="badge badge-danger">{{ __('Inactive') }}</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.authors.edit', $author->id) }}"
                   class="btn btn-xs btn-outline-primary">{{ __('Edit') }}</a>
                <button class="btn btn-xs btn-outline-danger"
                        onclick="document.getElementById('class-delete-form-{{ $author->id }}').submit()"
                        type="button">{{ __('Delete') }}
                </button>
              </td>
            </tr>
            <form action="{{ route('admin.authors.destroy', $author->id) }}"
                  id="class-delete-form-{{ $author->id }}" method="POST">@csrf @method('DELETE')</form>
          @empty
            <td class="text-center" colspan="7">{{ __('No records found.') }}</td>
          @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{ $authors->links() }}
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@stop
