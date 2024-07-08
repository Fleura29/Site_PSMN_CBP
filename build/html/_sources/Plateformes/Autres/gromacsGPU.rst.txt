.. _gromacsgpu:

Compilation et exécution du programme Gromacs en mode GPU
=========================================================

:ref:`Retour aux travaux pratiques <insagpu2020>`

Compilation du programme dans l'environnement du CBP 
----------------------------------------------------

La recette pour compiler Gromacs  avec un support GPU sur du Debian Buster est la suivante :

#. Définition de la variable TIME pour la métrologie : 

    .. code-block:: bash
        
        export TIME=$(cat '/etc/time_command.cfg')

#. Création du dossier utilisateur : 

    .. code-block:: bash
        
        mkdir /local/$USER

#. Placement dans le dossier créé : 

    .. code-block:: bash
        
        cd /local/$USER

#. Récupération du source  

    .. code-block:: bash
        
        wget ftp://ftp.gromacs.org/pub/gromacs/gromacs-2019.3.tar.gz

#. Expansion de l'archive :  

    .. code-block:: bash
        
        tar xzf gromacs-2019.3.tar.gz

#. Définition d'une variable d'environnement pour ce dossier : 

    .. code-block:: bash
        
        export GMXSRC=$PWD/gromacs-2019.3

#. Création d'un dossier de construction :  

    .. code-block:: bash
        
        mkdir gromacs-2019.3_build

#. Définition d'une variable d'environnement pour ce dossier : 

    .. code-block:: bash
        
        export GMXBUILD=$PWD/gromacs-2019.3_build

#. Création d'un dossier d'installation :  

    .. code-block:: bash
        
        mkdir gromacs-2019.3_install

#. Définition d'une variable d'environnement pour ce dossier : 

    .. code-block:: bash
        
        export GMXINSTALL=$PWD/gromacs-2019.3_install

#. Déplacement dans le dossier de construction :  

    .. code-block:: bash
        
        cd $GMXBUILD

#. Définition des outils des compilation :  

    .. code-block:: bash
        
        export CC=/usr/bin/gcc-7
        export CXX=/usr/bin/g++-7
        export CPP=/usr/bin/cpp-7

#. Construction des tâches de compilation :  

    .. code-block:: bash
        
        cmake $GMXSRC -DGMX_OPENMP=ON -DGMX_GPU=ON -DGMX_BUILD_OWN_FFTW=ON -DGMX_MPI=on -DCMAKE_BUILD_TYPE=Release -DCMAKE_INSTALL_PREFIX=$GMXINSTALL

#. Compilation du programme en mode parallèle :  

    .. code-block:: bash
        
        make -j 16 > GMX-Compile-$(date "+%Y%m%d-%H%M") 2>&1

#. Exécution des tests :  

    .. code-block:: bash
        
        make check > GMX-Check-$(date "+%Y%m%d-%H%M") 2>&1 

#. Installation du programme et ses dépendances :  

    .. code-block:: bash
        
        make install > GMX-Install-$(date "+%Y%m%d-%H%M") 2>&1

Exécution de l'exemple exploité par Nvidia dans l'environnement du CBP
----------------------------------------------------------------------

#. Création du dossier de tests à la date du jour :   

    .. code-block:: bash
        
        mkdir -p /local/$USER/tests-$(date "+%Y%m%d")</code>

#. Placement dans le dossier créé :   

    .. code-block:: bash
        
        cd /local/$USER/tests-$(date "+%Y%m%d")</code>

#. Récupération des entrées Gromacs pour le test :  

    .. code-block:: bas
        
        hwget ftp://ftp.gromacs.org/pub/benchmarks/water_GMX50_bare.tar.gz</code>

#. Expansion de l'archive récupérée :   

    .. code-block:: bash
        
        tar xzf water_GMX50_bare.tar.gz</code>

#. Passage dans le dossier de paramètres :   

    .. code-block:: bash
        
        cd water-cut1.0_GMX50_bare/1536</code>

#. Paramétrage de l'environnement :   

    .. code-block:: bash
        
        source $GMXINSTALL/bin/GMXRC</code>

#. Lancement de l'exemple sur GPU :

    #. Initialisation de GROMACS :   

        .. code-block:: bash
        
            $GMXINSTALL/bin/gmx-mpi grompp -f pme.mdp</code>
    
    #. Lancement du calcul sur GPU :   

        .. code-block:: bash
        
            /usr/bin/time $GMXINSTALL/bin/gmx mdrun -resethway -noconfout -nsteps 4000 -v -gpu_id 0 >$(echo $PWD | tr '/' '_')_$(date "+%Y%m%d-%H%M").out 2>&1</code>

#. Lancement du code sur CPU :

    #. Effacement des fichiers créés par la simulation sur GPU :  

        .. code-block:: bash
            
            find . -mtime -1 | grep -v $(echo $PWD | tr "/" "_") | grep '/' | xargs -I '{}' rm '{}'</code>
    
    #. Initialisation de GROMACS :   

        .. code-block:: bash
            
            $GMXINSTALL/bin/gmx grompp -f pme.mdp</code>
    
    #. Lancement du calcul sur GPU :   

        .. code-block:: bash
        
            /usr/bin/time $GMXINSTALL/bin/gmx mdrun -resethway -noconfout -nsteps 4000 -v -nb cpu >$(echo $PWD | tr '/' '_')_$(date "+%Y%m%d-%H%M").out 2>&1</code>

Les deux fichiers de sortie en ``*.out`` donnent les informations sur les exécutions et la métrologie associée. Un ``grep`` sur le mot ``Elapsed`` extrait les temps d'exécution sur GPU et CPU.
