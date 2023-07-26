<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Models\Admin\EpisodeSlider;
use App\Http\Controllers\Controller;

class EpisodeSliderController extends Controller
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
        $episode_sliders = EpisodeSlider::orderBy('id', 'Asc')->paginate();
        return view('admin.episode_sliders.index', compact('episode_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.episode_sliders.create');
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
            'image_desktop' => 'required',
            'image_mobile' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'image_desktop.required' => 'Seleccione una imagen para desktop',
            'image_mobile.required' => 'Seleccione una imagen para mobile',
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $episode_slider = EpisodeSlider::create($request->all());
            return redirect()->route('episode_sliders.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
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
        $episode_slider = EpisodeSlider::find($id);
        return view('admin.episode_sliders.edit', compact('episode_slider'));
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
            'image_desktop' => 'required',
            'image_mobile' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'image_desktop.required' => 'Seleccione una imagen para desktop',
            'image_mobile.required' => 'Seleccione una imagen para mobile',
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $episode_slider = EpisodeSlider::find($id);
            $episode_slider->fill($request->all())->save();
            return redirect()->route('episode_sliders.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        $episode_slider = EpisodeSlider::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert', 'success');
    }
}
