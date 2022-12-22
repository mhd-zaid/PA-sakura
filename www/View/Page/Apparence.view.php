<h1>Apparence</h1>
<h1>Apparence second</h1>
<h1>Apparence troisième</h1>

<form action="" method="POST">
    <label for="h1-color">Color</label>
    <input type="color" name="h1-color"><br><br>
    <label for="h1-font-size">Font-size</label>
    <input type="number" name="h1-font-size" min="0" max="64"><br><br>
    <label for="h1-font-weight">Font-weight</label>
    <input type="number" name="h1-font-weight" min="0" max="800"><br><br>
    <label for="h1-font-family">Font-family</label>
    <select name="h1-font-family" id="h1-font-family">
        <option value=""></option>
        <option value="sans-serif">Sans-serif</option>
        <option value="calibri">Calibri</option>
        <option value="times-new-roman">Times new roman</option>
        <option value="mulish">Mulish</option>
    </select><br><br>
    <input type="reset">&nbsp;&nbsp;&nbsp;<input type="submit">
</form>

<script>
    $().ready(function() {
        let colorPicker;
        window.addEventListener("load", startup, false);
    })

    function startup() {
        colorPicker = document.querySelector("#colorPicker");
        var defaulth1color = colorPicker.value; 
        colorPicker.addEventListener("input", updateFirst, false);
        // colorPicker.addEventListener("change", updateAll, false);
        colorPicker.select();
    }

    function updateFirst(event) {
        console.log("update");
        const h1 = document.querySelector("h1");
        if (h1) {
            h1.style.color = event.target.value;
        }
    }
    
    function updateAll(event) {
        console.log("updateall");
        document.querySelectorAll("h1").forEach((h1) => {
            h1.style.color = event.target.value;
        });
    }
</script>