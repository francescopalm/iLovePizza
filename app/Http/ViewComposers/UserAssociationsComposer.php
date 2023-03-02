<?php
 
namespace App\Http\ViewComposers;
 
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Association;
use App\Models\User;
 
class UserAssociationsComposer

// Questo View Composer recupera tutte le associazioni di cui fa parte un utente registrato, dunque fornisce tale dato a tutte le view.

{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        //
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        

        if(Auth::check()){
            // Recupera l'ID dell'utente loggato
            $logged_user = Auth::id();


            $userAssociations = User::find($logged_user)->associations()->get();
    
            // Fornisce la lista di associazioni di cui fa parte l'utente loggato
            //$userAssociations = Association::with('users')->where('id', '=', $logged_user)->get();
            //$userAssociations = Association::with('association_user')->where('user_type', '=', $logged_user)->get();
            $view->with('userAssociations', $userAssociations);
        }

    }
}
