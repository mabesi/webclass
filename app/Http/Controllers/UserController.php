<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('editPassword','changePassword');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type','<>','A')
                      ->orderBy('name')
                      ->paginate(10);

        $breadcrumbs = [
          'Alunos' => '#',
        ];

        return view('backend.user.list',compact('users','breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breadcrumbs = [
        'Alunos' => 'user',
        'Novo Aluno' => '#',
      ];
      return view('backend.user.edit',compact('breadcrumbs'));
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

        $request->validate($user->rules,$user->messages);

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
      $breadcrumbs = [
        'Alunos' => 'user',
        $user->name => '#',
      ];
      return view('backend.user.user', compact('user','breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $breadcrumbs = [
        'Alunos' => 'user',
        $user->name => 'user/'.$user->id,
        'Editar Aluno' => '#',
      ];
      return view('backend.user.edit', compact('user','breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $rules = [
        'name' => 'required|string|between:4,60',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'password' => [
          'required_without:_method',
          'nullable',
          'min:8',
          'regex:/^([a-zA-Z]+\d+)|(\d+[a-zA-Z]+)$/'
          ],
      ];

      $request->validate($rules,$user->messages);

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
      if ($user->courses->count()>0){
        $message = getMsgDeleteErrorVinculated('Cursos');
      } elseif (isAdmin()){

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

    public function editPassword()
    {
      $user = getUser();

      $breadcrumbs = [
        $user->name.' / Alterar Senha' => '#',
      ];
      return view('backend.user.edit-password', compact('user','breadcrumbs'));
    }

    public function changePassword(Request $request)
    {
      $user = getUser();

      $request->validate($user->passwordRules,$user->passwordMessages);

      if ($request->password==Null || $request->newpassword==Null || $request->newpassword_confirmation==Null){
        return back()->with('warnings', ['Por favor preencha todos os campos!']);
      } else {

        $password = $request->password;

        if (!Hash::check($password,Auth::user()->password)){
          return back()->with('problems', ['Senha atual incorreta!']);
        }

        $newpassword = $request->newpassword;
        $newpassword_confirmation = $request->newpassword_confirmation;

        if ($newpassword == $newpassword_confirmation){

          $user->password = Hash::make($newpassword);

          if ($user->save()){
            return back()->with('informations', ['A senha foi alterada com sucesso!']);
          } else {
            return back()->with('problems', ['Ocorreu uma falha ao alterar a senha!']);
          }

        } else {
          return back()->with('problems', ['A nova senha não confere com a confirmação!']);
        }
      }
    }

}
