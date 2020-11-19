<?php

namespace App\Http\Controllers\Front;

use App\EventRegistration;
use App\GiftDetail;
use App\Http\Controllers\Controller;
use App\Post;
use App\Store;
use App\UserLike;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DataTables;
use Illuminate\Support\Facades\Session;
use Validator;
use Str;
use Storage;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Builder;
use Auth;
use App\User;
use Helmesvs\Notify\Facades\Notify;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authLayout = 'front.auth.';
        $this->pageLayout = 'front.pages.';
    }

    public function index()
    {
        //
    }

    public function post_listing()
    {
        $posts = GiftDetail::get();
        return view($this->pageLayout.'post_listing', compact('posts'));
    }

    public function store_listing()
    {
        $stores = Store::get();
        return view($this->pageLayout.'store', compact('stores'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('front.auth.login');
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
    public function logout()
    {
        if (\Illuminate\Support\Facades\Auth::check() === true) {
            Auth::logout();
            Session::flush();
            return redirect()->route('front.login');
        } else {
            return redirect()->route('front.login');
        }
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
    public function likepost($id)
    {
        $user_id = Auth::User()->id;
        if (empty(UserLike::where('user_id', $user_id)->where('gift_id', $id)->first())) {
            UserLike::create([
                'user_id' => $user_id,
                'gift_id' => $id
            ]);
            Notify::success('Post Like successfully !!');
        } else {
            Notify::success('Post Already Likes !!');
        }
        return redirect()->route('front.post_listing');
    }
}
