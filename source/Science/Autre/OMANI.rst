.. _omani:

Optimisation des méthodes d’approximation numérique déjà implémentées. Mise en œuvre d’autres méthodes et de nouveaux algorithmes de discrétisation
===================================================================================================================================================

.. |br| raw:: html

   <br>

.. container:: mb-3
    
    .. image:: ../../_static/img_projets/figureaquasol.png
        :class: img-fluid img-float
        :alt: Image figureaquasol

    * **Contact** : Cerasela Calugaru, Ralf Everaers, Sam Meyer |br|
    * **Objectif** :  Optimisation (nouveaux algorithmes, parallélisation), implémentation des nouvelles fonctionnalités, analyse du comportement numérique et informatique du code AquaSol

    ➢	**Approximation des dérivées partielles premières** 

    Bien qu’une approximation d’ordre 2 (centrée) de ces dérivées était déjà implémentée dans le code, pour mieux capter les forts gradients du potentiel dans les zones autour de charges fixes, il s’avère parfois plus judicieux d’abaisser l’ordre et d’utiliser une approximation décentrée. 
    Nous avons programmé l’approximation d’ordre 1 et les résultats obtenus dans le cas d’un atome centré en un point du grid (pour l’ordre 1 et 2) confirment cette assertion. 

.. container::  mb-3
    
    .. image:: ../../_static/img_projets/figfocusing2.png
        :class: img-fluid img-float pe-2
        :alt: Image figfocusing2 

    ➢	**Méthode « focusing »**

    Cette méthode permet de « zoomer » successivement la résolution du problème de type Poisson-Boltzmann autour de la molécule. Dans un premier temps, elle a été implémentée de la manière la plus non intrusive possible, à savoir en minimisant les modifications apportées au code. Les domaines de simulations successifs sont pilotés via un script shell qui les traitent l’un après l’autre. Le passage d’une simulation plus « grossière » à une simulation plus « fine » se fait par une transmission des valeurs du potentiel obtenues à l’intérieur du domaine grossier (correspondant à la frontière du domaine fin) comme conditions aux limites pour le potentiel pour le domaine fin. Cela a nécessité l’implémentation des procédures pour déterminer la correspondance des points de cette frontière entre les deux maillages. Ainsi, deux techniques ont été implémentées : une première basée sur la recherche globale du plus proche point qui peut traiter tout type de maillage mais qui s’avère pénalisante en terme de temps de calcul et une seconde technique basée sur une méthode de splitting et que nous avons développée pour traiter cette recherche en deux étapes - une recherche 1D suivie d’une autre 2D et qui s’avère très efficace dans le cas particulier des maillages cartésiens (seuls qui sont actuellement pris en compte par AquaSol). Les résultats obtenus jusqu’à maintenant avec cette méthode sont très encourageants et incitent la poursuite des travaux dans cette direction avec une généralisation des ces techniques et un rajout des autres fonctionnalités.
 
➢	**Parallélisation du code**
 
Ce travail a commencé par une analyse de profiling du code, afin de déterminer les parties du code les plus à même d’être parallélisées et d’estimer le speed-up théorique que l’on pourrait atteindre (loi d’Amdahl). Cette analyse a confirmé nos attentes, à savoir que les parties les plus consommatrices de temps CPU sont le traitement des systèmes linéaires à résoudre à chaque itération de la méthode de Newton et le calcul du jacobien. Cependant, elle a aussi relevé qu’une partie considérable du temps CPU est consommé au traitement des méthodes multi-grid. En ce qui concerne la résolution parallélisée de ces systèmes, l’une des possibilités que nous envisageons est l’utilisation de la bibliothèque MUMPS, développée en partie au LIP de l’ENSL et une étude préliminaire à été menée avec les développeurs de MUMPS pour évaluer les possibilités d’utilisation de cette bibliothèque dans notre cas et du gain potentiel.

Optimisations à venir :
 
➢	**Finaliser l'implémentation du maillage cartésien non uniforme**

➢	**Utilisation d'un générateur de maillage cartésien non uniforme raffiné autour de la (des) molécule(s)**  