@extends('adminlte::page')

@section('title', 'Collections')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Collections</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.collections.index') }}">Collections</a></li>
        <li class="breadcrumb-item active">Edit Collection</li>
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
        <h3 class="card-title">Edit Collection</h3>
      </div>
      <!-- /.card-header -->

      <!-- form start -->
      <form method="POST" action="{{ route('admin.collections.update', $collection->id) }}">
        @csrf
        @method('PATCH')
        <div class="card-body">
          {{-- Name --}}
          <div>
            <label for="name">{{ __('Name') }}<span class="text-danger">*</span></label>
            <x-adminlte-input name="name" value="{{old('name', $collection->name)}}" placeholder="Enter name" required/>
          </div>

          {{-- Status --}}
          <div class="">
            <label for="status">{{ __('Status') }}<span class="text-danger">*</span></label>
            <x-adminlte-select name="status" required>
              <option value="1" @if(old('status', $collection->status)) selected @endif >{{ __('Active') }}</option>
                <option value="0" @if(!old('status', $collection->status)) selected @endif >{{ __('Inactive') }}</option>
            </x-adminlte-select>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer text-right">
          <x-adminlte-button type="submit" label="Update" theme="success" icon="fas fa-sync"/>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
