<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{

    protected $fillable = ['title', 'message']; 

    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->timestamps();
        });
    }
}
