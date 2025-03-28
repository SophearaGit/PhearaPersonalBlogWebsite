<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Portfolio extends Model
{
    use Sluggable;
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'featured_image',
        'overview',
        'strategy',
        'project_type',
        'client',
        'content',
        'project_challenge',
        'design_research',
        'design_approach',
        'the_solution',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term);
        });
    }

}
