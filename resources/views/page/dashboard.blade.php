@extends('layouts.admin_layout')
@section('content')
 <div class="w-full h-full flex flex-col sm:flex-row">
  <div class="w-full sm:w-1/2 h-full flex flex-col justify-center items-center">
      <div id="chart" style="height: 300px;" class="w-1/2">
        {!! $chart->container() !!}
        {!! $chart->script() !!}
    </div>
    <div id="chart" style="height: 300px;" class="w-1/2">
        {!! $user_chart->container() !!}
        {!! $user_chart->script() !!}
    </div>
  </div>
  <div class="w-full sm:w-1/2 h-full px-2 py-1">
      @livewire('message')
  </div>
 </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@endsection
