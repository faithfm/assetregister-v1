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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_id', 'dt', 'cat', 'comments'
    ];

    /**
     * Get the asset that owns the comment.
     */
    public function asset()
    {
        return $this->belongsTo('App\Models\Asset');
    }
}
