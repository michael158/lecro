<?php

namespace App\Http\Controllers;

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


    public function index(){
       $data = Project::where('user_id', Auth::user()->id)->paginate(6);
        $projects = Project::build()->countStatus($data);
       return view('projects.index', compact('projects') );
   }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->db->beginTransaction();
            try {
                Project::create($request->all());
            } catch (Exception $e) {
                $this->db->roolback();
                return redirect('user')->with('message', ['content' => 'Não foi salvo!', 'type' => 'danger']);
            }
            $this->db->commit();

            return redirect('user')->with('message', ['content' => 'Salvo com sucesso!', 'type' => 'success']);

        }

         return view('projects.create'); 
    }

    public function show(Request $request , $id){
        $data = Project::find($id);
        $project = Project::build()->processPostIts($data);

        return view('projects.show', compact('project'));

    }

}
