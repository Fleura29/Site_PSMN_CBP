Equipements informatique
========================

.. role:: line-bold
    :class: line-bold

.. role:: line
    :class: line

La nouveauté, le portail Cloud\@CBP
----------------------------------

Pour simplifier l'accès aux ressources du Centre Blaise Pascal, le portail `Cloud@CBP <https://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ permet de **visualiser** et **sélectionner** les ressources disponibles.

Les ressources disponibles sont alors facilement accessibles via SSH ou :ref:`x2go <x2go>`.

Une utilisation toujours croissante
-----------------------------------

.. container:: text-center

    .. image:: ../_static/Plateformes/utilisateurscbp2019.png
        :class: img-fluid pb-2
        :alt: Graphique utilisateurs cbp 2019

Un ensemble de plateaux techniques
----------------------------------

A l'origine, les ressources informatiques du Centre Blaise Pascal étaient celles du Cecam, essentiellement cantonnées à la salle informatique.

Maintenant, le Centre Blaise Pascal dispose d'un ensemble de `plateaux techniques <#>`_ destinés à la formation, l'étude (de l'expérience au prototypage), le développement ou la qualification dans tous les segments de l'informatique scientifique :

* plateau multi-noeuds : 2 clusters de 64 noeuds r410 et r422, 1 cluster de 16 noeuds c6100, 1 cluster de 12 noeuds s9200
* plateau multi-coeurs : près de 250 machines disposant de 2 à 128 coeurs physiques dans 48 modèles différents
* plateau GPU : plus de 100 machines offrant plus de 135 GPU de 67 modèles différents
* plateau "intégration logicielle" : distributions Debian, Ubuntu, CentOS
* plateau "intégration matérielle" : Sparc 32, PowerPC, ARM (sur demande)
* plateau "Visualisation 3D" : 2 stations, 4 paires de lunettes, 2 vidéoprojecteurs
* plateau COMOD : "Compute On My Own Device"
* plateau Galaxy externe `Diet <http://diet.ens-lyon.fr>`_
* plateau Galaxy interne `Galaxy3 <http://galaxy3.cbp.ens-lyon.fr>`_
* plateau pour les ateliers `3IP pour "Introduction Inductive à l'Informatique et au Parallélisme" <#>`_

Pour simplifier l'accès à la majorité de ces machines, le portail `Cloud@CBP <https://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ existe : il permet 

* de visualiser les ressources disponibles
* de sélectionner un type de machine en fonction de ses ressources 

Ces plateaux reposent essentiellement sur :
  
* une infrastructure logicielle cohérente
* des équipements matériels génériques 
* une `salle de formation <#>`_ correctement équipée
* des clusters hétérogènes de récupération
* un environnement d'administration simplifié :ref:`SIDUS <sidusdoc>`

L'`utilisation <#>`_ des clusters (plateaux multi-noeuds & multi-coeurs) se base sur GridEngine. 

Espaces de stockage du CBP
--------------------------

L'utilisateur dispose sur les machines `Cloud@CBP <https://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ de 6 espaces de stockage :

* son compte utilisateur **$HOME** : **partagé entre les machines**. Chaque utilisateur dispose d'un quota de **20 GB**. Il ne doit pas être trop sollicité pour des calculs nécessitant de gros transferts. Un archivage (permettant de revenir sur l'état du volume dans le passé) est réalisé chaque nuit.
* l'espace temporaire **/tmp** : ce dossier est en mémoire vive. Rapide, il est raisonnable de ne pas trop le solliciter pour les gros volumes. Une fois la mémoire vive remplie, des dysfonctionnements peuvent apparaître.
* l'espace local **/local** : ce dossier correspond à un disque dur interne, d'un volume de **500 GB** à **50 TB**. La vitesse d'accès est d'une centaine de MB/s. Il n'est ni partagé, ni sauvegardé. Pour l'exploiter, créer un dossier correspondant à son identifiant : "mkdir /local/$USER"
* l'espace vrac **/scratch** : **partagé entre les machines**, de **120 TB**, ni archivé, ni sauvegardé. Il dispose d'un accès rapide (autour de 100 MB/s) sur le réseau de la salle et très rapide (autour de 300 MB/s) sur le réseau du cluster. Pour l'exploiter, créer un dossier correspondant à son identifiant : "mkdir /scratch/$USER"
* l'espace vrac récent **/distonet**: **partagé entre les machines**, de **120 TB**, ni archivé mais sauvegardé. Il dispose d'un accès rapide sur le réseau de la salle (autour de 100 MB/s) et très très rapide sur le réseau du cluster (autour de 2 GB/s). Ne JAMAIS l'exploiter pour des traitements générant ou traitant au delà de 10000 fichiers ! Pour l'exploiter, créer un dossier correspondant à son identifiant : "mkdir /distonet/$USER"
* l'espace projets **/projects**: **partagé entre les machines**, de **12 TB**, archivé mais non sauvegardé. C'est un espace collaboratif. Il dispose d'un accès rapide sur le réseau de la salle et sur le réseau du cluster. Pour l'exploiter, créer un dossier correspondant à son identifiant : "mkdir /projects/users/$USER"

