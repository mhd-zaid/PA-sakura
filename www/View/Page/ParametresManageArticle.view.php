<div class="container-fluid container-fluid-parameters">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion URL</h1>
    <section>
        <p>Comment souhaitez-vous réecrire vos URL </p>
            <form action="" method="POST">
                <input type='radio' name='choice' value='1' <?php if($configForm > 0)echo 'checked' ?> >
                Id
                <input type='radio' name='choice' value='2' <?php if($configForm == 0)echo 'checked' ?>>
                Slug
                <button type="submit" name="save" class="cta-button btn--pink" id="add" >
                    Sauvegarder
                </button>
            </form>
    </section>
</div>
