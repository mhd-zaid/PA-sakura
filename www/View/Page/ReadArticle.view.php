<div class="row">
    <!-- 
        1 - créateur de l'article + editeur
        2 - admin
     -->
    <?php if($userData['Id'] === $data['User_Id'] && $userData['Role'] !== 3 || $userData['Role'] === 1): ?>
        <form action="" method="POST" class="col">
            <input type="submit" name="submit" class="cta-button btn--pink" id="add" value="Modifier">
        </form>
        <?php if($userData['Role'] === 1): ?>
            <?php if($data['Active'] === 0): ?>
                <form action="" method="POST" class="col">
                    <input type="submit" name="publish" class="cta-button btn--pink" id="add" value="Publier">
                </form>
            <?php else: ?>
                <form action="" method="POST" class="col">
                    <input type="submit" name="unpublish" class="cta-button btn--pink" id="add" value="Retirer">
                </form>
            <?php endif ?>
        <?php endif ?>
    <?php endif ?>


</div>

<h1><?= $data["Slug"] ?></h1>

<section>
    <?= $data["Content"] ?>
</section>