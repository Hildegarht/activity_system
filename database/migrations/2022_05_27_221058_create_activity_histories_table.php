<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Activity;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Activity::class);

            $table->string("prev_task_name")->nullable();
            $table->string("task_name")->nullable();

            $table->string("prev_task_description")->nullable();
            $table->string("task_description")->nullable();

            $table->foreignId('prev_assigned_to')->constrained("users");
            $table->foreignId('assigned_to')->constrained("users");

            $table->string("prev_task_status")->nullable()->default("Pending");
            $table->string("task_status")->nullable()->default("Pending");

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_histories');
    }
};
