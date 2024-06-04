.. _acnicaqua:

Analyse du comportement numérique et informatique du code AquaSol
=================================================================

.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/figureaquasol.png
        :class: img-fluid img-float
        :alt: Image figureaquasol

    .. container::

        * **Contact** : Cerasela Calugaru, Ralf Everaers, Sam Meyer |br|
        * **Objectif** : Optimisation (nouveaux algorithmes, parallélisation), implémentation des nouvelles fonctionnalités, analyse du comportement numérique et informatique du code AquaSol

.. container:: mb-3
    
    .. image:: ../../_static/img_projets/comparaisondpblnumanaphiderivord2log.png
        :class: img-fluid img-float
        :alt: Image comparaisondpblnumanaphiderivord2log

    .. container::

        ➢	**Cas mono atomique - comparaison avec des solutions analytiques**

        Parmi les équations aux dérivées partielles de type Poisson-Boltzmann présentant des solutions analytiques, le choix s’est porté sur le cas particulier du problème de Poisson. Nous avons adapté notre problème pour pouvoir être traité par ce modèle académique et nous avons implémenté dans le code la solution analytique. Cette solution construite afin de la comparer avec la solution numérique fournie par AquaSol, cette comparaison nécessitant une organisation adaptée des données, leur suivi et l’utilisation d’outils de visualisation (gnuplot). Cette étude a été menée afin de conclure sur la fiabilité et la robustesse mathématique et numérique des résultats de simulations effectuées avec AquaSol. 

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/dist_phys.png
        :class: img-fluid img-float
        :alt: Image dist_phys

    .. container::

        ➢	**Cas bi atomique**
 
        Après l’étude des modalités de prise en compte de ce cas par AquaSol, des simulations nous ont permis d’analyser les résultats obtenus pour diverses configurations et d’en tirer plusieurs aspects. Entre autres, nous avons discuté de l’influence de la distance entre les deux atomes sur les énergies de solvatation.

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/evolutionresidue.png
        :class: img-fluid img-float
        :alt: Image evolutionresidue

    .. container::

        ➢	**Cas multi atomique**
  
        Pour une configuration AGTC (754 atomes), nous avons étudié l’utilisation des ressources (temps CPU, mémoire RAM) et la convergence numérique (évolution du résidu aux cours des itérations, nombre d’itérations Newton) en fonction du raffinement du maillage (2^N+1 points en chaque direction de l’espace, N=6, 7, 8, 9). Au regard des estimations théoriques, les résultats obtenus ont été analysés par l’équipe locale et présentés aux autres membres du projet ANR.

➢	**Comparaison avec d’autres codes**
 
Parmi d’autres approches existantes pour résoudre les problèmes de dynamique moléculaire, l’équipe locale s’est intéressée au logiciel Amber et nous avons comparé les résultats obtenus par AquaSol avec ceux fournis par Amber. Pour la visualisation des solutions 3D (format OpenDX) obtenus avec AquaSol, on a utilisé le logiciel VMD. On a également utilisé ce logiciel pour transformer des fichiers issus d’Amber (format .trj) en cartes 3D d’isovaleurs pour les ions. 

➢	**L’étude du modèle de Born et d’une molécule AGTC (de 760 atomes)**, ainsi que la **comparaison avec des résultats expérimentaux** a été effectuée et présentée dans un congrès. On s’est intéressé notamment au calcul de l’énergie de solvatation issue de divers modèles (Poisson, PB, DPBL) et aux méthodes de projection de charges fixes. L’étude se poursuit avec l’analyse des interactions des deux molécules en fonction de leur distance et leur position relative et un article est en cours de rédaction. 

Congrès : CANUM 2014 (31 mars-4 avril 2014): `«Grid projection techniques for modelling fixed charges in Poisson-Boltzmann solvers» <http://smai.emath.fr/canum2014/resumesPDF/CCalugaru/Abstract.pdf>`_