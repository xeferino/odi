@extends('admin.layouts.main')

@section('title', 'Inicio')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.css') }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
        </div>
    </div>
@endsection

@section('scripts')
<!-- This Page JS -->
<script src="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
@endsection
