.. _clustgridcbp:

Utilisation du Cluster (et GridEngine) au Centre Blaise Pascal
==============================================================

.. container:: note note-imp

    Avant de lancer votre calcul, ayez un aperçu de l'`état des noeuds <http://styx.cbp.ens-lyon.fr/ganglia/?r=hour&c=Nodes>`_ (site accessible seulement sur site)

Ce qu'il faut retenir !
-----------------------

* pour se connecter sur la passerelle de cluster : 

.. code-block:: bash
    
    ssh <login>@lethe.cbp.ens-lyon.fr

* pour connaître les noeuds disponibles : `qhost`
* pour connaître l'état des tâches : `qstat`
* pour connaître la listes des queues : `qconf -sql`
* pour lancer une tâche définie par le script GridEngine `MyJob.qsub` : `qsub MyJob.qsub`

Introduction
------------

Le Centre Blaise Pascal dispose de plateaux techniques, notamment  des noeuds de clusters, destinés :

* à l'initiation au calcul scientifique, notamment `MPI <http://en.wikipedia.org/wiki/Message_Passing_Interface>`_, `OpenMP <http://en.wikipedia.org/wiki/OpenMP>`_, `CUDA <http://en.wikipedia.org/wiki/CUDA>`_ `OpenCL <http://en.wikipedia.org/wiki/Opencl>`_
* au développement d'applications dans le domaine du calcul scientifique
* à l'intégration de démonstrateurs agrégeant des technologies matures dans un ensemble original
* au passage de l'expérience scientifique ("la paillasse") à la technologie de production ("le génie des procédés")
* à l'exploration de "domaine de vol" des applications scientifiques (paramètres de parallélisation, audit de code)
* à la réalisation de prototypes pour la mise en place de nouveaux services informatiques

Le Centre Blaise Pascal n'a pas vocation à voir ses infrastructures utilisées :

