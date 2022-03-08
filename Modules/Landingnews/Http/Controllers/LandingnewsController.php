<?php

namespace Modules\Landingnews\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pageweb\Entities\Pageweb;
use Modules\Produk\Entities\Produk;
use Modules\Profile\Entities\Profile;

class LandingnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $pageweb = Pageweb::Landing();
        $profile = Profile::Landing();
        $news = Produk::LandingNews();
        
        return view('landingnews::index',compact('pageweb','profile','news'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('landingnews::form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        return redirect('landingnews');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Produk $landingnews)
    {

        $d=$landingnews;
        $pageweb = Pageweb::Landing();
        $profile = Profile::Landing();
        $news = Produk::LandingNews();
        return view('landingnews::show',compact('profile','pageweb','d','news'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('landingnews::edit');
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
        return redirect('landingnews');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //

        return redirect('landingnews');
    }
}
