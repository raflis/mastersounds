<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Models\Locale;
use App\Models\Admin\ItemEpisode;
use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryEpisode;

class ItemEpisodeController extends Controller
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
        $item_episodes = ItemEpisode::orderBy('id', 'Asc')->paginate();
        return view('admin.item_episodes.index', compact('item_episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_episodes = CategoryEpisode::orderBy('name1', 'ASC')->pluck('name1', 'id');
        $locales = Locale::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.item_episodes.create', compact('category_episodes','locales'));
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
            'category_episode_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'body' => 'required',
            'link0' => 'required',
            'autor_name' => 'required',
            'autor_image' => 'required',
            'date' => 'required',
            'order' => 'required',
            'locale_id' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $item_episode = ItemEpisode::create($request->all());
            return redirect()->route('item_episodes.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
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
        $item_episode = ItemEpisode::find($id);
        $item_episode->date = \Carbon\Carbon::parse($item_episode->date)->format('Y-m-d');
        $category_episodes = CategoryEpisode::orderBy('name1', 'ASC')->pluck('name1', 'id');
        $locales = Locale::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.item_episodes.edit', compact('item_episode', 'category_episodes','locales'));
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
            'category_episode_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'body' => 'required',
            'link0' => 'required',
            'autor_name' => 'required',
            'autor_image' => 'required',
            'date' => 'required',
            'order' => 'required',
            'locale_id' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $item_episode = ItemEpisode::find($id);
            $item_episode->fill($request->all())->save();
            return redirect()->route('item_episodes.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        $item_episode = ItemEpisode::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert', 'success');
    }
}
