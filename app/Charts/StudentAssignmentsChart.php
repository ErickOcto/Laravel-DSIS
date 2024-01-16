<?php

namespace App\Charts;

use App\Models\Assessment;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // $student = Assessment::get();
        // $data = [
        //     $student->where('', 1)->count(),
        // ];
        // $label = [

        // ];
        // return $this->chart->barChart()
        //     ->setTitle('San Francisco vs Boston.')
        //     ->setSubtitle('Wins during season 2021.')
        //     ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        //     ->addData('Boston', [7, 3, 8, 2, 6, 4])
        //     ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
