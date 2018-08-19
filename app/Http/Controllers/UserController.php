<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type','<>','A')
                      ->orderBy('id','desc')
                      ->paginate(10);
        $data = [
          'users' => $users,
        ];

        return view('user.users',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = [
      ];

      return view('user.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        //$request->validate($user->rules,$user->messages);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = 'U';

        if ($user->save()){
          return redirect('user')->with('informations',['Os dados do aluno foram salvos com sucesso!']);
        } else {
          return back()->with('problems',['Ocorreu um erro ao salvar os dados do aluno!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $data = [
        'user' => $user,
      ];

      return view('user.edit', $data);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      //$request->validate($user->rules,$user->messages);

      $user->name = $request->name;
      $user->email = $request->email;

      if ($request->password){
        $user->password = bcrypt($request->password);
      }

      if ($user->save()){
        return redirect('user')->with('informations',['Os dados do aluno foram alterados com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados do aluno!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if (isAdmin()){
        if ($user->delete()){
          $message = getMsgDeleteSuccess();
        } else {
          $message = getMsgDeleteError();
        }
      } else {
        $message = getMsgDeleteAccessForbidden();
      }
      return response()->json($message);
    }
}
