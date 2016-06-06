<?php

namespace App\Http\Controllers;

use App\Models\PostIt;
use App\Models\Project;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    protected $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }


    public function index()
    {
        $data = Project::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->paginate(6);
        $projects = Project::build()->countStatus($data);
        return view('projects.index', compact('projects'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->db->beginTransaction();
            try {
                $data = $request->all();
                $data['user_id'] = Auth::user()->id;
                $post = Project::create($data);
            } catch (\Exception $e) {
                $post = $e->getMessage();
                $this->db->roolback();
            }
            $this->db->commit();
        }

        return $post;
    }

    public function show(Request $request, $id)
    {
        $data = Project::find($id);
        $project = Project::build()->processPostIts($data);

        return view('projects.show', compact('project'));

    }

    public function delete($id)
    {
        $post = Project::find($id);
        $this->db->beginTransaction();
        try {
            if(count($post->postIts) == 0){
                 $post->delete();
            }else{
                $this->deleteRelation($post->postIts);
                $post->delete();
            }
        } catch (\Exception $e) {
            $post = $e->getMessage();

            dd($post);
            $this->db->rollback();
        }
        $this->db->commit();

        return redirect('projects');
    }

    public function deleteRelation($data){
        $model = PostIt::build();
        foreach ($data as $item){
            $item->delete();
        }
    }

}
