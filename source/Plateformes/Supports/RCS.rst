Support et recherche en calcul scientifique
===========================================

.. |br| raw:: html

   <br>

* **Cerasela Iliana CALUGARU - CBPsmn, ENS de Lyon**

.. image:: ../../_static/equipe/calugaru.jpg
    :class: img-float pe-1
    :width: 110px
    :alt: Image Cerasela Iliana CALUGARU

Centre Blaise Pascal - École normale supérieure de Lyon |br|
Ingénieur de Recherche en Calcul Scientifique |br|
Docteur en Mathématiques Appliquées |br|
Courriel : Cerasela.Iliana.Calugaru @ ens-lyon.fr |br|
Téléphone : (+33) 4 72 72 86 31 

.. image:: ../../_static/equipe/cclanguages.png

Dans le cadre de projets de recherche, j’apporte une expertise dans l’utilisation des méthodes mathématiques et des moyens informatiques pour résoudre un problème théorique ou une situation d’expérience et d’observation. 

En fonction des besoins du projet, je suis amenée à m’investir dans l’activité de recherche du domaine scientifique concerné et dans les activités informatiques associées avec un équilibre variable entre les deux.

Compétences
-----------
 
* Discrétisation EDP (les méthodes de FD, FE, FV)
* Algorithmes numériques pour la résolution de systèmes linéaires & non linéaires
* Algorithmes numériques pour des problèmes inverses 
* Développement, parallélisation et optimisation de codes de calcul

Activités au Centre Blaise Pascal
---------------------------------

Soutien à la recherche / Recherche
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Ces activités consistent à formaliser ou aider un chercheur à formaliser un problème scientifique, pour sa modélisation, sa représentation, et son traitement. 

Projets de recherche :

