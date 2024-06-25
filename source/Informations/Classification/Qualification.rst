Qualification
=============

La `qualification <http://fr.wiktionary.org/wiki/qualification>`_ permet l'attribution d'une "qualité". Dans notre domaine, le calcul et l'informatique scientifiques, c'est l'expression d'une aptitude ou d'une capacité d'un matériel, d'un logiciel, d'une méthode à bien réaliser la tâche confiée.

Au Centre Blaise Pascal, la qualification est une activité essentielle, certainement par la proximité du centre de calcul de l'ENS-Lyon, le PSMN. Si le CBP est un centre d'essais en calcul scientifique comme l'est le `Dryden <http://www.nasa.gov/centers/dryden/home/index.html>`_ de la `NASA <http://www.nasa.gov/>`_, son "pilote d'essais informatiques" est Emmanuel Quemener.

Dans le même esprit de la NASA, le CBP met à disposition les études, tests, qualification qu'il a réalisé ou les outils qu'il a mis en oeuvre pour les réaliser. Les ressources techniques logicielles et matérielles à disposition sont décrites dans [[ressources:ressources|Une infrastructure logicielle cohérente]]

Banc d'essais
-------------

Le principal "banc d'essai" est le socle système Sidus (Single Instance Distributing Universal System).

Le Sidus permet le lancement de n'importe quel équipement démarrant par le réseau via le protocole PXE. C'est un socle :
  * **pour les matériels** : le noyau Linux intégré à la Debian est si générique qu'il permet le lancement sans modification notable de presque tous les équipements
  * **pour les logiciels** : exploitant largement la distribution Linux la plus complète, la Debian, elle offre les fondations génériques

Qualification Matérielle
------------------------

La qualification matérielle s'assure que le matériel disponible fonctionne de manière nominale avec le socle technique courant.

Au Centre Blaise Pascal, l'environnement logiciel par défaut est la Linux Debian : tous les matériels suivants ont fonctionné ou fonctionnent encore avec cette distribution.

Certains matériels (les Apple notamment) exigent parfois des processus d'installation spécifique : des pages d'aide à l'installation ont donc été écrites pour faciliter leur usage.

Serveurs
~~~~~~~~

Des modèles des marques Sun, Dell, Hewlett Packard, Fujitsu ont été qualifiés.

+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Marque   |  Modèle                          |  Distributions Debian        |  Architecture  |  Système      |  Usage       |
+===========+==================================+==============================+================+===============+==============+
|  Sun      |  v100                            |  Wheezy                      |  Sparc         |  embarqué     |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  v20z                            |  Lenny Squeeze Wheezy        |  x86_64        |  SIDUS        |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  v40z                            |  Squeeze Wheezy              |  x86_64        |  SIDUS/iSCSI  |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  v20z2                           |  Squeeze Wheezy Jessie       |  x86_64        |  SIDUS        |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  x4500                           |  Lenny Squeeze Wheezy Jessie |  x86_64        |  embarqué     |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  x4540                           |  Jessie                      |  x86_64        |  embarqué     |  en test     |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  x41z                            |  Squeeze Wheezy Jessie       |  x86_64        |  SIDUS        |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Sun      |  x2200                           |  Lenny Squeeze Wheezy Jessie |  x86_64        |  embarqué     |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE 2850                         |  Lenny Squeeze Wheezy        |  x86_64        |  embarqué     |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R610                         |  Squeeze Jessie              |  x86_64        |  embarqué     |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R710                         |  Lenny Squeeze Wheezy Jessie |  x86_64        |  embarqué     |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R510                         |  Squeeze Wheezy Jessie       |  x86_64        |  embarqué     |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R620                         |  Wheezy Jessie               |  x86_64        |  embarqué     |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE C6100                        |  Squeeze Wheezy Jessie       |  x86_64        |  SIDUS        |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE C410x                        |  Squeeze Wheezy Jessie       |  x86_64        |  embarqué     |  en prêt     |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R410                         |  Wheezy Jessie               |  x86_64        |  SIDUS        |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R720                         |  Wheezy Jessie               |  x86_64        |  iSCSI        |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Dell     |  PE R730                         |  Wheezy Jessie               |  x86_64        |  iSCSI        |  en service  |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  HP       |  SL230                           |  Lenny Squeeze Wheezy        |  x86_64        |  SIDUS        |  en prêt     |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  HP       |  SL250                           |  Lenny Squeeze Wheezy        |  x86_64        |  SIDUS        |  en prêt     |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  HP       |  DL585                           |  Lenny Squeeze Wheezy        |  x86_64        |  SIDUS        |  embarqué    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Fujitsu  |  C620                            |  Wheezy                      |  x86_64        |  SIDUS        |  embarqué    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Apple    |  Xserve-G4                       |  Wheezy                      |  PowerPC       |  embarqué     |  déclassé    |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+
|  Intel    |  :ref:`Grizzly <xeonphidebian>`  |  Wheezy                      |  x86_64 + Phi  |  iSCSI        |  en prêt     |
+-----------+----------------------------------+------------------------------+----------------+---------------+--------------+

