.. _pkdgrav3:

:ref:`Retour aux travaux pratiques <gpu2019>`

Compilation de PKDGRAV3
=======================

Une intégration non reproductible, dans le temps ou l'espace
------------------------------------------------------------

Au 27 novembre 2018, la compilation de ``PKDGRAV3`` se déroule sans difficulté, dès lors que le compilateur est compatible avec l'environnement CUDA. Seuls les compilateurs GNU 4.9 permettent d'obtenir un exécutable. 

Par contre, lors de l'exécution, les choses se corsent : sur la version du 27 novembre, seules les cartes Tesla fonctionnent avec l'exemple, dès lors qu'elles sont bien pointées par la variable ``CUDA_VISIBLE_DEVICES``. En effet, PKDGRAV3 n'est pas multi-gpu : s'il détecte plusieurs périphériques Nvidia à l'exécution, il plante avec le message suivant :

.. code-block:: bash

    cudaSetDevice error 10 in /local/root/INSA/dpotter-pkdgrav3-f156bcc06373/cudautil.cu(219)
    invalid device ordinal

Aucune des cartes RTX, GTX ou Quadro ne permettent son exécution avec un message d'erreur à rendre perplexe le plus aguerri des intégrateurs :-/ . La sortie offre une bordée d'injures :

.. code-block:: bash

    Caught signal 11 at address (nil)
    Frame  0: ../build/pkdgrav3() [0x4a58af]
    Frame  1: ../build/pkdgrav3() [0x4a5a31]
    Frame  2: /lib/x86_64-linux-gnu/libpthread.so.0(+0x110c0) [0x2ac2ba61e0c0]
    Frame  3: ../build/pkdgrav3(pkdGenerateIC+0x2117) [0x46ebb7]
    Frame  4: ../build/pkdgrav3(pltGenerateIC+0x1a1) [0x470031]
    Frame  5: ../build/pkdgrav3(mdlHandler+0x8a) [0x4afd5a]
    Frame  6: ../build/pkdgrav3(main_ch+0x83) [0x4151b3]
    Frame  7: ../build/pkdgrav3() [0x4af7bf]
    Frame  8: /lib/x86_64-linux-gnu/libpthread.so.0(+0x7494) [0x2ac2ba614494]
    Frame  9: /lib/x86_64-linux-gnu/libc.so.6(clone+0x3f) [0x2ac2bcff5acf]

A ce jour, la seule version fonctionnelle pour toutes les cartes à disposition est la version du 8 octobre 2018. Heureusement, nous avions une archive que nous allons exploiter.

PKDGRAV3 est un exemple de programme GPUfié mais en développement tel qu'il n'est pas possible d'en assuré un suivi opérationnel.

Compilation d'une version fonctionnelle
---------------------------------------

La recette pour compiler PKDGRAV3  ur du Debian Stretch 9.0 est la suivante :

- Définition de la variable TIME pour la métrologie : 

.. code-block:: bash
    
    export TIME=$(cat '/etc/time_command.cfg')

- Création du dossier utilisateur :

.. code-block:: bash
    
    mkdir -p /local/$USER

- Placement dans le dossier créé :

.. code-block:: bash
    
    cd /local/$USER

- Récupération du source 

.. code-block:: bash
    
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/pkdgrav-20181008.tgz

- Expansion de l'archive : 

.. code-block:: bash
    
    tar xzf pkdgrav-20181008.tgz

- Passage dans le dossier de l'archive : 

.. code-block:: bash

    cd pkdgrav-20181008

- Création d'une variable positionnant la racine du source : 

.. code-block:: bash
    
    export PKDGRAV3=$PWD

- Création d'un dossier de construction : 

.. code-block:: bash
    
    mkdir build

- Passage dans le dossier de construction :

.. code-block:: bash
    
    cd build

- Construction des tâches de compilation : 

.. code-block:: bash
    
    CC=gcc-4.9 CXX=g++-4.9 cmake ..

- Compilation du programme en mode parallèle : 

.. code-block:: bash
    
    make -j 16 > pkdgrav3-Compile-$(date "+%Y%m%d-%H%M") 2>&1

Exécution de l'exemple fourni dans l'environnement du CBP
---------------------------------------------------------

- Déplacement dans le dossier d'exemples : 

.. code-block:: bash
    
    cd $PKDGRAV3/examples

- Lancement de l'exemple sur GPU : 

.. code-block:: bash
    
    /usr/bin/time ../build/pkdgrav3 cosmology.par > cosmology-$(date "+%Y%m%d-%H%M%S").out 2>&1

- Préparation du lancement sur CPU : 

.. code-block:: bash
    
    rm .lockfile example.*

- Lancement de l'exemple sur CPU : 

.. code-block:: bash
    
    /usr/bin/time ../build/pkdgrav3 -cqs 0 cosmology.par > cosmology-$(date "+%Y%m%d-%H%M%S").out 2>&1

Les deux fichiers de sortie en ``*.out`` donnent les informations sur les exécutions et la métrologie associée. Un ``grep`` sur le mot ``Elapsed`` extrait les temps d'exécution sur GPU et CPU.


