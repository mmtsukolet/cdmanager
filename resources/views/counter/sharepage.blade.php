@extends('layouts.master')

@section('content')
    <content-page></content-page>
@endsection

@push('scripts')
    <script src="custom/js/required/by/child"></script>
@endpush
