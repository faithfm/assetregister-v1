<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AssetComments extends Model implements Auditable
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
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
    protected $table = 'asset_comments';

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
        'internal_id','dt', 'cat', 'comments'
    ];
    // New Version
    // protected $fillable = [
    //     'asset_id', 'dt', 'cat', 'comments'
    // ];

    /**
     * Get the asset that owns the comment.
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset', 'internal_id', 'internal_id');
    }
}
