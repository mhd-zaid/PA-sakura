<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Liste des médias</h1>
    </div>
    <div class="row">
        <!-- <form action="/action_page.php" 
            enctype="multipart/form-data">
            
            <label for="myfile">Select a file:</label>
            <input type="file" id="myfile" name="myfile" />
            <br /><br />
            <input type="submit" />
        </form>     -->
        <input type="file" onchange="onFileSelected(event)">
        <form action="/media" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="photo" id="photo">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</section>

<section class="grid grid-medias-medias">
        <div class="row medias-container">
            <?php
            $target_dir = getcwd()."/uploads";
            if (is_dir($target_dir)) {
                $folder = opendir($target_dir);
                while($file = readdir($folder)){
                    if ($file !== '.' && $file !== '..') {
                        $img="/uploads/".$file;
                        echo "<img src='$img' width='50px' alt=''>";
                    }
                }
            }else{
                echo "dossier " . $target_dir . " non trouvé";
            }
            ?>
            <article>
                <div class="row">
                    <div class="col col-3">
                    </div>
                </div>
            </article>
        </div>
</section>

<div class="grid">
    <div class="row">
        <div class="col col-12 flex-row flex-row-center">
            <div class="pagination">
              <a href="#">&laquo;</a>
              <a href="#">1</a>
              <a class="active" href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">6</a>
              <a href="#">&raquo;</a>
            </div>
        </div>
    </div>
</div>

<script>
function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("myimage");
    imgtag.title = selectedFile.name;

    reader.onload = function(event) {
    imgtag.src = event.target.result;
    //$('.media-container').append('<div class="col col-1"></div><article class="col col-2 col-sm-12 medias medias-medias"><div class="row medias-medias"><img src="https://img.freepik.com/vecteurs-libre/fond-silhouettes-palmiers-colores_23-2148541792.jpg?w=2000" alt=""><p>Jean Dujardin</p></div></article>')
    };

  reader.readAsDataURL(selectedFile);
}
</script>