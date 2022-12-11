<?php

namespace OctopusOsc\AdminLayout\Core\Traits;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait SpatieLogsActivity
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        $logOptions = new LogOptions;
        $logOptions->logAll();
        $logOptions->logOnlyDirty();

        return $logOptions;
    }
}
