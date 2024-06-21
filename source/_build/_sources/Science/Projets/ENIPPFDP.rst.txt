.. _enippfdp:

Etude numérique de l'influence des particules puits sur la formation des disques protostellaires
================================================================================================

.. |br| raw:: html

   <br>

.. image:: ../../_static/img_projets/commercon_2019.png
    :class: img-float pe-2
    :alt: Image commercon_2019

Benoit Gay (CRAL, ENS-Lyon), Benoit Commerçon (CRAL, ENS-Lyon),

Centre Blaise Pascal : Emmanuel Quémener

La formation des étoiles, étape essentielle du cycle de la matière interstellaire, demeure encore aujourd'hui mal comprise. Parmi les questions en suspens, la formation des disques protostellaires, progéniteurs des systèmes planétaires, est l'objet d'intenses recherches, tant sur le plan des observations que de la théorie. Il est établi que les disques se forment au cours de l'effondrement gravitationnel de coeurs denses prestellaires. A ces stades précoces, les propriétés de ces disques telles que la masse, le rayon ou l'époque de formation sont peu contraintes. 
Le but du stage est d'étudier l'influence de l'introduction de particule puits sur la formation et les propriétés des disques protostellaires à partir d'expériences numériques multidimensionnelles. Ces particules puits, assimilées à des masses ponctuelles, permettent de s'affranchir de la description des échelles stellaires, tout en conservant une résolution numérique suffisante pour décrire les disques. Nous utilisons le code de magnétohydrodynamique à raffinement de maillage adaptatif RAMSES (Teyssier 2002), dont une version incluant les effets non-idéaux de la MHD (diffusion ambipolaire uniquement lors de ce stage)  est développée au sein du CRAL. L'étude paramétrique consiste à faire varier les paramètres numériques tels que : résolution maximum, tailles de la particule puits, critères de formation et d'accrétion, traitement de la gravité de la source ponctuelle (CIC vs. N-body). Nous nous basons sur des études précédentes effectuées au sein de l'équipe afin de déterminer quels sont les observables pertinents (masse et rayon des disques, topologie du champ magnétique au sein du disque, taux d'accrétion). 

Contribution du CBP
-------------------

Le Centre Blaise Pascal fournit :

* un environnement SIDUS sur la station de travail exploitée pour la visualisation et les menus calculs
* un environnement parallélisé à petite échelle (64 coeurs sous MPI) parfait pour l'exécution de multiples calculs exploitant l'outil RAMSES.