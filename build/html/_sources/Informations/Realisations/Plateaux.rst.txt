Plateaux techniques
===================

Le Centre Blaise Pascal dispose de plateaux techniques formant une plate-forme expérimentale pour tous les chercheurs, enseignants, ingénieurs, stagiaires ou étudiants désirant se familiariser, expérimenter ou prototyper dans les domaines de l'informatique scientifique.

Le "plateau technique" désigne ici une infrastructure informatique complète (matériel & logiciel) polyvalente et aisément reconfigurable.

Depuis fin 2009, plusieurs plateaux techniques ont été mis en place pour faciliter l'accès à des ressources et permettre les missions du Centre Blaise Pascal.

Multi-noeuds
------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2009Q4 pour x86 et 2010Q1 pour x86_64
* Montée en charge : de 8 machines x86 fin 2009 à 84 noeuds x86_64 permanents début 2018

* **Pourquoi** : offrir un environnement complet pour le calcul parallèle
* **Quoi** : environnement logiciel pour MPI, PVM, ...
* **Pour qui** : chercheurs, enseignants, étudiants, stagiaires
* **Où** : de la salle de cours à la salle de serveurs
* **Combien** : 84 noeuds x86_64 permanents et 23 stations multi-coeurs

    * 64+8 noeuds r410 huit coeurs physiques (16 logiques)
    *    8 noeuds x41z huit coeurs physiques
    *    4 noeuds c6100 avec 12 coeurs physiques (24 logiques)
* **Comment** : 

    * accès par 'lethe.cbp.ens-lyon.fr'
    * utilisation des noeuds par le gestionnaire de ressources GridEngine

Ces machines s'appuyent sur l'authentification Ldap de l'établissement et utilisent pour les comptes utilisateurs le serveur de dossiers utilisateurs.

Multi-coeurs 
------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2009Q4 pour x86 et 2010Q1 pour x86_64
* Montée en charge : de 8 machines x86 fin 2009 à 86 noeuds x86_64 permanents début 2013

* **Pourquoi** : offrir un environnement complet & diversifié pour le calcul parallèle
* **Quoi** : environnement logiciel pour MPI, OpenMP, Pthreads, OpenCL, ...
* **Pour qui** : chercheurs, enseignants, étudiants, stagiaires
* **Où** : la salle de cours
* **Combien** :  84 noeuds x86_64 permanents, 24 stations multi-coeurs, 2 serveurs

    *  4 noeuds c6100 avec 12 coeurs HT : Intel X5650 à 2.67 GHz
    * 72 noeuds R410 avec 8 coeurs HT : Intel X5550 à 2.67 GHz
    *  8 noeuds x41z avec 8 coeurs : Intel E5440 à 2.83 GHz
    *  1 serveur R730* avec 16 coeurs HT : Intel E5-2640v3 à 2.6 GHz
    *  1 serveur R720* avec 8 coeurs HT : Intel E5-2637v2 à 3.5 GHz
    *  1 serveur R620* avec 20 coeurs HT : Intel E5-2670v2 à 2.5 GHz
    *  2 serveurs X2200* avec 8 coeurs : AMD Opteron 2347 à 1.9 GHz
    *  1 station Precision T7600* avec 16 coeurs HT : E5-2665 à 2.40 GHz
    *  1 station Precision T7500 avec 12 coeurs HT : Intel X5650 à 2.67 GHz
    * 12 stations Precision T5600 avec 6 coeurs HT : Intel E5-2620 à 2 GHz
    *  4 stations Precision T5610 avec 8 coeurs : Intel E5-2609v2 à 2.5 GHz
    *  4 stations Precision T7810 avec 8 coeurs HT : Intel E5-2630v3 à 2.4 GHz
    *  1 station d'essai ouverte : AMD Kaveri A10-7850K à 3.7 GHz
    *  1 poste Optiplex 745 avec 2 coeurs : Intel Core2 6300 à 1.86GHz
* **Comment** :

    * accès indirect par la passerelle pour les noeuds par SSH
    * accès direct pour les stations, par SSH et x2go
    * les équipements marqués "*" sont à accès restreint

Ces machines s'appuyent sur l'authentification Ldap de l'établissement et utilisent pour les comptes utilisateurs le serveur de dossiers utilisateurs.

GPU & Accélérateur 
------------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2009Q4
* Montée de charge : de 1 machine fin 2009 à 31 machines début 2015

