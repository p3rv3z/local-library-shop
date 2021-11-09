@extends('admin.layouts.app')

@section('title', __('Cities'))

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>{{ __('Cities') }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Cities') }}</li>
      </ol>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="row mb-2">
  <div class="col-md-12 text-right">
    <a href="{{ route('admin.cities.create') }}" class="btn btn-sm btn-primary">{{ __('Add City') }}</a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">{{ __('Cities List') }}</h3>

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
            <th>{{ __('Status') }}</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @forelse($cities as $city)
            <tr>
              <td>{{ $city->sl }}</td>
              <td>{{ $city->name }}</td>
              <td>
                @if($city->status)
                  <span class="badge badge-success">{{ __('Active') }}</span>
                @else
                  <span class="badge badge-danger">{{ __('Inactive') }}</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.cities.edit', $city->id) }}"
                   class="btn btn-xs btn-outline-primary">{{ __('Edit') }}</a>
                <button class="btn btn-xs btn-outline-danger"
                        onclick="document.getElementById('class-delete-form-{{ $city->id }}').submit()"
                        type="button">{{ __('Delete') }}
                </button>
              </td>
            </tr>
            <form action="{{ route('admin.cities.destroy', $city->id) }}"
                  id="class-delete-form-{{ $city->id }}" method="POST">@csrf @method('DELETE')</form>
          @empty
            <td class="text-center" colspan="7">{{ __('No records found.') }}</td>
          @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        {{ $cities->links() }}
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@stop
