.. _vasp:

* :ref:`Projets d'infrastructure <projinfra>`

VASP running on my Workstation
==============================

Projet
------

.. image:: ../../_static/img_projets/vasp.png
    :class: img-float pe-2
    :width: 150px
    :alt: Vasp

**Maîtrise d'ouvrage** : Marie-Laure Bocquet, laboratoire de Chimie, ENS-Lyon

**Maîtrise d'oeuvre** : Emmanuel Quemener, Centre Blaise Pascal, ENS-Lyon

VASP est un outil utilisé très couramment dans la communauté des chimistes utilisant des calculs DFT. Très gourmand en terme de puissance de calcul et de mémoire, il tourne essentiellement sur les centres de calculs disposant au minimum de plusieurs dizaines de noeuds. 

Cependant, pour de petits calculs, pour l'exploration de petites structures et sur quelques pas de temps, les stations de travail actuelles suffisent largement pour exécuter le programme. De plus, la flexibilité de l'usage de sa propre machine et la disponibilité immédiate des résultats permet une exploitation instantanée des résultats sans aucun transfert.

L'objectif est de fournir un environnement numérique portable sur son poste de travail comparable à l'environnent disponible sur le centre de calcul, d'adapter le code VASP à cet environnement et d'intégrer les logiciels de post-traitement.

Contribution du CBP
-------------------

Le Centre Blaise Pascal a entrepris les actions suivantes :
  
* création d'une machine virtuelle autonome sur Linux Debian Squeeze
* portage de VASP 4.6 sous Debian Squeeze (versions utilisant ATLAS, GotoBLAS, Scalapack)
* portage de VASP 5.2 sous Debian Squeeze (versions utilisant ATLAS, OpenBLAS, Scalapack)
* portage de VASP 4.6, 5.2, 5.3 sous Debian Wheezy (versions utilisant ATLAS, OpenBLAS, Scalapack)
* intégration de logiciels de post traitement à l'image virtuelle
* création d'une machine virtuelle à stockage déporté (approche COMOD)


