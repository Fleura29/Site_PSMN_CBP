.. _instagaussian:

Installation de Gaussian sous Debian Squeeze (et Ubuntu)
========================================================

.. |br| raw:: html

   <br>

.. container:: note note-imp
    
    Cette documentation s'applique à Gaussian 09 version A01.

Introduction
------------

`Gaussian <http://www.gaussian.com/>`_  est un outil largement utilisé par la communauté scientifique des chimistes, ce malgré la large contreverse concernant une licence effroyablement restrictive d'utilisation. Pour en juger, il suffit de se renseigner sur la communauté `Banned By Gaussian <http://www.bannedbygaussian.org/>`_, toujours croissante.

Malgré cela, comme certains ne peuvent manifestement pas se passer de cet outil, pourquoi ne pas tenter de l'offrir dans les conditions les plus "ouvertes" possibles, c'est à dire sur le socle logiciel le plus OpenSource possible : une distribution GNU/Linux avec des outils de compilation libres.

Gaussian précise des `conditions de compilation très restrictives <http://www.gaussian.com/g09_plat.htm>`_, exigeant l'usage du compilateur PGI (sur plate-forme AMD64), lequel consitue un coût caché dont nos institutions pourraient se passer si d'aventure Gaussian "compilait" avec GFortran et surtout "fonctionnait" ensuite.

Tout individu s'étant risqué dans la compilation de Gaussian sait ce que signifie le compiler et le faire fonctionner : un rude chemin de croix où chaque arrêt équivaut à un virage dissimulant le virage suivant, de longues et multiples compilations pour en arriver à des exécutions, qui, parfois, fonctionnent : il arrive que "Gaussian" tombe en marche pour le chanceux débutant...

Les notes qui vont suivre permettent pas à pas, moyennant des opérations assez lourdes (patcher un code propriétaire directement n'est pas une étape anodine), de récupérer un Gaussian fonctionnel...

.. container:: note note-imp

    En construction : pour l'instant, seule la version 64 bits (soit amd64 chez Debian) a été validée. Elle semble opérationnelle pour les versions Debian Lenny et Squeeze et les versions 10.04 et 10.10 de Ubuntu.

Pour son utilisation, vous pouvez consulter le `"pied à l'étrier" <http://www.cbp.ens-lyon.fr/emmanuel.quemener/dokuwiki/doku.php?id=tools4test>`_ rédigé pour les applications scientifiques installées dans le cadre de la formation Atosim.

#. Installation de quelques paquets Debian et leurs dépendances :

.. container:: border-dashed

    # Installation du compilateur, des libraries OpenMP, Atlas/BLAS, tcsh |br|
    sudo apt-get install gfortran libgomp1 libatlas-base-dev tcsh patch

#. Configuration de l'environnement des sources à compiler :

    * il est supposé que le CDROM des sources de Gaussian09 est monté sur /media/cdrom
    * le répertoire d'installation par défaut est /opt
    * les sources sont extraites du fichier TGZ
    * par défaut, il vaut mieux utiliser le CSH pour la compilation :

.. container:: border-dashed

    tcsh |br|
    setenv basedir "/media/cdrom/" |br|
    setenv g09root "/opt" |br|
    cd $g09root |br|
    gunzip -c $basedir/tar/\*.tgz | tar xvf -

#. Récupération du *patch* et son application pour compiler avec GFortran :

.. container:: border-dashed

    cd g09 |br|
    # pour une distribution Debian Squeeze sous 64 bits :  |br|
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/Gaussian/g09.squeeze64 |br|
    # pour une distribution Ubuntu 10.04 sous 64 bits :  |br|
    # wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/Gaussian/g09.ubuntu64-1004 |br|
    # pour une distribution Ubuntu 10.10 sous 64 bits :  |br|
    # wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/Gaussian/g09.ubuntu64-1010 |br|

    # pour une distribution Debian Squeeze sous 32 bits (nouveau !) :  |br|
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/Gaussian/g09.squeeze32 |br|

    # La ligne suivante s'applique a la version pour la Debian Squeeze 64 bits |br|
    patch -p 1 -i ./g09.squeeze64

* La sortie doit présenter les lignes suivantes :

.. container:: border-dashed

    patching file bsd/i386.make |br|
    patching file bsd/mdutil.c |br|
    patching file bsd/mdutil.F |br|
    patching file bsd/set-mflags

#. Préparation de la compilation et lancement :

.. container:: border-dashed

    ./bsd/install |br|
    source $g09root/g09/bsd/g09.login |br|
    bsd/bldg09

#. Positionnement des droits pour toute l'arborescence (ici, tous les utilisateurs du groupe users ont accès) : 

.. container:: border-dashed
    
    chown -R root.users .

Test des compilations
---------------------

Par défaut, le source de Gaussian comprend les résultats de tests sur architecture IA64 dans le dossier $g09root/g09/tests/ia64.

Pour exécuter tous les tests, voici la commande 

.. container:: border-dashed

    # A rajouter à la fin de son .bashrc |br|
    export g09root=/opt |br|
    export GAUSS_SCRDIR=/tmp |br|
    . $g09root/g09/bsd/g09.profile

Lancement de tous les tests :

.. container:: border-dashed

    mkdir $HOME/Gaussian |br|
    cp $g09root/g09/tests/com/test\*[0-9][0-9].com $HOME/Gaussian |br|
    cd $HOME/Gaussian |br|
    i=0 |br|
    while [ $i -le 919 ] |br|
    do |br|
    if [ -f test$(printf "%03d" $i).com ]; then |br|
    time g09 test$(printf "%03d" $i).com 2> test$(printf "%03d" $i).time |br|
    fi |br|
    i=$(($i+1)) |br|
    done

Commandes annexes
-----------------

Pour établir les patchs à appliquer par rapport à l'archive de sources originelle, la commande suivante a été utilisée :

.. container:: border-dashed
    
    diff -crB g09 g09.work > g09.squeeze64
