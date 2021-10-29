<?php

namespace App\Http\Controllers;

use App\Models\Requestt;
use App\Models\Ruser;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use SweetAlert;
use RealRashid\SweetAlert\Facades\Alert;
class RuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $now = Carbon::now();
        $reqMoreThan3Days['content']=[];
        $data['requestList'] = Requestt::getIndex(); // lấy toàn bộ request
        // dd($data);
        $reqOver = Requestt::getStt();
        // dd($reqOver);
        // $reqOver = Requestt::where('status',0)->get(); // lấy những request chưa xử lý
        $filtered = $reqOver->filter(function ($value, $key) use ($now) { // lọc ra những request chưa xử lý quá hạn 3 ngày
            $subDate = $now->diffInDays($value->created_at);
            return  $subDate > 3;
        });
        // dd($filtered);
        $reqMoreThan3Days['content'] = $filtered->toArray(); // Add những những request chưa xử lý vào mảng có key là content
        // dd($reqMoreThan3Days);

        $reqMoreThan3Days = Arr::add($reqMoreThan3Days, 'count', count($reqMoreThan3Days['content'])); // add [count =>so_request_chua_xu_lý]
        // dd($reqMoreThan3Days);
        
        $count= count($reqMoreThan3Days['content']);
        // dd($noti);
        //Mảng data cuối cùng của các request chưa xử lý
        // $reqMoreThan3Days = [
        //     'content' => $filtered->toArray(),
        //     'count'  => count($reqMoreThan3Days['content'])
        // ]

        $requestt = Requestt::getAllSupport();
        return view('ruser.index',['requestt'=>$requestt,'count'=> $count,'reqMoreThan3Days'=>$reqMoreThan3Days]);
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
    //    $reply = $request->input('reply');
    //    $data = (['reply'=>$reply]);
    //    $rs = Requestt::storeRequest($data);
    //    return redirect(route('ruser.index'));
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
        // $requestt = Requestt::get($id);
        // if($requestt == NULL){
        //     return "Không có yêu cầu nào có mã yêu cầu = ".$id;
        // }
        // else return view('ruser.reply',['requestt'=>$requestt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $now = Carbon::now();
        $reqMoreThan3Days['content']=[];
        $data['requestList'] = Requestt::getIndex(); // lấy toàn bộ request
        // dd($data);
        $reqOver = Requestt::getStt();
        // dd($reqOver);
        // $reqOver = Requestt::where('status',0)->get(); // lấy những request chưa xử lý
        $filtered = $reqOver->filter(function ($value, $key) use ($now) { // lọc ra những request chưa xử lý quá hạn 3 ngày
            $subDate = $now->diffInDays($value->created_at);
            return  $subDate > 3;
        });
        // dd($filtered);
        $reqMoreThan3Days['content'] = $filtered->toArray(); // Add những những request chưa xử lý vào mảng có key là content
        // dd($reqMoreThan3Days);

        $reqMoreThan3Days = Arr::add($reqMoreThan3Days, 'count', count($reqMoreThan3Days['content'])); // add [count =>so_request_chua_xu_lý]
        // dd($reqMoreThan3Days);
        
        $count= count($reqMoreThan3Days['content']);
        $requestt = Requestt::getById($id);
        if($requestt == NULL){
            return "Không có yêu cầu nào có mã yêu cầu = ".$id;
        }
        
        return view('ruser.edit',['requestt'=>$requestt,'count'=>$count,'reqMoreThan3Days'=>$reqMoreThan3Days]);
        
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
        $request->validate([
            'reply' => 'bail|required',
            // 'req_content' => 'bail|required',
        ],[
           'reply.required'=>'Nội dung trả lời không được để trống.', 
        //    'req_content.required'=>'Nội dung yêu cầu không được để trống.',
           
        ]);
        
        // $requestt = Requestt::getById($id);
        $current_datetime = \Carbon\Carbon::now()->toDateTimeString();
        $reply = $request->reply;
        $user_id = $request->user_id;
        $status = $request->status;
        // $updated_at = $request->updated_at;
        // dd($reply);
        $rs = Requestt::processUpdate($id,$reply,$status,$user_id,$current_datetime);
        
        if($rs == 0){
            return redirect()->route('ruser.edit',['ruser'=>$id])->with('success','Cập nhật trả lời thành công!');
        }
        else{
            return redirect()->back()->with('error','Cập nhật thất bại!');;
        }
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
}
