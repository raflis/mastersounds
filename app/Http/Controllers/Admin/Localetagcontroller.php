<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Localetag;
use App\Models\Localetranslate;
use Auth;
use File;
use Illuminate\Http\Request;
class Localetagcontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
        $filtrableFields = ["id" => "", "module" => "", "action" => "", "tag" => ""];
        foreach ($filtrableFields as $ff => $value) {
            if (isset($request->$ff) && !empty($request->$ff)) {
                $where[] = [$ff, "like", '%' . $request->$ff . '%'];
                $filtrableFields[$ff] = $request->$ff;
            }
        }
        if (empty($where)) {
            $items = Localetag::paginate(10);
        } else {
            $items = Localetag::where($where)->paginate(10);
        }
        return view('admin/localetag/index', ["items" => $items, "filter" => $filtrableFields, "expanded" => count($where)]);
    }
    public function details(Request $request, $id)
    {
        $item = Localetag::where("id", $id)->first();
        if ($item == false) {
            return abort(404);
        } else {
            return view('admin/localetag/view', ["item" => $item]);
        }
    }
    public function translate(Request $request, $id)
    {
        $item = Localetag::where("id", $id)->first();
        if ($item == false) {
            return abort(404);
        } else {
            $locales = Locale::get();
            if ($request->isMethod('post')) {
                $cambios = false;
                foreach ($locales as $locale) {
                    if ($request->has("locale-" . $locale->code)) {
                        if (!empty($request->input("locale-" . $locale->code))) {
                            $cambios = true;
                            $localetranslate = Localetranslate::where("localetag_id", $id)->where("locale_id", $locale->id)->first();
                            if ($localetranslate == false) {
                                $localetranslate = new localetranslate();
                                $localetranslate->localetag_id = $id;
                                $localetranslate->locale_id = $locale->id;
                            }
                            $localetranslate->translation = $request->input("locale-" . $locale->code);
                            $localetranslate->save();
                        }
                    }
                }
                if ($cambios) {
                    $this->generar();
                    return redirect()->route('panel.localetag.translate', $id)->with("success", __("locale.actions.regeneratesuccess"));
                }
            }
            $translates = [];
            $hasEditor = false;
            if ($item->haseditor == 1) {
                $hasEditor = true;
            }
            $translateDB = Localetranslate::where("localetag_id", $id)->get();
            foreach ($locales as $locale) {
                $translates[$locale->code] = "";
                foreach ($translateDB as $translate) {
                    if ($locale->id == $translate->locale_id) {
                        $translates[$locale->code] = $translate->translation;
                    }
                }
            }
            return view('admin/localetag/translate', ["item" => $item, "id" => $id, "locales" => $locales, "translates" => $translates, "hasEditor" => $hasEditor]);
        }
    }
    public function regenerate(){
        $this->generar();
        return redirect()->route('panel.localetag',)->with("success", __("locale.actions.regeneratesuccess"));
    }
    
    public function generar()
    {
        $locales = Locale::get();
        $tags = Localetag::get();
        $validLocale = [];
        $langFolder = resource_path() . "/lang/";
        if (!file_exists($langFolder)) {
            File::makeDirectory($langFolder);
        }
        foreach ($locales as $locale) {
            $translates = Localetranslate::where("locale_id", $locale->id)->get();
            $colTag = [];
            $transFolder = $langFolder . $locale->id . "/";
            $validLocale[] = $locale->id;
            // dd($transFolder);
            if (!file_exists($transFolder)) {
                File::makeDirectory($transFolder);
            }
            $colTag = [];
            foreach ($tags as $tag) {
                if (!isset($colTag[$tag->module])) {
                    $colTag[$tag->module] = [];
                }
                if (!isset($colTag[$tag->module][$tag->action])) {
                    $colTag[$tag->module][$tag->action] = [];
                }
                $colTag[$tag->module][$tag->action][$tag->tag] = $tag->module . "." . $tag->action . "." . $tag->tag;
            }
            foreach ($translates as $translate) {
                $colTag[$translate->localetag->module][$translate->localetag->action][$translate->localetag->tag] = $translate->translation;
            }
            foreach ($colTag as $module => $details) {
                $print = "<?php \n return [\n";
                foreach ($details as $actionName => $action) {
                    $print .= "\t'" . $actionName . "' => [\n";
                    foreach ($action as $tag => $translation) {
                        $print .= "\t'" . $tag . "' => '" . preg_replace("/'/", "\'", $translation) . "',\n";
                    }
                    $print .= "\t],\n";
                }
                $print .= "];";
                // dd($langFolder.$lo."/".$module.".php");
                file_put_contents(
                    $langFolder . $locale->id . "/" . $module . ".php",
                    $print
                );
            }
        }
    }
    public function add(Request $request)
    {
        $item = new Localetag();
        if ($request->isMethod('post')) {
            $validated = $request->validate(['module' => ['required'], 'action' => ['required'], 'tag' => ['required']]);
            $item->module = trim($request->input('module', ''));
            $item->action = trim($request->input('action', ''));
            $item->tag = trim($request->input('tag', ''));
            try
            {
                $item->save();
                return redirect()
                    ->route("panel.localetag.translate", $item->id)
                    ->withSuccess(__("global.actions.added"));
            } catch (\Illuminate\Database\QueryException$e) {
                // dd($e);
                $request->session()
                    ->flash('info', __("global.actions.duplicated", [$e->errorInfo[2]]));
            }
        }else{
            if($request->has("module")&&$request->has("action")&&$request->has("tag")){
            $item->module = trim($request->input('module', ''));
            $item->action = trim($request->input('action', ''));
            $item->tag = trim($request->input('tag', ''));
            }
        }
        return view('admin/localetag/add', ["item" => $item]);
    }
    public function edit(Request $request, $id)
    {
        $item = Localetag::where("id", $id)->first();
        if ($item != false) {
            if ($request->isMethod('post')) {
                $validated = $request->validate(['module' => ['required'], 'action' => ['required'], 'tag' => ['required']]);
                $item->module = trim($request->input('module', ''));
                $item->action = trim($request->input('action', ''));
                $item->tag = trim($request->input('tag', ''));
                $item->save();
                return redirect()
                    ->route("panel.localetag")
                    ->withSuccess(__("global.actions.updated"));
            }
            return view('admin/localetag/edit', ["item" => $item]);
        } else {
            return abort(404);
        }
    }
    public function delete(Request $request, $id)
    {
        $item = Localetag::where("id", $id);
        if ($item == false) {
            return response()->json(['msg' => "Error", 'success' => false]);
        } else {
            $childs = Localetranslate::where("localetag_id", $id)->get();
            foreach ($childs as $child) {
                $child->delete();
            }
            $item->delete();
            return response()
                ->json(['msg' => "OK", 'success' => true]);
        }
    }
    public static function addAndTranslate($module,$action,$tag,$hasEditor=0,$text="",$localeID=0){
        $nlt =  new Localetag();
        $nlt->module= $module;
        $nlt->action= $action;
        $nlt->tag = $tag;
        $nlt->haseditor = $hasEditor;
        $nlt->save();
        $lt =  new Localetranslate();
        $lt->localetag_id = $nlt->id;
        $lt->locale_id = $localeID==0?env('APP_DEFAULTLOCALE_ID'):$localeID;
        $lt->translation = $text;
        $lt->save();
        return $nlt->id;
    }
}
