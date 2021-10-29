<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Requestt;
use App\Models\Userr;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dep=Department::index();
        // $userr=Userr::index();
        // $userr = Userr::get($id);
    
        if($request->searchBan==""){
            $requestt = Requestt::getIndex();
        }
        else{
            $requestt = Requestt::getBan($request);  
        }
        // dd($requestt);
      return view('request.index',['requestt'=>$requestt ,'dep'=>$dep,'searchBan'=>$request->searchBan]);
    // $requestt = Requestt::getIndex();
    // return view('request.index',['requestt'=>$requestt]);
    
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
        $requestt = Requestt::getById($id);
        // dd($requestt);
        if($requestt == NULL){
            return "Không có yêu cầu nào có mã yêu cầu = ".$id;
        }
        
        return view('request.edit',['requestt'=>$requestt]);
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
            return redirect('admin/request');
        }
    }
   
}
