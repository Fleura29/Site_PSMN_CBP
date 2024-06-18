.. _calendrier-prev:

Calendrier prévisionnel des Évolutions
======================================

.. role:: line
    :class: line

.. role:: line-bold
    :class: line-bold

Évolutions 2023
---------------

Infrastructures
~~~~~~~~~~~~~~~

**Automne 2023**

* Cluster Cascade, tranche 3
    * nouveaux noeuds Cascade ⇒ **OK**
    * nouveau scratch/Cascade ⇒ **OK**

**Printemps 2023**

* Cluster Cascade, tranche 3
    * nouveaux noeuds Cascade ⇒ **IN PROGRESS**
    * nouveau scratch/Cascade ⇒ **IN PROGRESS**

* website migration (by DUNES) ⇒ **OK**
    * new URL for Documentation `http://www.ens-lyon.fr/PSMN/Documentation/ <http://www.ens-lyon.fr/PSMN/Documentation/>`_ ⇒ **OK**

Évolutions 2023
---------------

Infrastructures
~~~~~~~~~~~~~~~
    
**Automne 2022**

.. container:: text-center 
    
    .. container::  bg-danger-subtle pt-3 pb-2 rounded fs-13 mb-2 w-75

        **IMPORTANT NEWS**
        Debian9/SGE has been shutdown definitely Friday 21th of October 2022

* **Nouvelle infrastructure système**
    * migration debian 9 -> **debian 11** (LTS) ⇒ **DONE**
    * migration GridEngine -> **slurm** ⇒ **DONE**
    * nouveau système d'installation des logiciels (easybuild)  ⇒ **DONE**
    * remise à zéro des scratchs (lors de la migration)  ⇒ **DONE**
    * **All deb9 scratchs emptied and erased for migration**
    * E5N, Lake, Chimie, Bio, Themiss
* Partitions slurm **ouvertes** tests + **PRODUCTION** ⇒ **DONE**

* New Documentation ⇒ **READY**, `https://meso-centres-lyon.pages.in2p3.fr/psmn-rtd/index.html <https://meso-centres-lyon.pages.in2p3.fr/psmn-rtd/index.html>`_

**Printemps 2022**

* **Nouvelle infrastructure système**
    * migration debian 9 -> **debian 11** (LTS) ⇒ **READY**
    * migration GridEngine -> **slurm** ⇒ **READY**
    * nouveau système d'installation des logiciels (easybuild)  ⇒ **READY**
    * remise à zéro des scratchs (lors de la migration)  ⇒ **AWAITING**
    * New Documentation (**READY**) `https://meso-centres-lyon.pages.in2p3.fr/psmn-rtd/index.html <https://meso-centres-lyon.pages.in2p3.fr/psmn-rtd/index.html>`_
* Cluster Cascade **ouvert** aux béta-tests ⇒ **OPEN / IN PRODUCTION** (:ref:`use web forms for access <probleme>`)

Clusters
~~~~~~~~

**Automne 2022**

* cluster Cascade : :line:`Déménagement et` doublement de la capacité (7k -> 14k cores) ⇒ **IN PROGRESS**
* cluster E5 : :line:`Déménagement et` réduction de la capacité (4k -> 2k cores) ⇒ **IN PROGRESS**

**Printemps 2022**

* cluster Cascade : Déménagement et doublement de la capacité (7k -> 14k cores) ⇒ **AWAITING**
* cluster E5 : Déménagement et réduction de la capacité (4k -> 2k cores) ⇒ **IN PROGRESS**


**2022-ish**

* Extension du cluster Epyc

Évolutions 2021
---------------

Infrastructures
~~~~~~~~~~~~~~~

**Automne 2021**

* migration debian 9 -> **debian 11** (LTS)
* migration GridEngine -> **slurm**
* nouveau système d'installation des logiciels
* modifications sur le réseau backbone (100G, 40G, 10G)  <- **OK**
* remise à zéro des scratchs
    * **/scratch/Chimie (cluster Lake) -> pendant la coupure du 23/10/2021**
* nouveau serveur de bases de données <- **OK le 08/10/2021** 
    * **r640database**
    * :line:`postgresql` OK
    * :line:`mysql` OK

Clusters 
~~~~~~~~

**Décembre 2021**

* Extension du cluster Epyc 

**Septembre/Octobre 2021**

