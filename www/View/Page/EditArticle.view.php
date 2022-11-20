<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script> -->
<script src="http://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
            <h1 class="h1-section-back">Création d'un article</h1>
            <?php 
                $this->includeComponent("form-create-article", $configForm);
                ?>
                 <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
             
        </div>
    </div>
</section>

<script>

    CKEDITOR.replace( 'editor', {
        height: 300,
        filebrowserUploadUrl: "/Vendor/upload.php"
    });

    $("#openFile").click(() => {        
        $('#modal-image').css('display','flex');
    });

    $(".block-image").click((e) => {
        console.log(e.currentTarget.children[0].innerHTML);
        $("#imageName").val(e.currentTarget.children[0].innerHTML);
        $('#' + e.currentTarget.children[0].innerHTML).attr('checked');
    });   
    let length = $("#list").val().split(",");
        if(length.length >= 1 && length[0]!= ""){
        var categories = length;
    }else{
        var categories = [];
    }
    $(".block-categorie").click((e) => {
        if(categories.includes(e.currentTarget.children[0].innerHTML)){
            let newArray = categories.filter((item)=> item!==e.currentTarget.children[0].innerHTML);
            categories = newArray;
            e.currentTarget.children[0].style.color='black';
        }else{
            categories.push(e.currentTarget.children[0].innerHTML);
            e.currentTarget.children[0].style.color='pink';
        }
        $("#list").val(categories);
    });   

</script>
