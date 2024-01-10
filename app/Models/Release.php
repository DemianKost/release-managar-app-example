<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Project;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Release extends Model
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
        'version',
        'complete',
        'project_id'
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
}
