<?php
namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Locale;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Socialite;
class Logincontroller extends Controller
{
    public function login()
    {
        if (!Auth::check()) {
            return view(
                "session/login", [
                ]
            );
        } else {
            return redirect()->route('index');
        }
    }
    public function recover(Request $request)
    {
        if (!Auth::check()) {
            if ($request->isMethod('post')) {
                $email = trim($request->input('email', ''));
                $user = User::where("email", $email)->first();
                $userb = User::where("email", $email)->toSql();
                if ($user == false) {
                    return redirect()->route('session.recover')
                        ->withStatus(__("session.global.userdontexists"));
                } else {
                    $password = randomHashWithLength(16);
                    $user->recoverpass = $password;
                    $user->save();
                    $mail = new MailPlatform();
                    $maillogcontroller = new Maillogcontroller();
                    $returnMail = $mail->sendEmail($user->email, $user->name, __('session.mail.changepasssubject'), "recover", ["pass" => $password, "with" => true]);
                    $maillogcontroller->storeSimple($user->id, $returnMail);
                    return redirect()->route('session.login')
                        ->with("success", __("session.mail.changepasslinksent"));
                }
            } else {
                return view(
                    "session/recover", [
                    ]
                );
            }
        } else {
            return redirect()->route("index");
        }
    }
    public function register(Request $request)
    {
        if ($request->isMethod("post")) {
            // if(!Auth::validate($credentials)) {
            $currentLocale = Locale::where("code", App()->getLocale())->first();
            $validated = $request->validate(
                [
                    'realname' => ['required'],
                    'username' => ['required', 'email'],
                    'country_id' => ['required'],
                    'password' => [
                        'required',
                        'string',
                        'min:8', // must be at least 10 characters in length
                        'same:passwordrepeat', // must be at least 10 characters in length
                        'regex:/[a-z]/', // must contain at least one lowercase letter
                        'regex:/[A-Z]/', // must contain at least one uppercase letter
                        'regex:/[0-9]/', // must contain at least one digit
                        'regex:/[!%&@#$^*?_~\.]/', // must contain a special character
                    ],
                ]
            );
            // dd($request->all());
            $token = randomHashWithLength(16);
            $nombre = trim($request->input('realname', ''));
            $username = trim($request->input('username', ''));
            $userExists = User::where("email", $username)->first();
            if ($userExists == false) {
                $userData = [
                    'name' => $nombre,
                    'email' => $username,
                    'role' => 'client',
                    'locale_id' => $currentLocale->id,
                    "country_id" => trim($request->input('country_id', '')),
                    'password' => Hash::make(trim($request->input('password', ''))),
                    "recoverpass" => $token,
                    "active" => 0,
                ];
                #dd($userData);
                $createUser = User::create($userData);
                $mail = new MailPlatform();
                $mail->sendEmail($username, $nombre, __("session.mail.activatesubject"), "activateaccount", ["token" => $token, "email" => $username]);
                return redirect()->route("session.login")
                    ->with("info", __("session.global.accountactivatemessage"));
            }
            return redirect()->route('session.register')
                ->with("info", __("session.global.useralreadyexists"));
        }
        if (!Auth::check()) {
            return view(
                "session/register", [
                    "countries" => Country::orderBy("name", "asc")->get(),
                ]
            );
        } else {
            return redirect()->route("index");
        }
    }
    public function connectTwitter()
    {
        if (Auth::check()) {
            return redirect()->route("index");
        } else {
            return Socialite::driver('twitter')->redirect();
        }
    }
    public function callbackTwitter()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $userWhere = User::where('twitter_id', $user->id)->first();
            if ($userWhere) {
                Auth::login($userWhere);
                if ($userWhere->is_admin) {
                    return redirect()->route("admin.dashboard");
                } else {
                    return redirect()->route("index");
                }
            } else {
                $twitterUser = User::create(
                    [
                        'name' => $user->name,
                        'email' => empty($user->email) ? $user->id . "@twitter.com" : $user->email,
                        'twitter_id' => $user->id,
                        'oauth_type' => 'twitter',
                        'password' => Hash::make($user->id . randomHashWithLength(16)),
                    ]
                );
                userrole::create(["role_id" => 3, "user_id" => $twitterUser->id]);
                Auth::login($twitterUser);
                return redirect()->route("index");
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route("index");
    }
    public function activate(Request $request, $tempPass, $email)
    {
        $user = User::where("email", $email)->where("recoverpass", $tempPass)->where("active", 0)->first();
        if ($user == false) {
            return redirect()->route("session.login")
                ->with("info", __("session.global.accountdontexists"));
        } else {
            $user->recoverpass = "";
            $user->active = 1;
            $now = Carbon::now();
            $user->email_verified_at = $now->toDateTimeString();
            $user->save();
            return redirect()->route("session.login")
                ->with("success", __("session.global.accountsuccesfullyactivated"));
        }
    }
    public function changepass(Request $request, $tempPass)
    {
        // $credentials = $request->getCredentials();
        if ($request->isMethod("post")) {
            // if(!Auth::validate($credentials)) {
            $validated = $request->validate(
                [
                    'password' => [
                        'required',
                        'string',
                        'min:8', // must be at least 10 characters in length
                        'same:passwordrepeat', // must be at least 10 characters in length
                        'regex:/[a-z]/', // must contain at least one lowercase letter
                        'regex:/[A-Z]/', // must contain at least one uppercase letter
                        'regex:/[0-9]/', // must contain at least one digit
                        'regex:/[!%&@#$^*?_~\.]/', // must contain a special character
                    ],
                ]
            );
        }
        if (!Auth::check()) {
            $user = User::where("recoverpass", $tempPass)->first();
            if ($user == false) {
                return redirect()->route('session.login', $tempPass)
                    ->withStatus(__("session.global.tokenexpired"));
            }
            if ($request->isMethod('post')) {
                $password = trim($request->input('password', ''));
                $passwordb = trim($request->input('passwordrepeat', ''));
                if (!empty($password) && !empty($passwordb)) {
                    if ($password == $passwordb) {
                        $user = User::where("recoverpass", $tempPass)->first();
                        if ($user == false) {
                            return redirect()->route('session.changepass', $tempPass)
                                ->withStatus(__("session.global.userdontexists"));
                        } else {
                            $user->password = Hash::make($password);
                            $user->active = 1;
                            $user->recoverpass = "";
                            $user->save();
                            return redirect()->route('session.login')
                                ->with("success", __("session.global.passchangesuccess"));
                        }
                    } else {
                        return redirect()->route('session.changepass', $tempPass)
                            ->withStatus(__("session.global.passmustmatch"));
                    }
                }
                return redirect()->route('session.changepass', $tempPass)
                    ->withStatus(__("session.global.wrongcredentials"));
            } else {
                return view(
                    "session/changepass", [
                        "tempPass" => $tempPass,
                        "with" => true,
                    ]
                );
            }
        } else {
            return redirect()->route("index");
        }
    }
    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::where("id", Auth::user()->id)->first();
            $localeID = $request->input('locale', 0);
            if ($localeID != 0) {
                $user->locale_id = $localeID;
                $user->save();
                App()->setLocale($user->locale->code);
                session()->put('locale', $user->locale->code);
            }
            $countryID = $request->input('country', 0);
            if ($countryID != 0) {
                $user->country_id = $countryID;
                $user->save();
            }
            $password = trim($request->input('password', ''));
            $passwordb = trim($request->input('passwordb', ''));
            if (!empty($password) && !empty($passwordb)) {
                $validated = $request->validate(
                    [
                        'password' => [
                            'required',
                            'string',
                            'min:8', // must be at least 10 characters in length
                            'same:passwordb', // must be at least 10 characters in length
                            'regex:/[a-z]/', // must contain at least one lowercase letter
                            'regex:/[A-Z]/', // must contain at least one uppercase letter
                            'regex:/[0-9]/', // must contain at least one digit
                            'regex:/[!%&@#$^*?_~\.]/', // must contain a special character
                        ],
                    ]
                );
                if ($password == $passwordb) {
                    $user->password = Hash::make($password);
                    $user->save();
                    return redirect()->route('panel.profile')
                        ->with("success", __("user.actions.passwordchanged"));
                }
            }
        }
        $item = User::where("id", Auth::user()->id)->first();
        return view(
            'client/users/userprofile', [
                "item" => $item,
                "locales" => Locale::orderBy('name', 'asc')->get(),
                "countries" => Country::orderBy('name', 'asc')->get(),
            ]
        );
    }
    public function loginProcess(Request $request)
    {
        $email = trim($request->input('username', ''));
        $password = trim($request->input('password', ''));
        if (!empty($email) && !empty($password)) {
            $user = User::where("email", $email)->first();
            if ($user == false) {
                return redirect()->route('session.login')
                    ->withStatus(__("session.global.userdontexists"));
            } else {
                if (empty($user->password)) {
                    $password = randomHashWithLength(16);
                    $user->recoverpass = $password;
                    $user->save();
                    $mail = new MailPlatform();
                    $mail->sendEmail($user->email, $user->name, __("session.mail.createPassSubject"), "linkCambio", ["pass" => $password, "with" => false]);
                    return redirect()->route("session.login")
                        ->with("info", __("session.global.linkalreadysend"));
                } else {
                    if (!Auth::attempt(['email' => $email, 'password' => $password])) {
                        return redirect()->route("session.login")
                            ->withStatus(__("session.global.authCredentialsError"));
                    }
                }
                // $user = User::where("email", $email)->first();
                Auth::login($user);
                App()->setLocale($user->locale->code);
                session()->put('locale', $user->locale->code);
                return $this->authenticated($request, $user);
            }
        }
        return redirect()->route("session.login")
            ->withStatus(__("session.global.authCredentialsError"));
    }
    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth    $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
