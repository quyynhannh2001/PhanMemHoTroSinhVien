<?php

namespace App\Http\Controllers;

use App\Models\Requestt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return redirect('request');
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
        // $requestt = Requestt::getIndex();
        // // dd($requestt);
        // if($requestt->status==1){
           
        //     return view('admin.success',['requestt'=>$requestt]);
        // }
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestt = Requestt::getById($id);
        if($requestt == NULL){
            return "Không có yêu cầu nào có mã yêu cầu = ".$id;
        }
        
        return view('admin.edit',['requestt'=>$requestt]);
        
    
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
        $rs = Requestt::destroy($id);
        if($rs == 0){
            return "Xóa dữ liệu không thành công";
        }
        else{
            return redirect('admin');
        }
    }
}
