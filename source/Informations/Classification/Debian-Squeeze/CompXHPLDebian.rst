.. _compxhpldebian:

Compilation de XHPL sous Debian
===============================

.. |br| raw:: html

   <br>

.. container:: note note-important

    Pour utiliser xHPL, mieux vaut directement aller sur le projet de la forge du CBP dédiée : https://forge.cbp.ens-lyon.fr/redmine/projects/hpl4all

Introduction
------------

Le logiciel `hpl <http://www.netlib.org/benchmark/hpl/>`_ est une implémentation du fameux Linpack utilisé pour estimer la puissance des machines, notamment pour le `classement Top500 <www.top500.org>`_ des machines les plus puissantes de la planète.

La dernière version, la `2.0 <http://www.netlib.org/benchmark/hpl/hpl-2.0.tar.gz>`_ date du 10 septembre 2008 : 

.. container:: border-dashed

    wget http://www.netlib.org/benchmark/hpl/hpl-2.0.tar.gz


Installation des prérequis
--------------------------

Comme le veut la tradition, le système "souche" sera une Linux Debian, version Lenny (5.0.3).

Les librairies suivantes seront utilisées :

* ensemble Atlas pour les librairies d'algèbre linéaire
* ensemble OpenMPI pour la distribution des calculs sur les noeuds

.. container:: border-dashed

    sudo apt-get install gcc gfortran |br|
    sudo apt-get install openmpi-bin openmpi-common libopenmpi-dev |br|
    # Sur une architecture i386 |br|
    sudo apt-get install libatlas-test libatlas3gf-base libatlas-headers libatlas-base-dev libatlas-sse2-dev libatlas3gf-sse2 |br|
    # Sur une architecture amd64 |br|
    sudo apt-get install libatlas-test libatlas3gf-base libatlas-headers libatlas-base-dev

Compilation
-----------

* Préparation de l'archive : (plutôt à la racine de l'utilisateur)

.. container:: border-dashed

    cd $HOME |br|
    wget http://www.netlib.org/benchmark/hpl/hpl-2.0.tar.gz |br|
    tar xzf hpl-2.0.tar.gz |br|
    ln -s hpl-2.0 hpl |br|
    cd hpl

* Compilation : 
    
    * la phase de compilation est assez hardue : elle consiste à créer son propre *MakeFile*, sous la forme d'un Make.MonMakefileAMoi

    * étant donné que, en informatique, il faut savoir être fainéant, avant, vous pouviez récupérer les *Makefile* d'une `page perso de Orange <http://pagesperso-orange.fr/klhpc/tutoriels/hpl/>`_ maintenant disparue. Vous pouvez cependant en récupérer les sauvegardes : 

.. container:: border-dashed

    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/HPL/Make.Debian_BLAS_gm |br|
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/HPL/Make.Debian_CBLAS_gm |br|
    wget http://www.cbp.ens-lyon.fr/emmanuel.quemener/software/HPL/Make.Debian_FBLAS_gm


* importer ces documents et les placer à la racine de HPL : 

.. container:: border-dashed

    mv Make.Debian_* $HOME/hpl

* compiler les différents *Makefile* : 

.. container:: border-dashed

    make arch=Debian_BLAS_gm |br|
    make arch=Debian_CBLAS_gm |br|
    make arch=Debian_FBLAS_gm 

Exécution des benchs
--------------------

Les exécutables ainsi compilés se trouvent dans $HOME/hpl/bin

Pour les exécuter, trois opérations :

A. se déplacer dans l'un des répertoires, au choix :

.. container:: border-dashed

    cd $HOME/hpl/bin/Debian_BLAS_gm |br|
    cd $HOME/hpl/bin/Debian_CBLAS_gm |br|
    cd $HOME/hpl/bin/Debian_FBLAS_gm

B. paramétrer le fichier de configuration HPL.dat : 

.. container:: border-dashed

    HPLinpack benchmark input file |br|
    Innovative Computing Laboratory, University of Tennessee |br|
    HPL.out      output file name (if any) |br|
    file         device out (6=stdout,7=stderr,file) |br|
    1            # of problems sizes (N) |br|
    2560         Ns |br|
    1            # of NBs |br|
    256          NBs |br|
    0            PMAP process mapping (0=Row-,1=Column-major) |br|
    1            # of process grids (P x Q) |br|
    1            Ps |br|
    2            Qs |br|
    -16.0        threshold |br|
    3            # of panel fact |br|
    0 1 2        PFACTs (0=left, 1=Crout, 2=Right) |br|
    2            # of recursive stopping criterium |br|
    2 4          NBMINs (>= 1) |br|
    1            # of panels in recursion |br|
    2            NDIVs |br|
    3            # of recursive panel fact. |br|
    0 1 2        RFACTs (0=left, 1=Crout, 2=Right) |br|
    1            # of broadcast |br|
    0            BCASTs (0=1rg,1=1rM,2=2rg,3=2rM,4=Lng,5=LnM) |br|
    1            # of lookahead depth |br|
    0            DEPTHs (>=0) |br|
    2            SWAP (0=bin-exch,1=long,2=mix) |br|
    64           swapping threshold |br|
    0            L1 in (0=transposed,1=no-transposed) form |br|
    0            U  in (0=transposed,1=no-transposed) form |br|
    1            Equilibration (0=no,1=yes) |br|
    16           memory alignment in double (> 0)

