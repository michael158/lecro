<?php

namespace App\Http\Controllers;

use App\Models\PostIt;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostItController extends Controller
{

    protected $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }


    public function index()
    {
        $postIts = PostIt::paginate(10);

        return view('postIts.index', compact('postIts'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->db->beginTransaction();
            try {
                $post = PostIt::create($request->all());
            } catch (Exception $e) {
                $post = $e->getMessage();
                $this->db->roolback();
            }
            $this->db->commit();
        }

        return $post;
    }

    public function updateStatus(Request $request, $id)
    {
        $this->db->beginTransaction();
        try {
            $postIt = PostIt::find($id);
            $postIt->update($request->all());
        } catch (\Exception $e) {
            $this->db->rollback();
            return $e->getMessage();
        }
        $this->db->commit();
    }

}
