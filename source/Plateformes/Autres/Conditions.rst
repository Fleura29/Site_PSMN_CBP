.. _conditions:

Salles de formation
===================

De son origine à son usage courant
----------------------------------

A l'origine, la salle de travaux pratiques du Centre Blaise Pascal était destinée à des opérations de formation continue ou des formations internationales de calcul scientifique (formation ATOSIM).

Ces 10 dernières années, l'usage de la salle s'est largement diversifiée, les professeurs appréciant la disponibilité de ses équipements. Cette salle supporte désormais de plus en plus de formations initiales de physique, chimie, géologie et biologie en L3, M1 et M2. Une autre salle a été mise en place en septembre 2022.

Deux autres salles de formation multimédia, celle du département de biologie et celle de bachelor, partagent la même gestion administrative permettant l'accès aux ressources.

.. raw:: html

    <div class="container text-center w-75">
        <p class="d-inline-block bg-warning-subtle p-3 rounded fs-13">
            Les salles de travaux pratiques du CBP n'ont <B>aucun lien</B> avec les salles libre-service gérées par la DSI (salles 0014, 106 et 109 du site Monod) !
        </p>
    </div>

Sa composition
--------------

Il existe depuis la rentrée 2022 deux salles de formation au CBP :
  * grande salle de formation de 30 places **M7-1H04**
  * salle collaborative et *Machine Learning* de 12+1 places **M7-1H19**

Deux autres salles de formation sont sous la tutelle du CBP :
  * salle multimédia du département de biologie **MGN-102**
  * salle de formation information Bachelor **MLE7.11**

Pour l'accès aux machines, les mêmes règles de déclaration des adresses "@ens-lyon.fr" s'appliquent que pour les salles principales du CBP.

Les stations de travail qui s'y trouvent sont listées en temps réel dans `Cloud@CBP <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ :
  * machines préfixées par **ml** (par exemple **mlc4**) : salle **M7-1H19**
  * machines préfixées par **biosalle** (par exemple **biosalle2**) : salle **MGN-102**
  * machines préfixées par **bachelor** (par exemple **bachelor1**) : salle **MLE7.11**

Ses règles d'accès
------------------

L'accès électronique aux machines de la salle requiert :
  * un couple identifiant & mot de passe ENS valide

    * soit un compte "normal" d'une personne disposant d'un compte "@ens-lyon.fr"
    * soit un compte invité temporaire de la forme "z123456"
  * une demande spécifique en remplissant le :ref:`formulaire suivant <demande-eis>`.

L'accès physique à la salle requiert
  * un badge izly (bleu) valide et déclaré comme ayant droit pour l'accès à l'enceinte de l'ENS-Lyon.

Si la porte est fermée et que le badge Izly ne fonctionne pas, il faut demander au secrétariat (porte M7-1H22) une clé permettant l'accès. La seconde porte peut être déverrouillée durant la journée pour permettre un accès sans badge.

Ses règles générales d'utilisation
----------------------------------

Partie émergée de toutes les `ressources <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_, l'utilisation de cette salle suppose l'acceptation des règles suivantes :
  - Les `10+10 commandements <http://www.cbp.ens-lyon.fr/emmanuel.quemener/documents/10_commandements.pdf>`_ du RSSI*, tu appliques !
  - Les ressources limitées des outils informatiques, tu appréhendes !
  - Jamais sur le poste de travail, tu ne t'abreuves ni ne manges !
  - Jamais le poste de travail, après son exploitation, tu n'éteins !
  - La session, après utilisation, tu clôtures !
  - L'usage de l'espace */local*, sur les gros volumes, tu préfères !
  - Sur l'espace *projects*, le travail en groupe, tu développes !
  - Les données temporaires, régulièrement, tu nettoies !
  - De manière raisonnée l'espace utilisateurs ''$HOME'', tu exploites !
  - Les dysfonctionnements, au BOFH*, tu remontes !

  * RSSI : *Responsable en Securité des Systèmes d'Information*
  * BOFH : *Bastard Operator From Hell*, le gestionnaire de la salle, Emmanuel Quémener

Ses règles particulières d'utilisation
--------------------------------------

Pour les professeurs
~~~~~~~~~~~~~~~~~~~~

L'intervenant se doit :
  * de fournir les adresses électroniques @ens-lyon.fr via le :ref:`formulaire <demande-eis>` **une semaine à l'avance**;
  * de se déplacer pour vérifier son accès à la salle et à ses machines ;
  * de se familiariser avec l'environnement logiciel (Linux Debian Bookworm) ;
  * de préciser au moins 15 jours à l'avance ses besoins spécifiques ;
  * d'accepter que des produits ne puissent être installés ;
  * d'apporter ses adaptateurs pour écran (seuls les connectiques VGA et HDMI sont disponibles) ; 
  * de permettre l'accès d'étudiants ou chercheurs (hors examen) désirant exploiter une station libre.
  * de veiller au bon respect des *10 commandements* durant son cours.

.. raw:: html

    <div class="container text-center w-75">
        <p class="d-inline-block bg-warning-subtle p-3 rounded fs-14">
            Aucun logiciel ne sera installé la semaine voire le jour de la formation !
        </p>
    </div>

Pour un accès distant
~~~~~~~~~~~~~~~~~~~~~

De manière à simplifier l'accès aux ressources de la salle, deux accès distants sont possibles :
  * via le client SSH traditionnel avec la commande "ssh <login>@<machine>.cbp.ens-lyon.fr"
  * via le client `x2go <http://wiki.x2go.org/doku.php>`_ permettant le déport complet du bureau de connexion
    
    * suivre la :ref:`documentation d'installation <x2go>`

Pour se connecter de l'extérieur de l'établissement via x2go ou SSH, il est nécessaire d'avoir :
  * activé son accès SSH sur son compte personnel
  * paramétré son client SSH ou son client x2go pour passer via la passerelle **ssh.ens-lyon.fr**