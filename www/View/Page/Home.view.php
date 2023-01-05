<section class="grid page-header">
    <div class="row">
        <h1 class="h1-section-back">Tableau de bord</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Visualisez en direct les statistiques de votre entreprise </p>
    </div>
</section>


<div class="grid box-statistiques">
    <div class="flex-row">
        <select id="choices-stats" class="cta-button btn--white plain">
            <option value="current">Vu sur l'Année courante</option>
            <option value="year-1">Vu sur les années précendentes</option>
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
        $().ready(function() {
            $("#choices-stats").trigger("change");
        })
        var myChart = null;
        $("#choices-stats").on("change", function() {
            let datas = null;
            if (myChart != null) {
                myChart.destroy();
            }
            $.ajax({
                url: "/stats?year=" + this.value,
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

                } else {
                    myChart =
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Année ' + d.getFullYear(), 'Année ' + (d.getFullYear() - 1).toString(), 'Année ' + (d.getFullYear() - 2).toString(), 'Année ' + (d.getFullYear() - 3).toString()],
                                datasets: [{
                                    data: data,
                                    borderWidth: 1
                                }]
                            }
                        });
                }
            });
        })
    </script>