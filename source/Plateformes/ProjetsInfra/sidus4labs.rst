.. _sidus4labs:

* :ref:`Projets d'infrastructure <projinfra>`

Sidus4Labs@ISA
==============
 
.. image:: ../../_static/img_projets/logo_isa.png
    :width: 110px
    :class: img-float pe-2
    :alt: Logo isa

Bénéficiaires : Jean-Marc Lancelin (ISA), Olivier Walker (ISA)

Maîtrise d'oeuvre : Emmanuel Quemener, CBP, ENS-Lyon

Projet 
------

L'objectif est de fournir le premier environnement :ref:`Sidus <sidusdoc>` "clé en main" à destination des laboratoires : Sidus4Labs. Avant le déploiement de Sidus4Labs, l'infrastructure sera largement consolidée et remaniée :

* réutilisation de noeuds de cluster SGI vieillissant et leur serveur
* consolidation des noeuds existants par addition de mémoire vive, d'une carte InfiniBand et de disques durs
* consolidation du serveur par le changement des processeurs, l'addition de mémoire et de disques durs
* addition de 3 noeuds déclassés Sunfire x4150 du PSMN équipés de 32GB de RAM
* addition d'un commutateur InfiniBand
* installation d'un serveur hôte au système durci sous `Linux Debian <http://www.debian.org>`_ avec un socle de stockage `ZFSonLinux <http://www.zfsonlinux.org>`_
* intégration de Sidus4Labs dans une machine virtuelle

L'exploitation de l'environnement sera assurée par :
  
* une administration simplifiée de la grappe de calcul par l'administration d'une machine virtuelle maître 
* un accès en console par SSH 
* un accès à un bureau graphique par `x2go <http://www.x2go.org>`_
* un accès simplifié aux données des utilisateurs par SMB
* un gestionnaire de tâches `slurm <https://computing.llnl.gov/linux/slurm/>`_

Contribution du Centre Blaise Pascal à ce projet
------------------------------------------------

Le Centre Blaise Pascal réalise :

* la fourniture et l'installation des composants de consolidation et d'extension

    * 2 processeurs, 44 barrettes de mémoire, 12 cartes Infiniband, 24 disques durs de 160GB à 500GB
    * 1 commutateur InfiniBand 12 ports
    * 3 noeuds Sunfire X4150 avec 32 GB sans disque
    * les câbles Ethernet et Infiniband
    * les câbles d'alimentation électrique
* la requalification et le paramétrage matériel du équipements existants
* l'installation de Sidus4Labs et son adaptation
* la création d'un scratch GlusterFS sur InfiniBand distribué sur les noeuds
* l'intégration de programmes spécifiques : VMD, Gromacs, ...

