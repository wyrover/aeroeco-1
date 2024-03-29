<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;
    protected $table = 'locations';
    protected $fillable = ['company_id', 'location', 'address', 'address2', 'phone', 'fax'];
    protected $hidden = ['created_at', 'updated_at'];

    /* CASTING */
    protected $casts = [];
    /* CASTING */

    /* RELATIONSHIPS */
    /* RELATIONSHIPS */

    /* METHODS */
    /* METHODS */
}
