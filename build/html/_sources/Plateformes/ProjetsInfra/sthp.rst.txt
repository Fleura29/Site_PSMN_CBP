.. _sthp:

* :ref:`Projets d'infrastructure <projinfra>`

Equip\@Meso : stockage temporaire hautes performances
=====================================================

.. |br| raw:: html

   <br>
   
.. image:: ../../_static/img_projets/psmn.png
    :class: img-float pe-2
    :width: 150px
    :alt: Logo PSMN

Maîtrise d'oeuvre : Emmanuel Quemener, Centre Blaise Pascal, ENS-Lyon |br| |br| |br|

Projet
------

L'objectif est d'évaluer et proposer une solution de stockage haute performance. Des solutions existent dans les grands centres de calcul mais sont inadaptées au méso-centre de l'ENS-Lyon : elles sont soit trop onéreuses (GPFS, Panasas, ...) soit restrictives quant au noyau ou au système d'exploitation associés (Lustre). L'objectif est d'utiliser GlusterFS, déjà étudié par le CBP dans le cadre du projet DistoNet, pour offrir ce stockage temporaire haute performance.

Contribution du Centre Blaise Pascal à ce projet
------------------------------------------------

* qualification Debian sur Infiniband/Mellanox 4 (2011Q4)
* évaluation du socle de système de fichiers pour GlusterFS sur InfiniBand (2012Q3)
* évaluation du socle GlusterFS sur matériel récent (2013Q1)
* qualification des noeuds Dell C8220X pour GlusterFS (2013Q2)
