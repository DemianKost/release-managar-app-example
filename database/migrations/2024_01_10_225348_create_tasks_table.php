<?php

declare(strict_types=1);

use App\Models\Release;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumtext('criteria')->nullable();

            $table->boolean('complete')->default(false); 

            $table->foreignId('project_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('release_id')
                ->nullable()
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
