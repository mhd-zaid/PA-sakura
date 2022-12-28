<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script> -->
<script src="http://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<section class="grid">
    <div class="row page-header">
        <div class="col col-12">
            <?php 
                $this->includeComponent("form-create-page", $configForm);
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
</script>
