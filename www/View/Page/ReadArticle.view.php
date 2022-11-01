<div class="row">
    <!-- 
        1 - créateur de l'article + editeur
        2 - admin
     -->
    <?php if($userData['Id'] === $data['User_Id'] && $userData['Role'] !== 3 || $userData['Role'] === 1): ?>
        <form action="" method="POST">
            <input type="submit" name="submit" class="cta-button btn--pink" id="add" value="Modifier">
        </form>
    <?php endif ?>
</div>

<h1><?= $data["Slug"] ?></h1>

<section>
    <?= $data["Content"] ?>
</section>