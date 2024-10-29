<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\loaiTB;
use Database\Seeders\DeviceSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class thietbiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TB = Device::all();
        // $jonh = Device::with('loaiTB')->get();
        return view('ThietBi.index',['thietbi'=>$TB]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiTB = loaiTB::all();
        return view('thietbi.add',['loai'=>$loaiTB]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = ([
            'file'=>'required|mimes:jpg|max:2048'
        ]);

        $message =[
            'required' => 'Vui lòng upload ảnh',
            'mimes' => 'Định dang không hợp lệ',
        ];

        $vadidate = Validator::make($request->all(), $file, $message);

        if($vadidate->fails()){
            return back()->withErrors($vadidate)->withInput();
        }


        //Xử lí ảnh
        if($request->file('file')){
            $name = time().'.'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('img'), $name);
        }


        //Tạo thiết bị mới
        $device = new Device();
        $device->tenTB = $request->input('tenTB');
        $device->id_loaiTB = $request->input('loaiTB');
        $device->trangthai = $request->input('trangthai');
        $device->hinh = $request = $name;
        $device->save();

        return redirect()->route('thietbi')->with('success', 'Thiết bị đã được thêm thành công.');
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
        $device = Device::find($id);
        $loaiTB = loaiTB::all();
        return view('Thietbi.edit',['thietbi'=>$device , 'loai'=>$loaiTB]);
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
        $device = Device::find($id);
        
        
        if($device){
            $device->tenTB=$request->input('tenTB');
            $device->id_loaiTB=$request->input('loaiTB');
            $device->trangthai=$request->input('trangthai');
            $file = $request->file('file');
            $imgname = time().'.'.$file->getClientOriginalName();
            $file->move(public_path('img'), $imgname);
            $device->hinh= $imgname;
            $device->save();
            return redirect()->route('thietbi')->with('success', 'Cập nhật thành công');
        }else{
            return redirect()->route('thietbi')->with('success', 'Cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $id = Device::find($id);
        if($id){
            $id->delete();
            return redirect()->route('thietbi');
        }else{
            return redirect()->route('thietbi');
        }
    }
}