* **Nouveau cluster Cascade**
    * 96 serveurs bi-socket équipés de processeurs Cascade Lake 9242 et 384 GiB de mémoire (48 coeurs à 2,3Ghz, 71,5 MiB de cache).
    * Infinband HDR 100.
    * Environ 9000 coeurs Cascade Lake 9242.
    * Une unique file d'attente parallèle avec 6912 coeurs disponibles.
    * Stockage /scratch dédié.
    * :line:`Compilateurs dédiés.` -> s92node01, cl6242comp2

**Janvier 2021**

**Nouvelles files d'attente:**

* CLG6226Rdeb1500 32 coeurs 6226R et 1,5 TiB de mémoire accès avec autorisation **créée le 11/01/2021**

**Stockage:**

* nouveau scratch "/scratch/Cral" sur les clusters "Lake" et "Epyc" (réservé au CRAL)

Évolutions 2020
---------------

Clusters
~~~~~~~~

**Automne 2020 : Nouveau cluster "Epyc" sur base de processeurs AMD Epyc**

**Nouvelles files d'attente:**

* Epyc7702deb512, Infiniband EDR (2048 coeurs disponibles 4Go/coeur) **créée le 16/12/2020**
    * liaison au "/scratch/Lake" **OK le 16/12/2020**

:line:`Le matériel étant trés récent et notre système un peu ancien, nous avons quelques difficultés...`

**Automne 2020 : Extension cluster "Lake"**

**Nouveaux compilateurs:**

* cl6226comp1 et 2 **mis en service le 09/12/2020**

**Nouvelles files d'attente:**

* Matlab (32 coeurs disponibles 8Go/coeur) **créee le 07/09/2020**
* monointeldeb96 (192 coeurs disponibles 4Go/coeur) **créee le 11/09/2020**
* Queue CLG5218deb182Themiss renommée CLG5218deb182Th **créee le 18/09/2020**
* Queue CLG5218deb182Themiss renommée CLG5218deb182Th **Ajout de 12 serveurs 384 coeurs le 16/11/2020**
* CLG6226Rdeb192A Infiniband FDR (768 coeurs disponibles 6Go/coeur) **Créée le 27/11/2020**
* CLG6226Rdeb192B Infiniband FDR (768 coeurs disponibles 6Go/coeur) **Créée le 30/11/2020**
* CLG6226Rdeb192C Infiniband FDR (768 coeurs disponibles 6Go/coeur) **Créée le 04/12/2020**
* CLG6226Rdeb192D Infiniband FDR (768 coeurs disponibles 6Go/coeur) **Créée le 04/12/2020**
* h48-CLG6226Rdeb192 Infiniband FDR (384 coeurs disponibles 6Go/coeur limitée à 48h) **Créée le 04/12/2020**

**Stockage:**

* migration Chimie (data et homes, data2 -> data10), finalisation pendant coupure d'octobre
* migration Geol (data et homes, data3 -> data9), finalisation pendant coupure d'octobre


**Automne 2020 : Extinction cluster "X5"**

À partir du 01/09/2020, les serveurs les plus anciens vont être arrêtés (et de nouveaux serveurs installés). Files d'attentes qui seront arrêtées et remplacées :

* :line:`matlab` **Définitivement arrêtée le 03/09/2020**
* :line:`matlabbig` **Définitivement arrêtée le 03/09/2020**
* :line:`monointeldeb24` **Définitivement arrêtée le 03/09/2020**
* :line:`monointeldeb48` **Définitivement arrêtée le 03/09/2020**
* :line:`r815lin128ib` **Définitivement arrêtée le 03/09/2020**
* :line:`x5570deb48` **Définitivement arrêtée le 01/09/2020**
* :line:`x5650deb24` **Définitivement arrêtée le 03/09/2020**
* :line:`x5650comp1 et x5650comp3` **Définitivement arrêtée le 07/10/2020**
* x5570comp1, x5570comp2 et scratch X5 : **Définitivement arrêtée le 23/10/2020**

Les frontales correspondantes (x5570comp1, x5570comp2, x5650comp1, x5650comp3) ainsi que le scratch "X5" seront aussi arrêtés trés prochainement.

Par ailleurs, la file d'attente **r820deb768** est en panne (et hors garantie).

**Printemps 2020 : Nouveau cluster "Lake"**

