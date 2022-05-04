<?php

namespace App\Http\Controllers\Dashboard\Widget;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveChip;
use App\Models\Chip;
use App\Models\Group;

class ChipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chips = Chip::paginate(15);

        return view('dashboard.widgets.chip.index',compact('chips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $groups = Group::pluck('id','name');
        $chip = new Chip();
        return view('dashboard.widgets.chip.create',compact('groups','chip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveChip $request)
    {
        Chip::create($request->validated());
        return back()->with('status','Elemento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chip  $chip
     * @return \Illuminate\Http\Response
     */
    public function show(Chip $chip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chip  $chip
     * @return \Illuminate\Http\Response
     */
    public function edit(Chip $chip)
    {

        //dd($chip);
        $groups = Group::pluck('id','name');
        return view('dashboard.widgets.chip.edit',compact('groups','chip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chip  $chip
     * @return \Illuminate\Http\Response
     */
    public function update(SaveChip $request, Chip $chip)
    {
        $chip->update($request->validated());
        return back()->with('status','Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chip  $chip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chip $chip)
    {
        $chip->delete();
        return back()->with('status','Elemento eliminado con exito');
    }
}
