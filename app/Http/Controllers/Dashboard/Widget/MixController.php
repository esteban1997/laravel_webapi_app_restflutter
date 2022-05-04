<?php

namespace App\Http\Controllers\Dashboard\Widget;

use App\Models\Mix;
use App\Models\Chip;
use App\Models\Text;
use App\Models\Group;
use App\Models\Image;
use App\Models\Button;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::paginate(15);

        return view('dashboard.widgets.mix.index',compact('groups'));
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
    public function store(Request $request,Group $group)
    {

        $request->validate(
            [
                'orden'=>'required',
                'widget'=>'required',
            ]
            );

            $widgets = Str::of(request("widget"))->explode("_");

            $data=[
                "widget_id"=>$widgets[1],
                "widget"=>$widgets[0],
                "orden"=>request("orden"),
                "group_id"=>$group->id
            ];

            Mix::create($data);

    return back()->with('status',"Elemento creado con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Mix $mix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $mixs = Mix::where('group_id',$group->id)->orderBy('orden','ASC')->get();
        $buttons = Button::where('group_id',$group->id)->get();
        $images = Image::where('group_id',$group->id)->get();
        $texts = Text::where('group_id',$group->id)->get();
        $chips = Chip::where('group_id',$group->id)->get();
        return view('dashboard.widgets.mix.edit',compact('mixs','buttons','images','texts','chips','group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {

        $request->validate(
            [
                'orden.*'=>'required',
                'widget.*'=>'required',
            ]
            );

        foreach (request("orden") as $key => $orden) {


                $widgets = Str::of(request("widget")[$key])->explode("_");

                $data=[
                    "widget_id"=>$widgets[1],
                    "widget"=>$widgets[0],
                    "orden"=> $orden,
                    "group_id"=>$group->id
                ];

                Mix::where('id',request('id')[$key])->update($data);
        }


    return back()->with('status',"Elemento actualizado con exito");
    }

}
