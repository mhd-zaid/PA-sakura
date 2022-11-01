<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Liste des médias</h1>
    </div>
    <div class="row">
        <form action="/media" method="post" enctype="multipart/form-data" class="grid">
            <div class="row">
                <div class="col">
                    Select image to upload:
                </div>
                <div class="col">
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="col">
                    <input type="submit" value="Upload Image" name="submit">
                </div>
                <div class="col">
                <input type="submit" value="Delete Image" name="delete" id="del-media-img">
                <input type="text" name="name-img" id="delete-img" value = "" readonly>
            </div>
            </div>
        </form>
    </div>
</section>

<section class="grid">
    <div class="row medias-container art-media">
        <!-- <article class="row art-media"> -->
        <?php
        $target_dir = getcwd() . "/uploads";
        if (is_dir($target_dir)) {
            $folder = opendir($target_dir);
            while ($file = readdir($folder)) {
                if ($file !== '.' && $file !== '..') {
                    $img = "/uploads/" . $file;
                    echo ('<div class="col col-2 art-media-img">');
                    echo ("<div class='row' id='$file'>");
                    echo ("<img src='$img' id='$file' width='100%' class='' alt=''>");
                    echo ('</div>');
                    echo ('<div class="row flex-row flex-row-center art-media-label">');
                    echo ("<p>$file</p>");
                    echo ('</div>');
                    echo ('</div>');
                    // echo("<img src='$img' width='50px' alt=''>");
                }
            }
        } else {
            echo "dossier " . $target_dir . " non trouvé";
        }
        ?>
        </article>
    </div>
</section>

<section>
    <div class="row medias-container art-media">
        <div class="col col-2 art-media-img">
            <div class="row"><img src="/uploads/1572283201.png" width="100%" alt=""></div>
            <div class="row flex-row flex-row-center art-media-label">
                <p>1572283201.png</p>
            </div>
        </div>
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
    $(document).ready(function() {
        $("#del-media-img").on("click", function(e) {
            console.log("clique");
            $(".art-media-img").css('cursor', 'pointer');
            $(".art-media-label").mouseover(
                e.target.css('color', 'red')
            );
            // $(".del-img").show();
        });
        const images = document.querySelectorAll("img");
        $(images).click((e) => {
            images.forEach(element => element.classList.remove('selector'));            
            event.target.classList.add('selector');
            const inputDelete = document.getElementById('delete-img');
            inputDelete.setAttribute("value",e.target.id);
        })
    });
</script>
<style>
    .selector{
        border : 4px solid blue;
    }
</style>