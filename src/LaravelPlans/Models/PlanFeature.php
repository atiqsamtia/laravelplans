<?php

namespace Czechbox\LaravelPlans\Models;

use Illuminate\Database\Eloquent\Model;
use Czechbox\LaravelPlans\Traits\BelongsToPlan;
use Czechbox\LaravelPlans\Contracts\PlanFeatureInterface;

class PlanFeature extends Model implements PlanFeatureInterface
{
    use BelongsToPlan;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id',
        'code',
        'value',
        'sort_order'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get feature usage.
     *
     * This will return all related
     * subscriptions usages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usage()
    {
        return $this->hasMany(config('laravelplans.models.plan_subscription_usage'));
    }
}
