.. _slurm:

Utilisation de Cluster@CBP avec Slurm au Centre Blaise Pascal
=============================================================

.. role:: it-bold											
	:class: it-bold

Ce qu'il faut retenir !
-----------------------

* pour se connecter sur la passerelle de cluster : 

.. code-block:: bash
  
  ssh <login>@cocyte.cbp.ens-lyon.fr

* pour connaître les noeuds disponibles ou les queues : `sinfo`
* pour connaître l'état des tâches : `squeue`
* pour effectuer une réservation en mode interactif : `srun %%--%%pty bash`
* pour lancer une tâche définie par le script SLURM `MyJob.slurm` : `sbatch MyJob.slurm`

Comme "pense-bête" est disponible cette intéressante `Reference Card <https://slurm.schedmd.com/pdfs/summary.pdf>`_.

Contexte : exécution de tâches "mode intéractif" ou "mode non connecté"
-----------------------------------------------------------------------

Généralement, l'exécution d'un programme au CBP sur une machine se fait via un terminal en ligne de commande. Les tâches, listées dans un script, s'exécutent sur la machine hôte les unes après les autres. Se déconnecter de son terminal met fin à l'exécution de son programme. Avec **tmux** ou **screen**, il est possible de maintenir ses exécutions en se "détachant" de son terminal pour y revenir ensuite.

Il est très profitable d'avoir un "soumissionneur" pour distribuer ses tâches à un ensemble de ressources disponibles, sans avoir à se connecter de manière individuelle sur chaque machine. L'exploitation de programmes parallèlisés s'exécutant de manière concurrente sur plusieurs coeurs d'une même machine ou sur plusieurs machines 

Le "soumissionneur" (ou *batch scheduler*) est un outil permettant l'exécution de tâches en *"mode non connecté"* ou en *"mode non intéractif"* sur un ensemble de ressources sans que l'utilisateur ait à choisir où et quand ses tâches vont être traitées.

Ressources du Centre Blaise Pascal
----------------------------------

Le Centre Blaise Pascal dispose de plateaux techniques, notamment  des noeuds de clusters, destinés :

* à l'initiation au calcul scientifique, notamment `MPI <http://en.wikipedia.org/wiki/Message_Passing_Interface>`_, `OpenMP <http://en.wikipedia.org/wiki/OpenMP>`_, `CUDA <http://en.wikipedia.org/wiki/CUDA>`_ `OpenCL <http://en.wikipedia.org/wiki/Opencl>`_
* au développement d'applications dans le domaine du calcul scientifique
* à l'intégration de démonstrateurs agrégeant des technologies matures dans un ensemble original
* au passage de l'expérience scientifique ("la paillasse") à la technologie de production ("le génie des procédés")
* à l'exploration de "domaine de vol" des applications scientifiques (paramètres de parallélisation, audit de code)
* à la réalisation de prototypes pour la mise en place de nouveaux services informatiques

Le Centre Blaise Pascal n'a pas vocation à voir ses infrastructures utilisées :

