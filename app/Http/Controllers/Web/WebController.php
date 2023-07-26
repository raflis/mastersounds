<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sscontroller;
use App\Models\Admin\CategoryEpisode;
use App\Models\Admin\CategoryPost;
use App\Models\Admin\CategorySolution;
use App\Models\Admin\EpisodeSlider;
use App\Models\Admin\HomeSlider;
use App\Models\Admin\ItemEpisode;
use App\Models\Admin\ItemPost;
use App\Models\Admin\ItemSolution;
use App\Models\Admin\PageField;
use App\Models\Admin\PostSlider;
use App\Models\Admin\SolutionSlider;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Locale;
use App\Models\Newsletter;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Session;
use Validator;

class WebController extends Controller
{

    public function postback(Request $request)
    {
        $send = [];
        $solucionId = $request->input("solutionname");
        $solucion = ItemSolution::where("name", $solucionId)->pluck("name")->first();
        $ssController = new Sscontroller();
        $res = $ssController->call("getLeads", ["where" => ["emailAddress" => $request->input("field_4808302595")]]);
        //infograf__as_vistas__1__6488855ceb798
        if (isset($res->result->lead[0]->id)) {
            $send["id"] = $res->result->lead[0]->id;
            $send["infograf__as_vistas__1__6488855ceb798"] = $res->result->lead[0]->infograf__as_vistas__1__6488855ceb798 . "," . $solucion;
            $objects[] = (object) $send;
            $params = array('objects' => $objects, "id" => $send["id"]);
            $res = $ssController->call("updateLeads", $params);
        } else {
            $send["infograf__as_vistas__1__6488855ceb798"] = $solucion;
            $objects[] = (object) $send;
            $params = array('objects' => $objects);
            $res = $ssController->call("createLeads", $params);
        }
        session()->put('ValidEmail', $request->input("field_4808302595"));
        $item_solution = ItemSolution::where('id', $request->input("solutionid"))->first();
        return redirect()->route('thanks', ['id' => $item_solution->id])->with('message', 'Gracias por su interés.')->with('typealert', 'success');
    }
    public function wizardpost(Request $request)
    {
        //"_token" => "V7eWGiIKavpacHZkXkHZZ7fVjBD0MXTysZq6LcBr"
        //"step2select" => "1"
        //"step3select" => "5"
        //"step4select" => "100"
        //"name" => "Brede"
        //"lastname" => "Basualdo"
        //"email" => "hola@brede.cl"
        //"pais" => "Brasil"
        //"industry" => "nombre de la otra industria"
        $category = $request->input("step2select");
        $industry = $request->input("step3select");
        $minuser = $request->input("step4select");
        //$solutions = ItemSolution::where("minuserforsale","<=",$minuser)->where("category_solution_id",$category)->get();
        $country = Country::Where("name", $request->input("pais"))->pluck("id")->first();
        $solutions = ItemSolution::join("solution_industry", "solution_industry.solution_id", "item_solutions.id")->join("solution_country", "solution_country.solution_id", "item_solutions.id")->where("minuserforsale", "<=", $minuser)->where("category_solution_id", $category)->whereRaw("industry_id=" . $industry)->whereRaw("country_id=" . $country)->select('item_solutions.*')->distinct()->get();

        $ssController = new Sscontroller();
        $res = $ssController->call("getLeads", ["where" => ["emailAddress" => $request->input("email")]]);
        $send = [];
        $send["__rea_de_inter__s_645bf7546c3e8"] = CategorySolution::Where("id", $category)->value("name1");
        $send["firstName"] = $request->input("name");
        $send["lastName"] = $request->input("lastname");
        $send["pa__s_646e72972e4ab"] = $request->input("pais");
        $send["completo_wizwrd_6489e6cb7598d"] = 1;
        $send["__usuarios_necesitas__647e451a6eab1"] = $minuser == 10 ? "10" : ($minuser == 100 ? "-100" : "+100");
        if ($industry == 12) {
            $send["otra_industria_648156d7044be"] = $request->input("industry");
            $send["industria_645bf7cf8de92"] = Industry::Where("id", $industry)->value("name1");
        } else {
            $send["industria_645bf7cf8de92"] = Industry::Where("id", $industry)->value("name1");
        }

        if (isset($res->result->lead[0]->id)) {
            $send["id"] = $res->result->lead[0]->id;
            //dd($send);
            //$send["soluci__n_contactada_647f82d8980ff"] = $res->result->lead[0]->soluci__n_contactada_647f82d8980ff . "\n" . $solucion;
            $objects[] = (object) $send;
            $params = array('objects' => $objects, "id" => $send["id"]);
            $res = $ssController->call("updateLeads", $params);
        } else {
            //$send["soluci__n_contactada_647f82d8980ff"] = $solucion;

            $objects[] = (object) $send;
            $params = array('objects' => $objects);
            $res = $ssController->call("createLeads", $params);
        }
        session()->put('ValidEmail', $request->input("email"));

        $solution_sliders = false;
        $category_solutions = false;
        if ($solutions->isEmpty()) {
            $solution_sliders = SolutionSlider::orderBy('order', 'Asc')->get();
            $category_solutions = CategorySolution::orderBy('order', 'Asc')->get();
            $items = [];

            if (Session::get("locale") == 2) {
                foreach ($category_solutions as $i => $category_solution) {
                    foreach ($category_solution->item_solutions as $n => $is) {
                        $has = false;
                        foreach ($is->countries as $country) {
                            if ($country->id == 33) {
                                $has = true;
                            }
                        }
                        if (!$has) {
                            unset($category_solution->item_solutions[$n]);
                        }
                    }
                }
            } else {
                foreach ($category_solutions as $i => $category_solution) {
                    foreach ($category_solution->item_solutions as $n => $is) {
                        $has = false;
                        foreach ($is->countries as $country) {
                            if ($country->id == 33) {
                                $has = true;
                            }
                        }
                        if ($has) {
                            unset($category_solution->item_solutions[$n]);
                        }
                    }
                }
            }
        }

        return view("web.wizardresults", compact("solutions", 'solution_sliders', 'category_solutions'));
    }
    public function wizard()
    {
        $catsol = CategorySolution::get();
        $industry = Industry::get();
        $countries = Country::get();
        return view("web.wizard", compact("catsol", "industry", "countries"));
    }
    public function changeLanguage(Request $request, $id)
    {
        $locale = Locale::where("code", $id)->first();
        if ($locale == false) {
            $locale = Locale::where("code", "es")->first();
        }
        session()->put('locale', $locale->id);
        return redirect()->back();
    }