.. container:: text-center 

    .. container:: d-inline-block bg-warning-subtle pt-2 mb-2 rounded fs-13

        La règle la plus importante pour le stockage est : "On ne travaille PAS dans son $HOME"

Infrastructure logicielle cohérente
-----------------------------------

La totalité des serveurs, des stations de travail et des postes de travail fonctionnent sous le système d'exploitation GNU/Linux, intégré au sein de la distribution `Debian <http://www.debian.org/>`_.
Tous les postes à destination des utilisateurs sont équipés en standard d'un certain nombre de paquets exploités dans les générations précédentes de systèmes. L'installation de sous les paquets "science" n'est plus systématique sur la version Stretch actuellement en service.
L'intérêt de disposer de la même distribution, dans la même version, permet de faciliter au maximum la portabilité d'un équipement à l'autre, et donc limiter les temps d'intégration : un outil développé sur un poste de travail pourra être compilé voire exécuté sans difficulté sur un autre équipement.

Un certain nombre d'applications scientifiques complémentaires (OpenSource ou propriétaires) ont été installées. Elles sont accessibles dans "/opt" ou listables via la commande "module avail".


Équipements informatiques matériels
-----------------------------------

.. container:: text-center 

    .. container:: d-inline-block bg-success-subtle pt-2 mb-2 rounded fs-13
        
        Les équipements suivants forment le `Cloud@CBP <https://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ : plus de 150 machines directement accessibles avec le même environnement

Équipements généraux
--------------------

* 30 serveurs physiques :

    * 22 serveurs de KVM ou de fichiers
    * 8 serveurs de fichiers

Salle informatique de 24 postes
-------------------------------

La salle informatique M7-1H04 de travaux pratiques comprend :

* **12 stations de travail Precision T5600** avec E5-2620 et 32/64 Go

    * **gtx690** : Nvidia GTX 690 avec 2x2Go
    * **gtx680** : Nvidia GTX 680 avec 2Go, Nvidia GT1030 avec 2Go
    * **gtx980** : Nvidia GTX 980 avec 4Go, Nvidia GT1030 avec 2Go
    * **gtxtitan** : Nvidia GTX Titan avec 6Go, Nvidia K420 avec 2Go
    * **gtx780ti** : Nvidia GTX 780Ti avec 3Go, Nvidia K2000 avec 2Go
    * **q4000alpha** : Nvidia K4000 avec 3Go et capacité 3D
    * **gtx960** : Nvidia GTX 960 avec 2Go, Nvidia GT710 avec 2Go
    * **gtx970** : Nvidia GTX 970 avec 2Go, Nvidia GT1030 avec 2Go
    * **gtx980tialpha** : Nvidia GTX 980Ti avec 6Go, Nvidia GTX 750Ti avec 2Go
    * **gtx980tibeta** : Nvidia GTX 980Ti avec 6Go, Nvidia P600 avec 2Go
    * **gtx980tidelta** : Nvidia GTX 980Ti avec 6Go, Nvidia K420 avec 1Go
    * **gt730** : Nvidia GT 730 avec 2Go, Nvidia RTX 2080 avec 8Go

* **4 stations de travail Precision T5610** avec 2 E5-2609v2 et 64 Go

    * **gtx980beta** : Nvidia GTX 980 avec 4Go, Nvidia GT 1030 avec 2Go
    * **gtx980tigamma** : Nvidia GTX980Ti avec 6Go,  Nvidia GTX 750 avec 2Go
    * **k40** : Nvidia K2000 avec 2Go, Nvidia Tesla K40 avec 12Go
    * **gt640** : Nvidia GT 640 avec 2Go, Nvidia RTX 2070 avec 8Go

* **4 stations de travail Precision T7810** avec 2 E5-2630v3 et 32 Go

    * **gtx780beta** : Nvidia GTX 780 avec 3Go, Nvidia K420 avec 2Go
    * **gtx780gamma** : Nvidia GTX 780 avec 3Go, Nvidia K420 avec 2Go
    * **gtx780delta** : Nvidia GTX 780 avec 3Go, Nvidia GT1030 avec 2Go
    * **gtx1050ti** : Nvidia GTX 1050Ti avec 4Go, Nvidia P600 avec 2Go

* **2 stations de travail Precision 7820** avec 2 Silver 4114 et 64 Go

    * **p600alpha** : Nvidia P600 avec 2Go, Nvidia GTX 1080 avec 8Go
    * **p600beta** : Nvidia P600 avec 2Go, Nvidia GTX 780 avec 8Go

* **2 postes de travail Optiplex 790** avec 1 i3-2120 et 16 Go

    * **o790alpha** : Nvidia NVS 315 avec 1Go
    * **o790beta** : Nvidia GT620 avec 1Go

Ces machines sont accessibles par SSH ou x2go : "<nom>.cbp.ens-lyon.fr" 

Une vision d'ensemble de l'`état des stations de travail <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ sous :ref:`SIDUS <sidusdoc>`.

