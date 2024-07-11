.. _python:

* :ref:`Tutoriels 2012 <tt2012>`

Formation Python
================

.. |br| raw:: html

   <br>
   
11 Juin - 15 Juin, 2012 |br|
Location: Salle de travaux pratiques (LR6 D 014), Centre Blaise Pascal, ENS de Lyon

Description et Objectifs scientifiques
--------------------------------------

L'observatoire de Lyon, la DR 7 du CNRS et la FLMSN organisent une formation Python la semaine du 11 au 15 juin dans la salle LR6 014, Centre Blaise Pascal, ENS de Lyon. \\
Elle débutera le lundi 11 juin à 14h et se terminera le vendredi 15 à 12h. L'idée de cette formation n'est pas de donner les bases du langage aux participants mais plutôt une idée plus claire sur la manière d'optimiser son code lorsque l'on utilise Numpy et Scipy, la manière de le distribuer et enfin comment visualiser de grosses données.

Le nombre de place est limité. Merci de vous inscrire (pour la semaine) auprès de Violaine Louvet (louvet (at)math.univ-lyon1.fr).

Konrad Hinsen
-------------

NumPy et distutils (1h)
~~~~~~~~~~~~~~~~~~~~~~~

* tester pour la présence de NumPy lors de l'installation
* trouver les headers pour vos modules compilés

Les tableaux NumPy vus de près 

* représentation d'un tableau dans la mémoire
* formats "C" et "Fortran"
* partage de l'espace données par plusieurs tableaux

TP lundi après-midi (0h30)
~~~~~~~~~~~~~~~~~~~~~~~~~~

* NumPy et distutils: packager un module qui utilise NumPy
* première exploration de la structure d'un tableau
  
Les tableaux NumPy vus de très près (1h) 

* principes d'interfaçage avec du code en C/C++/Fortran
* représentation au niveau C d'un tableau
* propriété de la mémoire
* interface "buffer"
* tableaux structurés

Techniques d'optimisation 

* opérations "en place"
* optimiser les accès mémoire

TP (2h) 
~~~~~~~

* exploiter la structure d'un tableau en Python
* interface "buffer"
* tableaux structurés
* optimisations

Loïc Gouarin
------------

Introduction au packaging et aux tests
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* Cours intro (1h)
* qu'est-ce qu'un package ?
* présentation de distutils
* écriture d'un premier setup.py
* introduction aux docstring
* tests unitaires

TP (30 min)
~~~~~~~~~~~

  * création d'un setup.py
  
Scipy (1h30)
~~~~~~~~~~~~

* présentation générale
* les modules existants
* les scikits
* optimisation

Packaging avancé 
~~~~~~~~~~~~~~~~

* Cours (1h)
* présentation du distutils de numpy
* création d'une distribution
* utilisation de packages ou de librairies externes
* un mot sur la génération de doc
* présentation de nose

TP (2h)
~~~~~~~

on essaiera de recoller tous les bouts des cours précédents.

Sylvain Faure
-------------

Utilisation de VTK (6h) (Cours + TP)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Motivations : quand utiliser VTK plutôt que des logiciels de
visualisation du type de Paraview, Visit, Ensight,...
Manipulation des données : lecture des données et éventuellement
création de structure de données VTK, écriture des données.
Pipeline de visualisation : notions de base (filtres,...).
Les objets VTK indispensables (acteurs, rendu, caméra, lumières,
fenêtre,...).
Exemples de scripts pour aller plus loin.

Marc Poinot
-----------

Session Cython (6h) 
~~~~~~~~~~~~~~~~~~~

* Cours intro (1h)
* Partir de Python pur et améliorer qq boucles
* Taxonomie des capsules python (10)
* Intro Cython + générateurs de capsules (10)
* Mise en oeuvre, plateforme d'analyse de perfs (10)
* Déclarations simples de boucles (20)
* Insertion dans le setup.py (10)

TP intro (2h)
~~~~~~~~~~~~~

* mise en oeuvre complète +numpy (seulement python pur)

Cours avancé (1h)
~~~~~~~~~~~~~~~~~

* Connexion avec librairies externes C/C++
* Passages d'objets Python, tableau numpy, lecture/écriture (10)
* Déclaration des structures et fonctions externes (20)
* Production setup.py + librairies externes (10)
* Allocation dynamique, comptage de références et ownership des
* objets (10)
* Classes partagées (10)

TP avancé (2h) 
~~~~~~~~~~~~~~

* mise en oeuvre avec une librairie coûteuse
* capsule d'une librairie existante

Session Sphinx (1h)
~~~~~~~~~~~~~~~~~~~

* TP: documenter les modules réalisés pendant la semaine

Participants 
------------

+-------------------+---------------+
| Family name       |	Institution |
+===================+===============+
| Arlette Pecontal  |               | 
+-------------------+---------------+
| Roland Bacon      |               |
+-------------------+---------------+ 
| Aurélien Jarno    |               |
+-------------------+---------------+ 
| Magali Loupias    |               |
+-------------------+---------------+ 
| Derek Homeier     |               |
+-------------------+---------------+ 
| Pereira Rui       |               |
+-------------------+---------------+ 
| Laure Piqueras    |               |
+-------------------+---------------+ 
| Léo Michel Dansac |               |
+-------------------+---------------+ 
| Johan Richard     |               |
+-------------------+---------------+ 
| Emmanuel Pecontal |               |
+-------------------+---------------+ 
| Sam Geen          |               |
+-------------------+---------------+ 
| Ghaouti Hansali   |               |
+-------------------+---------------+ 
| Yannick Copin     |               |
+-------------------+---------------+ 
| Danis Abrouk      |               |
+-------------------+---------------+ 
| Wenchao YU        |               |
+-------------------+---------------+ 
| Xavier Escriva    |               |
+-------------------+---------------+ 
| Said Jabrane      |               |
+-------------------+---------------+ 
| Eric Dalissier    |               |
+-------------------+---------------+ 
| Nicolas GARNIER   |               |
+-------------------+---------------+ 
| Annamaria Kiss    |               |
+-------------------+---------------+ 
| Vincent Mirabet   |               |
+-------------------+---------------+ 
| Bachar Cheaib     |               |
+-------------------+---------------+ 
| Jorge MORALES     |               |
+-------------------+---------------+ 
| Matthieu Falce    |               |
+-------------------+---------------+ 
| Dominique Ponsard |               |
+-------------------+---------------+ 
| Sylvain Faure     |               |
+-------------------+---------------+ 
| Konrad Hinsen     |               |
+-------------------+---------------+ 
| Marc Poinot       |               |
+-------------------+---------------+ 
| Loic Gouarin      |               |
+-------------------+---------------+ 