@extends('layouts.admin_layout')
@section('content')
    <div id="chart" style="height: 300px;" class="w-full">
        {!! $chart->container() !!}
        {!! $chart->script() !!}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@endsection
