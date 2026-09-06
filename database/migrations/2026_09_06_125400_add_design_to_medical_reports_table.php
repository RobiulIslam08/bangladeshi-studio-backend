<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medical_reports', function (Blueprint $table) {
            if (!Schema::hasColumn('medical_reports', 'design')) {
                $table->string('design', 20)->default('old')->after('date_of_birth');
            }
        });
    }

    public function down(): void
    {
        Schema::table('medical_reports', function (Blueprint $table) {
            if (Schema::hasColumn('medical_reports', 'design')) {
                $table->dropColumn('design');
            }
        });
    }
};
