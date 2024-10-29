<?php

namespace App\Http\Controllers;

use App\Models\loaiTB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loaiTBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiTB= loaiTB::all(); // lấy tất cả dữ liệu từ DB
       return view('loaiTB.index',['loai'=>$loaiTB]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('loaiTB.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        loaiTB::create(
            ['tenTB'=>$request->tenTB]
        );
        return redirect()->route('loaiTB');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $name = $request->input('search');
        if(!empty($name)){
            $loaiTB = loaiTB::where('tenTB', 'Like', "%{$name}%")->get();
        }else{
            $loaiTB = loaiTB::all();    
        }
        return view('loaiTB.index',['loai'=>$loaiTB]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiTB = loaiTB::find($id);
        return view('loaiTB.Edit',['loai'=>$loaiTB]);
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
        $loaiTB = loaiTB::find($id);
        $loaiTB->tenTB=$request->input('tenTB');
        $loaiTB->save();
        return redirect()->route('loaiTB')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $thietbi = loaiTB::find($id);
       
        if($thietbi){
            $thietbi->delete();
            return redirect()->route('loaiTB')->with('success', 'Xóa thành công');
        }else{
            return redirect()->route('loaiTB')->with('error', 'Xóa không thành công');
        }
    }
}