    public function index(Request $request)
    {

        $pagefield = PageField::find(Session::get('locale'));
        $home_sliders = HomeSlider::orderBy('order', 'Asc')->get();
        $category_solutions = CategorySolution::orderBy('order', 'Asc')->get();
        return view('web.index', compact('pagefield', 'home_sliders', 'category_solutions'));
    }

    public function episodes()
    {

        $episode_sliders = EpisodeSlider::orderBy('id', 'desc')->get();
        $category_episodes = CategoryEpisode::orderBy('id', 'desc')->get();
        return view('web.episodes', compact('episode_sliders', 'category_episodes'));
    }

    public function episode($category, $slug, $id)
    {
        $pagefield = PageField::find(Session::get('locale'));
        $item_episode = ItemEpisode::where('id', $id)->first();
        if ($item_episode != false) {
            $slugcat = Str::slug($item_episode->category_episode->{"name" . Session::get('locale')});
            if ($item_episode->slug != $slug || $category != $slugcat) {
                //dd(Session::get('locale'));

                return redirect()->route('episode', [
                    "category" => $slugcat,
                    "slug" => $item_episode->slug,
                    "id" => $item_episode->id,
                ]);
            }
            $related = ItemEpisode::where('id', '<>', $id)->where('category_episode_id', $item_episode->category_episode_id)->where("locale_id", Session::get('locale'))->get();

            if (!is_null(Session::get('email'))) {
                $ssController = new Sscontroller();
                $res = $ssController->call("getLeads", ["where" => ["emailAddress" => Session::get('email')]]);
                if (isset($res->result->lead[0]->id)) {
                    $send["id"] = $res->result->lead[0]->id;
                    $ep = preg_split("/\n/", $res->result->lead[0]->newsletter_soluci__n_64833bd530d90);
                    $categories = [];
                    foreach ($ep as $e) {
                        $categories[$e] = $e;
                    }
                    $categories[$item_episode->category_episode->name1] = $item_episode->category_episode->name1;
                    $send["soluci__n_contactada_647f82d8980ff"] = 1;
                    $send["newsletter_soluci__n_64833bd530d90"] = join("\n", $categories);
                    $objects[] = (object) $send;
                    $params = array('objects' => $objects, "id" => $send["id"]);
                    $res = $ssController->call("updateLeads", $params);
                } else {
                    $send["soluci__n_contactada_647f82d8980ff"] = 1;
                    $send["newsletter_soluci__n_64833bd530d90"] = $item_episode->category_episode->name1;
                    $objects[] = (object) $send;
                    $params = array('objects' => $objects);
                    $res = $ssController->call("createLeads", $params);
                }
                return view('web.episode', compact('item_episode', 'related', 'pagefield'));
            } else {
                return view('web.episodemustlogin', compact('item_episode', 'related', 'pagefield'));
            }
        } else {
            return redirect()->route("episodes");
        }
    }

