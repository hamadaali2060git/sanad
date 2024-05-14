<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'title_' . app()->getLocale() . ' as title',
            'date',
            'time'
        );
    }
}
