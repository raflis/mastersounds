<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Models\Admin\ItemPost;
use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryPost;

class ItemPostController extends Controller
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
        $item_posts = ItemPost::orderBy('id', 'Asc')->paginate();
        return view('admin.item_posts.index', compact('item_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_posts = CategoryPost::orderBy('name1', 'ASC')->pluck('name1', 'id');
        return view('admin.item_posts.create', compact('category_posts'));
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
            'category_post_id' => 'required',
            'name1' => 'required',
            'name2' => 'required',
            'slug' => 'required',
            'image0' => 'required',
            'image' => 'required',
            'body1' => 'required',
            'body2' => 'required',
            'date' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $item_post = ItemPost::create($request->all());
            return redirect()->route('item_posts.index')->with('message', 'Creado con éxito.')->with('typealert', 'success');
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
        $item_post = ItemPost::find($id);
        $item_post->date = \Carbon\Carbon::parse($item_post->date)->format('Y-m-d');
        $category_posts = CategoryPost::orderBy('name1', 'ASC')->pluck('name1', 'id');
        return view('admin.item_posts.edit', compact('item_post', 'category_posts'));
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
            'category_post_id' => 'required',
            'name1' => 'required',
            'name2' => 'required',
            'slug' => 'required',
            'image0' => 'required',
            'image' => 'required',
            'body1' => 'required',
            'body2' => 'required',
            'date' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $item_post = ItemPost::find($id);
            $item_post->fill($request->all())->save();
            return redirect()->route('item_posts.index')->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
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
        $item_post = ItemPost::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert', 'success');
    }
}
