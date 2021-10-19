@extends('adminlte::page')

@section('title', __('Collections'))

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ __('Collections') }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Collections') }}</li>
      </ol>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="row mb-2">
  <div class="col-md-12 text-right">
    <a href="{{ route('admin.collections.create') }}" class="btn btn-sm btn-primary">{{ __('Add Collection') }}</a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">{{ __('Collections List') }}</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
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
            <th>{{ __('Status') }}</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @forelse($collections as $collection)
            <tr>
              <td>{{ $collection->sl }}</td>
              <td>{{ $collection->name }}</td>
              <td>
                @if($collection->status)
                  <span class="badge badge-success">{{ __('Active') }}</span>
                @else
                  <span class="badge badge-danger">{{ __('Inactive') }}</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.collections.edit', $collection->id) }}"
                   class="btn btn-xs btn-outline-primary">{{ __('Edit') }}</a>
                <button class="btn btn-xs btn-outline-danger"
                        onclick="document.getElementById('class-delete-form-{{ $collection->id }}').submit()"
                        type="button">{{ __('Delete') }}
                </button>
              </td>
            </tr>
            <form action="{{ route('admin.collections.destroy', $collection->id) }}"
                  id="class-delete-form-{{ $collection->id }}" method="POST">@csrf @method('DELETE')</form>
          @empty
            <td class="text-center" colspan="7">{{ __('No records found.') }}</td>
          @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{ $collections->links() }}
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@stop
