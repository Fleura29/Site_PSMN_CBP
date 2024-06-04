.. _simueauglace:

Simulations hautes performances des écoulements océaniques et des interactions eau-glace sur Terre ainsi qu'au sein des lunes de glace
======================================================================================================================================

.. |br| raw:: html

   <br>

.. container:: d-flex pb-2

    .. image:: ../../_static/img_projets/cbp_ens.jpeg
        :alt: Logo CBP

    .. container::

        Chercheurs : Louis-Alexandre Couston, Clément de la Salle (ENS de Lyon) |br|
        Expert analyse numérique et calcul scientifique : Cerasela Calugaru (représentant CBP/PSMN) 
        
Le projet de recherche ci-dessus nécessite la réalisation de calculs massivement parallèles des équations de Navier-Stokes. 

Le code retenu est le code open-source Dedalus (https://dedalus-project.org/), qui est un module python utilisant openMPI et FFTW. Il est possible d'optimiser Dedalus sur un cluster en privilégiant une installation/utilisation basée sur les compilers/openmpi/fftw les plus performants du système. N'ayant pas l'expertise requise pour m'assurer de cette bonne optimisation, je serais très enthousiaste à l'idée de pouvoir échanger avec une experte du psmn/cbp sur ce sujet. Cerasela Calugaru a déjà apporté une aide précieuse en ce sens permettant une première utilisation de Dedalus sur le psmn. Il peut être noté que Dedalus est un code flexible permettant la résolution d'une grande gamme de problèmes basés sur des équations différentielles (BVP, EVP, IVP), qui pourrait être amené à être utilisé massivement pour la recherche et l'enseignement par, par exemple, le LPH, CRAL et LGLTPE. 

Merci d'avance |br| 
Louis Couston

Contribution du CBP
-------------------

* Expertise dans l'optimisation et le calculs massivement parallèles des équations de Navier-Stokes
