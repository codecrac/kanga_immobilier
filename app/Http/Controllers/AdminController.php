<?php

namespace App\Http\Controllers;

use App\Models\Categorie_propriete;
use App\Models\Propriete;
use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{

    public $style_notif_succes = " bg-green-800 text-white text-center font-bold py-2 px-4";
    public $style_notif_danger = " bg-red-300 text-white text-center font-bold py-2 px-4";
    public function __construct()
    {
        //its just a dummy data object.
        $rdv_en_attente = DB::table('rdvs')->where('statut','attente')->get();
        $rdv_en_attente= sizeof($rdv_en_attente);
        // Sharing is caring
        View::share('rdv_en_attente', $rdv_en_attente);
    }
    //-----------------------------------------------------------------------------------------------------
    //--------------------------------------------------categories---------------------------------------------------
    //-----------------------------------------------------------------------------------------------------
    public function dashboard(Request $request)
    {
        $liste_categorie = Categorie_propriete::all();
        $nb_propriete = Propriete::count();
        return view('dashboard',compact('liste_categorie','nb_propriete'));
    }

    public function categories(Request $request)
    {
        $liste_categorie = Categorie_propriete::all();
        return view('dashboard.categories.home',compact('liste_categorie'));
    }

    public function editer_categorie_proprietes(Request $request,String $id_categorie){
        $la_categorie = Categorie_propriete::findorfail($id_categorie);
        return view('dashboard.categories.update',compact('la_categorie'));
    }

    public function enregistrer_categorie_proprietes(Request $request)
    {
        $donnees_formulaire = $request->all();
        $categorie = new Categorie_propriete();
        $categorie->nom = $donnees_formulaire['nom_categorie'];

        $notification ="";

        if($categorie->save()){
            $notification = "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Sauvegarder avec succes
                            </div>";
        }else{
            $notification = "<div class='$this->style_notif_danger ' style='font-size: 18px; font-weight: bold'>
                                Echec Sauvegarde
                            </div>";
        }

        return redirect(route('dashboard.categories'))->with(['notification'=>$notification]);
    }

    public function modifier_categorie_proprietes(Request $request)
    {
        $donnees_formulaire = $request->all();
        $categorie = Categorie_propriete::findorfail($donnees_formulaire['id_categorie']);
        $categorie->nom = $donnees_formulaire['nom_categorie'];

        $notification ="";

        if($categorie->save()){
            $notification = "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Sauvegarder avec succes
                            </div>";
        }else{
            $notification = "<div class='$this->style_notif_danger ' style='font-size: 18px; font-weight: bold'>
                                Echec Sauvegarde
                            </div>";
        }

        return redirect(route('dashboard.categories'))->with(['notification'=>$notification]);
    }

    public function supprimer_categorie_proprietes(Request $request,String $id_categorie)
    {
        $categorie = Categorie_propriete::findorfail($id_categorie);

        $notification ="";

        if($categorie->delete()){
            $notification = "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Supprimer avec succes
                            </div>";
        }else{
            $notification = "<div class='$this->style_notif_danger ' style='font-size: 18px; font-weight: bold'>
                                Echec Suppression
                            </div>";
        }

        return redirect(route('dashboard.categories'))->with(['notification'=>$notification]);
    }

    //-----------------------------------------------------------------------------------------------------
    //--------------------------------------------------proprietes---------------------------------------------------
    //-----------------------------------------------------------------------------------------------------
    public function proprietes(Request $request)
    {
        $liste_des_categorie = Categorie_propriete::all();
        $liste_proprietes = Propriete::all();
        return view('dashboard.proprietes.home',compact('liste_des_categorie','liste_proprietes'));
    }

    public function enregistrer_proprietes(Request $request)
    {
        $donnees_formulaire = $request->all();
//        dd($donnees_formulaire);

        $notification  ='';
        $nom_video_illustration  ='';
        $nom_image_illustration  ='';
        $destination = '/public/uploaded_files/proprietes/';
        $chemin_destination = public_path('/uploaded_files/proprietes/');

        //gestion fichier
            //video
            if($request->hasFile('video')){
                $video_illustration = $request->file('video');
                $extension = $video_illustration->getClientOriginalExtension();
                $time = date('dhms');
                $nom_video_illustration = $time . '-'. $video_illustration->getClientOriginalName();
                if(in_array($extension,['mp4','3gp','avi','AVI','MP4','3GP'])){
                    $video_illustration->move($chemin_destination,$nom_video_illustration);
                    $nom_video_illustration = $destination.$nom_video_illustration;
                }
            }

            //image
            if($request->hasFile('url_image')){
                $image_illustration = $request->file('url_image');
                $extension = $image_illustration->getClientOriginalExtension();
                $time = date('dhms');
                $nom_image_illustration = $time . '-'. $image_illustration->getClientOriginalName();
                if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG'])){
                    $image_illustration->move($chemin_destination,$nom_image_illustration);
                    $nom_image_illustration = $destination.$nom_image_illustration;
                }
            }


            //galerie
            $liste_urls_gallery_image='';
            if($request->hasFile('listes_url_image')){
                $gallery_image = $request->file('listes_url_image');
                $nombre_image = count($gallery_image);
                echo $nombre_image;
                for($i=0; $i<$nombre_image ; $i++){
                    $image = $gallery_image[$i];
                    $extension = $image->getClientOriginalExtension();
                    if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG'])){
                        $time2 = date('dhms');
                        $nom_img =  $time2. '-' .$image->getClientOriginalName();
                        $image->move($chemin_destination,$nom_img);
                        $liste_urls_gallery_image.=$destination.$nom_img.'###';
                    }
                }
            }

        //detail texte
        $titre = $donnees_formulaire['titre'];
        $adresse = $donnees_formulaire['adresse'];
        $superficie = $donnees_formulaire['superficie'];
        $chambres = $donnees_formulaire['chambres'];
        $douches = $donnees_formulaire['douches'];
        $prix = $donnees_formulaire['prix'];
        $description_courte = $donnees_formulaire['description_courte'];
        $description_longue = $donnees_formulaire['description_longue'];


        $la_propriete = new Propriete();
        $la_propriete->categorie_id = $donnees_formulaire['categorie_id'];
        $la_propriete->titre = $titre;
        $la_propriete->adresse = $adresse;
        $la_propriete->superficie = $superficie;
        $la_propriete->chambres = $chambres;
        $la_propriete->douches = $douches;
        $la_propriete->prix = $prix;
        $la_propriete->description_courte = $description_courte;
        $la_propriete->description_longue = $description_longue;
        $la_propriete->url_image = $nom_image_illustration;
        $la_propriete->video = $nom_video_illustration;
        $la_propriete->listes_url_image = $liste_urls_gallery_image;

        if($la_propriete->save()){
            $notification .= "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Sauvegarder avec succes
                            </div>";
            return redirect(route('dashboard.proprietes'))->with(['notification'=>$notification]);
        }else{
            $notification .= "<div class='$this->style_notif_danger ' style='font-size: 18px; font-weight: bold'>
                                Echec sauvergarde
                            </div>";
            return redirect(route('dashboard.proprietes'))->with(['notification'=>$notification]);
        }
    }

    public function editer_proprietes(Request $request,String $id_propriete){
        $liste_des_categorie = Categorie_propriete::all();
        $la_propriete = Propriete::findorfail($id_propriete);
        return view('dashboard.proprietes.update',compact('la_propriete','liste_des_categorie'));
    }


    public function modifier_proprietes(Request $request)
    {
        $donnees_formulaire = $request->all();
        $id_propriete = $donnees_formulaire['id_propriete'];
        $la_propriete = Propriete::findorfail($id_propriete);

        $notification = $nom_video_illustration ='';
        $destination = '/public/uploaded_files/proprietes/';
        $chemin_destination = public_path('/uploaded_files/proprietes/');


        //gestion fichier
        //video
        if($request->hasFile('video')){
            $video_illustration = $request->file('video');
            $extension = $video_illustration->getClientOriginalExtension();
            $time = date('dhms');
            $nom_video_illustration = $time . '-'. $video_illustration->getClientOriginalName();
            if(in_array($extension,['mp4','3gp','avi','AVI','MP4','3GP'])){
                $video_illustration->move($chemin_destination,$nom_video_illustration);
                $nom_video_illustration = $destination.$nom_video_illustration;
            }

            $la_propriete->video = $nom_video_illustration;
        }

        //image
        if($request->hasFile('url_image')){
            $image_illustration = $request->file('url_image');
            $extension = $image_illustration->getClientOriginalExtension();
            $time = date('dhms');
            $nom_image_illustration = $time . '-'. $image_illustration->getClientOriginalName();
            if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG'])){
                $image_illustration->move($chemin_destination,$nom_image_illustration);
                $nom_image_illustration = $destination.$nom_image_illustration;
            }
            $la_propriete->url_image = $nom_image_illustration;
        }


        //galerie
        $liste_urls_gallery_image='';
        if($request->hasFile('listes_url_image')){
            $gallery_image = $request->file('listes_url_image');
            $nombre_image = count($gallery_image);
            echo $nombre_image;
            for($i=0; $i<$nombre_image ; $i++){
                $image = $gallery_image[$i];
                $extension = $image->getClientOriginalExtension();
                if(in_array($extension,['jpg','JPG','png','PNG','jpeg','JPEG'])){
                    $time2 = date('dhms');
                    $nom_img =  $time2. '-' .$image->getClientOriginalName();
                    $image->move($chemin_destination,$nom_img);
                    $liste_urls_gallery_image.=$destination.$nom_img.'###';
                }
            }
            $la_propriete->listes_url_image .= $liste_urls_gallery_image;
        }

        //detail texte
        $titre = $donnees_formulaire['titre'];
        $adresse = $donnees_formulaire['adresse'];
        $superficie = $donnees_formulaire['superficie'];
        $chambres = $donnees_formulaire['chambres'];
        $douches = $donnees_formulaire['douches'];
        $prix= $donnees_formulaire['prix'];
        $description_courte = $donnees_formulaire['description_courte'];
        $description_longue = $donnees_formulaire['description_longue'];


        $la_propriete->categorie_id = $donnees_formulaire['categorie_id'];
        $la_propriete->titre = $titre;
        $la_propriete->adresse = $adresse;
        $la_propriete->superficie = $superficie;
        $la_propriete->chambres = $chambres;
        $la_propriete->douches = $douches;
        $la_propriete->prix = $prix;
        $la_propriete->description_courte = $description_courte;
        $la_propriete->description_longue = $description_longue;

        if($la_propriete->save()){
            $notification .= "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Sauvegarder avec succes
                            </div>";
        }else{
            $notification .= "<div class='$this->style_notif_danger ' style='font-size: 18px; font-weight: bold'>
                                Echec sauvergarde
                            </div>";
        }
        return redirect(route('editer_proprietes',[$id_propriete]))->with(['notification'=>$notification]);
    }

    public function effacer_photo_de_la_galerie(Request $request,String $id_propriete){
        $photos_a_effacer = $request->only('photo_a_effacer');
        if(!empty($photos_a_effacer)){
            $photos_a_effacer = $request->only('photo_a_effacer')['photo_a_effacer'];
        }

        $la_propriete = Propriete::findorfail($id_propriete);
//        dd($photos_a_effacer);

        $liste_url = $la_propriete->listes_url_image;
        $liste_de_tri = $liste_url;
        $nouvelle_liste ="";
        foreach ($photos_a_effacer as $item_a_effacer){
            echo "<br/><br/>liste actuel  =  $liste_url <br/><br/>";
            echo "<br/><br/>item a effacer $item_a_effacer <br/><br/>";
            $eclater = explode($item_a_effacer,$liste_de_tri);

            var_dump($eclater);

            if(isset($eclater[1])){
                if($eclater[0] !=""){
                    $nouvelle_liste .= $eclater[0].$eclater[1];
                    $liste_de_tri .= $eclater[0].$eclater[1];

                }else{
                    $nouvelle_liste .= $eclater[1];
                    $liste_de_tri .= $eclater[1];
                }
                echo "<br/><br/>eclater 00  $eclater[0] <br/><br/>";
                echo "<br/><br/>eclater 01 $eclater[1] <br/><br/>";
            }else{
                $nouvelle_liste .= $eclater[0];
                $liste_de_tri .= $eclater[0];
                echo "<br/><br/>eclater 00 sans 11  $eclater[0] <br/><br/>";
            }

            echo "<br/><br/> nouvelle liste = $nouvelle_liste <br/><br/> ";
        }
        echo "<br/>---<br/>";
        if($nouvelle_liste==""){
            $nouvelle_liste =$liste_url;
        }
        dd($nouvelle_liste);

        $la_propriete->listes_url_image = $nouvelle_liste;
        if($la_propriete->save()){
            $notification = "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Retirer avec succes
                            </div>";
        }else{
            $notification = "<div class='alert-danger text-center ' style='font-size: 18px; font-weight: bold'>
                                Echec du retrait
                            </div>";
        }
        return redirect(route('editer_proprietes',[$id_propriete]))->with(['notification'=>$notification]);

    }

    public function effacer_une_photo_de_la_galerie(Request $request,String $id_propriete){
        $photos_a_effacer = $_GET['photo_a_effacer'];


        $la_propriete = Propriete::findorfail($id_propriete);

        $liste_url = $la_propriete->listes_url_image;
        $liste_de_tri = $liste_url;
        echo "<br/><br/> liste actuel = $liste_url <br/><br/> ";
        $nouvelle_liste ="";
            $eclater = explode($photos_a_effacer,$liste_de_tri);
            var_dump($eclater);
            if(isset($eclater[1])){
                if($eclater[0] !=""){
                    $nouvelle_liste .= $eclater[0].$eclater[1];
                }else{
                    $nouvelle_liste .= $eclater[1];
                }
            }else{
                $nouvelle_liste .= $eclater[0];
            }

            echo "<br/><br/> nouvelle liste = $nouvelle_liste <br/><br/> ";

        echo "<br/>---<br/>";
        if($nouvelle_liste==""){
            $nouvelle_liste =$liste_url;
        }
//        dd($nouvelle_liste);

        $la_propriete->listes_url_image = $nouvelle_liste;
        if($la_propriete->save()){
            $notification = "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Retirer avec succes
                            </div>";
        }else{
            $notification = "<div class='alert-danger text-center ' style='font-size: 18px; font-weight: bold'>
                                Echec du retrait
                            </div>";
        }
        return redirect(route('editer_proprietes',[$id_propriete]))->with(['notification'=>$notification]);

    }


    //-----------------------------------------------------------------------------------------------------
    //--------------------------------------------------rdvs---------------------------------------------------
    //-----------------------------------------------------------------------------------------------------

    public function rdv(Request $request)
    {
        $liste_rdv = Rdv::orderby('date','asc')->get();
        return view('dashboard.rdv',compact('liste_rdv'));
    }


    public function changer_statut_rdv(Request $request,String $id_rdv,String $statut)
    {
        $le_rdv = Rdv::findorfail($id_rdv);

        if($statut == "supprimer"){
            if($le_rdv->delete()){
                $notification = "<div class='$this->style_notif_succes' style='font-size: 18px; font-weight: bold'>
                                Supprimer avec succes
                            </div>";
            }else{
                $notification = "<div class='alert-danger text-center ' style='font-size: 18px; font-weight: bold'>
                                Echec de la suppression
                            </div>";
            }
        }else{
            $le_rdv->statut = $statut;

            if($le_rdv->save()){
                $notification = "<div class='$this->style_notif_succes ' style='font-size: 18px; font-weight: bold'>
                                Sauvegarder avec succes
                            </div>";
            }else{
                $notification = "<div class='alert-danger text-center ' style='font-size: 18px; font-weight: bold'>
                                Echec de la sauvegarde
                            </div>";
            }
        }

        return redirect(route('dashboard.rdv'))->with(['notification'=>$notification]);
    }

}