* **Géophysique :** :ref:`Simulations hautes performances des écoulements océaniques et des interactions eau-glace sur Terre ainsi qu'au sein des lunes de glace <simueauglace>` Le code retenu est le code open-source Dedalus (https://dedalus-project.org/), qui est un module python utilisant openMPI et FFTW. Il est possible d'optimiser Dedalus sur un cluster en privilégiant une installation/utilisation basée sur les compilers/openmpi/fftw les plus performants du système.Dedalus est un code flexible permettant la résolution d'une grande gamme de problèmes basés sur des équations différentielles (BVP, EVP, IVP), qui pourrait être amené à être utilisé massivement pour la recherche et l'enseignement par, par exemple, le LPH, CRAL et LGLTPE. (Laboratoire de Physique, 2021-...)

* **Dynamique moléculaire :** :ref:`Ab initio molecular dynamics and metadynamics simulations <aimdms>` Organocopper and organocuprate compounds are highly selective and versatile reagents allowing to access a variety of organic transformations. Their activity can be finely tuned depending on the method used for their synthesis, as well as using salts additives and solvent mixtures. Though a large amount of experimental data is available on these systems, characterizations related to their structure in solution and its relationship with their activity has been untouched, likely due to the complexity to characterized and modelled such flexible and multimetallic systems Here we aim at throwing some lights into the organocopper and cuprate black-box by using ab initio molecular dynamics and metadynamics simulations. This modelling strategy will allow to rationalize the environmental effects that alter the shape of the organometallic aggregates and provide useful guidelines to predict their activity.(Laboratoire de Physique, 2020-...)

* **Astrophysique  :** **Modélisation de l’atmosphère des étoiles et des planètes** :ref:`Projet Phenix <maep>`. Dans ce projet on s’intéresse à la construction des modèles numériques pour décrire l’atmosphère des étoiles de faible masse, des naines brunes et des planètes extrasolaires. Ces travaux nécessitent des simulations numériques intensifs qui sont calibrées avec les données d’observation (de nature électromagnétique). Pour ce faire, des codes de calcul sont utilisés, dont PHOENIX et CO5BOLD. Le code PHOENIX est un code complexe développé par F. Allard en collaboration avec l’Observatoire de Hambourg. Il est principalement écrit en Fortran 95, avec certaines parties en C (pour les I/O) et C++ (pour une haute précision arithmétique utilisant la librairie QD) et il est parallélisé avec MPI (et en partie avec OpenMP).(CRAL, 2019 _ 2020)

* **Géophysique :** **Projet ERC** :ref:`L’impact géant et la formation de la Terre et de la Lune <impact>` dans le cadre du projet `IMPACT <https://moonimpact.eu/home/>`_ Ce projet ERC est porté par Razvan Caracas (Laboratoire de Géologie) et propose d’étudier le modèle de formation et d’évolution du disque proto-lunaire en utilisant une combinaison de simulations abinitio atomistiques (théorie de la fonctionnelle densité DFT à grande échelle couplée avec les fonctions Green GWet les techniques DFT dépendant du temps). L’objectif est de contraindre les scénarios d’impact plausibles et les caractéristiques de l’impacteur et de la proto-Terre dans un algorithme de convergence minimisant l’écart entre les prédictions des compositions finales Terre-Lune et les observations. Dans ce cadre, j’apporte un soutien à l’installation et la mise à jours des codes utilisés pas les chercheurs (dont ABINIT), à l’optimisation des environnements d’exécution (compilateurs et bibliothèques, scripts batch, queues de soumission, …) et aux questions de nature numérique (schéma numériques, algorithmes).(Laboratoire de Géologie, 2016 _ 2021)

* **Wave Topology in Fluids (WTF) :** :ref:`Projet ANR WTF <wtf>`  – (Laboratoire de Physique, 2018 – 2021) : Le concept de transport protégé topologiquement est né dans le contexte de de l’effet Hall quantique. Un essort sans précédent dans ce domaine est né quand les physiciens ont réalisé comment appliquer ces idées à des domaines aussi différents que la photonique ou la mécanique. Des ondes sont génériquement protégées du désordre quand elles se propagent entre des matériaux caractérisés par des invariants topologiques différents. Cette année, nous avons démontré que cette topologie explique l’émergence et la robustesse d’ondes unidirectionnelles dans les liquides des échelles microfluidiques aux échelles planétaires. Ces travaux pionniers constituent le point de départ de notre projet. Nous visons à établir les fondements de la topologie des ondes dans les fluides. Nous fournirons les premières démonstrations expérimentales de phase topologique dans les liquides, nous démontrerons leur omniprésence dans les écoulements géophysiques et astrophysiques, et nous expliquerons l'émergence de nouvelles ondes topologiques en l'absence de bords dans un système physique.

* **Dissipation des courants océaniques par radiation d'ondes internes** : :ref:`Dissipation des courants océaniques par radiation d'ondes internes <dcoroi>` : Les fluides stratifiés en densité permettent la propagation d'ondes de gravité aux propriétés étonnantes. Le passage de courants océaniques au dessus de fonds marins ondulés peut générer de telles ondes, qui modifient en retour les courants et la stratification ambiante. Le but du projet est d'estimer les transferts d'énergie et de moment entre ondes et courants moyens. Nous combinons approches théoriques et expériences numériques réalisées avec le MIT-GCM dans des configurations idéalisées. (Laboratoire de Physique, 2016 – 2020) 

* **Manteau et océans de magma** : :ref:`Convection dans le manteau et océans de magma <cmom>` : dans ce travail on s'intéresse à l'implémentation de conditions limites de fusion et cristallisation dans le code de convection dans le manteau StagYY (Paul Tackley). La théorie concernant les conditions limite est celle développée par Alboussière et Deguen pour la convection dans la graine. (Laboratoire de Géologie de Lyon, 2015 – 2019) 

* **Image segmentation: Optimization of Level Set Methods for biological image segmentation**, :ref:`LSM <lsm>` : To study plant morphogenesis, one need to follow the evolution of a plant during time. We can use real-time live imaging and image segmentation to reconstruct the plant development at a cell level. A first pipeline, MARS-ALT, has been develop by the RDP laboratory in collaboration with the Virtual Plants team (INRIA, Montpellier), as a part of the OpenAlea platform for plant modelling. The 3D image are assembled from the fusion of three confocal stacks, and cells are segmented using a watershed algorithm. With 3D segmented images of the same plant at different steps of development, ALT can reconstruct the lineage between cells. To improve the segmentation part of the pipeline, a new method was implement in 3 steps : Detect exterior shape of the organ with LSM; Perform a watershed algorithm to have a first segmentation, given the exterior shape; Improve segmentation by re-detecting each cell shape with LSM. (Laboratoire Reproduction et Developpement des Plantes, 2013 – 2016) 

* **Dynamique moléculaire :** :ref:`Projet ANR FSCF <anrfscf2>` – :ref:`Code AquaSol <logAquasol>` (Laboratoire de Physique, 2012 – 2015)

* **Biologie cellulaire :** :ref:`Développement d’une bibliothèque parallèle dans le domaine de la biologie cellulaire et du traitement d’images <sibcp2>`, Projet de développement d’une bibliothèque en C++, sa parallélisation et intégration dans des logiciels libres (+ projet master) (Laboratoire de Reproduction et Développement des Plante, 2013 – 2016)

* **Ecoulements turbulents bidimensionnels et géophysiques** : :ref:`Equation barotrope stochastique 2D <etbg>` : optimisation et validation quantitative du code en définissant un jeu de tests et des cas de référence pour vérifier l’aptitude du code à approximer les divers termes intervenant dans l’équation. (Laboratoire de Physique, 2014 – 2016) 

* **Mécanique de fluides :** :ref:`Logiciel de simulation 3D des phénomènes d'écoulement et de transport <s3dpet>` - Code SoFTP. Projet de développement logiciel (Centre Blaise Pascal)

* **Turbulence :** :ref:`Code IncNS <incns>` - portage du code sur des architectures GPU, (Laboratoire de Physique, 2012 – 2013)

* **Géophysique :** méthode d’ordre élevé pour le calcul de l’énergie dans le code `ABINIT <http://www.abinit.org>`_ dans le cadre du projet `WURM <http://www.wurm.info>`_ (Laboratoire de Géologie, 2012 – 2017) – aide ponctuel 

En fonction des objectifs du projet, je suis amenée à :

* **Concevoir, développer ou adapter des méthodes d’analyse :** calcul numérique, statistique, traitement du signal, traitement d’images, modélisation, etc.

* **Choisir les moyens logiciels et matériels**, en tenant compte de leurs performances et de leur pertinence dans le cadre d’un problème donné ou d’un projet de recherche

* **Assurer l’organisation des données et le suivi de leur exploitation** jusqu’à leur visualisation 

* **Assurer une veille technologique** sur l’évolution des architectures matérielles, des systèmes, et des concepts associés 

* **Assurer une veille scientifique** sur l’évolution des concepts et des méthodes dans les domaines d’application

* **Aider les chercheurs** dans le choix et dans l’implémentions des méthodes numériques, dans l’utilisation des bibliothèques de calcul et dans la mise en oeuvre des techniques de programmation, de parallélisation et d’optimisation 

* **Développer, paralléliser et optimiser** de codes de calcul

* **Choisir, acquérir, et exploiter des calculateurs haute performance** 

* **Diffuser et valoriser** les méthodes et outils développés

Formation
~~~~~~~~~

* **Former et assurer le transfert des connaissances et de savoir-faire**, participer à la formation des utilisateurs du calcul numérique intensif
* **Co-encadrer et former des étudiants** sur des projets d’études :

  * :ref:`Image processing : Anisotropic lter & Level-Set Method for segmentation on 3D biological images (Level Set Method) <lsm>`
  * :ref:`Image processing : Anisotropic lter & Level-Set Method for segmentation on 3D biological images (anisotropicblur) <ipab>`

Animation scientifique
~~~~~~~~~~~~~~~~~~~~~~

* **Conception, mise à jour et maintenance de sites web** : serveur Web et Site Internet du CBP (2009, jusqu'à avril 2013 ); site Internet du PSMN (2009 -...); serveur Web et Site Internet du CFCAM-RA (2011- jusqu'à juin 2013); mini-Site Internet pour des workshops et formations (2009, jusqu'à avril 2013)
* **Co-organiser ou participer à l'organisation des manifestations scientifiques** : 

  * Colloquium du Centre Blaise Pascal ( :ref:`Avancées des outils numériques et leurs applications dans différents domaines scientifiques <aonadds>` : 2014; 2015); 
  * séminaires (du :ref:`CBP <evenements>` : 2009 - 2012; 2014); 
  * Les Journées du Centre Blaise Pascal ( :ref:`November 16, 2010 <cslyon>` ; :ref:`June 14, 2011 <jcbp>` ; :ref:`November 29, 2011 <jcbpcg>` ; :ref:`November 20, 2012 <jcbpeel>`; `Novembre 28, 2013 <http://jcbp.sciencesconf.org/>`_); 
  * de journées (ex « Exploring (Free) Energy Landscapes » ); 
  * de colloques, (ex "European Workshop on Superfluid turbulence from the perspective of numerics: modeling, methods and challenges")
* **Représenter le Centre Blaise Pascal** auprès de différents publics (réunions de travail, manifestations scientifiques)
* **Gestion de la** :ref:`liste de diffusion <liste-diff>` du Centre Blaise Pascal (2009 -...)
* **S'impliquer dans des réseaux de compétence** : `GDR Calcul <http://calcul.math.cnrs.fr/spip.php?rubrique42>`_, représentant du Centre Blaise Pascal dans le Réseau `LyonCalcul <http://lyoncalcul.univ-lyon1.fr/spip.php>`_, etc . 

Activités au PSMN
-----------------

Participation à la gestion et à l’exploitation de machines de calcul
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* **Installations et tests sur les serveurs du PSMN** : installations optimisées et tests de fonctionnement et performance logiciels ( par exemple, `cp2k avec intel/MKL avec fft de MKL <#>`_ , `Lammps <#>`_, ...), tests d’utilisation de compilateurs (gnu, intel, `tests de fonctionnement et performance pgi <#>`_), des bibliothèques (ex. `PETSc <#>`_, `FFTW <#>`_,Blitz, ...) `benchmarks GPU <#>`_
* Participer à la **création/suppression de comptes utilisateur** sur les serveurs du PSMN
* Participer au **suivi du bon fonctionnement de noeuds de calcul** sur les serveurs du PSMN 
* Participer au **suivi de quota disque** sur les serveurs du PSMN 

Formations sur des outils du calcul scientifique et utilisation de machines PSMN
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Il s’agit principalement des :ref:`formations pour les nouveaux utilisateurs ou des formations personnalisées <actualites>` : mise à niveaux Linux, présentation des serveurs, connexion, environnement logiciel, compilation séquentielle/parallèle, configuration de queues, scripts de soumission et contrôle de jobs séquentiels/parallèles.


Expertise et Support en calcul scientifique
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* **Expertise au choix** de méthodes numériques 
* **Expertise et Support** au choix et à l’utilisation d’outils de calcul 
