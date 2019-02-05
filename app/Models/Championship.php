<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Championship
 * @package App\Models
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
            $model->author_id = auth()->user()->getKey();
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|EventTicket
     */
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
