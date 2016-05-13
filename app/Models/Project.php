<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'user_id', 'finish_date'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postIts()
    {
        return $this->hasMany(PostIt::class);
    }

    public function processPostIts($project)
    {
        $project->postIts;
        $project = $project->toArray();
        $project['do'] = [];
        $project['doing'] = [];
        $project['done'] = [];

        foreach ($project['post_its'] as $postIt) {
            switch ($postIt['status']){
                case 1:
                    $project['do'][] = $postIt;
                    break;
                case 2:
                    $project['doing'][] = $postIt;
                    break;
                case 3:
                    $project['done'][] = $postIt;
                    break;
            }
        }


        return $project;
    }

    public function countStatus($projects)
    {
        foreach ($projects as $key => $project) {
            $project->do = 0;
            $project->doing = 0;
            $project->done = 0;
            foreach ($project->postIts as $postIt) {
                if ($postIt->status == 1)
                    $project->do = $project->do + 1;
                if ($postIt->status == 2)
                    $project->doing = $project->doing + 1;
                if ($postIt->status == 3)
                    $project->done = $project->done + 1;
            }
        }

        return $projects;
    }

    public static function build()
    {
        static $instance = null;
        if (is_null($instance))
            $instance = new self;
        return $instance;
    }


}
