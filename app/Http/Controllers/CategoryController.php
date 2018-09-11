<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('OnlyAdmin')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (isAdmin()){
        $paginate = 10;
        $view = 'backend.category.list';
      }else{
        $paginate = 12;
        $view = 'backend.category.categories';
      }

      $categories = Category::has('courses')
                    ->orderBy('name')
                    ->paginate($paginate);

      $breadcrumbs = [
        'Categorias' => '#',
      ];

      return view($view,compact('breadcrumbs','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $breadcrumbs = [
        'Categorias' => 'category',
        'Nova Categoria' => '#'
      ];

      return view('backend.category.edit',compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $category = new Instructor;

      //$request->validate($user->rules,$user->messages);

      $category->name = $request->name;

      if ($category->save()){
        return redirect('category')->with('informations',['Os dados da categoria foram salvos com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao salvar os dados da categoria!']);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      $breadcrumbs = [
        'Categorias' => 'category',
        $category->name => '#'
      ];

      return view('backend.category.category',
                compact('breadcrumbs','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      $breadcrumbs = [
        'Categorias' => 'category',
        $category->name => 'category/'.$category->id,
        'Editar Categoria' => '#'
      ];

      return view('backend.category.edit',compact('breadcrumbs','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      //$request->validate($user->rules,$user->messages);

      $category->name = $request->name;

      if ($category->save()){
        return redirect('category')->with('informations',['Os dados da categoria foram alterados com sucesso!']);
      } else {
        return back()->with('problems',['Ocorreu um erro ao alterar os dados da categoria!']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      if ($category->courses->count()>0){
        $message = getMsgDeleteErrorVinculated();
      } else {
        if (isAdmin()){
          if ($category->delete()){
            $message = getMsgDeleteSuccess();
          } else {
            $message = getMsgDeleteError();
          }
        } else {
          $message = getMsgDeleteAccessForbidden();
        }
      }
      return response()->json($message);
    }
}
