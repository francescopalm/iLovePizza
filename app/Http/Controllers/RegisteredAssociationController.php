<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisteredAssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $logged_user = Auth::id();

        $user_associations = DB::table('associations')->where('admin','=', $logged_user)->get();
        return view('newassociation', ['user_associations' => $user_associations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'association_name' => ['required', 'string', 'max:255'],
            'association_type' => ['required'],
        ]);

        $association = new Association();

        $logged_user = Auth::id();

        $association->name = $request->input('association_name');
        $association->type = $request->input('association_type');
        $association->admin = $logged_user;

        $association->save();

        //** Crea il record nella tabella pivot dell'associazione 
        // molti-a-molti e assegna di default la costante che identifica un utente amministratore, 
        // definita nel file config/globals.php  */
        $association->users()->attach($logged_user, ['user_type' => config('globals.types.admin')]);
         


        return redirect()->route('association', ['association' => $association->name, 'user_type' => config('globals.types.admin')])->with('success', 'Association created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Association $association)
    {
        //
        $model = [
            'name' => $association->name,
            'user_type' => $association->user_type,
        ];
        return view('association', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}
