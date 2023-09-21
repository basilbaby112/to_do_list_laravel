<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all tasks
    public function index() {
        if( auth()->id()){

            $listing=Listing::where('user_id', auth()->id())->get();
        
        return view('listings.index', [
            'listings' => $listing
        ]);

        }else{
            return redirect('/login');
        }
        
    }

    //Show single task list
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Create task 
    public function create(){
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        $user_id=auth()->id();
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')) {
            $formFields['logo'] = $request->file('image')->store('image', 'public');
        }
        
        $formFields['user_id'] = $user_id;

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

     // Show Edit Form
     public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('image')) {
            $formFields['logo'] = $request->file('image')->store('image', 'public');
        }

        $formFields['status'] = $request->post('status');

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        // Make sure logged in user is owner
        // if($listing->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }
        
        // if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
        //     Storage::disk('public')->delete($listing->logo);
        // }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
