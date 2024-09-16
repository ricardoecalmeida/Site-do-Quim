<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Função para adicionar utilizador
    public function addUser()
    {
        /*
       DB::table('users')
        ->insert([
            'name' => 'Átylla Kossatz',
            'email' => 'atylla@gmail.com',
            'password' => 'pqr789'
        ]);
        */

        /*
        DB::table('users')
            ->updateOrInsert(
                [
                    'email' => 'quim@gmail.com'
                ],
                [
                    'name' => 'Quim',
                    'password' => 'abc123',
                    'updated_at' => now()
                ]
            );
            */

        /*
        $users = DB::table('users')->get();
        */

        /*

        $myUser =  DB::table('users')
        ->where('email', 'quim@gmail.com')->first();

        dd($myUser);

        */

        /*
        $myUser =  DB::table('users')
        ->where('email', 'quim@gmail.com')->get();
        */

        // dd($myUser);

        return view('users.add_user'); // Devolve a vista
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.all')->with('message_create', 'Utilizador inserido.');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'phone' => 'min:9|max:15',
        ]);

        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

        return redirect()->route('users.all')->with('message_update', 'Dados actualizados.');
    }

    public function allUsers()
    {

        ////////////////////////////////////////
        $hello = 'Hello!'; // Criar variável
        $isItMe = 'Is it me you re looking for?'; // Criar variável
        $daysOfWeek = $this->getWeekDays(); // Chama o Array de dias da semana
        $info = $this->info(); // Chama o Array com informação sobre o curso
        ////////////////////////////////////////

        // dd($users); // Dump & Die
        // dd($info); // Fazer debug
        // var_dump($info); // Mostra info sobre as variáveis

        // Função acessória
        $users = $this->getContacts();

        // dd(request()->query('search'));

        // Filtro que vem do que colocamos no Front End
        $search = request()->query('search') ? request()->query('search') : null;

        // dd ($search);

        /* IGUAL AO QUE ESTÁ EM CIMA
        $search = '';
      if(request()->query('search'){
            $search = request()->query('search');
      }else{
            $search = null;
      }
      */

      // Objecto que carregamos na tabela do Front End
        $users = DB::table('users');
        if($search){
            $users = $users
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
        };
        $users= $users->get();

        // Vai buscar a query directamente
        /*$users = DB::table('users')
          ->get();
          */

        // Retornar a view e as variáveis
        return view('users.all_users', compact(
            'hello',
            'isItMe',
            'daysOfWeek',
            'info',
            'users'
        ));
    }

    public function viewUser($id)
    {
        $myUser = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('users.view', compact('myUser'));
    }


    public function deleteUser($id)
    {
        Db::table('tasks')
            ->where('user_id', ($id))
            ->delete();

        Db::table('users')
            ->where('id', ($id))
            ->delete();

        return back();
    }

    // Função acessória para os dias da semana
    private function getWeekDays()
    {
        $daysOfWeek = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']; // Array de dias da semana
        return $daysOfWeek; // Retorna o Array criado
    }

    private function info()
    {
        // Array associativo "courseInfo" com informação sobre o curso
        $courseInfo = [
            'name' => 'Software Developer', // Pode ser chamado pela key 'name'
            'year' => (int) 2024, // Delcarado como integer, mas não é obrigatório
            'modules' => ['PHP', 'WebServices', 'Java'],
            ['Teste', 4, 'Sofia', 'João'] // Array sem key, tem de ser chamada pela posição. Neste caso a posição é 0 porque é o primeiro sem key
        ];

        return $courseInfo; // No final da função, retorna o Array associativo com informação do curso.
    }

    // Função pública
    public function allContacts()
    {
        $contacts = $this->getContacts();
        return view('users.all_users', compact('users'));
    }

    // Esta função acessória a simular uma base de dados só pode ser acedida neste controller (private)
    private function getContacts()
    {
        /*
        $users = [
            ['id' => 1, 'name' => 'Sara', 'phone' => '912345678', 'email' => 'sara@gmail.com'],
            ['id' => 2, 'name' => 'Bruno', 'phone' => '934567891', 'email' => 'bruno@gmail.com'],
            ['id' => 3, 'name' => 'Márcia', 'phone' => '967891234', 'email' => 'marcia@gmail.com'],
            ['id' => 4, 'name' => 'Joaquim', 'phone' => '918794562', 'email' => 'joaquim@gmail.com']
        ];
        */

        $users = DB::table('users')
            // ->whereNull('updated_at')
            ->get();

        // $users = User::get();

        // $adminType = User::TYPE_ADMIN;

        return $users;
    }
}
