<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Asset extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag', 'location', 'type', 'make', 'model', 'identifier', 'supplier', 'supply_date', 'serial_no', 'other_ids', 'invoice_no'
    ];

    /**
     * Get the comments for the asset
     */
    public function comments()
    {
        return $this->hasMany('App\Models\AssetComments');
    }
}
