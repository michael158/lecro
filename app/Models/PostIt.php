<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostIt extends Model
{
    protected $table = 'postit';
    protected $fillable = ['title', 'description', 'status', 'priority', 'project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public static function build()
    {
        static $instance = null;
        if (is_null($instance))
            $instance = new self;
        return $instance;
    }
}
