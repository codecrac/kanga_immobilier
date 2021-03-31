<script>
    function tout_fermer(){
        var garde_fou = document.getElementsByClassName('garde_fou');
        for (var i in garde_fou) {
            // alert(i);
            // alert(garde_fou[i]);
            garde_fou[i].style.display = 'none';
        }
    }
    tout_fermer();

    function ouvrir_ou_fermer(id_garde_fou){
        var le_garde_fou = document.getElementById('garde_fou_'+id_garde_fou);

        if(le_garde_fou.style.display == 'none'){
            le_garde_fou.style.display = 'block';
        }else{
            le_garde_fou.style.display = 'none';
        }
    }

    // alert("lkdsd");
</script>
