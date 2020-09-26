@extends('layouts.admin_layout')
@section('content')
    <div id="chart" style="height: 300px;" class="w-1/2">
        {!! $chart->container() !!}
        {!! $chart->script() !!}
    </div>
    <div id="chart" style="height: 300px;" class="w-1/2">
        {!! $user_chart->container() !!}
        {!! $user_chart->script() !!}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@endsection