Postes/Stations de travail
~~~~~~~~~~~~~~~~~~~~~~~~~~

+----------+-------------------+------------------------------+----------------+---------------------+
|  Marque  |  Modèle           |  Distributions Debian        |  Architecture  |  Usage              |
+==========+===================+==============================+================+=====================+
|  Dell    |  Precision 360    |  Lenny Squeeze Wheezy        |  x86           |  déclassé           |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Precision 370    |  Lenny Squeeze Wheezy        |  x86_64        |  déclassé           |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Precision 390    |  Lenny Squeeze Wheezy        |  x86_64        |  déclassé           |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Precision 3500   |  Squeeze Wheezy              |  x86_64        |  déclassé           |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Precision 7500   |  Squeeze Wheezy Jessie       |  x86_64        |  en service         |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Precision 5600   |  Wheezy Jessie               |  x86_64        |  Sidus CUDA         |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Precision 7600   |  Wheezy Jessie               |  x86_64        |  Sidus CUDA         |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Optiplex 170     |  Squeeze Wheezy              |  x86           |  déclassé           |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Dell    |  Optiplex 745     |  Squeeze Wheezy Jessie       |  x86_64        |  Sidus CUDA/Stream  |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Apple   |  iMac 7.1         |  Lenny Squeeze               |  x86_64        |  en service         |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Apple   |  iMac 11.1        |  Lenny Squeeze Wheezy Jessie |  x86_64        |  en service         |
+----------+-------------------+------------------------------+----------------+---------------------+
|  Apple   |  iMac 12.1        |  Lenny Squeeze Wheezy Jessie |  x86_64        |  en service         |
+----------+-------------------+------------------------------+----------------+---------------------+
|  HP      |  Z800             |  Lenny Squeeze               |  x86_64        |  jadis en prêt      |
+----------+-------------------+------------------------------+----------------+---------------------+
|  HP      |  Z420             |  Wheezy Jessie               |  x86_64        |  Sidus CUDA         |
+----------+-------------------+------------------------------+----------------+---------------------+

Equipements Nomades
~~~~~~~~~~~~~~~~~~~

+----------+-------------------+----------------------------+----------------+--------------+
|  Marque  |  Modèle           |  Distributions Debian      |  Architecture  |  Usage       |
+==========+===================+============================+================+==============+
|  Dell    |  Mini 1010        |  Lenny Squeeze Wheezy      |  x86           |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Dell    |  Latitude D500    |  Squeeze Wheezy            |  x86           |  en prêt     |
+----------+-------------------+----------------------------+----------------+--------------+
|  Dell    |  Latitude D800    |  Lenny Squeeze Wheezy      |  x86           |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Dell    |  Latitude E6410   |  Squeeze Wheezy            |  x86_64        |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Dell    |  Precision M4600  |  Squeeze Wheezy            |  x86_64        |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Apple   |  MacBook Pro 4.1  |  Lenny Squeeze Wheezy      |  x86_64        |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Apple   |  MacBook Pro 9.1  |  Wheezy                    |  x86_64        |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Asus    |  TF700            |  CyanogenMod 10.1 + Wheezy |  ARMv7         |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Asus    |  X55U             |  Wheezy                    |  x86_64        |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|  Samsung |  Galaxy S3        |  CyanogenMod 10.1 + Wheezy |  ARMv7         |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+
|   HP     |  8770w            |  Wheezy                    |  x86_64        |  en service  |
+----------+-------------------+----------------------------+----------------+--------------+

Equipements Micro-serveurs
~~~~~~~~~~~~~~~~~~~~~~~~~~

+---------------+--------------+------------------------+--------------------+--------------+
|  Marque       |  Modèle      |  Distributions Debian  |  Architecture      |  Usage       |
+===============+==============+========================+====================+==============+
|  Hard Kernel  |  Odroid-U2   |  Wheezy                |  ARMv7 Exynos 4412 |  en service  |
+---------------+--------------+------------------------+--------------------+--------------+
|  Hard Kernel  |  Odroid-XU   |  Wheezy                |  ARMv7 Exynos 5120 |  en service  |
+---------------+--------------+------------------------+--------------------+--------------+

Qualification Logicielle
------------------------
