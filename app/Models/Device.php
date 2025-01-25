<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Device
 * @package App\Models
 */
class Device extends Model
{
    use HasFactory;

    /**
     * Number of items per page
     */
    const PER_PAGE = 10;

    /**
     * many-to-many relationship with users
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'access', 'device_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * Scope a query to only include devices related to the user with the given id.
     *
     * @param $query
     * @param $user_id
     * @return mixed
     */
    public function scopeRelatedToUser($query, $user_id)
    {
        return $query->whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        });
    }
}
