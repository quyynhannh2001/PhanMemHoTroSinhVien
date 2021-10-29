<?php

namespace App\Providers;

use App\Models\Requestt;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Auth::guard('support')->check()){
        view()->composer('*', function($view)
        {
            // dd(Auth::guard('support')->check());
           
        $support = Auth::guard('support')->user()->department()->first();
        $now = Carbon::now();
        $reqMoreThan3Days['content']=[];
        //$data['requestList'] = Requestt::getIndex(); // lấy toàn bộ request
        // dd($data);
        $reqOver = Requestt::where('dept_id',$support->dept_id)->where('status',1)->get();
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
        
        //$count= count($reqMoreThan3Days['content']);

        $view->with('reqMoreThan3Days',$reqMoreThan3Days);
    
        });
    }
}
}
