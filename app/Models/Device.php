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
    Const PER_PAGE = 10;
    /**
     * many-to-many relationship with users
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'access')
            ->withPivot('permission')
            ->withTimestamps();
    }
}
