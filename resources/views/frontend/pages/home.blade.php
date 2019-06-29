@extends('frontend.layouts.master')

@section('title', 'LGthree')

@section('stylesheets')
<style>
    #home-airports-map {
        width: 100%;
        height: 70vh !important;
        background: #fff;
        border: 1px solid #e4e7ea;
    border-radius: 0.25rem;
    }

</style>
@endsection

@section('main')
  <airport-search :airports="{{ $airports }}"></airport-search>
  <airports-map :airports="{{ $airports }}"></airports-map>
@endsection

@section('javascripts')
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.4/plugins/responsive/responsive.min.js"></script>
@endsection
