<?php

namespace App\Http\Controllers;

use App\EventRegistration;
use App\GiftDetail;
use App\Http\Controllers\Controller;
use App\Post;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DataTables;
use Validator;
use Str;
use Storage;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Builder;
use Auth;
use App\User;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Support\Facades\Hash;

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
        dd(Auth::User());
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

    public function showRegistrationForm()
    {
        return view('front.auth.register');
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
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'           => 'required|min:1|max:100',
            'email'     => 'required|unique:users,email|min:1|max:100',
            'password'         => 'required',
            'avatar'           => 'sometimes|mimes:jpeg,jpg,png',
        ]);
        try {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('avatar', $file, $filename);
            } else {
                $filename = '';
            }

            User::create([
                'name'     =>  @$request->name,
                'email'     =>  @$request->email,
                'password'     =>  Hash::make(@$request->password),
                'address'     =>  @$request->address,
                'avatar'     =>  @$filename,
                'user_type'     =>  'user',
                'role_id'     =>  '3',
            ]);

            Notify::success('User Created successfully !!');
            return redirect()->route('front.login');
        } catch (\Exception $e) {
            Notify::error($e->getMessage());
        }
    }
}
