.. _gromacsgpuexec:

Compilation et exécution du programme Gromacs en mode GPU
=========================================================

:ref:`Retour aux travaux pratiques <gpu2019>`

Exécution de l'exemple exploité par Nvidia dans l'environnement du CBP
----------------------------------------------------------------------

#. Création du dossier de tests à la date du jour : 

.. code-block:: bash
    
    mkdir -p /local/$USER/tests-$(date "+%Y%m%d")

#. Placement dans le dossier créé :  

.. code-block:: bash

    cd /local/$USER/tests-$(date "+%Y%m%d")

#. Récupération des entrées Gromacs pour le test : 

.. code-block:: bash

    wget ftp://ftp.gromacs.org/pub/benchmarks/water_GMX50_bare.tar.gz

#. Expansion de l'archive récupérée :  

.. code-block:: bash

    tar xzf water_GMX50_bare.tar.gz

#. Passage dans le dossier de paramètres :  

.. code-block:: bash

    cd water-cut1.0_GMX50_bare/1536

#. Paramétrage de l'environnement :  

.. code-block:: bash

    source $GMXINSTALL/bin/GMXRC

#. Lancement de l'exemple sur GPU :

    - Initialisation de GROMACS :  

    .. code-block:: bash

        $GMXINSTALL/bin/gmx grompp -f pme.mdp

    - Lancement du calcul sur GPU :  

    .. code-block:: bash

        /usr/bin/time $GMXINSTALL/bin/gmx mdrun -resethway -noconfout -nsteps 4000 -v -gpu_id 0 >$(echo $PWD | tr '/' '_')_$(date "+%Y%m%d-%H%M").out 2>&1

#. Lancement du code sur CPU :

    - Effacement des fichiers créés par la simulation sur GPU : 

    .. code-block:: bash

        find . -mtime -1 | grep -v $(echo $PWD | tr "/" "_") | grep '/' | xargs -I '{}' rm '{}'

    - Initialisation de GROMACS :  

    .. code-block:: bash

        $GMXINSTALL/bin/gmx grompp -f pme.mdp

    - Lancement du calcul sur GPU :  

    .. code-block:: bash

        /usr/bin/time $GMXINSTALL/bin/gmx mdrun -resethway -noconfout -nsteps 4000 -v -nb cpu >$(echo $PWD | tr '/' '_')_$(date "+%Y%m%d-%H%M").out 2>&1

Les deux fichiers de sortie en ``*.out`` donnent les informations sur les exécutions et la métrologie associée. Un ``grep`` sur le mot ``Elapsed`` extrait les temps d'exécution sur GPU et CPU.
