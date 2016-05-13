<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class UsersController extends Controller
{
    protected $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }


    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->db->beginTransaction();
            try {
                User::create($request->all());
            } catch (Exception $e) {
                $this->db->roolback();
                return redirect('user')->with('message', ['content' => 'Não foi salvo!', 'type' => 'danger']);
            }
            $this->db->commit();

            return redirect('user')->with('message', ['content' => 'Salvo com sucesso!', 'type' => 'success']);

        }
    }


}
