<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GraphController extends Controller
{
    // Called when the user has passed parameters for the graph
    public function index()
    {
        // Convert unix timestamps to human readable timestamps
        $start_date = Carbon::parse(request()->start_date)->timestamp;
        $end_date = Carbon::parse(request()->end_date)->timestamp;
        // Controller used to create graphs to display watch data
        $graph_options = [
            'chart_title' => 'Steps taken',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\ActivitySessions',
            'group_by_field' => 'start_utc_secs',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'step_count',
            'filter_field' => 'start_utc_secs',
            'range_date_start' => $start_date,
            'range_date_end' => $end_date,
            'chart_color' => '0,255,255',
        ];
        // Create new LaravalChart and pass to the view for rendering
        $graph1 = new LaravelChart($graph_options);
        return view('graphing', compact('graph1'));
    }
    // Called when the user first views the graphing page. No parameters
    public function __invoke()
    {
        try { 
            DB::connection()->getPDO();
            return view('graphing_options'); // Database exists, so we can show graphing controls
        } catch (\Exception $e) { 
            return view('uploadarchive');  // Database does not exist, ask user to upload database file
        }
    }
}
