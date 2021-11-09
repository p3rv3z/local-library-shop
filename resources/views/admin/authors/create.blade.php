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
        <li class="breadcrumb-item"><a href="{{ route('admin.authors.index') }}">{{ __('Authors') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Add Author') }}</li>
      </ol>
    </div>
  </div>
</div>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card card-outline card-primary">

      <div class="card-header">
        <h3 class="card-title">{{ __('Add Author') }}</h3>
      </div>
      <!-- /.card-header -->

      <!-- form start -->
      <form method="POST" action="{{ route('admin.authors.store') }}">
        @csrf
        <div class="card-body">
          {{-- Name --}}
          <div>
            <label for="name">{{ __('Name') }}<span class="text-danger">*</span></label>
            <x-adminlte-input name="name" value="{{old('name')}}" placeholder="Enter name" required/>
          </div>

          {{-- Description --}}
          <div>
            <label for="description">{{ __('Description') }}<span class="text-danger">*</span></label>
            <x-adminlte-text-editor name="description" rows=5 placeholder="Write description..." required>
              {!! old('description') !!}
            </x-adminlte-text-editor>
          </div>

          {{-- Status --}}
          <div class="">
            <label for="status">{{ __('Status') }}<span class="text-danger">*</span></label>
            <x-adminlte-select name="status" required>
              <option value="1" selected>{{ __('Active') }}</option>
              <option value="0" @if ( !old('status') AND old('status') != null) selected @endif >{{ __('Inactive') }}</option>
            </x-adminlte-select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
          <x-adminlte-button type="submit" label="Save" theme="primary" icon="fas fa-lg fa-save"/>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