* pour de longs calculs de production (de l'ordre de la semaine)
* pour des calculs sur de très grands nombres de coeurs (de l'ordre du millier)

Pour ces deux exigences, le `PSMN dispose d'une infrastructure de production <#>`_.

Les équipements mis à disposition derrière le soumissionneur GridEngine se composent de 166 noeuds dans 8 groupes différents pour un total de 1416 coeurs et 6016 Go de RAM.

Sur les 52 noeuds R410 arrivés entre le printemps 2014 et l'automne 2015, tous sont disponibles via le gestionnaire GridEngine.

+-------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+
| **Cluster** | **Marque** | **Modèle** | **Noeuds** | **Coeurs /Noeud** | **RAM /Noeud** | **Réseau GE** | **Réseau IB** | **Total Coeurs** | **Total RAM** |
+=============+============+============+============+===================+================+===============+===============+==================+===============+
| **r410qdr** | Dell       | R410       | 32         | 8                 |  24 Go         | GE            | IB QDR        | 256              | 1536 Go       |
+-------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+
| **r410ddr** | Dell       | R410       | 4          | 8                 |  24 Go         | GE            | IB DDR        | 32               | 96 Go         |
+-------------+------------+------------+------------+-------------------+----------------+---------------+---------------+------------------+---------------+

Ces clusters partagent exactement la même image de système, `Sidus <#>`_ (pour Single Instance Distributing Universal System), un système complet Debian intégrant tous les paquets scientifiques ainsi que de nombreux paquets de développement.

Accès aux clusters
------------------

L'accès aux clusters se fait via la passerelle `lethe.cbp.ens-lyon.fr`, par le protocole SSH :

.. code-block:: bash

    ssh -X <login>@lethe.cbp.ens-lyon.fr
    
ou via `x2go <http://wiki.x2go.org/doku.php>`_ sur la même adresse. Il est donc préalablement nécessaire d'installer sur sa machine un client SSH ou x2go pour accéder à la passerelle.

En outre, cette passerelle n'est accessible que de l'intérieur de l'ENS : il est nécessaire de passer par la passerelle de l'ENS `ssh.ens-lyon.fr` ou par le Virtual Private Network par OpenVPN pour y accéder.

Notons que l'outil x2go permet de paramétrer directement la passerelle `ssh.ens-lyon.fr` et d'obtenir directement le bureau graphique.

Dossiers personnels 
-------------------

Sur la passerelle `lethe`, chaque utilisateur dispose de 4 espaces utilisateurs :

* un local dans `/home/<login>`
* un général dans `/cbp/<login>`
* un rapide dans `/scratch`
* un projet dans `/projects`

Le second, `/cbp/<login>/` correspond à l'espace utilisateur de ressources informatiques du CBP lorsqu'il se connecte :

* aux 28 stations de travail de la salle libre service
* à la station graphique 3D de la petite salle de réunion
* aux machines à la demande SIDUS (Single Instance Distributing Universal System)
* aux serveurs d'intégration, de compilation, de tests 
    * sous différentes architectures matérielles : x86_64, AMD64, ARM, (PowerPC, Sparc)
    * sous différents systèmes 32 bits ou 64 bits
    * sous différentes distributions Debian : Lenny, Squeeze, Wheezy, Jessie et Sid

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
    cp id_rsa.pub authorized_keys

* Test de connexion locale : 

.. code-block:: bash 
    
    ssh lethe

Accès aux ressources
--------------------

L'utilisation de `GridEngine <http://gridscheduler.sourceforge.net/>`_ permet de :

* connaître les ressources disponibles : commande `qhost` et ses options
* connaître l'état des calculs en cours : commande `qstat` et ses options
* lancer un calcul autonome (sous forme de batch) : commande `qsub` et ses options

Connaître les ressources disponibles
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La commande `qhost` permet de connaître l'état des noeuds gérés par le gestionnaire de tâches. Chaque ressource représente un coeur. Il existe donc plus entrées par noeud.

"qhost" pour toute l'infrastructure
"""""""""""""""""""""""""""""""""""

La commande  fournit en sortie :

.. code-block:: bash 

    HOSTNAME                ARCH         NCPU  LOAD  MEMTOT  MEMUSE  SWAPTO  SWAPUS
    -------------------------------------------------------------------------------
    global                  -               -     -       -       -       -       -
    c6100gpu-1.cluster.zone lx26-amd64     24     -   47.3G       -     0.0       -
    ... <snip><snip>
    c6100gpu-4.cluster.zone lx26-amd64     24     -   47.3G       -     0.0       -
    lethe.cluster.zone      lx26-amd64      4  0.31   15.7G    3.0G   17.2G    2.9M
    r410node1.cluster.zone  lx26-amd64     16     -   23.6G       -     0.0       -
    ... <snip><snip>
    r410node9.cluster.zone  lx26-amd64     16  0.01   23.6G  303.9M     0.0     0.0
    x41z1.cluster.zone      lx26-amd64      8     -   31.5G       -     0.0       -
    ... <snip><snip>
    x41z9.cluster.zone      lx26-amd64      8  2.16   13.7G  286.5M     0.0     0.0
    </code>

"qhost <noeud>" pour un noeud unique
""""""""""""""""""""""""""""""""""""

Par exemple, la commande `qhost x41z7.cluster.zone` pour examiner les ressources offertes par le noeud **x41z7** sort :

.. code-block:: bash 

    HOSTNAME                ARCH         NCPU  LOAD  MEMTOT  MEMUSE  SWAPTO  SWAPUS
    -------------------------------------------------------------------------------
    global                  -               -     -       -       -       -       -
    x41z7.cluster.zone      lx26-amd64      8  0.05   31.5G  342.7M     0.0     0.0
    </code>

    Donc, le noeud x41z7 offre 8 CPU et une mémoire vive de 31.5 Go.

qconf pour lister toutes les grappes
""""""""""""""""""""""""""""""""""""

Pour lister toutes les grappes de calcul, on applique la commande `qconf -shgrpl` :

.. code-block:: bash 

    @c6100
    @r410
    @x41z

"qconf -shhrp @<grappe>" pour lister les noeuds d'une grappe particulière
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Pour lister les noeuds de la grappe **x41z**, on applique la commande `qconf -shgrp @x41z` :

.. code-block:: bash 

    group_name @x41z
    hostlist x41z1.cluster.zone x41z10.cluster.zone x41z11.cluster.zone \
            x41z12.cluster.zone x41z13.cluster.zone x41z14.cluster.zone \
            x41z15.cluster.zone x41z16.cluster.zone x41z2.cluster.zone \
            x41z3.cluster.zone x41z4.cluster.zone x41z5.cluster.zone \
            x41z6.cluster.zone x41z7.cluster.zone x41z8.cluster.zone \
            x41z9.cluster.zone

"qconf -sql" pour lister les queues de calcul
"""""""""""""""""""""""""""""""""""""""""""""

Pour lister toutes les queues, on applique la commande `qconf -sql` :

.. code-block:: bash 

    c6100
    r410
    x41z

"qconf -sq <Queue>" pour détailler une queue
""""""""""""""""""""""""""""""""""""""""""""

Pour lister toutes les queues, on applique la commande `qconf -sq x41z` :

.. code-block:: bash 

    qname                 x41z
    hostlist              @x41z
    seq_no                0
    load_thresholds       np_load_avg=1.75
    suspend_thresholds    NONE
    nsuspend              1
    suspend_interval      00:05:00
    priority              0
    min_cpu_interval      00:05:00
    processors            UNDEFINED
    qtype                 BATCH INTERACTIVE
    ckpt_list             NONE
    pe_list               sequential x41zhybrid
    rerun                 FALSE
    slots                 8
    tmpdir                /tmp
    shell                 /bin/bash
    prolog                NONE
    epilog                NONE
    shell_start_mode      posix_compliant
    starter_method        NONE
    suspend_method        NONE
    resume_method         NONE
    terminate_method      NONE
    notify                00:00:60
    owner_list            NONE
    user_lists            NONE
    xuser_lists           NONE
    subordinate_list      NONE
    complex_values        NONE
    projects              NONE
    xprojects             NONE
    calendar              NONE
    initial_state         default
    s_rt                  INFINITY
    h_rt                  INFINITY
    s_cpu                 INFINITY
    h_cpu                 INFINITY
    s_fsize               INFINITY
    h_fsize               INFINITY
    s_data                INFINITY
    h_data                INFINITY
    s_stack               INFINITY
    h_stack               INFINITY
    s_core                INFINITY
    h_core                INFINITY
    s_rss                 INFINITY
    h_rss                 INFINITY
    s_vmem                INFINITY
    h_vmem                INFINITY

"qconf -spl" pour lister tous les environnements parallèles
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Pour lister toutes les queues, on applique la commande `qconf -spl` :

.. code-block:: bash 

    r410hybrid
    sequential
    x41zhybrid

"qconf -sp <Environnement Parallèle>" pour détailler un environnement parallèle
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Pour lister toutes les queues, on applique la commande `qconf -sp x41zhybrid` :

.. code-block:: bash 

    pe_name            x41zhybrid
    slots              128
    user_lists         NONE
    xuser_lists        NONE
    start_proc_args    /bin/true
    stop_proc_args     /bin/true
    allocation_rule    8
    control_slaves     TRUE
    job_is_first_task  TRUE
    urgency_slots      min
    accounting_summary TRUE

Connaître l'état des calculs en cours qstat
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Pour connaître l'état général
"""""""""""""""""""""""""""""

.. code-block:: bash 
    
    qstat

Pour avoir l'information sur une tâche particulière
"""""""""""""""""""""""""""""""""""""""""""""""""""

Pour connaître toutes les informations sur la tâche 9, par exemple, `qstat -j 9`

.. code-block:: bash 

    .

On voit ainsi que la tâche a commencé le 5 février 2013 à 15h51 pour se terminer à 15h58 et qu'elle s'est exécutée sur 4 noeuds x41z.

Lancer un calcul autonome (mode batch)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Il est possible de lancer un batch en précisant les paramètres (queue, environnement parallèle, etc) mais il est nécessaire de toutes façons de créer un script shell.

Autant créer un script de lancement GridEngine lequel sera utilisé pour déclarer tout d'un bloc. 

Lancer un batch séquentiel
""""""""""""""""""""""""""

Le propre d'un programme séquentiel est qu'il ne peut pas se distribuer sur plusieurs noeuds.

Nous voulons exécuter le programme MPI `MyJob` sur 1 seul coeur, sur la queue des x41z.

Nous voulons que le nom de fichiers de de sortie soit préfixés de `MyJob`.

Le lancement de batch se fait par :

.. code-block:: bash 
    
    qsub MyJob.qsub

Le script de batch `MyJob.qsub` est le suivant :

.. code-block:: bash 

    # Nom du programme pour les sorties (sortie standard et sortie erreur Posix)
    #$ -N MyJob
    # Nom de la queue (ici, la queue des x41z)
    #$ -q x41z
    # Messages a expedier : il est expedie lorsqu'il demarre, termine ou avorte
    #$ -m bea
    # specify your email address
    #$ -M <prenom>.<nom>@ens-lyon.fr
    #$ -cwd
    #$ -V
    # Lancement du programme
    /usr/bin/time ./MyJob
    exit 0

Lancer un batch parallèle
"""""""""""""""""""""""""

Nous voulons exécuter le programme MPI `MyJob` sur 32 coeurs sur la queue des x41z.

Nous voulons que le nom de fichiers de de sortie soit préfixés de `MyJob`.

Nous créons le script suivant sous le nom (très original) de `MyJob.qsub` :

.. code-block:: bash 

    # Nom du programme pour les sorties (sortie standard et sortie erreur Posix)
    #$ -N MyJob
    # Nom de la queue (ici, la queue des x41z)
    #$ -q x41z
    # Nom de l'environnement parallèle avec le nombre de slots : x41zhybrid avec 32 ressources
    #$ -pe x41zhybrid 32
    # Messages a expedier : il est expedie lorsqu'il demarre, termine ou avorte
    #$ -m bea
    # Adresse electronique d'expedition
    #$ -M <prenom>.<nom>@ens-lyon.fr
    #$ -cwd
    #$ -V
    /usr/bin/time mpirun.openmpi -np 32 -mca btl self,openib,sm ./MyJob
    exit 0

Le programme se lance en utilisant la commande de soumission `qsub ./MyJob.qsub`.

La commande d'examen des tâches en cours `qstat` permet ensuite de savoir que le job a bien été pris en compte.

Récupérer les informations sur ses jobs exécutés
""""""""""""""""""""""""""""""""""""""""""""""""

Dans le fichier de batch (celui qui définit les commandes à exécuter avec la queue, l'environnement, etc...) apparait le paramètre préfixé de `-N`. Ce paramètre est très utile parce que, comme le précise les exemples ci-dessus, les sorties POSIX `stdout` et `stderr` sont sauvegardées dans ces fichiers.

Ainsi, en exécutant l'exemple ci-dessus, si son numéro de job était le 528491, les fichiers de sortie seraient les suivants :

* `MyJob.o528491` pour la sortie standard `stdout`, l'ensemble des messages du terminal
* `MyJob.e528491` pour l'erreur standard `stderr`, l'ensemble des messages en erreur du terminal

En fouillant dans ces fichiers, il est possible de voir l'évolution de l'exécution de son job et ses erreurs au besoin. 