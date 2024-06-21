.. _logAquasol:

Logiciel AquaSol
================

.. image:: ../../../_static/Réalisations/figureaquasol.png
    :class: img-float pe-2
    :alt: Image figureaquasol

* **Contact** :  Cerasela Calugaru, Ralf Everaers, Sam Meyer 
* **Objectif** : Optimisation (nouveaux algorithmes, parallélisation), implémentation des nouvelles fonctionnalités, analyse du comportement numérique et informatique du code AquaSol

Le logiciel AquaSol, (développé par Patrice Koehl & Marc Delarue, `AquaSol <http://lorentz.immstr.pasteur.fr/aquasol/aquasol_submission.php>`_) permet la modélisation de l'environnement ionique autour de biomacromolécules, en utilisant une extension récente de la théorie de Poisson-Boltzmann (modèle Dipolar Poisson-Boltzmann-Langevin).

`«Grid projection techniques for modelling fixed charges in Poisson-Boltzmann solvers» <http://smai.emath.fr/canum2014/resumesPDF/CCalugaru/Abstract.pdf>`_ 

**Développements au CBP :** 

Notre objectif principal est l’application de ce code pour des diverses géométries et configurations des charges, comme les oligomères d'ADN, puis les nucléosomes. Cela nécessite plusieurs développements dans les directions suivantes : 

* :ref:`Analyse du comportement numérique et informatique du code <acnicaqua>`

* :ref:`Tests de performance sur des différentes plateformes <tpdpaqua>`

* :ref:`Implémentation de nouvelles fonctionnalites <infaqua>`

* :ref:`Optimisation des méthodes d’approximation numérique déjà implémentées. Mise en œuvre d’autres méthodes et de nouveaux algorithmes de discrétisation <omani>`