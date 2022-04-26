<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use App\Bank;
use App\Account;
use App\Institution;
//use App\Import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;
use view;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //admin.bank
        $bank = Bank::get();
       // return $data;
        return view('Bank.show', compact('bank'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $data = Bank::all();
        return view('bank.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $bank = Bank::all();
        $account = Account::get();
        // return $data;
         return view('Bank.add', compact('bank','account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

       // return $request;
        try{
            DB::beginTransaction();


            $bank = Bank::create([
                'bank_name' => $request->name,
                'adress' => $request->adress,

            ]);



            DB::commit();
            return redirect()->route('banks')->with(['success' => 'تم ألتحديث بنجاح']);

            //return toastr()->success(trans('messages.success'));
            //return redirect()->route('admin.bank');
       }catch(\Exception $ex){
            DB::rollback();
            Log::error($ex);
            return redirect()->back()->with(['error' => 'عفواً . حدثت مشكلة الرجاء المحاولة لاحقاً .'])->withInput();
        }}


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

        $bank = Bank::find($id);
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update( Bank $bank,Request $request)
    {
        //return $bank;
        try{
            DB::beginTransaction();
            // check email if exiested .
            $bank->update([
                'bank_name' => $request->name,
                'adress' => $request->adress,
           ] );
            DB::commit();
            return redirect()->route('banks')->with(['success' => 'تم ألتحديث بنجاح']);
        }catch(\Exception $ex){
            DB::rollback();
            Log::error($ex);
            return redirect()->back()->with(['error' => 'عفواً . حدثت مشكلة الرجاء المحاولة لاحقاً .'])->withInput();
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
            $bank= Bank    ::find($id);

            if (!$bank)
                return redirect()->route('banks')->with(['error' => 'هذا الماركة غير موجود ']);

            $bank->delete();

            return redirect()->route('banks')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('banks')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
