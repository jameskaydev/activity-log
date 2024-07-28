<?php

namespace YourVendor\ActivityLog\Traits;

use YourVendor\ActivityLog\Models\Activity;

trait LogsActivity
{
    public static function bootLogsActivity()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->logActivity($event);
            });
        }
    }

    protected function logActivity($event)
    {
        Activity::create([
            'log_name' => config('activitylog.log_name'),
            'description' => "{$event} event on " . class_basename($this),
            'subject_id' => $this->id,
            'subject_type' => get_class($this),
            'causer_id' => auth()->id() ?? null,
            'causer_type' => auth()->user() ? get_class(auth()->user()) : null,
            'properties' => $this->attributesToArray(),
        ]);
    }

    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return ['created', 'updated', 'deleted'];
    }
}
