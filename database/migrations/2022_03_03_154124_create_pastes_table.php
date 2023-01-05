<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('language');
            $table->dateTime('expiration');
            $table->text('content');
            $table->uuid('url')->unique();
            $table->foreignId('user_id')->nullable();
            $table->string('visibility')->default('public');
            $table->boolean('is_encrypted')->default(false);
            // $table->enum('access', ['public', 'unlisted', 'private']);
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
        Schema::dropIfExists('pastes');
    }
};
