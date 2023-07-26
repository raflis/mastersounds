<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Localetag;
use Auth;
use Illuminate\Http\Request;
class Localecontroller extends Controller
{
    public static function createUpdate($module, $action, $tag, $hasEditor = 0)
    {
        $tagLocale = Localetag::where("module", $module)->where("action", $action)->where("tag", $tag)->first();
        if ($tagLocale == false) {
            $tagLocale = new Localetag();
            $tagLocale->module = $module;
            $tagLocale->action = $action;
            $tagLocale->tag = $tag;
        }
        $tagLocale->haseditor = $hasEditor;
        $tagLocale->save();
        return $tagLocale;
    }
    /**
     * Handle the incoming request.
     *
     * @param    \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index(Request $request)
    {
        $userID = Auth::user()->id;
        $where = [];
        $filter = [];
        $filtrableFields = [
            "id" => "",
            "name" => "",
            "code" => "",
            "enabled" => "",
        ];
        foreach ($filtrableFields as $ff => $value) {
            if (isset($request->$ff) && !empty($request->$ff)) {
                $where[] = [$ff, "like", '%' . $request->$ff . '%'];
                $filtrableFields[$ff] = $request->$ff;
            }
        }
        if (empty($where)) {
            $items = Locale::paginate(10);
        } else {
            $items = Locale::where($where)->paginate(10);
        }
        return view(
            'admin/locale/index',
            [
                "items" => $items,
                "filter" => $filtrableFields,
                "expanded" => count($where),
            ]
        );
    }
    public function details(Request $request, $id)
    {
        $item = Locale::where("id", $id)->first();
        if ($item == false) {
            return abort(404);
        } else {
            return view(
                'admin/locale/view',
                [
                    "item" => $item,
                ]
            );
        }
    }
    public function add(Request $request)
    {
        $item = new Locale();
        if ($request->isMethod('post')) {
            $validated = $request->validate(
                [
                    'name' => ['required'],
                    'code' => ['required'],
                ]);
            $item->name = trim($request->input('name', ''));
            $item->code = trim($request->input('code', ''));
            $item->enabled = false;
            if ($request->has('enabled')) {
                $item->enabled = true;
            }
            try {
                $item->save();
                return redirect()->route("panel.locale")
                    ->withSuccess(__("global.actions.added"));
            } catch (\Illuminate\Database\QueryException$e) {
                #dd($e);
                $request->session()->flash('info', __("global.actions.duplicated", [$e->errorInfo[2]]));
            }
        }
        return view(
            'admin/locale/add',
            [
                "item" => $item,
            ]
        );
    }
    public function edit(Request $request, $id)
    {
        $item = Locale::where("id", $id)->first();
        if ($item != false) {
            if ($request->isMethod('post')) {
                $validated = $request->validate(
                    [
                        'name' => ['required'],
                        'code' => ['required'],
                    ]);
                $item->name = trim($request->input('name', ''));
                $item->code = trim($request->input('code', ''));
                #$item->enabled = false;
                if ($request->has('enabled')) {
                    $item->enabled = true;
                }
                $item->save();
                return redirect()->route("panel.locale")
                    ->withSuccess(__("global.actions.updated"));
            }
            return view(
                'admin/locale/edit',
                [
                    "item" => $item,
                ]
            );
        } else {
            return abort(404);
        }
    }
    public function delete(Request $request, $id)
    {
        $item = Locale::where("id", $id);
        if ($item == false) {
            return response()->json(
                ['msg' => "Error", 'success' => false]
            );
        } else {
            $childs = Canal::where("locale_id", $id)->get();
            foreach ($childs as $child) {
                $child->delete();
            }
            $item->delete();
            return response()->json(
                ['msg' => "OK", 'success' => true]
            );
        }
    }
}
