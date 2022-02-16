<?php

namespace Laravelir\Redirector\Models;

use Illuminate\Database\Eloquent\Model;

class Redirector extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'redirector';

    // protected $fillable = ['name'];

    protected $guarded = [];
}
