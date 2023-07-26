<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Solutioncountry;
use App\Models\Admin\Solutionindustry;
use Validator;
use Illuminate\Http\Request;
use App\Models\Admin\ItemSolution;
use App\Http\Controllers\Controller;
use App\Models\Admin\CategorySolution;
use App\Models\Country;
use App\Models\Industry;

class ItemSolutionController extends Controller
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
        $item_solutions = ItemSolution::orderBy('id', 'asc')->paginate();
        return view('admin.item_solutions.index', compact('item_solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentCountries =[];
        $currentIndustries =[];
        $countries = Country::orderBy("name","ASC")->pluck('name', 'id');
        $industries = Industry::orderBy("name1","ASC")->pluck('name1', 'id');
        $category_solutions = CategorySolution::orderBy('name1', 'ASC')->pluck('name1', 'id');
        
        return view('admin.item_solutions.create', compact('category_solutions','countries','currentCountries','industries','currentIndustries'));
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
            'category_solution_id' => 'required',
            'name' => 'required',
            
            'slug' => 'required',
            'slider' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'body1' => 'required',
            'body2' => 'required',
            'pdf1' => 'required',
            'pdf2' => 'required',
            'podcast1' => 'required',
            'podcast2' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if($request->details):
                $request->merge(['details' => array_values(collect($request->details)->sortBy(['order'])->toArray())]);
            endif;

            $item_solution = ItemSolution::create($request->all());

            foreach($request->input("countries") as $country){
                $sc = new Solutioncountry();
                $sc->solution_id=$item_solution->id;
                $sc->country_id=$country;
                $sc->save();
            }

            return redirect()->route('item_solutions.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
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
        $item_solution = ItemSolution::find($id);
        $category_solutions = CategorySolution::orderBy('name1', 'ASC')->pluck('name1', 'id');
        $countries = Country::orderBy("name","ASC")->pluck('name', 'id');
        $currentCountries= Solutioncountry::where("solution_id",$id)->pluck("country_id");
        $currentIndustries= Solutionindustry::where("solution_id",$id)->pluck("industry_id");
        $industries = Industry::orderBy("name1","ASC")->pluck('name1', 'id');
        //dd($currentCountries);
        return view('admin.item_solutions.edit', compact('item_solution', 'category_solutions','countries','currentCountries','industries','currentIndustries'));
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
            'category_solution_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'slider' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'body1' => 'required',
            'body2' => 'required',
            'pdf1' => 'required',
            'pdf2' => 'required',
            'minuserforsale' => 'required',
            'podcast1' => 'required',
            'podcast2' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if($request->details):
                $request->merge(['details' => array_values(collect($request->details)->sortBy(['order'])->toArray())]);
            endif;

            $item_solution = ItemSolution::find($id);
            $item_solution->fill($request->all())->save();
            
            Solutioncountry::where("solution_id",$id)->delete();
            foreach($request->input("countries") as $country){
                $sc = new Solutioncountry();
                $sc->solution_id=$id;
                $sc->country_id=$country;
                $sc->save();
            }
            
            Solutionindustry::where("solution_id",$id)->delete();
            foreach($request->input("industries") as $industry){
                $sc = new Solutionindustry();
                $sc->solution_id=$id;
                $sc->industry_id=$industry;
                $sc->save();
            }
            
            return redirect()->route('item_solutions.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        $item_solution = ItemSolution::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert', 'success');
    }
}
