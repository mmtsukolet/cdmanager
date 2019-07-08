@extends('layouts.master')

@push('css')
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
@endpush

@section('content')
    @if(auth()->user()->hasRole('admin'))

        <div class="container-fluid">

            <!-- ===== Right-Sidebar ===== -->
                {{--@include('layouts.partials.right-sidebar')--}}
            <!-- ===== Right-Sidebar-End ===== -->
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Welcome to Dashboard</h1>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('js')
    <script src="{{asset('js/db1.js')}}"></script>

@endpush
