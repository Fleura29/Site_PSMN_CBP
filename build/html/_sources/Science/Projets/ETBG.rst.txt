.. _etbg:

Ecoulements turbulents bidimensionnels et géophysiques
======================================================

.. role:: underline
    :class: underline


.. image:: ../../_static/img_projets/freddy1.png
    :class: img-float pe-2
    :width: 120px
    :alt: Image freddy1

Coordination : Freddy Bouchet

Partenaires : Tomás Tangarife, Cezare Nardini, Antoine Venaille 

Expert analyse numérique et calcul scientifique : Cerasela Calugaru  

Dans ce travail on s'interesse à l'étude de l’équation barotrope 2D avec un forçage aléatoire (bruit gaussien décorrélé en temps et corrélé en espace). Un code de simulation est développé par T. Tangarife dans le cadre de sa thèse.

Contribution of PSMN/CBP
------------------------

:underline:`Optimisation :`

* profilage du code dans son ensemble 
* choix optimal du compilateur (GNU g++ vs. Intel icpc)
* choix du meilleur niveau d'optimisation (au niveau des options de compilation) : le gain de temps CPU a été considérable (code 6 fois plus rapide tout en gardant la même précision)
* choix optimal de la version de Blitz (paquet système Debian ou source - version 2012 ou la dernière version stable construite avec les compilateurs GNU ou Intel)
* alternatives pour la construction du générateur de nombres aléatoires (Blitz / MKL) 
* améliorer le modèle de programmation (définir un seul RNG pour l'ensemble de pas de temps au lieu d'un RNG à chaque pas de temps) 
* formation aux membres du projet à l’utilisation des systèmes de gestion de versions (svn)

:underline:`Validation (et vérification) :`

* le travail est aussi orienté vers la validation du code en définissant un jeu de tests et des cas de référence pour vérifier l’aptitude du code à approximer les divers termes intervenant dans l’équation. 

.. container:: text-center
    
    .. image:: ../../_static/img_projets/freddy2.png
        :class: img-fluid
        :alt: Image freddy2

* Nous sommes très reconnaissants pour les ressources informatiques et en calcul scientifique fournis par le PSMN. 



