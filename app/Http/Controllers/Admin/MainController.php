<?php

namespace App\Http\Controllers\Admin;

use App\GiftDetail;
use App\Store;
use App\UserLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helmesvs\Notify\Facades\Notify;
use App\User;
use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Config;
use Rap2hpoutre\FastExcel\FastExcel;

class MainController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = 'admin.pages.';

    public function __construct()
    {
        $this->authLayout = 'admin.auth.';
        $this->pageLayout = 'admin.pages.';
        $this->middleware('auth');
    }

    /* -----------------------------------------------------------------------------------------
    @Description: Function for dashboard
    @input:
    @Output: display count data
    -------------------------------------------------------------------------------------------- */
    public function dashboard()
    {
        $totalUsers = User::get()->count();
        $totalStores = Store::get()->count();
        $totalPosts = GiftDetail::get()->count();
        $totalLikes = UserLike::get()->count();
        return view('admin.pages.dashboard', compact('totalUsers', 'totalStores', 'totalPosts', 'totalLikes'));
    }
}
