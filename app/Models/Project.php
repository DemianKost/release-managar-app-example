<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\User;
use App\Models\Release;
use App\Models\Task;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'latest',
        'active',
        'user_id'
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean'
    ];

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    /**
     * @return HasMany
     */
    public function releases(): HasMany
    {
        return $this->hasMany(
            related: Release::class,
            foreignKey: 'project_id'
        );
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(
            related: Task::class,
            foreignKey: 'project_id'
        );
    }

    /**
     * Helper methods
     */
}
