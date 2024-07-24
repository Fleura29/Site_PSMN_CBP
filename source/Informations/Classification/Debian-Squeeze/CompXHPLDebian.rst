.. _compxhpldebian:

Compilation de XHPL sous Debian
===============================

.. container:: note note-important

    Pour utiliser xHPL, mieux vaut directement aller sur le projet de la forge du CBP dédiée : https://forge.cbp.ens-lyon.fr/redmine/projects/hpl4all

Introduction
------------

Le logiciel `hpl <http://www.netlib.org/benchmark/hpl/>`_ est une implémentation du fameux Linpack utilisé pour estimer la puissance des machines, notamment pour le `classement Top500 <www.top500.org>`_ des machines les plus puissantes de la planète.

La dernière version, la `2.0 <http://www.netlib.org/benchmark/hpl/hpl-2.0.tar.gz>`_ date du 10 septembre 2008 : 

.. code-block:: bash

    wget http://www.netlib.org/benchmark/hpl/hpl-2.0.tar.gz

Installation des prérequis
--------------------------

Comme le veut la tradition, le système "souche" sera une Linux Debian, version Lenny (5.0.3).

Les librairies suivantes seront utilisées :

* ensemble Atlas pour les librairies d'algèbre linéaire
* ensemble OpenMPI pour la distribution des calculs sur les noeuds

.. code-block:: bash

    sudo apt-get install gcc gfortran 
    sudo apt-get install openmpi-bin openmpi-common libopenmpi-dev 
    # Sur une architecture i386 
    sudo apt-get install libatlas-test libatlas3gf-base libatlas-headers libatlas-base-dev libatlas-sse2-dev libatlas3gf-sse2 
    # Sur une architecture amd64 
    sudo apt-get install libatlas-test libatlas3gf-base libatlas-headers libatlas-base-dev

Compilation
-----------

* Préparation de l'archive : (plutôt à la racine de l'utilisateur)

.. code-block:: bash

    cd $HOME 
    wget http://www.netlib.org/benchmark/hpl/hpl-2.0.tar.gz 
    tar xzf hpl-2.0.tar.gz 
    ln -s hpl-2.0 hpl 
    cd hpl

* Compilation : 
    
    * la phase de compilation est assez hardue : elle consiste à créer son propre *MakeFile*, sous la forme d'un Make.MonMakefileAMoi
    * étant donné que, en informatique, il faut savoir être fainéant, avant, vous pouviez récupérer les *Makefile* d'une `page perso de Orange <http://pagesperso-orange.fr/klhpc/tutoriels/hpl/>`_ maintenant disparue. Vous pouvez cependant en récupérer les sauvegardes : 

.. code-block:: bash

    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/HPL/Make.Debian_BLAS_gm 
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/HPL/Make.Debian_CBLAS_gm 
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/HPL/Make.Debian_FBLAS_gm

* importer ces documents et les placer à la racine de HPL : 

.. code-block:: bash

    mv Make.Debian_* $HOME/hpl

* compiler les différents *Makefile* : 

.. code-block:: bash

    make arch=Debian_BLAS_gm 
    make arch=Debian_CBLAS_gm 
    make arch=Debian_FBLAS_gm 

Exécution des benchs
--------------------

Les exécutables ainsi compilés se trouvent dans $HOME/hpl/bin

Pour les exécuter, trois opérations :

A. se déplacer dans l'un des répertoires, au choix :

.. code-block:: bash

    cd $HOME/hpl/bin/Debian_BLAS_gm 
    cd $HOME/hpl/bin/Debian_CBLAS_gm 
    cd $HOME/hpl/bin/Debian_FBLAS_gm

B. paramétrer le fichier de configuration HPL.dat : 

