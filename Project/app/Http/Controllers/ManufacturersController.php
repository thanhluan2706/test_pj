<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Product;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function userCan($action, $option = NULL)
    {
        $user = Auth::user();
        return Gate::forUser($user)->allows($action, $option);
    }

    //quản lý user.
    public function index()
    {
        if (!$this->userCan('view-page-admin')) {//kt user có quyền.
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }//lấy all trong bảng manufacturers
        $allmanus = Manufacturer::all();
        $allproducts = Product::all();//sử dụng phương thức all.
        return view('admin.manufacturers', [//Điều này cho phép bạn truy cập và sử dụng các biến này trong file view để hiển thị dữ liệu. 
            'allmanus' => $allmanus,//hiển thị trang ql nhà sx,và truyền ds all các nhà sx, sp vào view để hiển thị trên gd user.
            'allproducts' => $allproducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Thêm user:
    public function create()
    {
        if (!$this->userCan('view-page-admin')) {//kt user có quyền.
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
        return view('admin.addmanufacturer');//phương thức trả về view có tên là "admin.addmanufacturer".
        //Điều này cho phép bạn hiển thị giao diện người dùng để tạo một nhà sản xuất mới. 
        //View này được sử dụng để hiển thị form và cho phép người dùng nhập thông tin cần thiết.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->userCan('view-page-admin')) {//kt quyền user.
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
        $manu = new Manufacturer;//tạo một đối tượng mới của model. tạo bảng ghi mới.
        $manu->manu_name = $request->manu_name;//rán gt.
        $manu->save();
        return redirect()->action([ManufacturersController::class, 'index']);//tạo thành công và chuyển đến user mới.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->userCan('view-page-admin')) {
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //sửa:
    public function edit($id)
    {
        if (!$this->userCan('view-page-admin')) {//kt quyền
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
        $manu = Manufacturer::where('manu_id', $id)->first();// thông qua Manufacturer.
        return view('admin.editmanufacturer', [
            'manu' => $manu,
        ]);
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
        if (!$this->userCan('view-page-admin')) {
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
        $manu = Manufacturer::find($id);
        $manu->manu_name = $request->manu_name;
        $manu->save();
        return redirect()->action([ManufacturersController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->userCan('view-page-admin')) {
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
        $manu = Manufacturer::find($id);
        $manu->delete();
        return redirect()->action([ManufacturersController::class, 'index']);
    }
}
