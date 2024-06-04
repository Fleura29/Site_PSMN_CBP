.. _smolu:

SMOLU ou la coagulation de petits solides en agrégats
=====================================================

.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/sentenceembeddings2021.png
        :class: img-fluid
        :alt: Image sentenceembeddings2021

    .. container::

        **Guillaume Laibe (CRAL, ENS-Lyon), Maxime Lombart (CRAL, ENS-Lyon),** |br|
        **Benoit Commerçon (CRAL, ENS-Lyon),** |br|
        **Timothee Davis-Clery (CRAL- ENS-Lyon)** |br|
        **Portage GPU : Emmanuel Quémener (CBP, ENS-Lyon)**

On retrouve le processus de coagulation de petits solides en agrégats plus gros dans la physique des nuages et des aérosols, dans les problèmes de combustion, de croissance de protéines, de fabrication du café solube… et bien sûr au centre de la formation des planètes. Comment des solides de taille micronique issus du milieu interstellaire peuvent-ils croître sur 30 ordres de grandeurs en moins d’un million d’années ? Attaquer ce problème par le biais de simulations numériques globales requiert le déploiement d'une nouvelle génération d’algorithmes de coagulation ultra-performants sur les architectures émergentes de calcul, poussées à leur capacités maximales.

Ce défi fait l’objet d'une collaboration entre le Centre de Recherche Astrophysique de Lyon et le Centre Blaise Pascal. L’algorithme de coagulation repose sur une méthode de Galerkine Discontinue (Lombart est Laibe 2020), et est implémenté comme une librairie versatile et portable. Plusieurs questions sont au coeur de l’étude :

* la précision conditionne-t-elle une utilisation optimale architectures GPU ? Si oui, comment adapter l’algorithme de coagulation en conséquence ?
* quels sont les leviers pour optimiser les performances du calculateurs sur des calcul-types de longs polynômes ?
* quelle carte graphique offre les meilleures performances, et dans quelle mesure cela conditionne-t-il les futurs développements de l’algorithme ?
* quel langage offre le meilleur compromis performance/versatilité ?

L’objectif est clair: optimiser et paralleliser ce module brut afin de pouvoir réaliser les premières simulations mondiales 3D de formation planétaire incluant l’équation de coagulation.

Ce projet est financé par le projet ERC CoG PODCAST No 864965, le projet Horizon 2020 RISE Dustbusters Marie Skłodowska-Curie No 823823 et le projet Idex Lyon Turbullet ( nANR-16-IDEX-0005).

Contribution du CBP
-------------------

Le Centre Blaise Pascal met à disposition toute son infrastructure de développement sur GPU et du temps ingénieur de Emmanuel Quemener pour le portage du code sur GPU.