    public function solutions()
    {

        $solution_sliders = SolutionSlider::orderBy('order', 'Asc')->get();
        $category_solutions = CategorySolution::orderBy('order', 'Asc')->get();
        $items = [];

        if (Session::get("locale") == 2) {
            foreach ($category_solutions as $i => $category_solution) {
                foreach ($category_solution->item_solutions as $n => $is) {
                    $has = false;
                    foreach ($is->countries as $country) {
                        if ($country->id == 33) {
                            $has = true;
                        }
                    }
                    if (!$has) {
                        unset($category_solution->item_solutions[$n]);
                    }
                }
            }
        } else {
            foreach ($category_solutions as $i => $category_solution) {
                foreach ($category_solution->item_solutions as $n => $is) {
                    $has = false;
                    foreach ($is->countries as $country) {
                        if ($country->id == 33) {
                            $has = true;
                        }
                    }
                    if ($has && $is->countries->count() == 1) {
                        unset($category_solution->item_solutions[$n]);
                    }
                }
            }
        }
        return view('web.solutions', compact('solution_sliders', 'category_solutions'));
    }

    public function solutiondownload($id)
    {
        $solution = ItemSolution::where('id', $id)->first();
        //$pagefield = PageField::find(Session::get('locale'));
        //$countries = Country::get();
        //$hasValid=false;
        if ($solution != false) {

            if (!is_null(Session::get("ValidEmail"))) {
                $hasValid = true;
                $ssController = new Sscontroller();
                $res = $ssController->call("getLeads", ["where" => ["emailAddress" => Session::get("ValidEmail")]]);
                if (isset($res->result->lead[0]->id)) {
                    $send["id"] = $res->result->lead[0]->id;
                    $send["formularios_completados__1__6488d5c807506"] = $res->result->lead[0]->formularios_completados__1__6488d5c807506 . "," . $solution->slug;
                    $objects[] = (object) $send;
                    $params = array('objects' => $objects, "id" => $send["id"]);
                    $res = $ssController->call("updateLeads", $params);
                } else {
                    $send["formularios_completados__1__6488d5c807506"] = $solution->slug;
                    $objects[] = (object) $send;
                    $params = array('objects' => $objects);
                    $res = $ssController->call("createLeads", $params);
                }
                $file = public_path() . str_replace("https://master-sounds.com", "", $solution->{"pdf" . Session::get('locale')});
                $headers = [
                    'Content-Type' => 'application/pdf',
                ];

                return response()->download($file, "MasterSounds-" . $solution->slug . '.pdf', $headers);

            } else {
                return redirect()->route('solution', [Str::slug($solution->category_solution->name1), $solution->slug, $solution->id]);
            }
        } else {
            return redirect()->route('solutions');
        }
        //return view('web.solution', compact('item_solution', 'pagefield', 'countries',"hasValid"));
    }
    public function solution($category, $slug, $id)
    {

        $item_solution = ItemSolution::where('id', $id)->where('slug', $slug)->first();
        $pagefield = PageField::find(Session::get('locale'));
        $countries = Country::get();
        $hasValid = false;

        if (!is_null(Session::get("ValidEmail"))) {
            $hasValid = true;
            $ssController = new Sscontroller();
            $res = $ssController->call("getLeads", ["where" => ["emailAddress" => Session::get("ValidEmail")]]);
            //infograf__as_vistas__1__6488855ceb798
            if (isset($res->result->lead[0]->id)) {
                $send["id"] = $res->result->lead[0]->id;
                $send["infograf__as_vistas__1__6488855ceb798"] = $res->result->lead[0]->infograf__as_vistas__1__6488855ceb798 . "," . $item_solution->slug;
                $objects[] = (object) $send;
                $params = array('objects' => $objects, "id" => $send["id"]);
                $res = $ssController->call("updateLeads", $params);
            } else {
                $send["infograf__as_vistas__1__6488855ceb798"] = $item_solution->slug;
                $objects[] = (object) $send;
                $params = array('objects' => $objects);
                $res = $ssController->call("createLeads", $params);
            }
        }
        return view('web.solution', compact('item_solution', 'pagefield', 'countries', "hasValid"));
    }

    public function posts()
    {

        $post_sliders = PostSlider::orderBy('order', 'Asc')->get();
        $category_posts = CategoryPost::wherehas("item_posts", function ($q) {
            $q->where("name" . Session::get("locale"), "!=", "#");
        })->orderBy('order', 'Asc')->get();
        //dd($post_sliders);
        return view('web.posts', compact('post_sliders', 'category_posts'));
    }

