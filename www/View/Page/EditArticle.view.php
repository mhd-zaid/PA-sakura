<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script> -->
<script src="http://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
            <h1 class="h1-section-back">Création d'un article</h1>
            <form action="" method="POST">
                        <div class="row">
                            <div>
                                <p id="article-slug">Titre de l'article</p>
                            </div>
                            <div class="col col-5 flex-col flex-col-center">
                                <input id="ipt-slug" type="text" name="article-slug"
                                value = "<?= isset($data) && !empty($data) ? $data['Slug'] : '' ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-5 flex-col flex-col-center">
                                <?php if(isset($data) && !empty($data) && !empty($data['Image_Name'])):  ?><img  width="50px"  src="/uploads/<?=$data['Image_Name']?>" /><?php endif ?>
                                <button type="button" name="openFile" id="openFile">Choisir une image</button>
                                <div id="modal-image" class="" style="display:none;">
                                <input type="hidden" id="imageName" name="imageName" readonly="true"  style="display:none"/>
                                <fieldset>
                                <?php
                                    $target_dir = getcwd()."/uploads";
                                    if (is_dir($target_dir)) {
                                        $folder = opendir($target_dir);
                                        while($file = readdir($folder)){
                                            if ($file !== '.' && $file !== '..') {
                                                $img="/uploads/".$file;

                                                echo "<input type='radio' name='imageName' value='$file' id='$file' >";
                                                echo '<div class="row">';
                                                echo '<div class="col col-3 block-image">';
                                                echo "<label for='$file'>$file</label>";
                                                echo "<img src='$img' width='50px' id='$file' alt=''>";
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                    }      
                                ?>
                              </fieldset>                              
                                </div>
                            </div>
                        </div>

                    <!-- <textarea class="ckeditor" id="editor" name="editor"> -->
                    <textarea class="ckeditor" id="editor" name="editor">
                        <?= isset($data) && !empty($data) ? $data['Content'] : '' ?>
                    </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                    <button type="submit" name="submit" class="cta-button btn--pink" id="add">
                        <?= isset($data) && !empty($data)  ? 'Modifier' : 'Ajouter' ?>
                    </button>
                    <?php
                    if(isset($data) && !empty($data)){ ?>
                        <button type="submit" name="delete" class="cta-button btn--pink" id="add" >
                        Supprimer
                        </button>
                    <?php }      
                    ?>
                   
            </form>
        </div>
    </div>
</section>

<script>
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    
    // $("#openFile").click(() => {
    //     $('#modal-image').css('display','flex');
    // })

    CKEDITOR.replace( 'editor', {
        height: 300,
        filebrowserUploadUrl: "Vendor/upload.php"
    });

    $(".block-image").click((e) => {
        console.log(e.currentTarget.children[0].innerHTML);
        $("#imageName").css('display','block').val(e.currentTarget.children[0].innerHTML);
        $('#' + e.currentTarget.children[0].innerHTML).attr('checked');
    })

    


</script>