.. code-block:: bash

    HPLinpack benchmark input file 
    Innovative Computing Laboratory, University of Tennessee 
    HPL.out      output file name (if any) 
    file         device out (6=stdout,7=stderr,file) 
    1            # of problems sizes (N) 
    2560         Ns 
    1            # of NBs 
    256          NBs 
    0            PMAP process mapping (0=Row-,1=Column-major) 
    1            # of process grids (P x Q) 
    1            Ps 
    2            Qs 
    -16.0        threshold 
    3            # of panel fact 
    0 1 2        PFACTs (0=left, 1=Crout, 2=Right) 
    2            # of recursive stopping criterium 
    2 4          NBMINs (>= 1) 
    1            # of panels in recursion 
    2            NDIVs 
    3            # of recursive panel fact. 
    0 1 2        RFACTs (0=left, 1=Crout, 2=Right) 
    1            # of broadcast 
    0            BCASTs (0=1rg,1=1rM,2=2rg,3=2rM,4=Lng,5=LnM) 
    1            # of lookahead depth 
    0            DEPTHs (>=0) 
    2            SWAP (0=bin-exch,1=long,2=mix) 
    64           swapping threshold 
    0            L1 in (0=transposed,1=no-transposed) form 
    0            U  in (0=transposed,1=no-transposed) form 
    1            Equilibration (0=no,1=yes) 
    16           memory alignment in double (> 0)

C. Lancer le bench :

.. code-block:: bash

    orterun -np 2 ./xhpl

* en sortie, même si les résultats sont consignés dans un fichier HPL.out, on obtient :

.. code-block:: bash

    \================================================================================  
    HPLinpack 2.0  --  High-Performance Linpack benchmark  --   September 10, 2008 
    Written by A. Petitet and R. Clint Whaley,  Innovative Computing Laboratory, UTK 
    Modified by Piotr Luszczek, Innovative Computing Laboratory, UTK 
    Modified by Julien Langou, University of Colorado Denver 
    \================================================================================ 

    An explanation of the input/output parameters follows: 
    T/V    : Wall time / encoded variant. 
    N      : The order of the coefficient matrix A. 
    NB     : The partitioning blocking factor. 
    P      : The number of process rows. 
    Q      : The number of process columns. 
    Time   : Time in seconds to solve the linear system. 
    Gflops : Rate of execution for solving the linear system. 

    The following parameter values will be used:

    N      :    2560  
    NB     :     256  
    PMAP   : Row-major process mapping 
    P      :       1  
    Q      :       2  
    PFACT  :    Left    Crout    Right  
    NBMIN  :       2        4  
    NDIV   :       2  
    RFACT  :    Left    Crout    Right  
    BCAST  :   1ring  
    DEPTH  :       0  
    SWAP   : Mix (threshold = 64) 
    L1     : transposed form 
    U      : transposed form 
    EQUIL  : yes 
    ALIGN  : 16 double precision words 

    \================================================================================ 
    T/V                N    NB     P     Q               Time                 Gflops 
    \-------------------------------------------------------------------------------- 
    WR00L2L2        2560   256     1     2               4.29              2.612e+00 
    WR00L2L4        2560   256     1     2               4.23              2.648e+00 
    WR00L2C2        2560   256     1     2               4.26              2.628e+00 
    WR00L2C4        2560   256     1     2               4.22              2.652e+00 
    WR00L2R2        2560   256     1     2               4.24              2.638e+00 
    WR00L2R4        2560   256     1     2               4.23              2.643e+00 
    WR00C2L2        2560   256     1     2               4.26              2.630e+00 
    WR00C2L4        2560   256     1     2               4.24              2.642e+00 
    WR00C2C2        2560   256     1     2               4.25              2.637e+00 
    WR00C2C4        2560   256     1     2               4.24              2.639e+00 
    WR00C2R2        2560   256     1     2               4.26              2.631e+00 
    WR00C2R4        2560   256     1     2               4.22              2.655e+00 
    WR00R2L2        2560   256     1     2               4.26              2.629e+00 
    WR00R2L4        2560   256     1     2               4.21              2.656e+00 
    WR00R2C2        2560   256     1     2               4.26              2.628e+00 
    WR00R2C4        2560   256     1     2               4.21              2.660e+00 
    WR00R2R2        2560   256     1     2               4.23              2.646e+00 
    WR00R2R4        2560   256     1     2               4.23              2.645e+00 
    \================================================================================

    Finished     18 tests with the following results:  
                18 tests completed without checking, 
                0 tests skipped because of illegal input values. 
    -------------------------------------------------------------------------------- 

    End of Tests. 
    \================================================================================ 

* on remarque que ce vieux Pentium 4 HT a une puissance de 2.6 GFps
* les résultats sont comparables en BLAS, CBLAS et FBLAS

Références
----------

* http://wiki.generation-debian.org/doku.php/bench
* http://pagesperso-orange.fr/klhpc/tutoriels/hpl/
