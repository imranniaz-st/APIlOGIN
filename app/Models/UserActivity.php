<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activities'; // Adjust if your table name differs

    protected $fillable = [
        'user_id',
        'activity_data',
        'time_spent_seconds',
        // Add other fillable fields as needed
    ];
}
