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


}
