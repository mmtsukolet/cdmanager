@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Counter {{ $counter->id }}</h3>
                    @can('view-'.str_slug('Counter'))
                        <a class="btn btn-success pull-right" href="{{ url('/counter') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>



                </div>
            </div>
        </div>
    </div>

@endsection

