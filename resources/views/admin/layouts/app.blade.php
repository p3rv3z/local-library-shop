@extends('adminlte::page')

@section('css')
  <style>
    .toast {
      margin-top: 57px !important;
      width: 500px !important;
    }
  </style>

  @push('css')

  @endpush
@stop

@section('js')
  @if(session()->has('success'))
    <script>
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        autohide: true,
        delay: 5000,
        body: '{{ session()->get('success') }}'
      })
    </script>
  @endif
  @if(session()->has('error'))
    <script>
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        autohide: true,
        delay: 5000,
        body: '{{ session()->get('error') }}'
      })
    </script>
  @endif

  @push('js')

  @endpush
@stop