Salle collaborative Machine Learning de 12+1 postes
---------------------------------------------------

La salle collaborative M7-1H19 de travaux pratiques comprend :

  * **12 stations de travail Optiplex 790** avec Intel i3-2120  et 16 Go

    * **mla1** : Nvidia T1000 avec 8 Go 
    * **mla2** : Nvidia T400 avec 4 Go 
    * **mla3** : Nvidia T400 avec 4 Go
    * **mla4** : Nvidia GTX 1650 avec 4 Go
    * **mlb1** : Nvidia RTX A2000 avec 12 Go 
    * **mlb2** : Nvidia GTX 750Ti avec 2 Go
    * **mlb3** : Nvidia GT 1030 avec 2 Go
    * **mlb4** : Nvidia T1000 avec 8 Go 
    * **mlc1** : Nvidia GTX 1650 avec 8 Go 
    * **mlc2** : Nvidia GT 1030 avec 2 Go
    * **mlc3** : Nvidia RTX A2000 avec 12 Go 
    * **mlc4** : Nvidia T400 avec 4 Go 

  * **1 station** pour le professeur avec Intel i7-10700 et 64 Go

    * **mld** : Nvidia P2200 avec 5 Go 

Ces machines sont accessibles par SSH ou x2go : "<nom>.cbp.ens-lyon.fr" 

Une vision d'ensemble de l'`état des stations de travail <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ sous :ref:`SIDUS <sidusdoc>`.

Machines ouvertes en salle 3IP à accélérateur AMD ou Nvidia
-----------------------------------------------------------

  * **8 stations de travail ouvertes**

    * **fx9590** : processeur AMD FX9590 cadencé à 4715MHz 

      * AMD Radeon R9-Fury
      * AMD Radeon Nano

    * **kaveri** : processeur AMD Kaveri A10-7850

      * AMD GPU d'un A10-7850
      * AMD Radeon HD7970
      * AMD Radeon R9-290

    * **ryzen7** : processeur Ryzen7-1800X

      * AMD Radeon R9-Fury
      * AMD Radeon R9-380

    * **skylake** : processeur Intel Skylake i7-6700K

      * AMD Radeon R9-295X2
      * AMD RX Vega 64

    * **threadripper** : processeur ThreadRipper 1950X

      * AMD Radeon VII
      * AMD Radeon Vega 64

  
Ces machines sont accessibles en salle 3IP et par SSH et :ref:`x2go <x2go>` : "<nom>.cbp.ens-lyon.fr"

Bureau M7-1H07 avec capacité 3D
-------------------------------

* **1 station de travail Precision T7600** avec 2 Saondy Bridge 8 coeurs

    * **k4000** : Nvidia Quadro K4000 avec 2 Go avec 2Go

Équipements spécifiques
-----------------------

.. container:: text-center

    .. image:: ../_static/Plateformes/cimg0039.jpg
        :class: img-fluid
        :alt: Image cimg0039

* **un cluster 64 bits** de 156 noeuds permanents et sa frontale

* accès par **cocyte.cbp.ens-lyon.fr** avec soumission par `Slurm <#>`_

* **24 stations d'intégration :**