* modification ou nouvelles files d'attente :
    * nouvelle file CLG6242deb384B comprenant 768 coeurs CL 6242 **Fait le 13/04/2020**
    
Nouveau scratch "Lake" :

/scratch/
    ├── Lake/        (Opérationnel le 13 mars 2020)
    ├── disk/        (local to some servers)
    ├── Chimie       (reserved to chimie usage)
    ├── Bio          (reserved to biologie usage)
    ...
    └── Project_name (reserved to some servers, with dedicated hardware)

**Opérations en cours sur le cluster X5:**

* serveurs r422:
    * la queue x5570deb48 a été créée **Fait le 13/01/2020**
* serveurs sl390:
    * la queue x5650deb24 a été créée **Fait le 13/01/2020**
* arrêt des serveurs r815:
    * la queue r815lin128ib a été arrêtée définitivement **Fait le 11/09/2020**

Évolutions 2019
---------------

Clusters
~~~~~~~~

Novembre à Décembre 2019 :

**Opérations en cours sur le cluster X5:**

* arrêt des serveurs r422:
    * :line:`les queues x5570deb24A, x5570deb48A, x5570deb48B et x5570deb48C sont bloquées et seront arrêtées définitivement.` **Fait le 16/12/2019**
* arrêt des serveurs sl390:
    * :line:`les queues x5650lin24B et x5650lin24C sont bloquées depuis le 17/12/2019 et seront arrêtées définitivement.` **Fait le 07/01/2020**
* :line:`arrêt des queues matlab et matlabbig du 20/12/2019 jusqu'à début 2020.` **Fait le 20/12/2019 de nouveau up**
* :line:`arrêt des queues piv_debianA, B et C et regroupement en une seule queue piv_debian début 2020.` **Fait le 20/12/2019 piv_debian up**
* arrêt des serveurs r815:
    * la queue r815lin128ib sera arrêtée définitivement début 2020.

**Opérations en cours sur le cluster E5:**

* déplacement physique des R730 GPU (E5 vers Lake)
    * :line:`La Queue r730gpuRTX2080ti est arrêtée pour déplacement des serveurs jusqu'au 15/11/2019` **Fait le 16/12/2019**
    * **r730gpuRTX2080ti back online, NO SCRATCH**
* déplacement physique de chassis C82 (E5)
    * Les Queues E5-2667v2deb128 et E5-2667v2deb128nl :line:`sont arrêtées pour déplacement des serveurs jusqu'au 19/11/2019` **sont de nouveau opérationnelles (Mardi 19/11/2019)**
* déplacement physique des scratch Chimie (E5 vers Lake) et Themiss (Lake)
    * :line:`arrêt des serveurs pour déplacement le 19/11/2019`
    * scratch **Themiss** et **Chimie** sur **Lake** : **OK (28/11/2019)**
* arrêt pour déplacement dans la semaine du 18 au 22/11/2019 : 
    * :line:`des files d'attente M6142 C et D` **OK le 26/11/2019** 
    * :line:`des compilateurs e5-2670comp[1-2]` **OK le 27/11/2019** 
    * :line:`des files d'attente h48-E5 (partiel) et E5-2670 F (partiel)` **OK le 28/11/2019**
    * :line:`des compilateurs m6142comp[1-2] vers` :line-bold:`Lake` **OK le 02/12/2019**
* nouveau scratch **Bio** sur **Lake** : **OK (28/11/2019)**
* nouvelles frontales, **cl6242comp1** et **cl6242comp2** : **OK (27/11/2019)**
* arrêt/redémarrage des serveurs de visualisation pour changement de carte infiniband (dual connect)

