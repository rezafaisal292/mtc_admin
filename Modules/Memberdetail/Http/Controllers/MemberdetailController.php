<?php

namespace Modules\Memberdetail\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\Member;
use Modules\Memberdetail\Entities\MemberDetail;

class MemberdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data=MemberDetail::fetch($request);
        $member=to_dropdown(Member::All(),'id','name');
        return view('memberdetail::index',compact('data','member'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $d= new MemberDetail;
        $member=to_dropdown(Member::All(),'id','name');
        return view('memberdetail::form',compact('d','member'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        return redirect('memberdetail');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('memberdetail::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(MemberDetail $memberdetail)
    {
        $d=$memberdetail;
        return view('memberdetail::form',compact('d'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        return redirect('memberdetail');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('memberdetail');
    }
}
