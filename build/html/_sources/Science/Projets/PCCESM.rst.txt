.. _pccesm:

Portage du code CESM sur le calculateur du CINES (OCCIGEN)
==========================================================

.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/cesm.png
        :class: img-fluid
        :alt: Image cesm

    .. container::

        Freddy Bouchet et Francesco Ragone (du Laboratoire de Physique) |br|
        Centre Blaise Pascal : Cerasela Calugaru

Dans ce travail il s’agit d’un modèle de climat global développé et maintenu par le National Center for Atmospheric Research (NCAR) et qui est d’une grande complexité car il prend en compte de façon couplée un nombre important de phénomènes et d’échelles physico-chimiques. Cette complexité se retrouve aussi au niveau de l’implémentation informatique, car le code nécessite un nombre important de prérequis (système d’exploitation, système de batch, bibliothèques et outils ne fonctionnant que dans des conditions très strictes au niveau de la compatibilité entre les versions).
Ce travail consiste a réaliser le portage du code CESM (the Community Earth System Model) sur la plateforme OCCIGEN du Centre informatique National de l’Enseignement Supérieur (CINES) installée à Montpellier. 

Contribution du CBP
-------------------

Le travail du l'expert CBP consiste à parcourir les divers étapes du portage, pour bien maitriser l’installation du code et les tests de fonctionnement, d’abord sur l’environnement le plus familier (celui du PSMN), puis au centre de calcul PMCS2I (qui présente un environnement plus proche de celui de CINES, tout en étant facilement accessible) et enfin sur le calculateur cible OCCIGEN, en s’assurant de la reproductibilité des résultats obtenus.
