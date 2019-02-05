<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property mixed $user
 * @property int $id
 */
class Championship extends Model
{
    use HasSlug;

    const PUBLISHED = 'published';
    const DELETED = 'deleted';
    const DRAFTED = 'drafted';

    protected $fillable = ['title', 'slug', 'type', 'status', 'content', 'is_comment', 'author_id'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Championship $model) {
            $this->attributes['author_id'] = auth()->user()->getKey();
        });
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * @return User|HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'author_id');
    }

    /**
     * @return User|HasOne
     */
    public function author()
    {
        return $this->hasOne(User::class, 'author_id');
    }

    public function tickets()
    {
        return $this->hasMany(EventTicket::class, 'event_id');
    }

    /**
     * @return bool
     */
    public function createdByMe(): bool
    {
        return $this->author_id === auth()->user()->getKey();
    }
}
