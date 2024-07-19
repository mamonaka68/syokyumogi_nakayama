<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class RegisterUserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function indicate(){
        return view('register');
    }

    public function create(Request $request){
        $form = $request->all();
    /*    Registeruser::create($form);*/
        return redirect('/');
    }

    public function punch()
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $user_id = Auth::user()->id;
        $confirm_date = Work::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();

        if (!$confirm_date) {
            $status = 0;
        } else {
            $status = Auth::user()->status;
        }
        return view('index', compact('status'));
    }

    public function work(Request $request)
    {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        if ($request->has('break_start') || $request->has('break_end')) {
            $work_id = Work::where('user_id', $user_id)
                ->where('work_date', $now_date)
                ->first()
                ->id;
        }

        // 勤務開始
        if ($request->has('work_start')) {
            $attendance = new Work();
            $attendance->work_date = $now_date;
            $attendance->work_start = $now_time;
            $attendance->user_id = $user_id;
            $status = 1;
        }

        // 休憩開始
        if ($request->has('break_start')) {
            $attendance = new Rest();
            $attendance->break_start = $now_time;
            $attendance->work_id = $work_id;
            $status = 2;
        }

        // 休憩終了
        if ($request->has('break_end')) {
            $attendance = Rest::where('work_id', $work_id)
                ->whereNotNull('break_start')
                ->whereNull('break_end')
                ->first();
            $attendance->break_end = $now_time;
            $status = 1;
        }

        // 勤務終了
        if ($request->has('work_end')) {
            $attendance = Work::where('user_id', $user_id)
                ->where('work_date', $now_date)
                ->first();
            $attendance->work_end = $now_time;
            $status = 3;
        }

        $user = User::find($user_id);
        $user->status = $status;
        $user->save();

        $attendance->save();

        return redirect('/')->with(compact('status'));
        //return redirect('/');
    }
}
