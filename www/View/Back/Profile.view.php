<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Design guide</title>
    <meta name="viewport" content="width=device-width, initial-scalest">
    <!-- <link rel="stylesheet" type="text/css" href="../Public/src/scss/components/_profile.scss"> -->
    <link rel="stylesheet" type="text/css" href="../../Public/css/profile.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/src/scss/partials/_grid.scss" />
    <!-- <script defer type="text/javascript" src="../../Public/js/profile.js"></script> -->


</head>

<body>
        <div class ="test">
            <div class="img">
                <img src="../../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" alt="Photo de profile">
                <h1>Luc Deslys</h1>
            </div>
            <div class="choices">
                <div id="infoChoice" class="choice-active">Informations</div>
                <div id="paramChoice">Paramètres</div>
            </div>
            <h2 class="title-profile">Profile</h2>
            <div class="profile">
                <!-- Data charged on js -->
            </div>
            <div class="list-parameters">
                <div class="parameters">
                    <ul>
                        <li class="link-notification "><img class="logo " src="../../Public/img/profile/notification-alarm.svg" alt="Notification Bell" />Notification <div><img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /> </div>
                        </li>
                        <li class="link-language"><img class="logo" src="../../Public/img/profile/language.svg" />Langue<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                        <li class="link-account-management"><img class="logo" src="../../Public/img/profile/account.svg" />Gestion des comptes<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                        <li class="link-site-management"><img class="logo" src="../../Public/img/profile/worldwide.svg" />Gestion des sites<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                        <li class="link-security"><img class="logo" src="../../Public/img/profile/security.svg" />Sécurité<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                        <li class="link-message-center"><img class="logo" src="../../Public/img/profile/phone.svg" />Centre de messagerie<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                        <li class="link-support-and-help"><img class="logo" src="../../Public/img/profile/question-mark.svg" />Aide et support<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                        <li class="link-CGU"><img class="logo" src="../../Public/img/profile/file.svg" />CGU<img class="arrow-parameters" src="../../Public/img/profile/arrow.svg" /></li>
                    </ul>
                </div>
                <div class="notification-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2> Notifications</h2>
                </div>
                <div class="notifications">
                    <div class="content-notification">
                        <p>Nouvelle inscription</p>
                        <div>
                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">Notification push</span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>

                                <span class="toggle-label">
                                    Notification par message
                                </span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">
                                    Notification par email
                                </span>
                            </label>
                        </div>

                        <p>Nouvelle connexion</p>
                        <div>
                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">Notification push</span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>

                                <span class="toggle-label">
                                    Notification par message
                                </span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">
                                    Notification par email
                                </span>
                            </label>
                        </div>

                        <p>Centre de messagerie</p>
                        <div>
                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">Notification push</span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>

                                <span class="toggle-label">
                                    Notification par message
                                </span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">
                                    Notification par email
                                </span>
                            </label>
                        </div>
                        <p>Mise a jour produit</p>
                        <div>
                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">Notification push</span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>

                                <span class="toggle-label">
                                    Notification par message
                                </span>
                            </label>

                            <label class="toggle">
                                <input class="toggle-checkbox" type="checkbox">
                                <div class="toggle-switch"></div>
                                <span class="toggle-label">
                                    Notification par email
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="language-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2>Language</h2>
                </div>
                <div class="language">
                    <div class="choice-languages">
                        <div class="style-radio">
                            <input type="radio" name="languages" id="french" />
                            <span>Français</span>
                        </div>
                        <div class="style-radio">
                            <input type="radio" name="languages" id="English" />
                            <span>English</span>
                        </div>
                        <div class="style-radio">
                            <input type="radio" name="languages" id="Italiano" />
                            <span>Italiano</span>
                        </div>
                        <div class="style-radio">
                            <input type="radio" name="languages" id="Deutsch" />
                            <span>Deutsch</span>
                        </div>
                        <div class="style-radio">
                            <input type="radio" name="languages" id="Español" />
                            <span>Español</span>
                        </div>
                    </div>
                </div>

                <div class="site-management-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2>Gestion du sites </h2>
                </div>
                <div class="site-management">
                    <div>
                        <h3>
                            Titre du site
                        </h3>
                        <input type="text" name="site-name">
                        <h3>
                            Description du site
                        </h3>
                        <input type="text" name="site-description">
                        <h3> Logo </h3>
                        <button>Modifier</button>
                        <div>
                            <h3> Nom de domaine </h3>
                            <p>Vous avez la possibilité de changer de domainer. Pour ce faire 2 solutions s’offrent à vous :
                            <p>
                            <ul>
                                <li>Hébergement Sakura : Vous devez effectuer une demande auprès de notre service clientèle</li>
                                <li>Hébergement Tiers : Vous devez acquérir un nom de domaine auprès d’un autre hébergeur puis l’ajouter ci-dessous</li>
                            </ul>

                        </div>
                        <div>
                            <button>Demander un nom de domaine</button>
                            <button>+ Ajouter un nom de domaine</button>

                            <input type="text" />
                        </div>
                        <button>Confirmer</button>
                    </div>
                </div>

                <div class="security-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2>Sécurité</h2>
                </div>
                <div class="security">
                    <div class="password">
                        <h3>
                            Mot de passe actuel
                        </h3>
                        <input type="password" name="current-password">
                        <h3>
                            Nouveau mot de passe
                        </h3>
                        <input type="password" name="new-password">
                        <h3>
                            Confirmer mot de passe
                        </h3>
                        <input type="password" name="new-password">
                        <button>Changer le mot de passe</button>
                    </div>
                </div>

                <div class="message-center-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2>Aide et support</h2>
                </div>
                <div class="message-center">
                    <h3>Support@Sakura.Fr</h3>
                </div>
                <div class="CGU-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2> Conditions Générales d’utilisations </h2>
                </div>
                <div class="CGU">
                    <p>Ultricies et augue ornare tincidunt fames. Tellus ut netus lacus vulputate eu urna. Hendrerit quis tortor interdum ultrices erat id enim nibh. Tincidunt at elementum ut facilisis lorem in rhoncus. Sit iaculis at pharetra facilisis pellentesque ultrices ultricies libero.
                        Sit interdum turpis tristique quis urna, nulla laoreet curabitur. Lobortis nec habitasse a cursus adipiscing ut auctor. Facilisis porttitor magna dignissim et sed elit. Semper dui gravida fermentum neque amet. Placerat tempor ac tincidunt bibendum id adipiscing neque. Orci dui ut sapien mauris, et sagittis, ultricies vestibulum. Bibendum ut +senectus pharetra lectus non sapien. Tincidunt molestie natoque fames ac maecenas erat. Ut orci odio pellentesque donec rhoncus elit sem ut sem. Bibendum quis nunc ac erat sodales accumsan. Enim, risus amet, vitae id interdum lacus, dignissim aliquet. Nunc egestas non sapien, quisque. Condimentum mauris in tellus ipsum lacus gravida orci, nunc. Tristique ut varius nisl orci, scelerisque sit sed. Orci pellentesque nisl potenti pulvinar consequat mattis.
                        Volutpat pulvinar enim, sollicitudin urna magna quisque auctor vel. Ac enim, gravida interdum erat amet parturient lacus aliquam. Blandit nibh nullam ut laoreet eu ultricies. Dignissim dui, lacinia metus nulla in quis blandit. Porttitor cras pretium.
                    <p>
                </div>
                <!--             <div class="account-management">
                <div class="account-management-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2>Gestion des comptes</h2>
                </div>
            </div>
            <div class="site-management">
                <div class="site-management-title">
                    <img class="arrow" src="../../Public/img/profile/arrow.svg" />
                    <h2>Gestion des sites</h2>
                </div>
            </div>
            <div class="account-management"></div>

            <div class="support-and-help"></div> -->

            </div>
        </div>
</body>


<script>
    // if viewportWidth width <= 855
    if (window.innerWidth <= 855) {
        // load mobile script
        loadScriptFile('../../Public/js/profileMobile.js');
    }
    if (window.innerWidth > 855) { // viewportWidth width > 855
        // load desktop script
        loadScriptFile('../../Public/js/profileDesktop.js');
    }

    // loadScriptFile func
    function loadScriptFile(src) {
        // create element <script>
        const $script = $('<script>');
        // add type attribute
        $script.attr('type', 'text/javascript');
        // add src attribute
        $script.attr('src', src);
        // append the <script> element to <head>
        $script.appendTo('head');
    }
</script>

</html>