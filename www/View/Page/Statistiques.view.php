<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Statistiques</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Visualisez en direct les statistiques de votre entreprise  </p>
    </div>
</section>

<div class="grid box-statistiques">
    <div class="flex-row">
        <select id="choices-stats">
            <option value="">Veuillez choisir une valeur</option>
            <option value="today">Aujourd'hui</option>
            <option value="yesterday">Hier </option>
            <option value="week"> 7 jours</option>
            <option value="month">1 mois</option>
            <option value="months"> 3 mois</option>
            <option value="year"> 1 an</option>
        </select>
        <p>
             / Mois / Années
        </p>
    </div>

    <div class="">

    </div>
    <div class="grid">
        <div class="flex-row">
            <div class="flex-col col-12 statistique-case">
                <p>Nombre visiteur</p>
                <p id="number-visitors">0</p>
            </div>
            <div class="flex-col  col-12 statistique-case case-selected">
                <p>Nombre inscrit</p>
                <p id="number-inscriptions">34</p>
            </div>
        </div>
    </div>
</div>

<section class="grid">
    <h2>Moteur de recherche utilisés</h2>
    <div class="row">
        <div class=" bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/chrome.svg" alt="Sites">
                <p>13,244</p>
                <p>visiteurs</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/opera.svg" alt="Sites">
                <p>13,244</p>
                <p>visiteurs</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/firefox.svg" alt="Sites">
                <p>13,244</p>
                <p>visiteurs</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/microsoft_edge.svg" alt="Sites">
                <p>13,244</p>
                <p>visiteurs</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/brave.svg" alt="Sites">
                <p>13,244</p>
                <p>visiteurs</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Parameters/Sites.svg" alt="Sites">
                <p>13,244</p>
                <p>visiteurs</p>
            </div>
        </div>
    </div>



    <h2>Région de l'utilisateur</h2>
    <div class="row">
        <div class=" bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/chrome.svg" alt="Sites">
                <p>13,244</p>
                <p>Europe</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/opera.svg" alt="Sites">
                <p>13,244</p>
                <p>Afrique</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/firefox.svg" alt="Sites">
                <p>13,244</p>
                <p>Asie</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/microsoft_edge.svg" alt="Sites">
                <p>13,244</p>
                <p>Amérique du sud</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Statistiques/brave.svg" alt="Sites">
                <p>13,244</p>
                <p>Amérique du nord</p>
            </div>
        </div>

        <div class="bloc-statistiques">
            <div class="grid-rounded col data-statistiques">
                <img src="Public/img/Back/Parameters/Sites.svg" alt="Sites">
                <p>13,244</p>
                <p>Océanie</p>
            </div>
        </div>
    </div>

</section>

<script>

    $("#choices-stats").on("change", function(){
        $.ajax({
        //L'URL de la requête 
        url: "statistiques-date?date="+ $("#choices-stats").val(),

        //La méthode d'envoi (type de requête)
        method: "GET",

        //Le format de réponse attendu
        dataType : "json",
    })

    .done(function(response){
        // let data = JSON.stringify(response);
        $("#number-visitors").val(response);
        console.log($("#number-visitors").val(response))
    })


    })


</script>