* **Pourquoi** : offrir un environnement pour le calcul sur GPU
* **Quoi** : environnement logiciel x86_64 pour Cuda et OpenCL
* **Pour qui** : chercheurs, enseignants, étudiants, stagiaires
* **Où** : de la salle de cours à la salle de serveurs
* **Combien** : de 1 station de travail fin 2009 à 25 stations de travail, 2 serveurs, 4 noeuds fin 2015
   
    * Avec GPU Nvidia (supportant Cuda & OpenCL) : 
        * Nvidia GTX 980Ti : 3+1 stations **gtx980ti(alpha|beta|gamma)** et **titan***
        * Nvidia GTX 980 : 1 station **gtx980**
        * Nvidia GTX 970 : 1 station **gtx970**
        * Nvidia GTX 960 : 1 station **gtx960**
        * Nvidia GTX 750Ti : 1 station **gtx980tialpha**
        * Nvidia GTX 750 : 1 station **gtx980tigamma**
        * Nvidia GTX 780ti : 1 station **gtx780ti**
        * Nvidia GTX 780 : 4 stations **gtx780(alpha|beta|gamma|delta)**
        * Nvidia GTX Titan : 1 station **gtxtitan**
        * Nvidia GTX 690 : 1 station **gtx690**
        * Nvidia GTX 680 : 1 station **gtx680**
        * Nvidia Tesla K80 : 1 serveur **r730***
        * Nvidia Tesla K40 : 1 station **k40** & 1 serveur **r720***
        * Nvidia Tesla K20 : 2 noeuds **c6100gpu-(1|2)**
        * Nvidia Quadro K4000 : 1 station **k4000**
        * Nvidia Quadro K2000 : 2 stations **gtxtitan** & **k40**
        * Nvidia Quadro 4000 : 1 station **q4000alpha**
        * Nvidia GT 640 : 1 station **gtx780ti**
        * Nvidia GTX 560Ti : 1 station **k4000**
        * Nvidia Tesla C2090 : 1 noeud **c6100gpu-4**
        * Nvidia Tesla C2070 : 1 noeud **c6100gpu-3**
        * Nvidia Tesla C2050 : 1 noeud **c6100gpu-3**
        * Nvidia GT 620 : 1 station **gtxtitan**
        * Nvidia GT 430 : 1 station **gtx680**
        * Nvidia NV 315 : 3 stations **gtx960**, **gtx970**, **gtx980tibeta**
    * Avec GPU AMD/ATI : support de OpenCL

        * Kaveri A10-7850K avec R7 : 1 station sur **banchetto***
        * Radeon Furi : 1 station **titan**
        * Radeon R9-295X : 1 station **banchetto***
        * Radeon R9-290X : 1 station **r9-290**
        * Radeon R7-240 : 1 station **hd5850**
        * FirePro W5000 : 1 station **w5000**
        * Radeon HD 7970 : 1 station **hd7970**
        * Radeon HD 6670 : 1 station **hd6670**
        * Radeon HD 5850 : 1 station **hd5850**
        * Radeon HD 6450 : 2 stations **hd7970** & **r9-290**
    * Avec carte accélératrice MIC : support de OpenCL, OpenMP, MPI

        * Intel Xeon 7120P : 1 serveur **r720***
    * Avec carte intégrée Intel : support de OpenCL

        * Intel HD Graphics Haswell CRW GT3 : 1 noeud Moonshot **m710alpha**

Ces machines s'appuyent sur l'authentification Ldap de l'établissement et utilisent pour les comptes utilisateurs le serveur de dossiers utilisateurs.

Visualisation 3D
----------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2013Q4

* **Pourquoi** : offrir le plus d'une visualisation 3D
* **Quoi** : stations, écrans, lunettes, environnement logiciel pour l'exploitation de logiciels adaptés
* **Pour qui** : chercheurs, enseignants, étudiants, stagiaires
* **Où** : petite salle de réunion, salle de travaux pratiques
* **Combien** :

    * salle de formation M7-1H04 : station **q4000**, 1 écran 3D 24", 1 vidéoprojecteur, 2 paires de lunettes IRDA
    * bureau M7-1H07 : 1 station **k4000**, 1 écran 3D 28", 2 paires de lunettes RF,

Ces machines s'appuyent sur l'authentification Ldap de l'établissement et utilisent pour les comptes utilisateurs le serveur de dossiers utilisateurs. 

Intégration logicielle
----------------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2010Q4

