<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function index() {
        $ads = DB::table('ads')->paginate(5);
        return view('ads.index', compact('ads'));
    }

    public function edit() {
        return view('ads.create');
    }

    public function editAd($id) {
        $ad = Ad::find($id);
        return view('ads.edit', compact('ad'));
    }

    public function showAd($id) {
        $ad = Ad::find($id);
        return view('ads.show', compact('ad'));
    }


    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:5|max:255'
        ]);
        Ad::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->id()
        ]);
        session()->flash('message', 'Ad have been created');
        return redirect()->home();
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:5|max:255'
        ]);
        $ad = Ad::find($id);
        if (auth()->id() == $ad->user->id) {
            $ad->update($request->all());
        } else {
            session()->flash('message', 'You dont have permission to update this ad');
            return redirect()->home();
        }
        session()->flash('message', 'Ad have been updated');
        return redirect()->home();
    }

    public function destroy($id)
    {
        $ad = Ad::find($id);
        if (auth()->id() == $ad->user_id) {
            $ad->delete();
        } else {
            session()->flash('message', 'You dont have permission to delete this ad');
            return redirect()->home();
        }
        session()->flash('message', 'Ad have been deleted');
        return redirect()->home();
    }
}