* **lenny32** & **lenny64** : distributions Debian Lenny 32/64 bits
* **squeeze32** & **squeeze64** : distributions Debian Squeeze 32/64 bits
* **wheezy32** & **wheezy64** : distributions Debian Wheezy 32/64 bits
* **jessie32** & **jessie64** : distributions Debian Jessie 32/64 bits
* **stretch32** & **stretch64** : distributions Debian Stretch 32/64 bits
* **sid32** et **sid64** : distributions Debian Sid 32/64 bits
* **ubuntu32-1004** & **ubuntu64-1004** : distributions Ubuntu 10.04 32/64 bits
* **ubuntu32-1204** & **ubuntu64-1204** : distributions Ubuntu 12.04 32/64 bits
* **ubuntu32-1404** & **ubuntu64-1404** : distributions Ubuntu 14.04 32/64 bits
* **ubuntu32-1604** & **ubuntu64-1604** : distributions Ubuntu 16.04 32/64 bits
* **centos32-55** & **centos64-55** : distributions CentOS 5.5 32/64 bits
* **centos32-7** & **centos64-7** : distributions CentOS 7 32/64 bits  

Machines virtuelles à accélérateur
----------------------------------

* **14 stations de travail virtuelles**

* **phi7120p** : Xeon Phi 7120p avec 12GB
* **k40m** : Nvidia Tesla K40m avec 12GB
* **k80alpha** : 1/2 de Tesla K80 - 1GPU avec 12GB
* **k80beta** : 1/2 de Tesla K80 - 1GPU avec 12GB
* **k80gamma** : Tesla K80 - 2GPU avec 12GB
* **gtx1080alpha** : Nvidia GTX 1080 avec 8GB
* **gtx1080beta** : Nvidia GTX 1080 avec 8GB
* **gtx1080gamma** : Nvidia GTX 1080 avec 8GB
* **gtx1080delta** : Nvidia GTX 1080 avec 8GB
* **p100alpha** : Nvidia Tesla P100 avec 16GB
* **p100beta** : Nvidia Tesla P100 avec 16GB
* **p100gamma** : 2x Nvidia Tesla P100 avec 16GB
* **v100alpha** : Nvidia Tesla V100 avec 16GB
* :line-bold:`v100beta` :line:`: Nvidia Tesla V100 avec 16GB`

Ces machines sont accessibles par SSH et :ref:`x2go <x2go>` : "<nom>.cbp.ens-lyon.fr"

Stations Deep Learning à accélérateur
-------------------------------------

* **6 stations de travail "ouvertes"**

    * **openstation6** : 1 RTX 2080 Super avec 8GB, 1 GTX 1080 avec 8GB, espace de stockage de 4TB en SSHD
    * **openstation7** : 1 RTX 2080 Super avec 8GB, 1 GTX 780 avec 3GB, espace de stockage de 4TB en SSHD
    * **openstation8** : 1 RTX 2080 Super avec 8GB, 1 GTX 980 avec 8GB, espace de stockage de 4TB en SSHD
    * **openstation9** : 1 RTX 2080 Super avec 8GB, 1 GTX 1080 avec 8GB, espace de stockage de 4TB en SSHD

* **5 serveurs rackables**

    * **r5400alpha** : Nvidia GTX 1080 avec 8GB, espace de stockage de 1TB en Raid1
    * **r5400beta** : Nvidia GTX 1080 avec 8GB, espace de stockage de 1TB en Raid1
    * **r720gpu1** : 2 Nvidia GTX 1080 Ti avec 8GB, espace de stockage de 13TB en Raid5
    * **r730server6** : 2 Nvidia RTX 2080 Ti avec 12GB, espace de stockage de 13TB en Raid5
    * **r740gpu2** : 2 Nvidia A100 avec 40GB, espace de stockage de 6TB en Raid5
    * **rome4gpu** : 4 Nvidia RTX 2080 Super avec 8GB, espace de stockage de 3TB en Raid5
    * **epyc1** : 2 Nvidia RTX 2080 Super avec 8GB, espace de stockage de 11TB en Raid5
    * **epyc2** : 2 Nvidia RTX 2080 Super avec 8GB, espace de stockage de 11TB en Raid5
    * **epyc3** : 2 Nvidia RTX 2080 Super avec 8GB, espace de stockage de 11TB en Raid5
    * **epyc4** : 2 Nvidia RTX 6000 Super avec 24GB, espace de stockage de 11TB en Raid5
    * **c4140** : 2 Nvidia Tesla V100 Super avec 16GB, espace de stockage de 50TB en Raid5

