<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
            'id',
            'logo',
            'title_' . app()->getLocale() . ' as title',
            'phone',
            'email',
            'address_' . app()->getLocale() . ' as address',
            'location',
            'mesion_' . app()->getLocale() . ' as mesion',
            'mesion_image',
            'vesion_' . app()->getLocale() . ' as vesion',
            'vesion_image',
            'description_' . app()->getLocale() . ' as description',
            'privacy_' . app()->getLocale() . ' as privacy',
            'version',
            'favicon',
            'created_at',
            'updated_at'
        );
    }
}