* pour de longs calculs de production (de l'ordre de la semaine)
* pour des calculs sur de très grands nombres de coeurs (supérieurs à 1000)

Pour ces deux exigences, le :ref:`PSMN dispose d'une infrastructure de production <clustserv>`.

Les équipements accessibles via le soumissionneur SLURM sont 96 noeuds répartis de 4 types différents pour un total de 1888 coeurs et plus de 8 TB de RAM agrégées.

+----------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+
| **Cluster**    | **Marque** | **Modèle** | **Noeuds** | **Coeurs /Noeud** | **RAM /Noeud** | **Réseau GE** | **Réseau IB** | **Total Coeurs** | **Total RAM** |
+================+============+============+============+===================+================+===============+===============+==================+===============+
| **c82**        | Dell       | C8220      | 64         | 8                 | 128 GB         | GE            | IB            | 1024             | 8192 GB       |
+----------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+
| **c61**        | Dell       | C6100      | 16         | 12                | 24 GB          | GE            | IB            | 192              | 384 GB        |
+----------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+
| **c82gluster** | Dell       | C8220      | 4          | 16                | 256 GB         | GE            | IB            | 32               | 1024 GB       |
+----------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+

Ces clusters partagent exactement la même image de système, :ref:`Sidus <sidusdoc>` (pour Single Instance Distributing Universal System), un système complet Debian intégrant tous les paquets scientifiques ainsi que de nombreux paquets de développement.

Accès aux clusters
------------------

L'accès aux clusters se fait via la passerelle `cocyte.cbp.ens-lyon.fr`, par le protocole SSH :

.. code-block:: bash

  ssh -X <login>@cocyte.cbp.ens-lyon.fr

ou via `x2go <http://wiki.x2go.org/doku.php>`_ sur la même adresse. Il est donc préalablement nécessaire d'installer sur sa machine un client SSH ou x2go pour accéder à la passerelle.

En outre, cette passerelle n'est accessible que de l'intérieur de l'ENS : il est nécessaire de passer par la passerelle de l'ENS `ssh.ens-lyon.fr` ou par le Virtual Private Network par OpenVPN pour y accéder.

Notons que l'outil x2go permet de paramétrer directement la passerelle `ssh.ens-lyon.fr` et d'obtenir directement le bureau graphique.

Dossiers personnels
-------------------

Sur la passerelle `cocyte`, chaque utilisateur dispose de 5 espaces de travail :
  
* un **personnel cluster** dans `/home/<login>`
* un **personnel CBP** dans `/cbp/<login>`
* un **projets** dans `/projects`
* un :it-bold:`temporaire` **rapide** dans `/scratch`
* un :it-bold:`temporaire` **très rapide** dans `/distonet`

L'espace **personnel CBP** correspond à l'espace utilisateur de ressources informatiques du CBP lorsqu'on se connecte :
  
* Toute machine de `Cloud@CBP <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_ notamment :
  * aux 22 stations de travail de la salle de formation du CBP
  * aux 13 stations de travail de la salle de formation du département de biologie

Paramétrage de l'accès aux grappes de calcul
--------------------------------------------

* Création d'une clé publique par `ssh-keygen -t rsa` dans mot de passe 
* Pression 2 fois sur la touche `<Entrée>` pour entrer un mot de passe vide
* La commande précédente présente une sortie comparable à la suivante :

.. code-block:: bash

  Generating public/private rsa key pair.
  Enter file in which to save the key (/home/<MonLogin>/.ssh/id_rsa): 
  Enter passphrase (empty for no passphrase): 
  Enter same passphrase again: 
  Your identification has been saved in /home/<MonLogin>/.ssh/id_rsa.
  Your public key has been saved in /home/<MonLogin>/.ssh/id_rsa.pub.
  The key fingerprint is:
  9b:96:69:95:29:0e:0e:ff:a8:77:ce:ca:c5:3b:92:55 <MonLogin>@lethe
  The key's randomart image is:
  +---[RSA 2048]----+
  |                 |
  | . .             |
  |. . .            |
  |.    .E    o     |
  |. . o.. S +      |
  | . =.o o B       |
  |   o* . O        |
  |  o+.. o         |
  |  ....           |
  +-----------------+

* Copie de la clé publique comme clé d'autorisation de connexion sans mot de passe :

.. code-block:: bash
  
  cd $HOME/.ssh
  cat id_rsa.pub >> authorized_keys

* Test de connexion locale : 

.. code-block:: bash
  
  ssh cocyte

Normalement, on se connecte sans avoir à entrer un quelconque mot de passe.

Accès aux ressources
--------------------

L'utilisation de `SLURM <https://computing.llnl.gov/linux/slurm/>`_ permet de :

* connaître les ressources disponibles : commande `sinfo` et ses options
* connaître l'état des calculs en cours : commande `squeue` et ses options
* lancer une réservation de machines en mode interactif : commande `srun` et ses options
* lancer un calcul autonome (sous forme de batch) : commande `sbatch` et ses options

Ce `résumé sur Slurm <https://slurm.schedmd.com/pdfs/summary.pdf>`_ reprend les commandes importantes.

Connaître les ressources disponibles
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La commande `sinfo` permet de connaître l'état des noeuds gérés par le gestionnaire de tâches.

.. code-block:: bash

  PARTITION  AVAIL  TIMELIMIT  NODES  STATE NODELIST
  r422          up   infinite      6  drain r422node[3-4,33,52,56,59]
  r422          up   infinite      1    mix r422node34
  r422          up   infinite     12  alloc r422node[1-2,53-55,57-58,60-64]
  r422          up   infinite     45   idle r422node[5-32,35-51]
  r410          up   infinite     48  down* r410node[1-48]
  c82gluster    up   infinite      4   idle c82gluster[1-4]
  s92*          up   infinite     12   idle s92node[1-12]

La colonne `STATE` renseigne sur l'état des machines. Par exemple :

* les noeuds du cluster **r410** sont tous éteints
* les noeuds **r422node3** ou **r422node59** sont indisponibles à l'usage
* les noeuds du cluster **s92** de **s92node1** à **s92node12** sont disponibles
* les noeuds **r422node1** ou **r422node64** sont utilisés pour des calculs

Connaître l'état des calculs en cours squeue
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Pour connaître l'état général
"""""""""""""""""""""""""""""

.. code-block:: bash
  
  squeue

Lancer un calcul autonome (mode batch)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Il est possible de lancer un batch en précisant les paramètres de soumission dans la commande en ligne mais il est de toutes façons nécessaire de créer un script shell.

Autant créer un script de lancement Slurm lequel sera utilisé pour déclarer tout d'un bloc.

Lancer un batch séquentiel
""""""""""""""""""""""""""

Le propre d'un programme séquentiel est que les commandes s'exécutent les unes derrière les autres. Dans le "vocable" de calcul scientifique, le *job séquentiel* s'exécute sur une machine et une seule, les tâches les unes à la suite des autres.

Nous voulons exécuter le programme séquentiel `HelloWorld` sur une des machines de la zone cluster du CBP.

Nous voulons que le nom de fichiers de sortie soit préfixés de `HelloWorld`.

Le lancement de batch se fait par :

.. code-block:: bash
  
  sbatch HelloWorld.slurm

Le script de batch `MyJob.slurm` est le suivant :

.. code-block:: bash

  #!/bin/bash

  srun date
  srun echo "Hello world!"
  srun date

Le lancement de batch se fait par :

.. code-block:: bash
  
  sbatch HelloWorld.slurm

Il est possible de préciser dans le script de lancement de nombreuses informations notamment :

* le nom des sorties du terminal `STDOUT` et `STDERR`
* l'adresse de courriel d'expédition de message
* les ressources nécessaires à l'exécution
* l'usage exclusif d'une ressource (par exemple un noeud)

L'ordonnanceur **slurm** dispose de centaines d'options pour paramétrer sa requête.

Le script de batch `MyJob.slurm` est le suivant :

.. code-block:: bash

  #!/bin/bash
  #
  # Definition du nom du job, apparaissant dans la colonne NAME avec squeue : facultatif
  #SBATCH --job-name=HelloWorld
  # Definition du fichier de sortie (stdout) 
  #SBATCH --output=HelloWorld.out
  # Definition du fichier de sortie des erreurs (stderr)
  #
  # Avec exclusive, le noeud est reserve dans sa totalite
  #SBATCH --exclusive
  # 
  #SBATCH --mail-type=END
  #SBATCH --mail-user=mon.nom@mon-site.mon-pays

  srun date
  srun echo "Hello world!"
  srun date

.. container:: note note-important

  Suite de la documentation en construction</note>

Réservation de ressources
"""""""""""""""""""""""""

Pour l'instant, la réservation de ressources n'est possible que sur les noeuds, les coeurs et la mémoire sur les clusters du CBP.

Voici un exemple de soumission slurm pour réserver un total de 64 coeurs sur un unique noeud

Lancer un batch parallèle sur plusieurs coeurs
""""""""""""""""""""""""""""""""""""""""""""""

Nous voulons exécuter le programme parallélisée `MyJob` sur 48 coeurs sur une machine de la queue **s92**.

Nous voulons que le nom de fichiers de de sortie soit préfixés de `MyJob`.

Nous créons le script suivant sous le nom (très original) de `MyJob.slurm` :

.. code-block:: bash

  .

Le programme se lance en utilisant la commande de soumission `sbatch ./MyJob.slurm`.

La commande d'examen des tâches en cours `squeue` permet ensuite de savoir que le job a bien été pris en compte.

Lancer un batch parallèle
"""""""""""""""""""""""""

Nous voulons exécuter le programme MPI `MyJob` sur 32 coeurs sur la queue des x41z.

Nous voulons que le nom de fichiers de de sortie soit préfixés de `MyJob`.

Nous créons le script suivant sous le nom (très original) de `MyJob.slurm` :

.. code-block:: bash

  .

Le programme se lance en utilisant la commande de soumission `sbatch ./MyJob.slurm`.

La commande d'examen des tâches en cours `squeue` permet ensuite de savoir que le job a bien été pris en compte.

