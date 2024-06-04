.. _sibcp2:

Développement d’une bibliothèque parallèle dans le domaine de la biologie cellulaire et du traitement d’images
==============================================================================================================

.. container:: d-flex mb-3

    .. image:: ../../_static/img_projets/stage_rdp.png
        :class: img-fluid
        :alt: Image stage_rdp

    .. container::

        Coordination : Cerasela Calugaru et Annamaria Kiss

        Etudiante stagiaire : Typhaine Moreau

One of the main issues of quantitative imaging is the correct cellular level segmentation of 3D images of plant tissues, issued from confocal microscopy. The basic segmentation methods we use, are watershed combined with the level set method. The goal of the internship is to optimise and give an efficient implementation of the level set method.

Therefore, the student is invited to 

* study the used image analysis methods,
* review the optimization and parallelizing techniques, applicable on the used level set segmentation
* implement the method in C++, using the optimal parallelizing technique
* deliver the implementation as a plugin to existing computing platforms

* :ref:`Level Set Method <lsm>`
* :ref:`Anisotropic Blur <ipab>`

Publication : « Segmentation of 3D images of plant tissues at multiple scales using the level set method »,  Kiss A, Moreau T, Mirabet V, Calugaru C. I, Boudaoud A & Das P,  \\ 
Plant Methods, 2017 Dec 21; 13, 114, https://doi.org/10.1186/s13007-017-0264-5

Contribution of CBP
-------------------

* Etude du code d’origine (écrit en Python), et une évaluation préliminaire du coût de la réécriture du code en C++, de son optimisation et parallélisation 
* Adaptation du code pour permettre la prise en compte du format de fichier .tif
* Expertise et adaptation du code pour utilisation sur de différents plateformes et architectures
* Expertise au choix des méthodes numériques, programmation dans le cadre du projet
* Formation et soutien à la parallélisation avec OpenMP de codes des calcul développés 
* Utilisation des ressources logistiques et informatiques (bureau, salle de réunion, salle des terminaux, etc.)
* Expertise au choix de la licence pour le nouveau logiciel écrit dans le cadre du projet
* Adaptation du code pour permettre des options supplémentaires 
* Corrections de bogues pour améliorer la fiabilité du programme dans certains cas test
* Nous sommes très reconnaissants pour les ressources informatiques fournis par le PSMN.