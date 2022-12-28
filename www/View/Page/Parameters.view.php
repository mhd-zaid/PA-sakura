<section class="grid">
    <div class="row">
        <div class="col title-parameter ">
            <h1>Paramètre</h1>
            <p>Gérer les réglages</p>
        </div>
    </div>
</section>

<section class="grid grid-rounded list-parameters">
    <div class="row flex-row flex-row-center">
        <div class="col col-12 box-parameters">
            <div class="col-12 box-title">
                <h2> Général</h2>
            </div>
            <div class="col-12 box-choices">
                <h3> Gérer les informations relatives à vos sites</h3>
                <ul class="flex-col">
                    <?php $userData = $User->getUser($_COOKIE['JWT']); ?>
                    <li class="choices-parameters"><a href="/parametres-gestion-compte"><img src="Public/img/Back/Parameters/Account.svg" alt="Account">Gestion du compte</a></li>
                    <li class="choices-parameters"><a href="/parametres-url"><img src="Public/img/Back/Parameters/Sites.svg" alt="URL">Gestion de vos URL</a></li>
                    <li class="choices-parameters"><a href="/parametres-compte"><img src="Public/img/Back/Parameters/Account.svg" alt="Account">Gestion de votre site</a></li>
                    <?php if ($userData['Role'] == 1) : ?>
                        <li class="choices-parameters"><a href="/parametres-users"><img src="Public/img/Back/Parameters/Sites.svg" alt="Sites">Gestions des utilisateurs</a></li>
                    <?php endif; ?>
                    <li class="choices-parameters"><a href="/parametres-affichage"><img src="Public/img/Back/Parameters/Appearance.svg" alt="Language">Affichage</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="grid grid-rounded list-parameters">
    <div class="row flex-row flex-row-center">
        <div class="col col-12 box-parameters">
            <div class="col-12 box-title">
                <h2> Communication</h2>
            </div>
            <div class="col-12 box-choices">
                <h3> Gérer les informations relatives à vos sites</h3>
                <ul class="flex-col">
                    <li class="choices-parameters"><a href="/parametres"><img src="Public/img/Back/Parameters/Notification.svg" alt="Notification">Notification</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="grid grid-rounded list-parameters">
    <div class="row flex-row flex-row-center">
        <div class="col col-12 box-parameters">
            <div class="col-12 box-title">
                <h2> Aide</h2>
            </div>
            <div class="col-12 box-choices">
                <h3> Besoin d'aide</h3>
                <ul class="flex-col">
                    <li class="choices-parameters"><a href="/parametres-support"><img src="Public/img/Back/Parameters/Support.svg" alt="Support">Support</a></li>
                    <li class="choices-parameters"><a href="/parametres-cgu"><img src="Public/img/Back/Parameters/CGU.svg" alt="CGU">CGU</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>