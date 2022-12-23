<section>
    <h1>Apparence H1</h1>
    <h2>Apparence H2</h2>
    <h3>Apparence H3</h3>
    <h4>Apparence H4</h4>
    <h5>Apparence H5</h5>
    <h6>Apparence H6</h6>
</section>


<script>
    $().ready(function() {
        let colorPicker;
        window.addEventListener("load", startup, false);
    })

    function startup() {
        h1colorPicker = document.querySelector("#h1colorPicker");
        h2colorPicker = document.querySelector("#h2colorPicker");
        h3colorPicker = document.querySelector("#h3colorPicker");
        h4colorPicker = document.querySelector("#h4colorPicker");
        h5colorPicker = document.querySelector("#h5colorPicker");
        h6colorPicker = document.querySelector("#h6colorPicker");
        navcolorPicker = document.querySelector("#navcolorPicker");
        navbcgcolorPicker = document.querySelector("#navbcgcolorPicker");
        bodycolorPicker = document.querySelector("#bodycolorPicker");

        h1colorPicker.addEventListener("input", updateFirst, false);
        h2colorPicker.addEventListener("input", updateFirst, false);
        h3colorPicker.addEventListener("input", updateFirst, false);
        h4colorPicker.addEventListener("input", updateFirst, false);
        h5colorPicker.addEventListener("input", updateFirst, false);
        h6colorPicker.addEventListener("input", updateFirst, false);
        navcolorPicker.addEventListener("input", updateFirst, false);
        navbcgcolorPicker.addEventListener("input", updateFirst, false);
        bodycolorPicker.addEventListener("input", updateFirst, false);

        // colorPicker.addEventListener("change", updateAll, false);
        h1colorPicker.select();
        h2colorPicker.select();
        h3colorPicker.select();
        h4colorPicker.select();
        h5colorPicker.select();
        h6colorPicker.select();
        navcolorPicker.select();
        navbcgcolorPicker.select();
        bodycolorPicker.select();
    }

    function updateFirst(event) {
        switch (event.target.getAttribute('id')) {
            case 'h1colorPicker':
                const h1 = document.querySelector("h1");
                if (h1) {
                    h1.style.color = event.target.value;
                }
                break;
            case 'h2colorPicker':
                const h2 = document.querySelector("h2");
                if (h2) {
                    h2.style.color = event.target.value;
                }
                break;
            case 'h3colorPicker':
                const h3 = document.querySelector("h3");
                if (h3) {
                    h3.style.color = event.target.value;
                }
                break;
            case 'h4colorPicker':
                const h4 = document.querySelector("h4");
                if (h4) {
                    h4.style.color = event.target.value;
                }
                break;
            case 'h5colorPicker':
                const h5 = document.querySelector("h5");
                if (h5) {
                    h5.style.color = event.target.value;
                }
                break;
            case 'h6colorPicker':
                const h6 = document.querySelector("h6");
                if (h6) {
                    h6.style.color = event.target.value;
                }
                break;
            case 'navcolorPicker':
                const nav = document.querySelector("nav");
                if (nav) {
                    nav.style.color = event.target.value;
                }
                break;
            case 'navbcgcolorPicker':
                const navi = document.querySelector("nav");
                if (navi) {
                    nav.style.backgroundColor = event.target.value;
                }
                break;
            case 'bodycolorPicker':
                const body = document.querySelector("main");
                if (body) {
                    body.style.backgroundColor = event.target.value;
                }
                break;
            default:
                console.log(event.target);
        }
    }

    function updateAll(event) {
        console.log("updateall");
        document.querySelectorAll("h1").forEach((h1) => {
            h1.style.color = event.target.value;
        });
    }
</script>