<div class="container-fluid ">
    <h1>Paramètres > Affichage</h1>
    <section class="grid grid-rounded parameters-appearance">
        <div class="row">
            <div class="col col-offset-1">
                <div class="row">
                    <h1>&nbsp;&nbsp;&nbsp;Thèmes d'affichage</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <b>Darkmode</b>
                    </div>
                    <div id="toggle-switch" class="col">
                        <form method="POST" action="/set-appearance">
                            <label class="toggle">
                                <input id="appearance-toggle" type="checkbox" data-mode="light" <?php if (isset($_SESSION["isDarkModeEnable"]) && $_SESSION["isDarkModeEnable"] == "dark") echo "checked" ?>>
                                <span class="slider"></span>
                                <span class="labels" data-on="ON" data-off="OFF"></span>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $().ready(function() {
        $("#appearance-toggle").on("click", darkMode);
        // sessionStorage.setItem("isDarkModeEnable", true);
        console.log(sessionStorage.getItem("isDarkModeEnable"));
    })

    function darkMode(event) {
        let mode = sessionStorage.getItem("isDarkModeEnable");
        let body = document.querySelector('body');
        console.log(mode);
        if (mode == "dark") {
            // sessionStorage.setItem("isDarkModeEnable", "light");
            body.dataset.theme = "light";
        } else {
            // sessionStorage.setItem("isDarkModeEnable", "dark");
            body.dataset.theme = "dark";
        }
        event.currentTarget.closest('form').submit()
    }
</script>