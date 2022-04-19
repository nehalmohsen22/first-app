<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{


    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    } 
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image',
        //'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

}
