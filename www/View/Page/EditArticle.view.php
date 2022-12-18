<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script> -->
<script src="http://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
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
    categories.forEach(function(element){
        var mySpan = document.createElement("label");
        var mySpanDelete = document.createElement("span");
        addCategorie(mySpan,mySpanDelete,element);
        removeCategorie(mySpan,mySpanDelete,categories);
    });
    

    $("#categorie").on('change',(e) => {
        if(!document.getElementById(e.currentTarget.value) && e.currentTarget.value!==''){
            var mySpan = document.createElement("label");
            var mySpanDelete = document.createElement("span");
            addCategorie(mySpan,mySpanDelete,e.currentTarget.value);
            removeCategorie(mySpan,mySpanDelete,categories);
        }
        var child = $('#container-category').find('label');
        $(child).each(function(element){
            if(!categories.includes(child[element].outerText)){
                categories.push(child[element].outerText);            
            }
    });
    $("#list").val((categories.join(',')));
    });

    function addCategorie(mySpan,mySpanDelete,el){
        mySpan.setAttribute('id', el);
        mySpanDelete.setAttribute("id","Delete-category");  

        mySpan.innerHTML = el;
        mySpanDelete.innerHTML = 'X';
        $( "#container-category" ).append( mySpan );
        $( "#container-category" ).append( ' ' );
        $( "#container-category" ).append( mySpanDelete );
    }
    function removeCategorie(mySpan,mySpanDelete,categories){
        mySpanDelete.addEventListener("click",()=>{
            categories.splice($.inArray(mySpan.innerHTML, categories), 1);
            mySpan.remove();
            mySpanDelete.remove();
            $("#list").val((categories.join(',')));
        });
    }

</script>
