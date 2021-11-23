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
     * The primary key associated with the table.
     * 
     * This section probably will not be needed with new table
     *
     * @var string
     */
    protected $primaryKey = 'internal_id';

    /**
     * The connection name for the model.
     * 
     * This section will not be needed with new table
     *
     * @var string
     */
    protected $connection = 'site';

    /**
     * The table associated with the model.
     *
     * This section will not be needed with new table
     * 
     * @var string
     */
    protected $table = 'asset_register';

    /**
     * No timestamps for this table
     *      
     * This section probably will not be needed with new table
     * 
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_id', 'location', 'type', 'make', 'model', 'identifier', 'supplier', 'supply_date', 'serial_no', 'other_ids', 'invoice_no'
    ];
    //New Version
    // protected $fillable = [
    //     'tag', 'location', 'type', 'make', 'model', 'identifier', 'supplier', 'supply_date', 'serial_no', 'other_ids', 'invoice_no'
    // ];

    /**
     * Get the comments for the asset
     */
    public function comments()
    {
        return $this->hasMany('App\Models\AssetComments');
    }
}
