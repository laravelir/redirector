<?php

namespace Laravelir\Redirector;

use Illuminate\Database\Eloquent\Model;

class Redirector extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'redirects';

    // protected $fillable = ['name'];

    protected $guarded = [];
}
