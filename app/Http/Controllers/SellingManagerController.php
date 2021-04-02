<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SellingManager;
use Illuminate\Support\Facades\Auth;

class SellingManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importEmail(Request $request)
    {
        return view('dashboard.selling.import');
    }
    public function importSellingData(Request $request)
    {
        //Kiểm tra file
        if ($request->hasFile('emailfile')) {
            $file = $request->emailfile;
            //  \r\n
            $array = preg_split('/[\n\r]+/', $file->get());
            $count = 0;
            $fail = "";
            foreach ($array as $accinfo) {
                $accinfo = trim($accinfo," ");
                $i = SellingManager::where('email', $accinfo)->count();
                if ($i < 1) {
                    try {
                        // $acc = explode(',', $accinfo);
                        $email_ = $accinfo;
                        $email_id = DB::table('email_accounts')->where('email', $email_)->first()->id;
                        $change_account_id = DB::table('change_email_accounts')->where('email_new_id ', $email_id)->first()->id;
                        $userId = Auth::id();
                        SellingManager::insert([
                            'user_id' => $userId,
                            'change_account_id' => $change_account_id,
                            'email' => $email_,
                            'order_id' => '',
                            'status' => 1,
                            'created_at' => now()
                        ]);
                        $count++;
                    } catch (\Throwable $th) {
                        $email_ = $accinfo;
                        $userId = Auth::id();
                        SellingManager::insert([
                            'user_id' => $userId,
                            'change_account_id' => '',
                            'email' => $email_,
                            'status' => 1,
                            'created_at' => now()
                        ]);
                        $count++;
                    }
                } else{
                    $fail .= "Exists: ".$accinfo." ";
                }
            }
            return back()
                ->with('success', 'Uploaded ' . $count . ' email đã bán. '.$fail);
        } else {
            return back()
                ->with('error', 'You have error when upload.');
        }
    }
    public function index()
    {
        return 0;
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
}
