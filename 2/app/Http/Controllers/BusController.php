<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Bus;

class BusController extends BaseController
{
    public function index(){
        $allBuses = Bus::all();
        return view('admin.allBuses',['allBuses'=>$allBuses]);
    }


    public function add()
    {        
        
        return view('admin.addBus');
    }


    public function store(Request $request)
    {
        
        $bus = new Bus();
        $bus->name =$request->name;
        $bus->operator =$request->operator;
        $bus->seat_row =$request->seat_row;
        $bus->seat_column =$request->seat_column;
        $bus->location =$request->location;
        $bus->save();
        return redirect()->back();
    }




    public function edit($id)
    {
        $bus = Bus::where('id', $id)->first();

        return view('admin.editBus', compact('bus'));
    }

    public function update(Request $request, $id){
    	$bus = Bus::find($id);
        $bus->name =$request->name;
        $bus->operator =$request->operator;
        $bus->seat_row =$request->seat_row;
        $bus->seat_column =$request->seat_column;
        $bus->location =$request->location;
        $bus->save();

        return redirect()->back();

    }
}
