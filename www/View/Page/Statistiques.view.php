<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Statistiques</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Visualisez en direct les statistiques de votre entreprise </p>
    </div>
</section>

<div class="grid box-statistiques">
    <div class="flex-row">
        <select id="choices-stats">
            <option value="">Veuillez choisir une valeur</option>
            <option value="current">Année courante</option>
            <option value="year-1"><?= date_format(new DateTime("-1 year"),"Y")?> </option>
            <option value="year-2"><?= date_format(new DateTime("-2 year"),"Y")?> </option>
            <option value="year-3"><?= date_format(new DateTime("-3 year"),"Y")?> </option>
        </select>
    </div>

    <div class="grid">
        <div class="flex-row">
            <div class="flex-col col-12 statistique-case">
                <p>Nombre visiteur</p>
                <div id="chartdiv">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
    </div>
</div>

<!-- Styles -->
<style>
    #chartdiv {
        width: 40%;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var myChart= null;
    $("#choices-stats").on("change",function() {
        let datas = null;
        if (myChart != null) {
            myChart.destroy();
        }
        $.ajax({
        url: "/stats?year="+this.value,
        dataType: "json"
        }).done(function(data) {
            var d = new Date();
            const ctx = document.getElementById('myChart');
            if ($("#choices-stats").val() === "current") {
                myChart = 
                    new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                    labels: ['Aujourd\'hui', 'Hier', 'Semaine', 'Mois', '3 Mois', 'Année'],
                    datasets: [{
                        data: data,
                        borderWidth: 1
                    }]
                    }
                });
                
            }else{
                var prevDate = d.setFullYear(d.getFullYear() - $("#choices-stats").val().split('-')[1])
                myChart = 
                    new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                    labels: ['Année '+ new Date(prevDate).getFullYear()],
                    datasets: [{
                        data: data,
                        backgroundColor: '#0F056B',
                        borderWidth: 1
                    }]
                    }
                });
            }
        });
    })

</script>