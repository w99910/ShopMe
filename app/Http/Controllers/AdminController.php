<?php

namespace App\Http\Controllers;

use App\Charts\RevenueChart;
use App\Revenue;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $revenues=Revenue::pluck('invoice','created_at');
        $invoice_user=Revenue::pluck('invoice','user_id');

        $chart=new RevenueChart;
        $user_chart=new RevenueChart;
        $user_chart->labels($invoice_user->keys());
        $user_chart->dataset('User Id','line',$invoice_user->values());

        $chart->labels($revenues->keys());
        $chart->dataset('Current Revenue','doughnut',$revenues->values())
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        $chart->minimalist(true);
        return view('page.dashboard')->with(compact('chart','user_chart'));
    }
    public function get(){

    }

}
