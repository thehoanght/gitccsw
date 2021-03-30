<?php

namespace App\Http\Controllers;

use App\Models\EmailAccount;
use App\Models\EtsyAccount;
use App\Models\ChangeEmailAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChangeEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $datas = ChangeEmailAccount::orderBy('id', 'DESC')->paginate(10);
        $total_change = ChangeEmailAccount::all()->count();
        $total_done =  ChangeEmailAccount::where('status', 'done')->count();
        $total_pending = ChangeEmailAccount::where('status', 'pending')->count();
        $total_fail = $total_change - $total_done - $total_pending;
        return view('dashboard.change.changeList', [
            'datas' => $datas,
            'total_change' => $total_change,
            'total_done' => $total_done,
            'total_pending' => $total_pending,
            'total_fail' => $total_fail
        ]);
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
        $data = ChangeEmailAccount::find($id);
        return view('dashboard.change.edit', ['data' => $data]);
    }
    public function download()
    {
        $time = now();
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',   'Content-type'        => 'text/csv',   'Content-Disposition' => 'attachment; filename='.'data-'.$time.'.csv',   'Expires'             => '0',   'Pragma'              => 'public'
        ];

        $list = ChangeEmailAccount::all()->toArray();
        $i = 0;
        foreach ($list as $data) {
            $list[$i]['email_new_id'] = EmailAccount::find($data['email_new_id'])->email;
            $list[$i]['email_old_id'] = EtsyAccount::find($data['email_old_id'])->email_old;
            $list[$i]['created_at'] = EtsyAccount::find($data['email_old_id'])->purchased;
            $list[$i]['updated_at'] = EtsyAccount::find($data['email_old_id'])->password;
            $i++;
        }

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
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
        //var_dump('bazinga');
        //die();
        $validatedData = $request->validate([
            'email_old_id'             => 'required',
            'email_new_id'           => 'required',
            'status'         => 'required'
        ]);
        $data = ChangeEmailAccount::find($id);
        $data->email_old_id     = $request->input('email_old_id');
        $data->email_new_id   = $request->input('email_new_id');
        $data->updated_at   = now();
        $data->status = $request->input('status');
        $data->save();
        $request->session()->flash('message', 'Successfully edited change data');
        return redirect()->route('change.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retetsyurn \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function resetReview(Request $request)
    {
        try {
            ChangeEmailAccount::where("status", "review")->update(["status" => "pending"]);
            return "done";
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function getResult(Request $request)
    {
        $datas = ChangeEmailAccount::get();
        foreach ($datas as $data) {
            $et = EtsyAccount::where('id', $data->email_old_id)->first();
            $em = EmailAccount::where('id', $data->email_new_id)->first();
            $created_at = str_replace(',', ' ', Carbon::parse($et->created_at)->format('d M Y'));
            $purchased_at = str_replace(',', ' ', $et->purchased_at);
            $date_created_account = str_replace(',', ' ', $et->date_created_account);
            echo $em->email . ',' . $et->etsy_password_old . ',' . $em->password . ',' . $em->email_recover . ',' . $et->country . ',' . $et->address . ',' . $et->purchased . ',' . $purchased_at . ',' . $date_created_account . ',' . $et->credit_card . ',' . $created_at . ',' . $data->status;
            echo "<br>";
            //$email_new_id = $data->email_new_id;
        }
    }
}
