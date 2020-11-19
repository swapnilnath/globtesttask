<?php

namespace App\Http\Controllers\Admin;

use App\GiftDetail;
use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use App\UserLike;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use DataTables;
use Validator;
use Str;
use Storage;
use Helmesvs\Notify\Facades\Notify;

class StoreController extends Controller
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
        $this->pageLayout = 'admin.pages.stores.';
        $this->giftpageLayout = 'admin.pages.gifts.';
        $this->middleware('Admin');
    }

    /*
    User Listing page
    */
    public function index(Builder $builder, Request $request)
    {
        try {
            $stores = Store::orderBy('id', 'DESC');
            if (request()->ajax()) {
                return \Yajra\DataTables\DataTables::of($stores->get())
                    ->addIndexColumn()
                    ->editColumn('action', function (Store $stores) {
                        $action = '';
                        if ($stores->status == 'active') {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$stores->id.'" href="javascript:void(0)" title="Active"><i class="fa fa-unlock-alt"></i></a>';
                        } else {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$stores->id.'" href="javascript:void(0)" title="Block"><i class="fa fa-lock"></i></a> ';
                        }
                        $action .='<a class="ml-1 mr-1 deletestore" data-id ="'.$stores->id.'" href="javascript:void(0)"><i class="fa fa-trash" title="remove user"></i></a> ';
                        return $action;
                    })

                    ->editColumn('address', function (Store $stores) {
                        $address = $stores->address;
                        return htmlspecialchars(strip_tags($address));
                    })
                    ->editColumn('store_image', function (Store $stores) {
                        if ($stores->store_image) {
                            $i='';
                            if (file_exists('storage/store_image/'.$stores->store_image)) {
                                $i .= "<img src=".url("storage/store_image/".$stores->store_image)." style='max-width:50px;max-height:50px;'/> ";
                            } else {
                                $i .= "<img src=".url("storage/store_image/default.png")."  style='max-width:50px;max-height:50px;'/> ";
                            }
                            return $i;
                        } else {
                            return "<img src=".url("storage/store_image/default.png")."  style='max-width:50px;max-height:50px;'/> ";
                        }
                    })
                    ->rawColumns(['action','store_image'])
                    ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
                ['data' => 'store_name','name' => 'store_name','title' =>'Store Name','width'=>'10%'],
                ['data' => 'store_image','name' => 'store_image','title' =>'Image','width'=>'10%'],
                ['data' => 'email','name' => 'email','title' =>'Email','width'=>'10%'],
                ['data' => 'mobile','name' => 'mobile','title' =>'Mobile','width'=>'10%'],
                ['data' => 'status','name' => 'status','title' =>'Status','width'=>'10%'],
                ['data' => 'address','name' => 'address','title' =>'Address','width'=>'15%'],
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
        return view($this->pageLayout.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_name'           => 'required|unique:stores,store_name|min:1|max:100',
            'email'     => 'required',
            'mobile'         => 'required|numeric',
            'address'         => 'required',
            'store_image'           => 'sometimes|mimes:jpeg,jpg,png',
        ]);
        try {
            if ($request->hasFile('store_image')) {
                $file = $request->file('store_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('store_image', $file, $filename);
            } else {
                $filename = '';
            }

            Store::create([
                'store_name'     =>  @$request->store_name,
                'email'     =>  @$request->email,
                'mobile'     =>  @$request->mobile,
                'address'     =>  @$request->address,
                'store_image'     =>  @$filename,
            ]);

            Notify::success('Store Created successfully !!');
            return redirect()->route('admin.store.index');
        } catch (\Exception $e) {
            Notify::error($e->getMessage());
        }
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
        Store::where('id', $id)->delete();
        Notify::success('Store removed successfully.');
        return response()->json([
            'status'    => 'success',
            'title'     => 'Success!!',
            'message'   => 'Store Removed successfully.'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $user = Store::where('id', $request->id)->first();
        if ($user === null) {
            return redirect()->back()->with([
                'status'    => 'warning',
                'title'     => 'Warning!!',
                'message'   => 'Store not found !!'
            ]);
        } else {
            if ($user->status == "active") {
                Store::where('id', $request->id)->update([ 'status' => "block",]);
            }
            if ($user->status == "block") {
                Store::where('id', $request->id)->update(['status'=> "active"]);
            }
        }
        Notify::success('Store status updated successfully !!');
        return response()->json([
            'status'    => 'success',
            'title'     => 'Success!!',
            'message'   => 'Store status updated successfully.'
        ]);
    }

    public function giftindex(Builder $builder, Request $request)
    {
        try {
            $gift = GiftDetail::orderBy('id', 'DESC');
            if (request()->ajax()) {
                return \Yajra\DataTables\DataTables::of($gift->get())
                    ->addIndexColumn()
                    ->editColumn('action', function (GiftDetail $gift) {
                        $action = '';
                        if ($gift->status == 'active') {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$gift->id.'" href="javascript:void(0)" title="Active"><i class="fa fa-unlock-alt"></i></a>';
                        } else {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$gift->id.'" href="javascript:void(0)" title="Block"><i class="fa fa-lock"></i></a> ';
                        }
                        $action .='<a class="ml-1 mr-1 deletegift" data-id ="'.$gift->id.'" href="javascript:void(0)"><i class="fa fa-trash" title="remove user"></i></a> ';
                        return $action;
                    })

                    ->editColumn('description', function (GiftDetail $gift) {
                        $description = $gift->description;
                        return Str::limit(htmlspecialchars(strip_tags($description)), 60, ' (...)');
                    })
                    ->editColumn('total_likes', function (GiftDetail $gift) {
                        $description = UserLike::where('gift_id', $gift->id)->get()->count();
                        return $description;
                    })
                    ->editColumn('gift_image', function (GiftDetail $gift) {
                        if ($gift->gift_image) {
                            $i='';
                            if (file_exists('storage/gift_image/'.$gift->gift_image)) {
                                $i .= "<img src=".url("storage/gift_image/".$gift->gift_image)." style='max-width:50px;max-height:50px;'/> ";
                            } else {
                                $i .= "<img src=".url("storage/gift_image/default.png")."  style='max-width:50px;max-height:50px;'/> ";
                            }
                            return $i;
                        } else {
                            return "<img src=".url("storage/gift_image/default.png")."  style='max-width:50px;max-height:50px;'/> ";
                        }
                    })
                    ->rawColumns(['action','gift_image'])
                    ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
                ['data' => 'gift_name','name' => 'gift_name','title' =>'Gift Name','width'=>'10%'],
                ['data' => 'gift_image','name' => 'gift_image','title' =>'Image','width'=>'10%'],
                ['data' => 'price','name' => 'price','title' =>'price','width'=>'10%'],
                ['data' => 'status','name' => 'status','title' =>'Status','width'=>'10%'],
                ['data' => 'description','name' => 'address','title' =>'Description','width'=>'15%'],
                ['data' => 'total_likes','name' => 'total_likes','title' =>'Total Likes','width'=>'15%'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'12%',"orderable" => false],
            ])->parameters(['order' =>[]]);
            return view($this->giftpageLayout.'index', compact('html'));
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }


    public function gift_create()
    {
        $stores = Store::pluck('store_name', 'id');
        return view($this->giftpageLayout.'create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gift_store(Request $request)
    {
        $validatedData = $request->validate([
            'gift_name'           => 'required|unique:gift_details,gift_name|min:1|max:100',
            'store_id'     => 'required',
            'price'         => 'required|numeric',
            'description'         => 'required',
            'gift_image'           => 'sometimes|mimes:jpeg,jpg,png',
        ]);
        try {
            if ($request->hasFile('gift_image')) {
                $file = $request->file('gift_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10).'.'.$extension;
                Storage::disk('public')->putFileAs('gift_image', $file, $filename);
            } else {
                $filename = '';
            }

            GiftDetail::create([
                'gift_name'             =>  @$request->gift_name,
                'store_id'          =>  @$request->store_id,
                'price'             =>  @$request->price,
                'description'     =>  @$request->description,
                'gift_image'     =>  @$filename,
            ]);

            Notify::success('Gift Created successfully !!');
            return redirect()->route('admin.gift.index');
        } catch (\Exception $e) {
            Notify::error($e->getMessage());
        }
    }


    public function gift_delete($id)
    {
        GiftDetail::where('id', $id)->delete();
        Notify::success('Gift removed successfully.');
        return response()->json([
            'status'    => 'success',
            'title'     => 'Success!!',
            'message'   => 'Gift Removed successfully.'
        ]);
    }

    public function gift_changeStatus(Request $request)
    {
        $user = GiftDetail::where('id', $request->id)->first();
        if ($user === null) {
            return redirect()->back()->with([
                'status'    => 'warning',
                'title'     => 'Warning!!',
                'message'   => 'Store not found !!'
            ]);
        } else {
            if ($user->status == "active") {
                GiftDetail::where('id', $request->id)->update([ 'status' => "block",]);
            }
            if ($user->status == "block") {
                GiftDetail::where('id', $request->id)->update(['status'=> "active"]);
            }
        }
        Notify::success('Gift status updated successfully !!');
        return response()->json([
            'status'    => 'success',
            'title'     => 'Success!!',
            'message'   => 'GiftDetail status updated successfully.'
        ]);
    }


    public function postlikeindex(Builder $builder, Request $request)
    {
        try {
            $gift = UserLike::with(['user','gift'])->orderBy('id', 'DESC');
            if (request()->ajax()) {
                return \Yajra\DataTables\DataTables::of($gift->get())
                    ->addIndexColumn()
                    ->editColumn('action', function (UserLike $gift) {
                        $action = '';
                        if ($gift->status == 'active') {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$gift->id.'" href="javascript:void(0)" title="Active"><i class="fa fa-unlock-alt"></i></a>';
                        } else {
                            $action .= '<a class="ml-2 mr-2 change_status" data-id ="'.$gift->id.'" href="javascript:void(0)" title="Block"><i class="fa fa-lock"></i></a> ';
                        }
                        $action .='<a class="ml-1 mr-1 deletegift" data-id ="'.$gift->id.'" href="javascript:void(0)"><i class="fa fa-trash" title="remove user"></i></a> ';
                        return $action;
                    })

                    ->editColumn('user_id', function (UserLike $gift) {
                        if (!empty($gift->user)) {
                            return $gift->user->name;
                        } else {
                            return '-';
                        }
                    })
                    ->editColumn('gift_id', function (UserLike $gift) {
                        if (!empty($gift->gift)) {
                            return $gift->gift->gift_name;
                        } else {
                            return '-';
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'name' => '', 'title' => 'Sr no','width'=>'5%',"orderable" => false, "searchable" => false],
                ['data' => 'user_id','name' => 'user_id','title' =>'User Name','width'=>'10%'],
                ['data' => 'gift_id','name' => 'gift_id','title' =>'Post','width'=>'10%'],
                ['data' => 'action', 'name' => 'action', 'title' => 'Action','width'=>'12%',"orderable" => false],
            ])->parameters(['order' =>[]]);
            return view($this->giftpageLayout.'userlike', compact('html'));
        } catch (\Exception $e) {
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }
}