**Nouveau cluster "Lake" (en cours d'installation)**

* modification ou nouvelles files d'attente :
    * les files M6142deb384A, B, C et D seront renommées SLG6142deb384A, B, C et D (1920 coeurs)
    * M6142deb384A et B, renommées en SLG6142deb384A et B **OK (09/12/2019)**
    * :line:`arrêt pour déplacement des serveurs de la file M6142deb384A du 28/11 au 07/12` **OK (04/12/2019)**
    * :line:`arrêt pour déplacement des serveurs de la file M6142deb384B du 07/12 au 16/12` **OK (04/12/2019)**
    * nouvelle file CLG6242deb384A comprenant 768 coeurs CL 6242 **OK le 28/11/2019**
    * nouvelle file CLG6242deb384C comprenant 320 coeurs CL 6242 **OK le 28/11/2019**
    * nouvelles files CLG5218deb192A, B, C et D comprenant 768 coeurs CL 5218 chacune (soit 3072 coeurs)
    * nouvelle file CLG5218deb192A :line:`online bientôt` **OK (29/11/2019)**
    * nouvelle file CLG5218deb192B :line:`online bientôt` **OK (29/11/2019)**
    * nouvelle file CLG5218deb192C :line:`online bientôt` **OK (05/12/2019)**
    * nouvelle file CLG5218deb192D :line:`online bientôt` **OK (04/12/2019)**
    * nouvelle file CLG5218deb192Themiss comprenant 320 coeurs CL 5218 :line:`online bientôt` **OK (05/12/2019)**

Nouveau scratch "Lake" :

/scratch/
    ├── Lake/        (à venir, common to Lake cluster)
    ├── disk/        (local to some servers)
    ├── Chimie       (reserved to chimie usage)
    ├── Bio          (reserved to biologie usage)
    ...
    └── Project_name (reserved to some servers, with dedicated hardware)

* modification sur le cluster E5 (à venir, fin 2019)
    * nouveau scratch E5 (sur cluster E5)
    * nouvelles frontales de compilation (E5 :line:`et Lake`)

* **Arrêt du cluster X5** (à venir, fin 2019)
    * les files monointeldeb48, x55*, x56* et r815lin128ib seront supprimées

Avril 2019 :

* files d'attentes M6142 renommées en SG6142
* upgrade système, passage en Debian 9.8 [coupure du 20/04/2019] **OK**
* upgrade CUDA (driver 418 et CUDA 9.0 + 9.2) [coupure du 20/04/2019] **OK**
* "Unified scratch", new scratchs hierarchy, enabling easy inclusions of upcoming hardware **OK**

Here's the new scratch :

/scratch/
    ├── E5/        (existing E5 scratch, available to E5 cluster)
    ├── nvme/      (local to some servers)
    ├── ssd/       (local to some servers)
    ├── Project_name (local to some servers, with dedicated hardware)
    ...
    └── X5/        (existing X5 scratch, available to X5 cluster)

Stockage
~~~~~~~~

2019 :

* mise en production data9 (transfert geol, +600To brut)
* migration home du cral sur data8  **OK**
* achat serveur de bases de données (hors garantie)
* achat data10, renouvellement chimie (hors garantie)

Évolutions 2018
---------------

Clusters
~~~~~~~~

Juillet - août 2018

* Nouvelle queue x5570deb48C 80 coeurs Intel x5570 à 2,9Ghz et 6Go par coeur  ⇒ **OK 15/07**
* Nouvelle queue x5570deb24A 112 coeurs Intel x5570 à 2,9Ghz et 3Go par coeur  ⇒ **OK 23/07**

Mai - juin 2018

* Suppression de la queue E5-2667v4deb128nl  ⇒ **OK 07/05**
* Remplacement de la queue E5-2667v4deb128nl  par la queue E5-2667v2deb128nl  ⇒   **OK 09/05**
* Suppression de la queue E5-2667v2h6deb128  ⇒  **OK 07/05**
* Remplacement de la queue E5-2667v2h6deb128  par la queue E5-2667v4h6deb128  ⇒  **OK 07/05**
* Nouvelle queue x5570deb48A 192 coeurs Intel x5570 à 2,9Ghz et 6Go par coeur  ⇒ **OK 15/05**
* Nouvelle queue x5570deb48B 192 coeurs Intel x5570 à 2,9Ghz et 6Go par coeur  ⇒ **OK 15/05**
* Nouvelle queue privée PhotoChimieB, 8 serveurs 192 coeurs Intel 6142 à 2,6Ghz, 16Go par coeur et 2To de /ssdscratch par serveur   ⇒ **OK 31/05**
* Remise en service de la queue x5650lin24ibA  ⇒ **OK 15/05**
* Remise en service de la queue x5650lin24ibB  ⇒ **OK 15/05**

Mars - avril 2018

* Suppression de la queue piv_debian  ⇒ en cours.
* Suppression de la queue x5570deb24A 192 coeurs Intel x5570 à 2,9Ghz et 3Go par coeur  ⇒ **OK 30/03**
* Suppression de la queue x5570deb24E 192 coeurs Intel x5570 à 2,9Ghz et 3Go par coeur  ⇒ **OK 23/03**
* Suppression des queues privées E5-2670deb256A ⇒  **OK 30/04**
* Suppression des queues privées E5-2670deb256B et E5-2670deb256C  ⇒ en cours.
* Suppression de la queue M6142deb384C 384 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒ en cours.
* Nouvelles queues privées piv_debianA et piv_debianB  ⇒ en cours d'installation.
* Nouvelle queue x5570deb48A 192 coeurs Intel x5570 à 2,9Ghz et 6Go par coeur  ⇒ en cours d'installation.
* Nouvelle queue x5570deb48B 192 coeurs Intel x5570 à 2,9Ghz et 6Go par coeur  ⇒ en cours d'installation.
* Nouvelle queue E5-2670deb256 256 coeurs E5-2670 à 2,6Ghz et 16Go par coeur  ⇒ **OK 16/03** 
* Nouvelle queue M6142deb384B 768 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒  **OK 30/04**
* Nouvelle queue privée PhotoChimieA 8 serveurs 192 coeurs Intel 6142 à 2,6Ghz, 16Go par coeur et 2TO de /ssdscratch par serveur   ⇒   **OK 30/04**
* Nouveau serveur de compilation M6142comp2 32 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒   **OK 30/04**

Janvier - février 2018

* re-démarrage dans le nouveau datacenter ⇒ bientôt terminé (il reste des x5nnn à ré-installer)
* Nouvelle queue M6142deb384A 768 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒ **OK 13/02**
* Nouvelle queue M6142deb384B 768 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒ en cours d'installation.
* Nouvelle queue M6142deb384C 384 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒ **OK 13/02**
* Nouveau serveur de compilation M6142comp1 32 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒ **OK 13/02**
* Nouveau serveur de compilation M6142comp2 32 coeurs Intel 6142 à 2,6Ghz et 12Go par coeur  ⇒ bientôt.

Stockage
~~~~~~~~

Q3 2018

* Mise en production de r740data9 ⇒ en attente installation.
* Mise en production stockage de 240TB ⇒ en attente installation.

Q2 2018

* Mise en production de r730data8 (+2x stockage de 240TB) ⇒ **OK**

Évolutions 2017
---------------

novembre-décembre 2017

* déménagement vers le nouveau datacenter
* refonte architecture réseau
* upgrade OS en version Debian 9
* upgrade des scratch
* authentification sur annuaire FLMSN

mai 2017

* Évolution à 384 coeurs de la queue E5-2667v4deb256A  ⇒ **OK 31/01**

avril 2017

* Évolution à 384 coeurs de la queue E5-2697Av4deb256  ⇒ **OK 05/02**
* Installation de deux serveurs de compilation E5-2667v4comp1 et comp2  ⇒ **OK 26/04**
* Suppression de deux serveurs de compilation E5-2670comp3 et comp4  ⇒ **OK 25/04**
* Reprise à zéro du scratch E5

janvier 2017

* Retour à 384 coeurs de la queue E5-2670deb128A  en cours  ⇒ 31/01 ⇒ **OK 01/01**
* Retour à 384 coeurs de la queue E5-2670deb128B  en cours  ⇒ 31/01 ⇒ **OK 01/01** 
* Retour à 384 coeurs de la queue E5-2670deb128C  en cours  ⇒ 31/01 ⇒ **OK 01/01** 
* Retour à 384 coeurs de la queue E5-2670deb128D  en cours  ⇒ 31/01 ⇒ **OK 01/01**

Stockage
~~~~~~~~

Q2 2017

* Test du réseau Intel OmniPath ⇒ 31/10 **OK**

Q1 2017

* Remise en service de r720data5 (+stockage de 240TB)  ⇒ 31/10 **OK**
* Mise en production de r720visucral (+stockage de 24TB) ⇒ 31/10 **OK**

Annuaire utilisateurs
~~~~~~~~~~~~~~~~~~~~~

* Authentification/ base de comptes

Dans le cadre du CPER CIDRA (contrat de plan état-région), obtenu via la FLMSN 
(Fédération Lyonnaise de Modélisation et Sciences Numériques), un annuaire unique
des utilisateurs (des ressources de la FLMSN) va être mis en place. Dès déblocage du financement, 
le système d'authentification du PSMN sera lourdement modifié pour s'appuyer sur cet annuaire unique.

Évolutions 2016
---------------

Clusters
~~~~~~~~

décembre 2016

* Suppression de la queue E5-2670_test ⇒ **OK**
* Suppression de la queue x5650_ib_test ⇒ **OK**
* Suppression de la queue x5570_ib_test ⇒ **OK** 
* Création de la queue E5-test ⇒ **OK**

* Création de la queue E5-2667v4deb128nl ⇒ **OK**

* Suppression de la queue E5-2667v2deb128nl ⇒ **OK**
* Création de la queue E5-2667v2deb128nlspe ⇒ **OK**

* Suppression de la queue E5-2667v2deb128 ⇒ **OK**
* Création de la queue E5-2667v2d2deb128 ⇒ **OK**
* Création de la queue E5-2667v2h6deb128 ⇒ **OK**

* Suppression de la queue E5-2670h3deb128 ⇒ **OK**
* Suppression de la queue E5-2670d3deb128 ⇒ **OK**
* Suppression de la queue E5-2670deb128bio ⇒ **OK**
* Queue E5-2670deb128F portée à 384 coeurs ⇒ **OK**

novembre 2016

* Queue E5-2670gpuM2070deb64 transformée en  E5-2670gpuM2070deb128 ⇒ **OK**
* Queue E5-2670gpuM2090deb64 transformée en  E5-2670gpuM2090deb128 ⇒ **OK**
* Queue E5-2670gpuK20deb64 transformée en  E5-2670gpuK20deb128 ⇒ **OK**
* Queue monointeldeb64 supprimée au profit de monointeldeb128 ⇒ **OK**
* Acquisition et installation de nouveaux serveurs
* 24 serveurs bi-sockzt E5-2667v4 128GO de mémoire ⇒ **OK**
* 16 serveurs bi-sockzt E5-2667v4 256GO de mémoire ⇒  **OK**

octobre 2016

* Création queue E5-2697Av4deb256 ⇒ **OK**
* Acquisition et installation de nouveaux serveurs 
* 8 serveurs bi-socket E5-2697Av4 256Go de mémoire ⇒ **OK**

septembre 2016

* Transformation de la queue E5-2670deb128E en E5-2670deb128F ⇒ **OK**
* Transformation de la queue E5-2670deb64A en E5-2670deb128E ⇒ **OK**
* Transformation de la queue E5-2670deb64nl en E5-2670deb128nl ⇒ **OK** 

Août 2016

* Transformation de la queue E5-2670deb128RNO en E5-2670deb128D ⇒ **OK**


Juillet 2016

* Transformation de la queue E5-2670deb64B en E5-2670deb128B ⇒ **OK**
* Transformation de la queue E5-2670deb64C en E5-2670deb128C ⇒ **OK**
* Création de la queue E5-2670deb128E ⇒ **OK** 


Juin 2016

* Transformation de la queue E5-2670deb64E en E5-2670deb128A ⇒ **OK**
* Transformation de la queue E5-2670deb128 en E5-2670deb128B ⇒ **OK**
* Transformation de la queue E5-2670deb64D en E5-2670deb128RNO (avec autorisation) ⇒ **OK**

Stockage
~~~~~~~~ 

Q1 2017

* Test du réseau Intel OmniPath
* Mise en production de r730data8 (+stockage de 240TB)
* Remise en service de r720data5 (+stockage de 240TB)
* Mise en production de r720visucral (+stockage de 24TB)

Septembre 2016

* Mise à jour du GlusterFS de /scratch E5
* Mise à jour du GlusterFS de /scratch x55
* Mise en production de r730gpgpu3
* Mise en production de r730gpgpu4

Août 2016

* Mise en production de r730datacs ⇒ **16/08 -> 26/08**  

Juin 2016

* Les données des groupes "biologie" (igfl,lbmc,ciri,rdp) transférées de r720data1 vers r730data7 (+stockage de 240TB)
* Groupe collision transféré de r720data1 vers r730data6

Autres
~~~~~~
        
* Stockage (/home, /Xnfs/site) :

Avec l'augmentation constante des volumétries de stockage demandées au PSMN, nous atteignons 
les limites physiques nous permettant de dupliquer (sauvegarder) vos données dans une fenêtre de 24h.

Nous allons donc arrêter le système automatique actuel de sauvegarde de l'intégralité des volumes
et vous proposer un espace de sauvegarde individuel et manuel, soumis à quota.

Le système de snapshots étant propre à chaque volume, il fonctionnera toujours et nous serons
en mesure de récupérer les erreurs datant de moins d'une semaine.

Évolutions 2015
---------------

Clusters
~~~~~~~~

* arrêt définitif des m600 au second trimestre 2015 ⇒ **OK**
* arrêt définitif des r410 (Centos5) en septembre 2015 ⇒ **OK**
* arrêt définitif des dl165 en septembre 2015 ⇒ **OK**
* arrêt définitif des r610 en septembre 2015 ⇒ **OK**
* arrêt des frontales correspondantes ⇒ **OK**
* refonte des r815 (accès au scratch global x56) ⇒ **OK**
* redémarrage des sl390-48 en (fin) octobre 2015 ⇒ **dédié mono**

* extension à 384 coeurs de la queue E5-2667v2deb128 en septembre 2015 ⇒ **OK**
* extension à 384 coeurs et ouverture à tous de la queue E5-2670deb64nl en septembre 2015 ⇒ **OK**
* extension à 256 coeurs de la queue E5-2667v2deb128nl (avec autorisation) en septembre 2015 ⇒ **OK**

* retour à 384 coeurs de la queue E5-2670deb64A en septembre 2015 ⇒ **OK**
* retour à 384 coeurs de la queue E5-2670deb64B en septembre 2015 ⇒ **OK**
* retour à 384 coeurs de la queue E5-2670deb64C en septembre 2015 ⇒ **OK**

* :line:`passage à 192 coeurs des queues x5570deb24A,B,C,D et E en septembre 2015`
* :line:`passage à 288 coeurs de la queue monointeldeb24 en septembre 2015`
* :line:`passage à 102 coeurs de la queue monointeldeb48 en septembre 2015`

* création de la queue E5-2670deb256D (128 coeurs avec autorisation) en septembre 2015 ⇒ **OK**
* création de la queue r730deb128 (40 coeurs) en septembre 2015 ⇒ **OK**
* création de la queue r7x0deb128gpu (20 slots avec autorisation) en septembre 2015 ⇒ **OK**

* refonte des queues monointel suite aux problèmes de scratch :
    * arrêt de monointeldeb24 fin octobre 2015 ⇒ réserve x56
    * remplacement du groupe r410lin48 par sl390lin48 (128+ cores, plus de Ghz, accès au scratch global x55) ⇒ **OK**
    * regroupement de r720deb128 et r730deb128 en monointeldeb128 (60 cores, 3.5Ghz, accès au scratch global E5) ⇒ **OK**

Autres
~~~~~~

* Stockage (/home, /Xnfs/site) :

Avec l'augmentation constante des volumétries de stockage demandées au PSMN, nous atteignons 
les limites physiques nous permettant de dupliquer (sauvegarder) vos données dans une fenêtre de 24h.

Nous allons donc arrêter le système automatique actuel de sauvegarde de l'intégralité des volumes
et vous proposer un espace de sauvegarde individuel et manuel, soumis à quota.

Le système de snapshots étant propre à chaque volume, il fonctionnera toujours et nous serons
en mesure de récupérer les erreurs datant de moins d'une semaine.

* Authentification/ base de comptes

Dans le cadre du CPER CIDRA (contrat de plan état-région), obtenu via la FLMSN 
(Fédération Lyonnaise de Modélisation et Sciences Numériques), un annuaire unique
des utilisateurs (des ressources de la FLMSN) va être mis en place. Début 2016, 
le système d'authentification du PSMN sera lourdement modifié pour s'appuyer sur cet annuaire unique.

* Gestionnaire de jobs

Le PSMN envisage, en remplacement du vieillissant SGE (qui n'évolue plus), de changer de gestionnaire
de jobs. Le logiciel slurm sera testé prochainement (déjà utilisé au P2CHPD-Lyon1 et au CBP).

Évolutions 2014
---------------

* bascule des sl390-48 en Debian 7 ⇒ reporté à 2015
* bascule des r815 en Debian 7 **⇒ OK**

Évolutions 2013
---------------

Afin de préparer le matériel **Équip@méso** dont la livraison est terminée, les clusters actuels vont être réorganisés par petits blocs.

**Semaine 27/2013**

* À partir du lundi premier juillet, démarrage progressif des serveurs **Equip@meso**.

**Semaine 26/2013**

* Lundi 24 juin et mardi 25 juin 2013, intervention électrique sur les diffuseurs de froid.
* À partir du mardi 25 juin au soir, re-démarrage progressif de tous les clusters.

**Semaine 25/2013**

* Lundi 17 juin 2013, arrêt des serveurs **dl165** et :line-bold:`r410 séquentiels` :line:`(r410lin100 à 106)`.
* Lundi 17 juin 2013, arrêt des serveurs **x41z** et de **x41zcomp**.
* Mardi 18 juin 2013, re-démarrage des **dl165** si tout se passe bien.
* Mardi 18 juin 2013, re-démarrage d'une dizaine de serveurs **x41z** si tout va bien.
* Vendredi 21 juin au matin, arrêt de tous les serveurs sous **OS Debian** (sl230, dl165, dl175, m600) et de tous les serveurs **sl390** et **c6100**.
* Vendredi 21 juin dans la journée arrêt de tous les **autres serveurs** et de **tous les services** du PSMN.
* Vendredi 21 juin en fin d'après-midi, **arrêt électrique total**.
* Samedi 22 juin coupure générale de l'alimentation électrique pour maintenance.

**Semaine 20~22/2013**

* :line:`Re-organisation des interconnexions infiniband des queues` :line-bold:`sl390 et c6100`.
* Installation du second cube "allée chaude" = arrêt des **sl390**, **c6100** et **sl230**.
* :line:`Déplacement physique des` :line-bold:`dl165`. 
* :line:`Déplacement physique des` :line-bold:`r410-48` :line:`(séquentiel)`.

**Semaine(s) 16~24/2013**

* Changement des plus anciens serveurs de /home dans la seconde quinzaine du mois d'avril 2013 : Des interruptions de service sont à prévoir par groupe d'utilisateurs,
* Re-organisation des interconnexions infiniband des queues sl390 et c6100.

**Semaine 12/2013**

Certains serveurs dl165 (4) sont devenu 100% séquentiels, vous pouvez y accéder via la queue **monoamd_debian24**.
Les autres serveurs dl165 (23) sont maintenant accessible via la queue **dl165_debian24**.
Voir `les détails sur la page suivante <https://www.ens-lyon.fr/PSMN/Documentation/clusters_usage/index.html>`_.

Les serveurs dl175 sont maintenant 100% parallèles, et accessible via la queue **dl175_debian32_ib**.
Voir `les détails sur la page suivante <https://www.ens-lyon.fr/PSMN/Documentation/clusters_usage/index.html>`_.

**NOTA BENE** : Tous ces serveurs fonctionnent maintenant avec le nouveau système d'exploitation du PSMN (Debian 7).

PS: :line:`Le compilateur dl175comp-pub reste encore à re-installer en Debian 7`. Le compilateur dl175comp-pub a aussi été installé en Debian 7, voir [[newsfeed:20130402|20130402 / dl175comp-pub]].

Les nouveaux serveurs à bases de processeurs Intel Sandy-bridge sont dans une période de test. Ils seront ouverts petit à petit à certains utilisateurs contactés personnellement (Ces utilisateurs essuyant les plâtres). Lorsque les tests seront terminés, vous en serez informés, et les noms des nouvelles queues seront officialisés.

**Semaine 11/2013**

Les serveurs "dl165" vont devenir 100% séquentiels, et inversement, les "dl175" vont récupérer l'interconnexion InfiniBand, pour devenir 100% parallèles.
Pour ce faire, nous allons arrêter ces serveurs afin de tranférer les cartes d'interconnexion et certains disques.

Les queues:

* dl165_debian_ib
* dl175lin32gb

vont donc être bloquées dimanche 3 mars 2013 afin que les jobs soient terminés lundi 11 mars 2013.

Dès que l'opération sera terminée, les serveurs seront re-démarrés et vous serez avertis des éventuelles modifications apportées.

La même semaine, si tout va bien, 16 nouveaux serveurs à bases de processeurs Intel Sandy-bridge seront accessibles. La version d'OS sera la même que pour les futurs serveurs Équip@méso (Debian 7).