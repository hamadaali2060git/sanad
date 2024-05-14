<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Introduction extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'title_' . app()->getLocale() . ' as title',
        );
    }
}
