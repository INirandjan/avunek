<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class BoardController extends Controller
{
    // Show all Boards
    public function index() {
        return view('boards.index', [
            'boards' => Board::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single Board
    public function show(Board $board) {
        return view('boards.show', [
            'board' => $board
        ]);
    }

    //Show Create Form
    public function create() {
        return view('boards.create');
    }

    // Store Board Data
    public function store(Request $request) {
        // dd($request->file('logo')->store());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('boards', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
            
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        
        Board::create($formFields);

        return redirect('/')->with('message', 'Listing created succssfully!');
    }



    // Show Edit form
    public function edit(Board $board) {
        return view('boards.edit', ['board' => $board]);
    }



    // Update Board Data
    public function update(Request $request, Board $board): RedirectResponse
    {
        // dd($request->file('logo')->store());


        // Make sure logged in user is owner
        // Trying different checks 

        // if($board->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        // if (Gate::denies('update-board', $board)) {
        //     abort(403, 'Unauthorized Action');
        // }
        
        Gate::authorize('update-board', $board);

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $board->update($formFields);

        return back()->with('message', 'Listing updated succssfully!');
    }


    // Delete Board
    public function destroy(Board $board) {
        // Make sure logged in user is owner
        if ($board->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $board->delete();
        return redirect('/')->with('message', 'Listing deleted succesfully');
    }

    // Manage Boards
    public function manage() {
        return view('boards.manage', ['boards' => auth()->user()->boards()->get()]);
    }
}
