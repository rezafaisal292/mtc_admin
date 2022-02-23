<?php

namespace Modules\Landingproduk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Member\Entities\Member;
use Modules\Pageweb\Entities\Pageweb;
use Modules\Produk\Entities\Produk;
use Modules\Profile\Entities\Profile;
use Modules\Services\Entities\Services;

class LandingprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $services = Services::Landing();
        $pageweb = Pageweb::Landing();
        $member = Member::Landing();
        $profile = Profile::Landing();
        $produk = Produk::LandingHome();
        return view('landingproduk::index',compact('services','pageweb','member','profile','produk'));
 
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('landingproduk::form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        return redirect('landingproduk');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('landingproduk::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('landingproduk::edit');
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
        return redirect('landingproduk');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('landingproduk');
    }
}
