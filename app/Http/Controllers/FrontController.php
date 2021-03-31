<?php

namespace App\Http\Controllers;

use App\Models\Categorie_propriete;
use App\Models\Propriete;
use App\Models\Rdv;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use \Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Switch_;

class FrontController extends Controller
{

    public function __construct()
    {
        //its just a dummy data object.
        $liste_categorie = Categorie_propriete::all();

        // Sharing is caring
        View::share('liste_categorie', $liste_categorie);
    }

    public function redirection(Request $request,String $langue)
    {
        return Redirect::to(URL::previous() . "#googtrans(fr|$langue)");
    }

    public function home(Request $request)
    {
        $six_derniere_propriete =Propriete::orderBy('id', 'desc')->take(6)->get();
        return view('welcome',compact('six_derniere_propriete'));
    }

    public function about(Request $request)
    {
        return view('about');
    }

    public function properties(Request $request,String $id_categorie)
    {
        $la_categorie = Categorie_propriete::findorfaiL($id_categorie);
        $liste_propriete = $la_categorie->proprietes;
        $titre ="$la_categorie->nom";
        return view('properties',compact('titre','liste_propriete'));
    }

    public function property_details(Request $request,$id_propriete)
    {
        $la_propriete = Propriete::findorfail($id_propriete);
        return view('property-details',compact('la_propriete'));
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function recherche_cibler(Request $request){
        $donnees_formulaire = $request->all();
        $categorie_id = $donnees_formulaire['categorie_id'];
        $superficie = $donnees_formulaire['superficie'];

        $superficie_min=0;
        $superficie_max=0;
        Switch($superficie){
            case 'moins_de_100' : $superficie_min=0;$superficie_max=100; ;break;
            case '100_a_300' : $superficie_min=100;$superficie_max=300; ;break;
            case 'plus_de_300' : $superficie_min=300;$superficie_max=4000000; ;break;
        }

        $chambres = $donnees_formulaire['chambres'];
        Switch($chambres){
            case 'moins_de_3' : $chambres_min=0;$chambres_max=3; ;break;
            case 'plus_de_3' : $chambres_min=3;$chambres_max=4000000; ;break;
        }

        $douches = $donnees_formulaire['douches'];
        Switch($douches){
            case 'moins_de_3' : $douches_min=0;$douches_max=3; ;break;
            case 'plus_de_3' : $douches_min=3;$douches_max=4000000; ;break;
        }

        $liste_propriete = Propriete::with('categorie')->where('categorie_id',$categorie_id)
                                                      ->where('superficie','>',$superficie_min)
                                                      ->where('superficie','<',$superficie_max)

                                                      ->where('chambres','>=',$chambres_min)
                                                      ->where('chambres','<=',$chambres_max)

                                                      ->where('douches','>=',$douches_min)
                                                      ->where('douches','<=',$douches_max)->get();

//        dd($les_proprietes);
        return view('resultat_recherche_cibler',compact('liste_propriete'));
    }


    public function demmande_rdv(Request $request){
        $donnees_formulaire = $request->all();
        $notification= "";

        $rdv = new Rdv();
        $rdv->nom_complet = $donnees_formulaire['nom_complet'];
        $rdv->objet = $donnees_formulaire['objet'];
        $rdv->telephone = $donnees_formulaire['telephone'];
        $rdv->adresse = $donnees_formulaire['adresse'];
        $rdv->date = $donnees_formulaire['date'];
        $rdv->heure = $donnees_formulaire['heure'];

        if($rdv->save()){
            $notification .= "<div class='alert-success text-center ' style='font-size: 18px; font-weight: bold'>
                                Demande enregistrée
                            </div>";
        }else{
            $notification .= "<div class='alert-danger text-center ' style='font-size: 18px; font-weight: bold'>
                                Echec de la demande
                            </div>";
        }
            return redirect(route('contact'))->with(['notification'=>$notification]);
    }

}
