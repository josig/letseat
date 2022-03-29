@extends('layouts.app')

@section('styles')
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@include('partials._content')
@endsection


@section('vendors')
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
@endsection