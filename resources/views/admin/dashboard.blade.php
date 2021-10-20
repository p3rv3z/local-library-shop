@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Hi, {{ auth()->user()->name }}. Welcome to Local Library Shop.</p>
@stop
