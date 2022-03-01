<?php

namespace Laravelir\Redirector\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelir\Redirector\Exceptions\EqualUrlsException;

class Redirector extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'redirector';

    protected $fillable = ['source_url', 'destination_url', 'response_code', 'hit_count', 'active'];

    // protected $guarded = [];

    protected $casts = [
        'meta' => 'json',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            if (validateUrl($model->source_url) == validateUrl($model->destination_url)) {
                throw EqualUrlsException::equalUrls();
            }

            static::whereSourceUrl($model->destination_url)->whereDestinationUrl($model->source_url)->delete();

            $model->attributes['source_url'] = validateUrl($model->source_url);
            $model->attributes['destination_url'] = validateUrl($model->destination_url);
        });
    }
}
