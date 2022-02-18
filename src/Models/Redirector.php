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

    protected $fillable = ['source_url', 'destination_url', 'status_code', 'hit_count', 'active'];

    // protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            // dd($model->source_url);
            $model->attributes['source_url'] = validateUrl($model->source_url);
            $model->attributes['destination_url'] = validateUrl($model->destination_url);
        });
    }

}
