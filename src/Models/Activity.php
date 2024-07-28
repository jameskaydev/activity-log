<?php

namespace YourVendor\ActivityLog\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity_log';

    protected $guarded = [];
}
