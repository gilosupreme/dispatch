<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use App\Models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateAmbulanceRequest;

class SupervisorAmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulances = Ambulance::all();
        $user = Auth::user();

        return view('supervisor.ambulance.index', compact('ambulances', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $drivers_array = User::where('role_id', 3)->get();
        return view('supervisor.ambulance.create', compact('user', 'drivers_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAmbulanceRequest $request)
    {
        $ambulance_details = $request->all();

        $ambulance_details['reg_no'] = preg_replace("/\s+/", "", $request->reg_no);

        if ($file = $request->file('photo_id')) {

            $name = $file->getClientOriginalName() . time();
            $file->move('images', $name);

            $ambulance_photo = Photo::create(['path' => $name]);

            $ambulance_details['photo_id'] = $ambulance_photo->id;
        }

        Ambulance::create($ambulance_details);
        return redirect()->route('ambulance.index');
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
        $user = Auth::user();
        $drivers_array = User::where('role_id', 3)->get();
        $ambulance = Ambulance::findOrFail($id);

        return view('supervisor.ambulance.edit', compact('user', 'drivers_array', 'ambulance'));
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
        $ambulance = Ambulance::findOrFail($id);
        $ambulance_details = $request->all();

        if ($request->reg_no === '') {
            $ambulance_details = $request->except('reg_no');
        }

        if ($file = $request->file('photo_id')) {

            $name = $file->getClientOriginalName() . time();
            $file->move('images', $name);

            $ambulance_photo = Photo::create(['path' => $name]);

            $ambulance_details['photo_id'] = $ambulance_photo->id;
        }

        $ambulance->update($ambulance_details);
        return redirect()->route('ambulance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambulance = Ambulance::findOrFail($id);

        if (unlink(public_path() . $ambulance->photo->path)) {
            $ambulance->delete();
            Session::flash('ambulance.delete', 'The User: ' . $ambulance->reg_no . ' has been deleted successfully!');

            return redirect()->route('ambulance.index');
        } else {
            $ambulance->delete();
            Session::flash('ambulance.delete', 'The User: ' . $ambulance->reg_no . ' has been deleted successfully!');

            return redirect()->route('ambulance.index');
        }
    }
}