Ces machines sont accessibles par SSH et :ref:`x2go <x2go>` : "<nom>.cbp.ens-lyon.fr"

Serveurs "historiques" et récents, multicoeurs
----------------------------------------------

* **14 serveurs "historiques"**

    * **v20z1** : serveur SunFire v20z bisocket, 2 coeurs, avec 16GB de RAM et 70GB de **/local**
    * **v20z2** : serveur SunFire v20z bisocket, 2 coeurs, avec 16GB de RAM et 70GB de **/local**
    * **x2200node1** : serveur SunFire x2200 4 coeurs, avec 32GB de RAM et 500GB de **/local**
    * **x2200node2** : serveur SunFire x2200 4 coeurs, avec 32GB de RAM et 500GB de **/local**
    * **x4500node3** : serveur SunFire x4500 2 coeurs, avec 16GB de RAM et 20TB de **/local**
    * **x4500node4** : serveur SunFire x4500 2 coeurs, avec 16GB de RAM et 20TB de **/local**
    * **sl165node1** : serveur HP DL165 bisocket, 12 coeurs, avec 32GB de RAM et aucun espace **/local**
    * **sl165node2** : serveur HP DL165 bisocket, 12 coeurs, avec 32GB de RAM et aucun espace **/local**
    * **r815node1** : serveur Dell R815 32 coeurs, aucun espace de **/local**
    * **r815node2** : serveur Dell R815 32 coeurs, aucun espace de **/local**
    * **r815node3** : serveur Dell R815 32 coeurs, aucun espace de **/local**
    * **r815node4** : serveur Dell R815 32 coeurs, aucun espace de **/local**
    * **r815cores32** : serveur Dell R815 32 coeurs, 2TB de **/local**
    * **r815cores48** : serveur Dell R815 48 coeurs, 4TB de **/local**

* **6 serveurs récents**

    * **apollo192g1** : serveur HPE avec 32 coeurs, 192GB de RAM, 2TB de **/local**
    * **apollo192g2** : serveur HPE avec 32 coeurs, 192GB de RAM, 4TB de **/local**
    * **apollo1024g** : serveur HPE avec 32 coeurs, 1TB de DCPMM, 2TB de **/local**
    * **apollo2048g** : serveur HPE avec 32 coeurs, 2TB de DCPMM, 15TB de **/local**
    * **epyc1** : serveur Supermicro avec 64 coeurs, 11TB de **/local**
    * **epyc2** : serveur Supermicro avec 128 coeurs, 11TB de **/local**

Infrastructure SIDUS
--------------------

L'infrastructure :ref:`SIDUS <sidusdoc>` pour *Single Instance Distributing Universal System* permet aux personnes de l'ENS qui le désirent de démarrer en quelques secondes un environnement scientifique complet, basé sur la dernière distribution stable de Debian, la Bookworm à l'heure actuelle. Cet environnement peut aussi bien démarrer sur une machine complète ou dans une machine virtuelle. Il y a 5 options possibles pour lancer cette version :

* **Debian Bookworm on x86_64 : default** pour l'usage dans un environnement 64 bits, optimisé pour un environnement virtuel sous VirtualBox ;
* **Debian Bookworm on x86_64 : Nvidia Current** support propriétaire avec pilote & environnement le plus récent
* **Debian Bookworm on x86_64 : Nvidia Screenless** support propriétaire avec pilote & environnement le plus récent, pour machines sans moniteur
* **Debian Bookworm on x86_64 : Nvidia 470** support propriétaire avec pilote & environnement 470.*, pour cartes graphiques anciennes (Kepler inclues)
* **Debian Bookworm on x86_64 : Nvidia 340xx** support propriétaire avec pilote & environnement 340.*, pour cartes graphiques anciennes (GT200 inclues)
* **Debian Bookworm on x86_64 : AMDGPU Pro** support propriétaire avec pilote & environnement, pour cartes graphiques AMD récentes
* **Debian Bookworm on x86_64 : AMDGPU** support propriétaire avec pilote & environnement, pour cartes graphiques AMD jusqu'à Nano
* **Debian Bookworm on x86_64 : Radeon** support propriétaire avec pilote & environnement, pour cartes graphiques AMD jusqu'à 295X2

Postes de travail
-----------------

Les postes de travail, à la demande des utilisateurs, peuvent être configurés et pris en charge comme les autres équipements, seulement s'ils entrent dans le cadre d'un projet soutenu dans le CBP (pour ne pas interférer avec la DSI ou les informaticiens de entités concernées).

