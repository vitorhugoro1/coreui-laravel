<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use App\Helpers\UserRules;

class Category extends Model
{
    use SoftDeletes, UserRules;

    protected $fillable = ['name', 'professional', 'type', 'user_id'];

    protected $casts = [
        'professional'  => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $category) {
            $category->user_id = auth()->user()->getKey();
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function modalities()
    {
        if ($this->type === 'forms') {
            return $this->hasMany(Form::class);
        }

        return $this->hasMany(Weight::class);
    }

    /**
     * Define the forms
     *
     * @param Collection $forms
     *
     * @return Collection
     *
     * @author Vitor Hugo <vitorhugo.ro10@gmail.com>
     */
    public function setForms(Collection $forms): Collection
    {
        $formCreateds = collect();

        $forms->each(function ($form) use ($formCreateds) {
            $created = Form::create(array_merge($form, [
                'category_id' => $this->getKey(),
            ]));

            $formCreateds->push($created);
        });

        return $formCreateds;
    }

    /**
     * Define Common weights
     *
     * @param Collection $weights
     * @return Collection
     */
    public function setCommons(Collection $weights): Collection
    {
        return $this->setWeights($weights);
    }

    /**
     * Define weights
     *
     * @param Collection $weights
     * @param string $gender
     *
     * @return Collection
     */
    public function setWeights(Collection $weights, string $gender = null) : Collection
    {
        $weightsCreated = collect();

        $weights->each(function ($weight) use ($weightsCreated, $gender) {
            $additional = [
                'category_id' => $this->getKey(),
                'weapon' => request()->weapon,
                'age_bracket' => request()->age_bracket,
                'team' => request()->team
            ];

            if (request()->gender === '1') {
                $additional['gender'] = $gender;
            }

            $created = Weight::create(array_merge($weight, $additional));

            $weightsCreated->push($created);
        });

        return $weightsCreated;
    }
}
