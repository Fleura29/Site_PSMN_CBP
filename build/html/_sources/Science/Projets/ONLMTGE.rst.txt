.. _onlmtge:

Optimisation non lisse des matrices de transfert pour la géographie électorale
==============================================================================

.. |br| raw:: html

   <br>

.. image:: ../../_static/img_projets/kszxo8.png
    :class: img-float px-2
    :alt: Image kszxo8

Laboratoire de Physique, ENSL : Pablo Jensen, Nelly Pustelnik, Marion Foare, Yacouba Kalouga (équipe Sysiphe) |br|
Centre Blaise Pascal : Emmanuel Quémener

La construction de matrices de transfert à partir de la connaissance de leurs marges est un problème formel intéressant de nombreuses communautés : sciences politiques (transfert de votes entre élections), transport (répartition des flux entre zones géographiques), matrices de routage Internet, etc. Le problème est généralement sous-déterminé mathématiquement et des hypothèses additionnelles sont nécessaires pour le résoudre. Dans ce projet, nous proposons de croiser les compétences de plusieurs communautés : sciences politiques, traitement des images et physique pour tester la pertinence d'outils de segmentation d'images dans la détermination de la variabilité géographique des matrices de transfert électorales. Cette variabilité est un point clé pour l'interprétation des dynamiques électorales, mais elle est difficile à approcher par les enquêtes classiques. Ces approches formelles originales pourraient être ensuite adaptées aux autres domaines. Au niveau calcul, nous avons besoin de traiter de grandes matrices creuses, ce qui est bien plus rapide avec les cartes graphiques disponibles au CBP.

Contribution du CBP
-------------------

Le Centre Blaise Pascal met à disposition son plateau technique multi-shaders pour :

* offrir un large panel de types de clusters
* évaluer l'intégration de traitements automatisés sur le plateau technique avec une grande variété de GPU