C. Lancer le bench :

.. container:: border-dashed

    orterun -np 2 ./xhpl

* en sortie, même si les résultats sont consignés dans un fichier HPL.out, on obtient :

.. container:: border-dashed

    \================================================================================  |br|
    HPLinpack 2.0  --  High-Performance Linpack benchmark  --   September 10, 2008 |br|
    Written by A. Petitet and R. Clint Whaley,  Innovative Computing Laboratory, UTK |br|
    Modified by Piotr Luszczek, Innovative Computing Laboratory, UTK |br|
    Modified by Julien Langou, University of Colorado Denver |br|
    \================================================================================ 

    An explanation of the input/output parameters follows: |br|
    T/V    : Wall time / encoded variant. |br|
    N      : The order of the coefficient matrix A. |br|
    NB     : The partitioning blocking factor. |br|
    P      : The number of process rows. |br|
    Q      : The number of process columns. |br|
    Time   : Time in seconds to solve the linear system. |br|
    Gflops : Rate of execution for solving the linear system. |br|

    The following parameter values will be used:

    N      :    2560  |br|
    NB     :     256  |br|
    PMAP   : Row-major process mapping |br|
    P      :       1  |br|
    Q      :       2  |br|
    PFACT  :    Left    Crout    Right  |br|
    NBMIN  :       2        4 |br| 
    NDIV   :       2  |br|
    RFACT  :    Left    Crout    Right  |br|
    BCAST  :   1ring  |br|
    DEPTH  :       0  |br|
    SWAP   : Mix (threshold = 64) |br|
    L1     : transposed form |br|
    U      : transposed form |br|
    EQUIL  : yes |br|
    ALIGN  : 16 double precision words |br|

    \================================================================================ |br|
    T/V                N    NB     P     Q               Time                 Gflops |br|
    \-------------------------------------------------------------------------------- |br|
    WR00L2L2        2560   256     1     2               4.29              2.612e+00 |br|
    WR00L2L4        2560   256     1     2               4.23              2.648e+00 |br|
    WR00L2C2        2560   256     1     2               4.26              2.628e+00 |br|
    WR00L2C4        2560   256     1     2               4.22              2.652e+00 |br|
    WR00L2R2        2560   256     1     2               4.24              2.638e+00 |br|
    WR00L2R4        2560   256     1     2               4.23              2.643e+00 |br|
    WR00C2L2        2560   256     1     2               4.26              2.630e+00 |br|
    WR00C2L4        2560   256     1     2               4.24              2.642e+00 |br|
    WR00C2C2        2560   256     1     2               4.25              2.637e+00 |br|
    WR00C2C4        2560   256     1     2               4.24              2.639e+00 |br|
    WR00C2R2        2560   256     1     2               4.26              2.631e+00 |br|
    WR00C2R4        2560   256     1     2               4.22              2.655e+00 |br|
    WR00R2L2        2560   256     1     2               4.26              2.629e+00 |br|
    WR00R2L4        2560   256     1     2               4.21              2.656e+00 |br|
    WR00R2C2        2560   256     1     2               4.26              2.628e+00 |br|
    WR00R2C4        2560   256     1     2               4.21              2.660e+00 |br|
    WR00R2R2        2560   256     1     2               4.23              2.646e+00 |br|
    WR00R2R4        2560   256     1     2               4.23              2.645e+00 |br|
    \================================================================================

    Finished     18 tests with the following results: |br| 
                18 tests completed without checking, |br|
                0 tests skipped because of illegal input values. |br|
    -------------------------------------------------------------------------------- |br|

    End of Tests. |br|
    \================================================================================ 

* on remarque que ce vieux Pentium 4 HT a une puissance de 2.6 GFps
* les résultats sont comparables en BLAS, CBLAS et FBLAS

Références
----------

* http://wiki.generation-debian.org/doku.php/bench
* http://pagesperso-orange.fr/klhpc/tutoriels/hpl/
