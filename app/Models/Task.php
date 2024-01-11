<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Project;
use App\Models\Release;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'criteria',
        'complete',
        'project_id',
        'release_id'
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'complete' => 'boolean'
    ];

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(
            related: Project::class,
            foreignKey: 'project_id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function release(): BelongsTo
    {
        return $this->belongsTo(
            related: Release::class,
            foreignKey: 'release_id'
        );
    }
}
