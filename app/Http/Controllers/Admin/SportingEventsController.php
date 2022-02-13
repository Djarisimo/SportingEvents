<?php

namespace App\Http\Controllers\Admin;

use App\Models\SportingEvents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SportingEventsController extends Controller
{
    public function index()
    {
        $sportingevents = SportingEvents::all();
        return view('admin.sportingevents')
           ->with('sportingevents',$sportingevents)
        ;
    }

    public function store(Request $request)
    {
        $sportingevents = new SportingEvents();

        $sportingevents->title = $request->input('title');
        $sportingevents->sport = $request->input('sport');
        $sportingevents->timelength = $request->input('timelength');

        $sportingevents->save();

        return redirect('/Sporting-Events')->with('status', 'Data Added for Sporting Events');
    }

    public function edit($id)
    {
        $sportingevents = SportingEvents::findOrFail($id);
       return view('admin.events.edit')
       ->with('sportingevents',$sportingevents)    
       ;
    }

    public function update(Request $request, $id)
    {
        $sportingevents = SportingEvents::findOrFail($id);
        $sportingevents->title = $request->input('title');
        $sportingevents->sport = $request->input('sport');
        $sportingevents->timelength = $request->input('timelength');
        $sportingevents->update();

        return redirect('Sporting-Events')->with('status', 'Data Updated for Sporting Events');
    }

    public function delete($id)
    {
        $sportingevents = SportingEvents::findOrFail($id);
        $sportingevents->delete();

        return redirect('Sporting-Events')->with('status', 'Data Deleted for Sporting Events');
    }
}
