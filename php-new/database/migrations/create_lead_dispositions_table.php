<?php
// Migration 2: create_lead_dispositions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lead_dispositions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['positive', 'negative', 'neutral'])->default('positive');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lead_dispositions');
    }
};

