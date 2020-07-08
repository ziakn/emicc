@extends('layouts.home')

@section('content')
<div id="app">
    <z-dashboard>
</div>
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
