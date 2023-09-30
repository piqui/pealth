<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// Health data from pebble watch
class Classifier extends Model
{
    use HasFactory;
    public function __construct(
        $date = new \DateTime('2023-03-24 00:00:00')) // default contructor, in case user didn't specify a DateTime
    {
        echo "classifier constructor called</br>";
        echo "results since {$date->format('Y-m-d H:i:s')}</br>";
        $results = DB::select("select active_gcal, step_count, distance_mm from activity_sessions where start_local_secs > {$date->getTimestamp()}");
        $steps = 0;
        $calories = 0;
        $distance = 0;
        foreach($results as $row) {
            $steps += $row->step_count;
            $calories += $row->active_gcal;
            $distance += $row->distance_mm;
        }
        //Add missing floating point to calories
        $calories = $calories / 100;
        //Convert distance from mm to m
        $distance = $distance / 1000;
        echo "steps: {$steps}</br>";
        echo "calories: {$calories}</br>";
        echo "distance: {$distance}</br>";
    }
}
