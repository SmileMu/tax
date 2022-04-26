<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use App\Bank;
use App\Account;
use App\Institution;
//use App\Import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;
use view;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //admin.bank

        $account = Account::get();
        // where([
        //     'institution_id' => auth()->user()->id
        // ])->get();

       // $account = Account::get();
       // return $account;
        return view('account.show', compact('account'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $account = Account::all();
        return view('bank.index', compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institution = Institution::get();
        $bank = Bank::get();
        $account = Account::all();
       // return $bank;

        return view('account.add', compact('institution','bank','account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

       //return $request;
DB::beginTransaction();


        $account = Account::create([
            'bank_id' => $request->bank_name,
            'accountNumber' => $request->account_number,
            'institution_id' => $request->institution,
            'balance' => $request->balance,

        ]);


        DB::commit();
        return redirect()->route('accounts')->with(['success' => 'تم ألتحديث بنجاح']);

        //return toastr()->success(trans('messages.success'));
        //return redirect()->route('admin.bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
//    public function show(Bank $bank)
//    {
//
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  $clearance = Clearance::all();
        $institution = Institution::all();
        $bank = Bank::get();

        $account = Account::find($id);
        return view('account.edit', compact('bank','account', 'institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Account $account, Request $request)
    {
        
       // return $account;
        try{
            DB::beginTransaction();
            // check email if exiested .clearaneNumber
            $account->update([
                'bank_id' => $request->bank_name,
                'accountNumber' => $request->account_number,
                'institution_id' => $request->institution,
                'balance' => $request->balance,
            ] );
            DB::commit();
            return redirect()->route('accounts')->with(['success' => 'تم ألتحديث بنجاح']);
        }catch(\Exception $ex){
            return $ex;
            DB::rollback();
            Log::error($ex);
            return redirect()->route('accounts')->with(['error' => 'عفواً . حدثت مشكلة الرجاء المحاولة لاحقاً .'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
    {
        try {
            //get specific categories and its translations
            $account = Account ::find($id);

            if (!$account)
                return redirect()->route('accounts')->with(['error' => 'هذا الحساب غير موجود ']);

            $account->delete();

            return redirect()->route('accounts')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('accounts')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
