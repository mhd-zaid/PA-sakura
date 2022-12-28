<section class="grid">
        <div class="row page-header">
            <div class="col">
            <h1 class="h1-section-back">Commentaire</h1>
            <h1 class="h-section-back">Créer ou modifier vos commentaire</h1>
        </div>
    </div>
    <div class="row">
        <p>Recherche <span><input type="text"></span> </p>
    </div>
    <div class="row">
        <div class="col col-2 flex-col flex-col-center"><a href="/commentaire-mots-bannis"> <p class="filter">Mot bannis</p></a></div>

    </div>
    <div class="row">
        <div class="col col-2">
            <a href="/commentaire-add" class="cta-button btn--pink">Ajouter</a>
        </div>
    </div>
</section>

<section class="grid grid-rounded">
    <div class="row">
        <div class="col col-12">
        <table class="sk-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Content</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Approuve</th>
                        <th>Unapprove</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($comments as $comment) { ?>
                            <td><?= $comment['Id'] ?></td>
                            <td><?= $comment['Author'] ?></td>
                            <td><?= $comment['Content'] ?></td>
                            <td><?= $comment['Email'] ?></td>
                            <td><?= $comment['Status'] ?></td>
                            <td><?= $comment['Date_Created'] ?></td>
                            <td><a href="comment-approve/<?= $comment['Id']?>">Approuve</a></td>
                            <td><a href="">Unapprove</a></td>
                            <td><a href="comment-delete/<?= $comment['Id']?>">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
        </div>
    </div>
</section>