<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class MobileDeviceStatus extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imei', 'fsn', 'type', 'iccid', 'imsi', 'plmn', 'operator', 'host', 'lac', 'cellid', 'band', 'bandlock', 'rssi', 'temp'
    ];
}
