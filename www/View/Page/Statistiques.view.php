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
            <option value="today">Aujourd'hui</option>
            <option value="yesterday">Hier </option>
            <option value="week"> 7 jours</option>
            <option value="month">1 mois</option>
            <option value="months"> 3 mois</option>
            <option value="year"> 1 an</option>
        </select>
    </div>

    <div id="chartdiv">


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

<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    $("#choices-stats").on("change", function() {
        $.ajax({
                //L'URL de la requête 
                url: "statistiques-date?date=" + $("#choices-stats").val(),

                //La méthode d'envoi (type de requête)
                method: "GET",

                //Le format de réponse attendu
                dataType: "text",
            })
            .done(function(response) {
                $("#number-visitors").text(response);
            })
    });

    // function amCharts() {

        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");


            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);


            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX"
            }));


            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                behavior: "zoomX"
            }));
            cursor.lineY.set("visible", false);

            var date = new Date();
            date.setHours(0, 0, 0, 0);
            var value = 100;

            function generateData() {
                // value = Math.round((Math.random() * 10 - 5) + value);
                value += 1;
                am5.time.add(date, "day", 1);
                return {
                    date: date.getTime(),
                    value: value 
                };
            }

            function generateDatas(count) {
                var data = [];
                for (var i = 0; i < count; ++i) {
                    data.push(generateData());
                }
                return data;
            }


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
                maxDeviation: 0,
                baseInterval: {
                    timeUnit: "day",
                    count: 1
                },
                renderer: am5xy.AxisRendererX.new(root, {}),
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {})
            }));


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));



            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set("scrollbarX", am5.Scrollbar.new(root, {
                orientation: "horizontal"
            }));
            var data = generateDatas(50);
            series.data.setAll(data);


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);

        }); // end am5.ready()
    // };
</script>