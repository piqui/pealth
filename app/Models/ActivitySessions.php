<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitySessions extends Model
{
    use HasFactory;
    protected $primaryKey = '_id';

    // Whenever the start_utc_secs collumn is selected, return UTC timestamps as human readable datetime instead (YYYY-MM-DD HH:ii:SS)
    public function getStartUtcSecsAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
