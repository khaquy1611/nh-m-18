<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Whistlists;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
class WhistlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_whistlist($idPro)
    {
        if(Auth::guard('cus')->check()){
            $idCus = Auth::guard('cus')->user()->id;
            $models = Whistlists::create([
                'customer_id'=>$idCus,
                'product_id'=>$idPro,
                'whistlist_status'=>1
            ]);
        }
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
     * @param  \App\Models\Whistlists  $whistlists
     * @return \Illuminate\Http\Response
     */
    public function show(Whistlists $whistlists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whistlists  $whistlists
     * @return \Illuminate\Http\Response
     */
    public function edit(Whistlists $whistlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whistlists  $whistlists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Whistlists $whistlists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whistlists  $whistlists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whistlists $whistlists)
    {
        //
    }
}
