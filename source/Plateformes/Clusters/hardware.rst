.. _confmat:

Configuration matérielle des clusters
=====================================

Description du matériel disponible dans les différents clusters du PSMN. 

.. container:: note note-imp

`New Documentation (Debian 11 / Slurm) <http://www.ens-lyon.fr/PSMN/Documentation/>`_

See also our :ref:`Fil des news <news>` for up-to-date informations

Tous les clusters utilisent le même OS, Debian 11 ainsi que le gestionnaire de job slurm.

:ref:`Statistiques d'utilisation des clusters <statsutil>` 

Cluster Cascade
---------------

Les machines de ce cluster partagent le même arbre Infiniband (pour OpenMPI), ainsi qu'un **scratch** commun (**/scratch/Cascade/**)

* **16 416 coeurs au total**

Groupe s92
~~~~~~~~~~

171 noeuds bi-processeurs Intel S9200WK identiques, chaque noeud contenant : 
  * 2 processeurs Intel Platinum 9242 octatetraconta-core 2,3 Ghz (96 cores)
  * **384 Go** de Mémoire (soit 4 GiB/coeur)
  * interconnexion Infiniband HDR/EDR (100 Gb/s)

Cluster Lake
------------

Les machines de ce cluster partagent le même arbre Infiniband (pour OpenMPI), ainsi qu'un **scratch** commun (**''/scratch/Lake/''**)

* **13 472 coeurs au total**

Groupe Epyc
~~~~~~~~~~~

14 noeuds bi-processeurs Dell C6525 identiques, chaque noeud contenant : 

* 2 processeurs AMD 7702 tetrahexaconta-core 2 Ghz (128 cores)
* **512 Go** de Mémoire (soit 4 GiB/coeur)
* interconnexion Infiniband EDR (100 Gb/s)

Groupe c6420-192
~~~~~~~~~~~~~~~~

108 noeuds bi-processeurs Dell C6420 identiques, chaque noeud contenant : 

* 2 processeurs Intel 6226R **Cascade Lake** hexadeca-core 2,9 Ghz (32 cores)
* **192 Go** de Mémoire (soit 6 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe c6420-96
~~~~~~~~~~~~~~~

8 noeuds bi-processeurs Dell C6420 identiques, chaque noeud contenant : 

* 2 processeurs Intel 5118 **Cascade Lake** dodeca-core 2,3 Ghz (24 cores)
* **96 Go** de Mémoire (soit 4 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe xlr178-192
~~~~~~~~~~~~~~~~~

122 noeuds bi-processeurs HPE XL170r identiques, chaque noeud contenant : 

* 2 processeurs Intel 5218 **Cascade Lake** hexadeca-core 2,3 Ghz (32 cores)
* **192 Go** de Mémoire (soit 6 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe xlr170-384
~~~~~~~~~~~~~~~~~

60 noeuds bi-processeurs HPE XL170r identiques, chaque noeud contenant : 

* 2 processeurs Intel 6242 **Cascade Lake** hexadeca-core 2,8 Ghz (32 cores)
* **384 Go** de Mémoire (soit 12 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe c6420-384
~~~~~~~~~~~~~~~~

62 noeuds bi-processeurs Dell C6420 identiques, chaque noeud contenant : 

* 2 processeurs Intel 6142 **Sky Lake** hexadeca-core 2,6 Ghz (32 cores)
* **384 Go** de Mémoire (soit 12 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe r730gpu
~~~~~~~~~~~~~~

24 noeuds bi-processeurs Dell R730 identiques, chaque noeud contenant : 

* 2 processeurs Intel E5-2637v3 **Haswell** tetra-core 3,5 Ghz (8 cores)
* **128 Go** de Mémoire (soit 16 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)
* 2 accélérateurs GPGPU (Nvidia RTX 2080Ti)

r740bigmem
~~~~~~~~~~

1 noeud bi-processeurs Dell R740 contenant :

* 2 processeurs Intel 6226R **Cascade Lake** hexadeca-core 2,9 Ghz (32 cores)
* **1500 Go** de Mémoire (soit ~46 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Cluster E5
----------

Les machines de ce cluster partagent le même arbre Infiniband (pour OpenMPI), ainsi qu'un **scratch** commun (**''/scratch/E5N/''**)

* **1664 coeurs au total**

Une partie de ce cluster a été financé par `Équip@méso <http://www.genci.fr/fr/content/equipmeso>`_.

Groupe c6320-128
~~~~~~~~~~~~~~~~

24 noeuds bi-processeurs Dell C6320 identiques, chaque noeud contenant : 

* 2 processeurs Intel E5-2667v4 **Broadwell** octa-core 3,2 Ghz (16 cores)
* **128 Go** de Mémoire (soit 8 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe c6320-256A
~~~~~~~~~~~~~~~~~

12 noeuds bi-processeurs Dell C6320 identiques, chaque noeud contenant : 

* 2 processeurs Intel E5-2697Av4 **Broadwell** hexadeca-core 2,6 Ghz (32 cores)
* **256 Go** de Mémoire (soit 16 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe c6320-256
~~~~~~~~~~~~~~~~

24 noeuds bi-processeurs Dell C6320 identiques, chaque noeud contenant : 

* 2 processeurs Intel E5-2667v4 **Broadwell** octa-core 3,2 Ghz (16 cores)
* **256 Go** de Mémoire (soit 16 GiB/coeur)
* interconnexion Infiniband FDR (56 Gb/s)

Groupe c8220
~~~~~~~~~~~~

*financement Équip@méso*

32 noeuds bi-processeurs Dell c8220, chaque noeud contenant :

* 2 processeurs Intel E5-2670 **Sandy Bridge** octa-core 2,60 Ghz (16 cores)
* **256 Go** de Mémoire (soit 16 GiB/coeur), ou **128 Go** (4 noeuds), ou **64 Go** (4 noeuds)
* **/scratch local de 2 TiB (''/scratch/ssd/'')** (certains noeuds seulement)
* interconnexion Infiniband FDR (56 Gb/s)

Cloud\@PSMN (IFB)
~~~~~~~~~~~~~~~~

Voir `meso-psmn-cirrus <https://biosphere.france-bioinformatique.fr/cloud/system_status/14/>`_

Clusters de formation et d'expérimentation du CBP
-------------------------------------------------

Les machines du CBP sont actuellement décrites sur ces pages :

* `Les ressources du CBP <http://www.cbp.ens-lyon.fr/doku.php?id=ressources:ressources>`_
* `Utilisation du cluster CBP <http://www.cbp.ens-lyon.fr/python/forms/ClusterCBP>`_
* `Utilisation du Cloud CBP <http://www.cbp.ens-lyon.fr/python/forms/CloudCBP>`_