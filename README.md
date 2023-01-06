# PA-sakura-Pattern

Dans ce projet nous avons mis en place 3 Design Pattern

Le premier est Singleton qui se trouve dans notre fichier DatabaseDriver (dans le dossier Core) au niveau de la méthode static getInstance. Ce pattern est très utile pour notre projet car il n'instanciera qu'une seule fois la base de donée et réutilisera la même instance si la classe doit être à nouveau appelé.

Le second Pattern mis en place à été le Builder, vous le retrouverez au niveau de nos models,le Builder à une interface qui permetteront à nos différents QueryBuilder
d'implémenter les méthodes de l'interface, dans notre projet nous utilisons le queryBuilder MySql car c'est ce que nous utilisons dans notre projet. Ce Pattern nous permet de très aisément implémenter d'autre langageSQL comme ici avec MySQL ou PostgreSQL.
Il faudra juste modifier les différences entre les différents langages SQL et n'importe quel utilisateur pourra utiliser avec son propre SQL le projet.

Le dernier Pattern que nous avons mis en place à été Observer, il y a une interface Observer ou des 'observateurs' dans notre cas AddNotification vont implémenter cette interface.
Ce pattern nous permet de notifier des utilisateurs spécifiques qu'un nouveau commentaire à été ajouté dans le fil de discussion.
Vous retrouverez ce pattern au niveau de SiteController, au niveau de la méthode saveComment -> ligne 94.
Observer est un pattern très intéressant dans notre cas car il va permettre la notification à certains utilisateurs mais pas tous de l'ajout d'un nouveau commentaire dans leurs fils de discussion.
