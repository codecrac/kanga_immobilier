<?php
function chemin_de_dev($chemin_de_prod){
    $chemin_de_dev = explode('public/',$chemin_de_prod);
    if(isset($chemin_de_dev[1])){
        $chemin_de_dev = $chemin_de_dev[0].$chemin_de_dev[1];
    }else{
        $chemin_de_dev = $chemin_de_dev[0];
    }
    return $chemin_de_dev;
}

function afficher_liste_des_images($chaine_de_liste_durl,$id_propriete){
    $tableau_durl = explode('###',$chaine_de_liste_durl);
    foreach ($tableau_durl as $item_chemin_de_prod){
        $chemin_dev = chemin_de_dev($item_chemin_de_prod);

        $route_effacer = route('effacer_photo_de_la_galerie',[$id_propriete]);
        if(!empty($chemin_dev)){
            echo "<div class=\"col-md-3\">
                        <a target='_blank' href='$chemin_dev'> <img src='$chemin_dev' width='100px' /> </a>
                        <a href='$route_effacer?photo_a_effacer=$item_chemin_de_prod'> <h3>x</h3> </a>
                        <input type='checkbox' name='photo_a_effacer[]' value='$item_chemin_de_prod'>
                    </div>
                 ";
        }
    }
}

function afficher_liste_des_images_en_mode_slider($chaine_de_liste_durl,$prix_fourni,$nom_categorie){
    $tableau_durl = explode('###',$chaine_de_liste_durl);
    foreach ($tableau_durl as $item_chemin_de_prod){
        $chemin_dev = chemin_de_dev($item_chemin_de_prod);

        if(!empty($chemin_dev)){
            echo "<li data-thumb='{{asset(chemin_de_dev($chemin_dev))}}'>
                        <img src='{{asset(chemin_de_dev($chemin_dev))}}' alt=''>
                        <span class='property-thumb-info-label'>";
                                try{
                                    $prix = number_format($prix_fourni,0,',',' ');
                                    echo "<span class='label price'>$prix FCFA</span>";
                                }catch(Exception $e){
                                    echo "<span class='label price'>$prix_fourni</span>";
                                }
            echo "      <span class='label forrent'>{{$nom_categorie}}</span>
                        </span>
                    </li>
                 ";
        }
    }
}
?>
