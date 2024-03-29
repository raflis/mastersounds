<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PageField;
use App\Models\Locale;
use Illuminate\Http\Request;
use Validator;

class PageFieldController extends Controller
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
        $this->middleware('permissions')->except(['store', 'update', 'destroy', 'wizard', 'tooltip', 'wizard_result', 'titles_es', 'titles_pt', 'descriptions_es', 'descriptions_pt', 'keywords_es', 'keywords_pt', 'image_es', 'image_pt']);
    }

    public function home($id)
    {
        $locale = Locale::where("id",$id)->first();
        $pagefield = PageField::find($id);
        return view('admin.pagefields.home', compact('pagefield', 'locale','id'));
    }

    public function social()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.social', compact('pagefield'));
    }

    public function files($id)
    {
        $locale = Locale::where("id",$id)->first();
        $pagefield = PageField::find($id);
        return view('admin.pagefields.files', compact('pagefield', 'locale','id'));
    }

    public function logos()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.logos', compact('pagefield'));
    }

    public function wizard()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.wizard', compact('pagefield'));
    }

    public function tooltip()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.tooltip', compact('pagefield'));
    }

    public function wizard_result()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.wizard_result', compact('pagefield'));
    }

    public function titles_es()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.titles_es', compact('pagefield'));
    }

    public function titles_pt()
    {
        $pagefield = PageField::find(2);
        return view('admin.pagefields.titles_pt', compact('pagefield'));
    }

    public function descriptions_es()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.descriptions_es', compact('pagefield'));
    }

    public function descriptions_pt()
    {
        $pagefield = PageField::find(2);
        return view('admin.pagefields.descriptions_pt', compact('pagefield'));
    }

    public function keywords_es()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.keywords_es', compact('pagefield'));
    }

    public function keywords_pt()
    {
        $pagefield = PageField::find(2);
        return view('admin.pagefields.keywords_pt', compact('pagefield'));
    }

    public function image_es()
    {
        $pagefield = PageField::find(1);
        return view('admin.pagefields.image_es', compact('pagefield'));
    }

    public function image_pt()
    {
        $pagefield = PageField::find(2);
        return view('admin.pagefields.image_pt', compact('pagefield'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $rules = [
            /*'title' => 'required',*/
        ];

        $messages = [
            'title.required' => 'Ingrese un título',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if ($request->details):
                $request->merge(['details' => array_values(collect($request->details)->sortBy(['order'])->toArray())]);
            endif;

            $pagefield = PageField::findOrCreate($id);
            
            $pagefield->fill($request->all())->save();
            return redirect()->back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        //
    }
}