    public function post($category, $slug, $id)
    {
        $item_post = ItemPost::where('id', $id)->first();

        if ($item_post != false) {
            $slugcat = Str::slug($item_post->category_post->{"name" . Session::get('locale')});
            if ($item_post->slug != $slug || $category != $slugcat) {
                //dd(Session::get('locale'));

                return redirect()->route('post', [
                    "category" => $slugcat,
                    "slug" => $item_post->slug,
                    "id" => $id,
                ]);

            }
            //Route::get('noticia/{category}/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'post'])->name('post');
            $related = ItemPost::where('id', '<>', $id)->where('category_post_id', $item_post->category_post_id)->where("name".Session::get('locale'),"!=","#")->get();
            $pagefield = PageField::find(Session::get('locale'));

            if ($item_post->{"name" . Session::get("locale")} == "#" || $item_post->{"body" . Session::get("locale")} == "#") {
                return redirect()->route('posts');
            } else {
                return view('web.post', compact('item_post', 'related', 'pagefield'));
            }
        } else {
            return redirect()->route("posts");
        }

    }

    public function contact()
    {

        $pagefield = PageField::find(Session::get('locale'));
        $countries = Country::get();
        return view('web.contact', compact('pagefield', 'countries'));
    }

    public function contactSave(Request $request)
    {

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'country_id' => 'required',
            'accepttos' => 'required',
        ];
        $messages = [
            //
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $record = Contact::create($request->all());
            return redirect()->route('contact.thanks')->with('message', 'Gracias por su interés.')->with('typealert', 'success');
        endif;
    }
    public function contactThanks()
    {

        return view('web.contactthanks');
    }

    public function postForm(Request $request)
    {
        $rules = [
            'item_solution_id' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'company' => 'required',
            'country_id' => 'required',
            'accepttos' => 'required',

        ];

        $messages = [
            //
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        } else {
            $record = Record::create($request->all());
            return redirect()->route('thanks', ['id' => $record->item_solution_id])->with('message', 'Gracias por su interés.')->with('typealert', 'success');
        }
    }

    public function thanks($id)
    {
        $item_solution = ItemSolution::where('id', $id)->first();
        return view('web.thanks', compact('item_solution'));
    }

    public function newsletter()
    {

        $pagefield = PageField::find(Session::get('locale'));
        $countries = Country::get();
        return view('web.newsletter', compact('pagefield', 'countries'));
    }

    public function newsletterSave(Request $request)
    {

        $rules = [
            'email' => 'required',
            'accepttos' => 'required',
        ];
        $messages = [
            //
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $record = Newsletter::create($request->all());
            return redirect()->route('newsletter.thanks')->with('message', 'Gracias por su interés.')->with('typealert', 'success');
        endif;
    }
    public function episodeloginsave(Request $request)
    {
//print_r($request->all());
        $send = [];
        //$episode = $request->input("episode");
        $cat = $request->input("category");
        $ssController = new Sscontroller();
        $res = $ssController->call("getLeads", ["where" => ["emailAddress" => $request->input("field_4808302595")]]);
        if (isset($res->result->lead[0]->id)) {
            $send["id"] = $res->result->lead[0]->id;
            $ep = preg_split("/\n/", $res->result->lead[0]->newsletter_soluci__n_64833bd530d90);
            $categories = [];
            foreach ($ep as $e) {
                $categories[$e] = $e;
            }
            $categories[$cat] = $cat;
            //   dd($categories);
            $send["soluci__n_contactada_647f82d8980ff"] = 1;
            $send["newsletter_soluci__n_64833bd530d90"] = join("\n", $categories);
            $objects[] = (object) $send;
            $params = array('objects' => $objects, "id" => $send["id"]);
            $res = $ssController->call("updateLeads", $params);
        } else {
            $send["soluci__n_contactada_647f82d8980ff"] = 1;
            $send["newsletter_soluci__n_64833bd530d90"] = $cat;

            $objects[] = (object) $send;

            $params = array('objects' => $objects);
            $res = $ssController->call("createLeads", $params);
        }
        session()->put('email', trim($request->input("field_4808302595")));
        $episode = ItemEpisode::where('id', $request->input("idepisode"))->first();
        //Route::get('episodio/{category}/{slug}/{id}', [App\Http\Controllers\Web\WebController::class, 'episode'])->name('episode');
        //dd($episode);
        return redirect()->route('episode', ['id' => $episode->id, "category" => \Str::slug($episode->category_episode->name1), "slug" => \Str::slug($episode->name)]);
    }
    public function newsletterThanks()
    {

        return view('web.newsletterthanks');
    }

}