* **Pourquoi** : offrir un environnement d'intégration logicielle différent de l'environnement de base Debian
* **Quoi** : environnement logiciel complet x86 et x86_64
* **Pour qui** : chercheurs, ingénieurs demandant des environnements différents
* **Où** : de la salle de cours à la salle de serveurs
* **Combien** : de 1 station de travail à 10 stations de travail
    
    * 2 serveurs Ubuntu 10.04 en x86 et x86_64
    * 2 serveurs Ubuntu 12.04 en x86 et x86_64
    * 2 serveurs Centos 5.5 en x86 et x86_64
    * 2 serveurs Debian Lenny en x86 et x86_64
    * 2 serveurs Debian Squeeze en x86 et x86_64
    * 4 serveurs Debian Wheezy en x86, x86_64, Sparc et PowerPC
    * 2 serveurs Debian Jessie en x86 et x86_64
    * 2 serveurs Debian Sid en x86 et x86_64

Ces machines s'appuyent sur l'authentification Ldap de l'établissement et utilisent pour les comptes utilisateurs le serveur de dossiers utilisateurs.

Paillasses Numériques des AHN
-----------------------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2012Q1

* **Pourquoi** : offrir un environnement expérimental aux AHN
* **Quoi** : environnement logiciel x86_64
* **Pour qui** : chercheurs et ingénieurs des :ref:`Atelier des Humanités Numériques <ahn>`
* **Où** : salle de serveurs
* **Combien** : 10 serveurs 

    * 3 socles logiciels sous Debian Squeeze
    * 7 socles logiciels sous Debian Wheezy

Ces machines ne sont accessibles qu'aux membres du groupe "Atelier des Humanités numériques".

Stockage Distribué
------------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2010Q4

* **Pourquoi** : étudier l'utilisation des ressources disques distribuées
* **Quoi** : environnement complet permettant d'explorer 5 méthodes différentes
* **Pour qui** : ingénieurs 
* **Où** : de la salle de cours à la salle de serveurs
* **Combien** : 

    * 40 noeuds utilisés (1 par dispositif) pour iSCSI, AoE, GlusterFS, XtreemFS, CephFS
    * 8 postes de travail x86 utilisés pour GlusterFS
    * 8 postes de travail x86_64 utilisés pour CephFS

Ce plateau technique, baptisé *DiStoNet* pour *Distributed Storage Network* a permis les présentations au Jres 2011.

Ce plateau technique a été démobilisé en 2012Q2 pour l'étude sur le stockage distribué haute performance sur InfiniBand entre 2012Q3 et 2013Q1.

Ecole des Houches 
-----------------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2011Q2
* Réalisations : éditions 2011, 2012, 2013, 2014, 2015

* **Pourquoi** : faciliter l'appropriation des outils numériques
* **Quoi** : fourniture d'un environnement complet applicatif, système et réseau
* **Pour qui** : auditeurs, intervenants
* **Où** : École de Physique des Houches
* **Combien** : pour 25 à 70 personnes par session
* **Comment** :

    * Voici la {{h2012-20120619_eq_tiny.pdf|présentation}} des ressources de la session 2012.

Afin de réaliser les travaux pratiques dans de bonnes conditions, un environnement complet est fourni à chaque auditeur. 

Cet environnement réalise toutes les simulations et traitements sur son propre équipement : c'est le système *COMOD* pour *Compute On My Own Device*. Il se base sur :ref:`SIDUS <sidusdoc>`.

Cet environnement a deux composantes :
* une *autonome* où tout le système existe sur dans une image virtuelle de disque dur : 

    * l'espace requis est de plusieurs Go, 
    * la connexion réseau est facultative ;
* une *partagée* où tout le système se trouve sur un équipement tierce :

    * l'espace requis est seulement plusieurs Ko,
    * la connexion réseau filaire est indispensable
    * la technologie utilisée hérite du projet *SIDUS* pour *Single Instance Distributing Universal System*

COMOD
-----

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2011Q1

**COMOD (Compute On My Own Device)** est la fusion de deux projets distincts de début 2011 :

* environnement de calcul scientifique virtualisé autour du logiciel VASP
* environnement scientifique pour l'école des Houches 2011

Il offre aux utilisateurs la possibilité de démarrer en quelques secondes un environnement scientifique complet sur une machine quelconque, virtuelle ou réelle, dans un environnement exactement identique à ceux des plateaux techniques du Centre Blaise Pascal.

Galaxy 
------

* Contact : :ref:`Emmanuel Quemener <ris>`
* Date de création : 2015Q1
* Date de disponibilité de la version 2 : 2016Q4

Portail `Galaxy <http://galaxy2.cbp.ens-lyon.fr>`_ pour les applications de biologie.
