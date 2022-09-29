<section class="grid">
    <div class="row">
        <span class="row">
            <a href="Parametres"> Paramètres </a>
        </span>
        <button class="cta-button btn--pink-rounded">Ajouter</button>
        
        <ul>
            <?php foreach ($users as $user ):?>
                <li><?php echo $user['Firstname']."-".$user['Lastname'] ?></li>
            <?php endforeach;?>
        </ul>
    </div>
</section>