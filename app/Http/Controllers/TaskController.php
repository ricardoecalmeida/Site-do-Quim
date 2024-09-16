<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function allTasks()
    {
        $tasks = $this->getTasks();
        return view('tasks.all_tasks', compact('tasks'));
    }

    private function getTasks()
    {
        $tasks = DB::table('tasks')
            // ->select('tasks.id','tasks.name','tasks.status','tasks.due_at','users.name AS usname')
            ->select('tasks.*', 'users.name as usname')
            ->join('users', 'users.id', '=', 'user_id')
            ->get();
        return $tasks;
    }

    public function viewTask($id)
    {
        $myTask = DB::table('tasks')
            ->where('tasks.id', $id)
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select('tasks.*', 'users.name as usname')
            ->first();

        $users = DB::table('users')
            ->get();

        return view('tasks.view', compact('myTask', 'users'));
    }


    public function addTask()
    {
        $users = DB::table('users')
            ->get();

        return view('tasks.add_task', compact('users'));
    }

    /*
     $myTask = DB::table('tasks')
            ->where('tasks.id', $id)
            ->join('users', 'users.id', '=', 'user_id')
            ->select('tasks.*', 'users.name as usname')
            ->first();
    */

    // dd($request->all());

    // CREATE: Função chamada na view add_task (method: post) - Cria a entrada na base de dados
    public function createTask(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:200',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('tasks.all')->with('message_create', 'Tarefa inserida.');
    }

    // UPDATE: Formulário (view.blade) tem esta função como action (method: post)
    public function updateTask(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:200',
            'user_id' => 'required|integer|exists:users,id',
            'due_at' => 'date', // Limita o formato a datas
            'status' => 'string|max:50', // Idealmente deveria aceitar apenas 1 dos 3 estados
        ]);

        Task::where('id', $request->id)
            ->update([
                'name' => $request->name, // Esquerda nome na coluna SQL || Direita nome da variável
                'description' => $request->description,
                'user_id' => $request->user_id,
                'due_at' => $request->due_at,
                'status' => $request->status
            ]);
            //dd($request->all());

        return redirect()->route('tasks.all')->with('message_update', 'Dados actualizados.');
    }

    // DELETE: Função chamada pelo botão de Eliminar na view all_tasks
    public function deleteTask($id)
    {
        Db::table('tasks')
            ->where('id', ($id))
            ->delete();
        return back();
    }
}
