<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use App\Helper\Helper;
use Helmesvs\Notify\Facades\Notify;

class UserController extends Controller
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
        $this->authLayout = 'admin.auth.';
        $this->pageLayout = 'admin.pages.user.';
        $this->middleware('Admin');
    }

    /*
    User Listing page
    */
    public function index(Builder $builder, Request $request)
    {
        try {
            $users = User::where('user_type', '!=', 'superadmin')->orderBy('id', 'DESC');
            if (request()->ajax()) {
                return \Yajra\DataTables\DataTables::of($users->get())
                    ->addIndexColumn()
                    ->editColumn('action', function (User $users) {
                        $action = '';
                        if ($users->status == 'active') {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$users->id.'" href="javascript:void(0)" title="Active"><i class="fa fa-unlock-alt"></i></a>';
                        } else {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$users->id.'" href="javascript:void(0)" title="Block"><i class="fa fa-lock"></i></a> ';
                        }
                        $action .='<a class="ml-1 mr-1 deleteuser" data-id ="'.$users->id.'" href="javascript:void(0)"><i class="fa fa-trash" title="remove user"></i></a> ';
                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
                ['data' => 'name','name' => 'name','title' =>'Name','width'=>'10%'],
                ['data' => 'email','name' => 'email','title' =>'Email','width'=>'10%'],
                ['data' => 'user_type','name' => 'user_type','title' =>'User Type','width'=>'10%'],
                ['data' => 'status','name' => 'status','title' =>'Status','width'=>'15%'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'12%',"orderable" => false],
            ])->parameters(['order' =>[]]);
            return view($this->pageLayout.'index', compact('html'));
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        Notify::success('User removed successfully.');
        return response()->json([
            'status'    => 'success',
            'title'     => 'Success!!',
            'message'   => 'User Removed successfully.'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user === null) {
            return redirect()->back()->with([
                'status'    => 'warning',
                'title'     => 'Warning!!',
                'message'   => 'User not found !!'
            ]);
        } else {
            if ($user->status == "active") {
                User::where('id', $request->id)->update([ 'status' => "block",]);
            }
            if ($user->status == "block") {
                User::where('id', $request->id)->update(['status'=> "active"]);
            }
        }
        Notify::success('User status updated successfully !!');
        return response()->json([
            'status'    => 'success',
            'title'     => 'Success!!',
            'message'   => 'User status updated successfully.'
        ]);
    }
}
