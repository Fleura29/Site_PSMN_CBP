.. _instagaussianwheezy:

Installation de Gaussian sous Debian Wheezy
===========================================

.. container:: note note-important

    Modification le 5 février 2014 : compilation de la version G09 D01. 

Introduction
------------

`Gaussian <http://www.gaussian.com/>`_  est un outil largement utilisé par la communauté scientifique des chimistes, ce malgré la large contreverse concernant une licence effroyablement restrictive d'utilisation. Pour en juger, il suffit de se renseigner sur la communauté `Banned By Gaussian <http://www.bannedbygaussian.org/>`_, toujours croissante.

Malgré cela, comme certains ne peuvent manifestement pas se passer de cet outil, pourquoi ne pas tenter de l'offrir dans les conditions les plus "ouvertes" possibles, c'est à dire sur le socle logiciel le plus OpenSource possible : une distribution GNU/Linux avec des outils de compilation libres.

Gaussian précise des `conditions de compilation très restrictives <http://www.gaussian.com/g09_plat.htm>`_, exigeant l'usage du compilateur PGI (sur plate-forme AMD64), lequel consitue un coût caché dont nos institutions pourraient se passer si d'aventure Gaussian "compilait" avec GFortran et surtout "fonctionnait" ensuite.

Tout individu s'étant risqué dans la compilation de Gaussian sait ce que signifie le compiler et le faire fonctionner : un rude chemin de croix où chaque arrêt équivaut à un virage dissimulant le virage suivant, de longues et multiples compilations pour en arriver à des exécutions, qui, parfois, fonctionnent : il arrive que "Gaussian" tombe en marche pour le chanceux débutant...

Les notes qui vont suivre permettent pas à pas, moyennant des opérations assez lourdes (patcher un code propriétaire directement n'est pas une étape anodine), de récupérer un Gaussian fonctionnel...

Pour son utilisation, vous pouvez consulter le `"pied à l'étrier" <http://www.cbp.ens-lyon.fr/emmanuel.quemener/dokuwiki/doku.php?id=tools4test>`_ rédigé pour les applications scientifiques installées dans le cadre de la formation Atosim.

\1. Installation de quelques paquets Debian et leurs dépendances :

.. code-block:: bash

    # Installation du compilateur, des libraries OpenMP, Atlas/BLAS, tcsh 
    sudo apt-get install gfortran libgomp1 libatlas-base-dev tcsh patch 
    # Cette commande est INDISPENSABLE, sinon le CSH par defaut fait planter la compilation 
    sudo update-alternatives --set csh /bin/tcsh

\2. Configuration de l'environnement des sources à compiler :

    * il est supposé que le CDROM des sources de Gaussian09 est monté sur /media/cdrom
    * le répertoire d'installation par défaut est /opt
    * les sources sont extraites du fichier TGZ
    * par défaut, il faut utiliser le CSH pour la compilation :

.. code-block:: bash

    tcsh 
    setenv basedir "/media/cdrom/" 
    setenv g09root "/opt" 
    cd $g09root 
    gunzip -c $basedir/tar/\*.tgz | tar xvf -

\3. Récupération du *patch* et son application pour compiler avec GFortran :

.. code-block:: bash

    cd g09 
    # pour une distribution Debian Squeeze sous 64 bits :  
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/Gaussian/g09.wheezy64

    # La ligne suivante s'applique a la version pour la Debian Squeeze 64 bits 
    patch -p 1 -i ./g09.wheezy64

* La sortie doit présenter les lignes suivantes :

.. code-block:: bash

    patching file bsd/i386.make 
    patching file bsd/mdutil.c 
    patching file bsd/mdutil.F 
    patching file bsd/set-mflags 

\4. Préparation de la compilation et lancement :

.. code-block:: bash

    cd $g09root/g09 
    ./bsd/install 
    source $g09root/g09/bsd/g09.login 
    # Compilation 
    bsd/bldg09 >& $g09root/g09/build-`date "+%Y%m%d%H%M"`

\5. Positionnement des droits pour toute l'arborescence (ici, tous les utilisateurs du groupe users ont accès) : 

.. code-block:: bash
    
    chown -R root.users .

Test des compilations
---------------------

Par défaut, le source de Gaussian comprend les résultats de tests sur architecture IA64 dans le dossier $g09root/g09/tests/ia64.

Pour exécuter tous les tests, voici la commande 

.. code-block:: bash

    # A rajouter à la fin de son .bashrc 
    export g09root=/opt 
    export GAUSS_SCRDIR=/tmp 
    . $g09root/g09/bsd/g09.profile

Lancement de tous les tests :

.. code-block:: bash

    mkdir $HOME/Gaussian 
    cp $g09root/g09/tests/com/test*[0-9][0-9].com $HOME/Gaussian 
    cd $HOME/Gaussian 
    i=0 
    while [ $i -le 1044 ] 
    do 
    if [ -f test$(printf "%04d" $i).com ]; then 
    { /usr/bin/time g09 test$(printf "%04d" $i).com ; } 2> test$(printf "%04d" $i).time 
    fi 
    i=$(($i+1)) 
    done

Commandes annexes
-----------------

Pour établir les patchs à appliquer par rapport à l'archive de sources originelle, la commande suivante a été utilisée :

.. code-block:: bash
    
    diff -crB g09 g09.work > g09.wheezy64
