<?php

namespace App\Http\Controllers;

use App\Http\Traits\InfoTrait;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    use InfoTrait;

    private $infoModel;

    public function __construct(Info $info)
    {
        $this->infoModel = $info;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = $this->infoModel::get();
        return view('admin.information.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'key'=>'required',
            'value'=> 'required|min:10|max:255'
        ]);
        $this->infoModel::create($request->except(['_token']));
        return redirect()->route('information.index')->with('success', 'Information Has Been Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show($infoId)
    {
        $info = $this->getInfoById($infoId);
        return view('admin.information.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit($infoId)
    {
        $info = $this->getInfoById($infoId);
        return view('admin.information.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $infoId)
    {
       // dd($request);
        if ($info = $this->getInfoById($infoId)) {
            $request->validate([
                'key'=>'required',
                'value'=> 'required|min:10|max:255'
            ]);
            $info->update($request->except(['_token']));
            return redirect()->route('information.index')->with('success', 'Information Has Been Updated Successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy($infoId)
    {
        if ($info = $this->getInfoById($infoId)) {
            $info->delete();
            return redirect()->route('information.index')->with('success', 'Information Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
