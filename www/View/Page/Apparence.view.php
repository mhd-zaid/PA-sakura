<section>
    <?= var_dump($_POST) ?>
</section>

<section>
    <h1 class="title">Apparence H1</h1>
    <h2 class="title">Apparence H2</h2>
    <h3 class="title">Apparence H3</h3>
    <h4 class="title">Apparence H4</h4>
    <h5 class="title">Apparence H5</h5>
    <h6 class="title">Apparence H6</h6>
</section>

<section>
    <p class="paragraph">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem unde mollitia itaque. Molestiae dolores, omnis ratione libero animi officiis natus magnam odio delectus hic ab voluptas doloremque itaque tempore nemo?</p>
    <p class="paragraph">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem unde mollitia itaque. Molestiae dolores, omnis ratione libero animi officiis natus magnam odio delectus hic ab voluptas doloremque itaque tempore nemo?</p>
    <p class="paragraph">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem unde mollitia itaque. Molestiae dolores, omnis ratione libero animi officiis natus magnam odio delectus hic ab voluptas doloremque itaque tempore nemo?</p>
</section>



<script>
    $().ready(function() {
        let colorPicker;
        window.addEventListener("load", startup, false);
    })

    function startup() {
        titrecolorPicker = document.querySelector("#titrecolorPicker");
        paragraphecolorPicker = document.querySelector("#paragraphecolorPicker");
        navcolorPicker = document.querySelector("#navcolorPicker");
        navbcgcolorPicker = document.querySelector("#navbcgcolorPicker");
        bodycolorPicker = document.querySelector("#bodycolorPicker");

        titrecolorPicker.addEventListener("input", updateFirst, false);
        paragraphecolorPicker.addEventListener("input", updateFirst, false);
        navcolorPicker.addEventListener("input", updateFirst, false);
        navbcgcolorPicker.addEventListener("input", updateFirst, false);
        bodycolorPicker.addEventListener("input", updateFirst, false);

        // colorPicker.addEventListener("change", updateAll, false);
        titrecolorPicker.select();
        paragraphecolorPicker.select();
        navcolorPicker.select();
        navbcgcolorPicker.select();
        bodycolorPicker.select();
    }

    function updateFirst(event) {
        switch (event.target.getAttribute('id')) {
            case 'titrecolorPicker':
                const titres = document.querySelectorAll("h1, h2, h3, h4, h5, h6");
                if (titres) {
                    titres.forEach(element => {
                        element.style.color = event.target.value;
                    });
                }
                break;
            case 'paragraphecolorPicker':
                const paragraphes = document.querySelectorAll(".paragraph");
                if (paragraphes) {
                    paragraphes.forEach(element => {
                        console.log(element);
                        element.style.color = event.target.value;
                    });
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