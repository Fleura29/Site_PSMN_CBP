.. _cess:

Calcul de l’évolution spectrale d’une supernova 1A à double détonation avant son pic de luminosité à l’aide du code de transfert radiatif 1D CMFGEN
===================================================================================================================================================

.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/allegre2019.png
        :class: img-fluid
        :width: 200px
        :alt: Image allegre2019

    .. container::

        Allegre Jules (Physique, ENS-Lyon), Stéphane Blondin (Laboratoire Franco-Chilien d’Astronomie, CNRS), \\
        
        Centre Blaise Pascal : Emmanuel Quémener

Le calcul est réalisé sur un éjecta en expansion libre d’une supernova calculée à l’aide d’un code hydrodynamique 2D que nous avons redécoupé en six segments, à partir desquels nous avons construit six modèles 1D indépendants. Le but étant d’obtenir les spectres (intensité du rayonnement en fonction de la longueur d’onde) à chaque pas de temps de l’éjecta d’une supernova type 1A à double détonation et de les comparer à des modèles 1D, à des observations ainsi qu’à un modèle de transfert radiatif moins complexe.

Contribution du CBP
-------------------

Ce code nécessite une mémoire vive importante (10-15 Gb typiquement) et de tourner sur 8 CPU tout en étant contraint à 1 nœud, d’où la nécessité d’utiliser les ressources du CBP.