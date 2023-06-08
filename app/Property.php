<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',    'price',        'featured',     'purpose',  'type',         'image',
        'slug',     'bedroom',      'bathroom',     'city',     'city_slug',    'address',
        'area',     'agent_id',     'description',  'video',    'floor_plan',   
        'coordinate','floors','halls','entries','furnished','mroom','droom','status','parking','tank','sale','location',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'agent_id');
    }

    public function gallery()
    {
        return $this->hasMany(PropertyImageGallery::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'property_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }


}
