<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Models\Admin\CategorySolution;
use App\Http\Controllers\Controller;

class CategorySolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function index()
    {
        $category_solutions = CategorySolution::orderBy('id', 'Asc')->paginate();
        return view('admin.category_solutions.index', compact('category_solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_solutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name1' => 'required',
            'name2' => 'required',
            'icon' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $category_solution = CategorySolution::create($request->all());
            return redirect()->route('category_solutions.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_solution = CategorySolution::find($id);
        return view('admin.category_solutions.edit', compact('category_solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name1' => 'required',
            'name2' => 'required',
            'icon' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $category_solution = CategorySolution::find($id);
            $category_solution->fill($request->all())->save();
            return redirect()->route('category_solutions.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_solution = CategorySolution::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert', 'success');
    }
}
