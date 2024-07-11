.. _tpglusterfs:

Travaux pratiques GlusterFS pour ANF Bigdata
============================================

Support de Travaux pratiques dans le cadre de `Des données au BigData : exploitez le stockage distribué <https://indico.mathrice.fr/event/5/>`_

CQQCOQP (Comment ? Quoi ? Qui, Combien ? Où ? Quand ? Pourquoi ?)
-----------------------------------------------------------------

* **Pourquoi ?** Survoler les principales fonctionnalités de GlusterFS et se faire sa propre idée
* **Quoi ?** Tester au travers d'exemples simples en appliquant le modèles STNPPNFP
* **Quand ?** Jeudi 15 décembre de 9h à 12h
* **Combien ?** 12GB d'espace disque, 3GB de RAM, 5 VM 
* **Où ?** Sur une machine unique, dans en environnement VirtualBox
* **Qui ?** Pour des admin'sys soucieux d'expérimenter rapidement
* **Comment ?** En appliquant une série de commandes simples au travers d'un terminal

Objectif de la séance
---------------------
 
C'est de donner un aperçu des différentes fonctionnalités de GlusterFS dans un environnement propre, en insistant sur sa simplicité d'installation, de configuration, d'administration.

Préparation de la séance
------------------------
 
Prérequis matériel, logiciel & personnel
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 
De manière à ce que les travaux pratiques de chacun entraînent le minimum d'effets de bord, il est proposé de réaliser toute cette séance dans un environnement virtualisé installé sur chaque machine d'auditeur.

Les archives des machines virtuelles fournies sont issus de l'outil VirtualBox

Prérequis matériel
""""""""""""""""""
 
Devant héberger le gestionnaire de machines virtuelles VirtualBox, la machine "hôte" doit disposer de :

* au moins 4GB de RAM (3GB seront sollicités par les 5 machines virtuelles installées)
* au moins 2 coeurs
* au moins 10GB d’espace sur le disque dur (une fois les environnements déployés), donc, en comptant les archives des environnements virtualisés, 13GB d'espace
* une activation de la virtualisation dans le BIOS de la machine (elle est systématique sur les matériel Apple 

Prérequis logiciel
""""""""""""""""""

Le système d'exploitation hôte doit disposer :

* un environnement 64 bits (pour être efficace)
* le logiciel VirtualBox dans sa version 5 ou supérieure
* un client SSH pour un accès en console à la passerelle
* un client x2go pour un accès graphique à la passerelle

Prérequis personnel
"""""""""""""""""""

Une allergie à la commande en ligne rend la réalisation de ces exercices très très difficile. Il est donc recommandé d'avoir une certaine expérience d'un shell quelconque.

Les machines virtuelles fournies sont basées sur la distribution Debian Jessie. De manière à disposer d'une version récente de GlusterFS, l'archive de rétroportage officielle (paquets   backports ) ont été tous installés. Cela permet de disposer d'un noyau de version 4.7 et de GlusterFS de version 3.8.4.

Installation des machines virtuelles
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Deux archives de machines virtuelles sont à télécharger puis à intégrer. 

* `ANF-GlusterClient <http://www.cbp.ens-lyon.fr/vms/ANF_GlusterClient-161213.ova>`_ : c’est l’environnement "client".
* `ANF-GlusterMatrix <http://www.cbp.ens-lyon.fr/vms/ANF_GlusterMatrix-161213.ova>`_ : c’est la matrice qui servira à créer les 4 noeuds server GlusterFS, 

Installation du client GlusterFS passerelle
"""""""""""""""""""""""""""""""""""""""""""
 
L'installation de la machine ANF-GlusterClient ne requiert aucune modification (ni sur le nom, ni sur l'adresse MAC).

En effet, pour éviter tout effet de bord sur les communications réseau, un réseau interne privé de nom   forgluster  est intégré pour chaque machine virtuelle.

Cette machine ANF-GlusterClient , disposant de 2 interfaces, établit une communication entre l’extérieur (communication avec l’hôte et Internet) et le réseau interne   forgluster . Elle dispose également des services réseau internes classiques comme le DHCP et le DNS.

Cette machine intègre en outre un environnement graphique XFCE permettant de se connecter simplement et de ``suivre`` les serveurs. Au démarrage de la machine, cet environnement se connecte automatiquement sur le login   alpha  de mot de passe   AlphaANF2016 .

Si le mode graphique de VirtualBox ne convient pas, il est possible d'accéder directement à ANF-GlusterClient à partir de la machine hôte (ou du réseau local) en utilisant le protocole SSH ou x2go sur le port 22322.

Installation des serveurs GlusterFS par clonage
"""""""""""""""""""""""""""""""""""""""""""""""
 
L'installation des 4 serveurs GlusterFS s'effectue par clonage à l'installation de la machine ANF-GlusterMatrix.

Le clonage s'effectue en installant plusieurs fois la matrice **mais** en procédant à deux modifications :

* Changer le nom : de ANF-GlusterMatrix vers ANF-GlusterServer1, ANF-GlusterServer2, ANF-GlusterServer3 et ANF-Gluster4 (facultatif mais utile)
* Réinitialiser l'adresse Mac (indispensable !)

Ordre de démarrage & vérification de connexion
""""""""""""""""""""""""""""""""""""""""""""""
 
Le serveurs ont leurs adresses IP fournies par la machine Gluster-Client. Il est donc indispensable de   d'abord  démarrer le Gluster-Client.

Une fois la machine ANF-GlusterClient démarrée (directement sur le compte de l'utilisateur alpha), les machines serveurs peuvent être démarrées à leur tour.

En démarrant ANF-GlusterServer1, puis ANF-GlusterServer2, ensuite ANF-GlusterServer3, enfin ANF-GlusterServer4 successivement, les serveurs doivent disposer respectivement des noms peer1, peer2, peer3, peer4.

* Login ``root`` : ``GlusterANF2016`` 
* Login ``alpha`` : ``AlphaANF2016`` 

La commande ``clush`` de   ClusterShell  est utilisée pour vérifier que les 4 serveurs sont bien accessibles par le client. Elle permet de s'adresser à un groupe de machines en leur appliquant la même commande.

Pour la suite du TP, tout ou presque se fera par la commande en ligne. Donc, il est nécessaire d'ouvrir un terminal (icône en bas du bureau). De plus, la majorité des commandes sont à exécuter comme ``root``. 

De manière à simplifier le déroulé du TP en effectuant des copier/coller, il est possible d'installer un navigateur graphique dans **gluster-client**. Pour cela, taper dans un terminal : 

.. code-block:: bash

    sudo apt-get install -t jessie-backports -y firefox-esr

Appliquons la commande ``w``  aux quatres serveurs de **peer1** à **peer4**, nous avons :

.. code-block:: bash
    
    clush -w root@peer[1-4] w

Nous avons comme résultat quelque chose de comparable à :

.. code-block:: bash
    
    peer2:  15:30:54 up 23 min,  0 users,  load average: 0,00, 0,00, 0,00
    peer2: USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
    peer3:  15:30:54 up 22 min,  0 users,  load average: 0,08, 0,02, 0,01
    peer3: USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
    peer4:  15:30:54 up 21 min,  0 users,  load average: 0,00, 0,00, 0,00
    peer4: USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
    peer1:  15:30:53 up 25 min,  0 users,  load average: 0,00, 0,00, 0,00
    peer1: USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT


Si nous cherchons à vérifier que chaque serveur dispose d'un serveur GlusterFS démarré (de nom ``glusterd`` ) :

.. code-block:: bash
    
    clush -w root@peer[1-4] ps aux | grep glusterd

Nous obtenons comme résultat (au numéros de PID près) :

.. code-block:: bash
    
  peer4: root      1344  0.0  3.5 400828 17888 ?        Ssl  15:09   0:00   /usr/sbin/glusterd -p /var/run/glusterd.pid
  peer3: root      1321  0.0  3.6 400828 18192 ?        Ssl  15:08   0:00   /usr/sbin/glusterd -p /var/run/glusterd.pid
  peer2: root      1333  0.0  3.5 400828 18128 ?        Ssl  15:07   0:00   /usr/sbin/glusterd -p /var/run/glusterd.pid
  peer1: root      1341  0.0  3.5 400828 18024 ?        Ssl  15:05   0:00   /usr/sbin/glusterd -p /var/run/glusterd.pid

Premiers pas avec la commande ``gluster``
-----------------------------------------

Toutes les commandes permettant de gérer des volumes GlusterFS, les pairs, le chiffrement, des géoréplication, etc... exploitent la commande ``gluster``.

Gestion des pairs
~~~~~~~~~~~~~~~~~

Sous GlusterFS, tous les serveurs sont équivalents : il n'existe pas de serveurs de méta-données, de frontale de connexion. Ainsi, chaque composant d'une grappe de stockage distribué est équivalent à l'autre.

Ces composants assurant indifféremment stockage, gestion des méta-données et service de fichiers sont appelés des "pairs" (//peer// en anglais) et leur gestion se réalise par la commande unique ``gluster peer``

Objectifs :

* lister les pairs
* associer des pairs

Lister les pairs
""""""""""""""""

La première commande consiste à lister les pairs (les serveurs) susceptibles de partager des volumes. 

.. code-block:: bash
    
    gluster peer status

Pour la lancer sur un des serveurs en particulier, par exemple **peer1** à partir du client

.. code-block:: bash
    
    ssh root@peer1 gluster peer status

La commande renvoit :

.. code-block:: bash
    
    Number of Peers: 0

Pour le lancer sur tous les serveurs :

.. code-block:: bash
    
    clush -w root@peer[1-4] gluster peer status

La commande ``clush`` renvoit alors :

.. code-block:: bash
    
    peer1: Number of Peers: 0
    peer3: Number of Peers: 0
    peer4: Number of Peers: 0
    peer2: Number of Peers: 0

Associer des pairs
""""""""""""""""""

Il suffit de se connecter sur un des serveurs et de préciser le serveur à associer. Par exemple, pour associer le peer4 au peer1, il suffit de taper :

.. code-block:: bash
    
    gluster peer probe peer4

Pour réaliser cette opération directement à partir de la machine cliente, nous utilisons :

.. code-block:: bash
    
    ssh root@peer1 gluster peer probe peer4

En cas de succès, la commande renvoit comme message :

.. code-block:: bash
    
    peer probe: success. 

Pour assurer l'association des pairs peer3 et peer2 :

.. code-block:: bash
    
    ssh root@peer1 gluster peer probe peer3

.. code-block:: bash
    
    peer probe: success. 

.. code-block:: bash
    
    ssh root@peer1 gluster peer probe peer2

.. code-block:: bash
    
    peer probe: success. 

De manière à vérifier que les serveurs   peer1  à   peer4  font désormais partie de la même grappe, nous utilisons :

.. code-block:: bash
    
    ssh root@peer1 gluster pool list

La commande renvoit :

.. code-block:: bash
    
    UUID					Hostname 	State
    26898237-86c7-4687-8660-703de9cd48b0	peer4    	Connected 
    d7ae008b-1269-4992-bb1b-bd858eeb1ccc	peer3    	Connected 
    a6fd556e-7fa9-4c3c-8190-8b33805d47d3	peer2    	Connected 
    25dbbaa2-980d-42a8-bd04-426218d9673a	localhost	Connected 

La machine **peer1** sur laquelle nous avons lancée notre commande répond avec son nom local **localhost**.

Les UUID présentés dans le résultat (et unique pour chacun de nous) de la dernière commande permettent d’identifier de manière unique un serveur. Ces UUID sont présents dans le fichier ``/var/lib/glusterd/glusterd.info``.

Pour nous en assurer, nous utilisons :

.. code-block:: bash
    
    clush -w root@peer[1-4] cat /var/lib/glusterd/glusterd.info

La commande renvoit :

.. code-block:: bash
    
    peer1: UUID=25dbbaa2-980d-42a8-bd04-426218d9673a
    peer1: operating-version=30800
    peer3: UUID=d7ae008b-1269-4992-bb1b-bd858eeb1ccc
    peer3: operating-version=30800
    peer4: UUID=26898237-86c7-4687-8660-703de9cd48b0
    peer4: operating-version=30800
    peer2: UUID=a6fd556e-7fa9-4c3c-8190-8b33805d47d3
    peer2: operating-version=30800

Création d'un premier volume GlusterFS
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Maintenant, nous sommes prêts à créer notre premier volume GlusterFS.

La première étape pour créer un volume GlusterFS est d'abord de définir une racine dans laquelle GlusterFS va stocker tout le nécessaire au stockage des données et à la gestion des méta-données.

Nous allons aussi créer un point de montage de ce volume

Objectifs : 

- créer et activer un volume de type "distributed"
- monter la partition en local ou distanciel
- étudier le stockage local
- ajouter le support NFS
  
Etapes : 

- créer le dossier de stockage local ``/MyGluster`` sur le pair **peer1** 
- créer un volume ``MyGluster`` sur le pair **peer1** 
- observer les propriétés du volume ``MyGluster`` 
- activer le volume ``MyGluster``
- observer les changements de propriétés de ``MyGluster``
- monter sur le pair **peer1** le volume MyGluster sur la racine ``/media/MyGluster`` 
- monter sur le client le volume ``MyGluster``  dans le dossier ``/media/MyGluster`` 
- créer un fichier ``TestFile.txt`` dans le dossier ``/media/MyGluster`` contenant "Premier Test" sur le client
- regarder la signature MD5 de ``TestFile.txt`` dans le dossier monté sur le serveur
- regarder la signature MD5 de ``TestFile.txt`` dans le dossier de stockage du serveur
- ajouter le support NFS sur le volume ``MyGluster``
- regarder les propriétés du volume ``MyGluster``
- monter le volume ``MyGluster`` en NFS sur le client dans le dossier ``/media/MyGlusterNFS`` préabalement créé
- regarder la signature MD5 de ``TestFile.txt`` dans le dossier NFS

Création d’un dossier pour le premier partage

.. code-block:: bash
    
    ssh root@peer1 mkdir /MyGluster

Création du volume GlusterFS de nom ``MyGluster`` sur ce point de montage ``/MyGluster`` sur le serveur 1 nommé **peer1**

.. code-block:: bash
    
    ssh root@peer1 gluster volume create MyGluster peer1:/MyGluster force

L’option ``force`` est indispensable dans ce cas : en effet, tout le système des machines virtuelles créées repose sur une unique partition. GlusterFS le détecte et ne recommande pas cette opération. Nous lui forçons la main !

.. code-block:: bash
    
    volume create: MyGluster: success: please start the volume to access data


L’indication précédente invite à le monter, c’est ce que nous faisons :

.. code-block:: bash
    
    ssh root@peer1 gluster volume start MyGluster

.. code-block:: bash
    
    volume start: MyGluster: success

La commande ``gluster volume info`` permet à tout instant de visualiser la configuration 

.. code-block:: bash
    
    ssh root@peer1 gluster volume info

.. code-block:: bash
    
    Volume Name: MyGluster
    Type: Distribute
    Volume ID: 70b68cd9-357c-40aa-bcfc-9c1b1a51b4b7
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 1
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGluster
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Cet espace de stockage est déjà montable sur n’importe quelle machine, sur le serveur lui même :

.. code-block:: bash
    
    ssh root@peer1 mkdir /media/MyGluster
    ssh root@peer1 mount -t glusterfs peer1:MyGluster /media/MyGluster

.. code-block:: bash
    
    ssh root@peer1 df

.. code-block:: bash
    
    Sys. de fichiers blocs de 1K Utilise Disponible Uti
    devtmpfs              239524       0     239524   0
    tmpfs                 252128       0     252128   0
    tmpfs                 252128    6636     245492   3
    tmpfs                   5120       0       5120   0
    tmpfs                 252128       0     252128   0
    /dev/sda1            1951744  847456     981376  47
    peer1:MyGluster      1951744  847488     981376  47

Ou sur le client :

.. code-block:: bash
    
    sudo mount -t glusterfs peer1:MyGluster /media/MyGluster
 
Il est possible d'utiliser la commande plus compacte ``mount.glusterfs`` en lieu et place de ``mount -t glusterfs``. Cependant, cette commande n'est pas recommandée parce qu'elle empêche l'utilisation de l'option ``noatime`` bien utile pour ne pas //surcharger// le système de fichiers hôte à chaque accès de fichiers.

.. code-block:: bash
    
    df

.. code-block:: bash
    
    Sys. de fichiers blocs de 1K Utilise Disponible Uti
    udev                   10240       0      10240   0
    tmpfs                 204068    2988     201080   2
    /dev/sda1            3905536 1519816    2165432  42
    tmpfs                 510168       0     510168   0
    tmpfs                   5120       0       5120   0
    tmpfs                 510168       0     510168   0
    peer1:MyGluster      1951744  847488     981248  47

Écrivons un premier fichier dans le volume monté sur le client et récupérons sa signature MD5 à des fins de vérification :

.. code-block:: bash
    
    sudo sh -c 'echo "Premier Test" > /media/MyGluster/TestFile.txt'
    md5sum /media/MyGluster/TestFile.txt 

La commande renvoit :

.. code-block:: bash
    
    6a55620050029ce24a149a6b02cf9f73  /media/MyGluster/TestFile.txt

Nous pouvons également vérifier la cohérence du fichier dans le volume en lançant la commande sur un autre client, par exemple le serveur lui même !

.. code-block:: bash
    
    ssh root@peer1 md5sum /media/MyGluster/TestFile.txt 
 
La commande renvoit :

.. code-block:: bash
    
    6a55620050029ce24a149a6b02cf9f73  /media/MyGluster/TestFile.txt

GlusterFS permet de pouvoir exploiter un volume GlusterFS en NFS standard.

L'activation du partage NFS se fait très simplement sur le volume gluster. Il suffit de désactiver le paramètre ``nfs.disable`` 

.. code-block:: bash
    
    ssh root@peer1 gluster volume set MyGluster nfs.disable off

La commande renvoir en cas de succès :

.. code-block:: bash
    
    volume set: success

Créons alors un nouveau point de montage et montons ce partage GlusterFS en NFS

.. code-block:: bash
    
    sudo mkdir /media/MyGlusterNFS
    sudo mount -t nfs peer1:/MyGluster /media/MyGlusterNFS

Assurons-nous du montage par la commande ``df`` laquelle renvoit :

.. code-block:: bash
    
    Sys. de fichiers blocs de 1K Utilise Disponible Uti
    udev                   10240       0      10240   0
    tmpfs                 204068    2992     201076   2
    /dev/sda1            3905536 1519816    2165432  42
    tmpfs                 510168       0     510168   0
    tmpfs                   5120       0       5120   0
    tmpfs                 510168       0     510168   0
    peer1:MyGluster      1951744  847616     981248  47
    peer1:/MyGluster     1951744  846848     982016  47

Là aussi, un petit test pour voir si le document est consistant :

.. code-block:: bash
    
    md5sum /media/MyGlusterNFS/TestFile.txt
    ssh root@peer1 md5sum /media/MyGluster/TestFile.txt

La sortie des 2 commandes précédentes est la suivante :

.. code-block:: bash
    
    6a55620050029ce24a149a6b02cf9f73  /media/MyGlusterNFS/TestFile.txt
    6a55620050029ce24a149a6b02cf9f73  /media/MyGluster/TestFile.txt

Il est aussi intéressant de "voir" comment, où et de quelle manière GlusterFS stocke les informations. Le dossier ``/MyGluster`` sur   **peer1** contient tous les documents que nous avons créés, mais plus encore :

.. code-block:: bash
    
    ssh root@peer1 ls -la /MyGluster 

.. code-block:: bash
    
    total 24
    drwxr-xr-x 1 root root  88 nov.  30 17:02 .
    drwxr-xr-x 1 root root 210 nov.  30 16:49 ..
    drw------- 1 root root 208 nov.  30 17:02 .glusterfs
    -rw-r--r-- 2 root root  13 nov.  30 16:55 TestFile.txt
    drwxr-xr-x 1 root root  22 nov.  30 16:51 .trashcan

Si nous regardons la signature des fichiers que nous avons créés : 

.. code-block:: bash
    
    ssh root@peer1 md5sum /MyGluster/TestFile.txt
 
.. code-block:: bash
    
    6a55620050029ce24a149a6b02cf9f73  /MyGluster/TestFile.txt

Nous retrouvons donc bien, à l’endroit où nous avons placé "physiquement" les données, le fichier dans sa totalité, avec la cohérence associée.

Pour visualiser les clients qui ont monté le volume, la commande ``gluster volume status`` peut-être utilisée :

.. code-block:: bash
    
    ssh root@peer1 gluster volume status

.. code-block:: bash
    
    Client connections for volume MyGluster
    ----------------------------------------------
    Brick : peer1:/MyGluster
    Clients connected : 6
    Hostname                                               BytesRead    BytesWritten
    --------                                               ---------    ------------
    10.20.16.1:49145                                            5968            4692
    10.20.16.254:49149                                         10165            9268
    10.20.16.1:49146                                            4516            4400
    10.20.16.3:49148                                            1708            1228
    10.20.16.4:49148                                            1708            1228
    10.20.16.2:49148                                            1708            1228


Vient maintenant le moment de clore ce premier contact avec un volume GlusterFS ``atomique``, sur un seul serveur, en démontant d'abord tous les clients connectés :

Nous démontons d'abord sur le client les volumes montés en GlusterFS et NFS :

.. code-block:: bash
    
    sudo umount /media/MyGlusterNFS
    sudo umount /media/MyGluster

Nous démontons ensuite sur le serveur

.. code-block:: bash
    
    ssh root@peer1 umount /media/MyGluster

.. code-block:: bash
    
    ssh root@peer1 gluster volume status MyGluster clients

.. code-block:: bash
    
    Client connections for volume MyGluster
    ----------------------------------------------
    Brick : peer1:/MyGluster
    Clients connected : 4
    Hostname                                               BytesRead    BytesWritten
    --------                                               ---------    ------------
    10.20.16.1:49146                                            4860            4848
    10.20.16.3:49148                                            1708            1228
    10.20.16.4:49148                                            1708            1228
    10.20.16.2:49148                                            1708            1228
  
Il ne reste finalement que les 4 serveurs qui sont clients d’eux mêmes pour diffuser les données.

Arrêt & suppression d’un volume GlusterFS 

Les commandes d'arrêt et de suppression de volume nécessitent une validation par ``y``. Pour la valider en forçant, nous préfixons la commande de ``echo y |``.

Arrêt du volume 

.. code-block:: bash

    ssh root@peer1 "echo y | gluster volume stop MyGluster"

.. code-block:: bash
    
    Stopping volume will make its data inaccessible. Do you want to continue? (y/n) volume stop: MyGluster: success

Suppression du volume 

.. code-block:: bash
    
    ssh root@peer1 "echo y | gluster volume delete MyGluster"

.. code-block:: bash
    
    Deleting volume will erase all information about the volume. Do you want to continue? (y/n) volume delete: MyGluster: success

Vérification de suppression 

.. code-block:: bash
    
    ssh root@peer1 gluster volume info

.. code-block:: bash
    
    No volumes present

Création d'un volume de type ``distributed`` (équivalent ``linear``)
--------------------------------------------------------------------

Le mode d'agrégation par défaut de GlusterFS s'apparente au mode ``linear`` de la gestion par ``mdadm``. Il consiste simplement à agréger des volumes.

Création des racines de stockages

Nous créons sur chaque pair **peer1** à **peer4** une nouvelle racine de stockage.

.. code-block:: bash
    
    clush -w root@peer[1-4] mkdir /MyGlusterLinear /media/MyGlusterLinear

Création du volume de montage 

Dans notre cas, nous créons un volume de nom ``MyGlusterLinear`` agrégeant les racines de stockage ``/MyGlusterLinear`` des pairs   **peer1**, **peer2** : 

.. code-block:: bash
    
    ssh root@peer1 gluster volume create MyGlusterLinear transport tcp peer1:/MyGlusterLinear peer2:/MyGlusterLinear force  

En cas de succès, la commande renvoit :

.. code-block:: bash
    
    volume create: MyGlusterLinear: success: please start the volume to access data

Démarrage du volume 

Comme dans le cas précédent, un volume créé demande d'être activé :

.. code-block:: bash
    
    ssh root@peer1 gluster volume start MyGlusterLinear

En cas de succès :

.. code-block:: bash
    
    volume start: MyGlusterLinear: success

Information sur le volume créé 

Pour visualiser la configuration du volume créé, nous utilisons :

.. code-block:: bash
    
    ssh root@peer1 gluster volume info MyGlusterLinear

La commande renvoit :

.. code-block:: bash
    
    Volume Name: MyGlusterLinear
    Type: Distribute
    Volume ID: e77e82d8-f1e6-49f1-b72a-7e25ba3465b4
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 2
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterLinear
    Brick2: peer2:/MyGlusterLinear
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Comme nouveauté, nous voyons que les nombres de //bricks// composant le volume est de 2, et que ces ``briques`` sont listées sous forme de leur pair associé à la racine de stockage.

Montage d'un volume Distribute & investigations 

Montons sur le client ce volume après création d'un point spécifique :

.. code-block:: bash
    
    sudo mkdir /media/MyGlusterLinear
    sudo mount -t glusterfs peer1:MyGlusterLinear /media/MyGlusterLinear

Explorons l'espace disponible :

.. code-block:: bash
    
    df -h | grep Gluster

Nous disposons donc de 1.7GB d'espace libre :

.. code-block:: bash
    
    peer1:MyGlusterLinear   3,8G    1,7G  1,9G  47% /media/MyGlusterLinear

Si nous regardons quel espace est disponible sur les serveurs

.. code-block:: bash
    
    clush -w root@peer[1-2] df -h | grep sda

.. code-block:: bash
    
    root@peer2: /dev/sda1          1,9G    835M  951M  47% /
    root@peer1: /dev/sda1          1,9G    835M  951M  47% /

Nous constatons que chacun dispose de 828MB ce qui représente le quart de l'espace identifié plus haut : une solution donc simple pour concaténer les espaces disponibles de serveurs.

Configurons l'espace de stockage comme un espace ``/scratch`` (avec des droits comparables à du ``/tmp``):

.. code-block:: bash
    
    sudo chmod 777 /media/MyGlusterLinear
    sudo chmod o+t /media/MyGlusterLinear
    ls -ltra /media/MyGlusterLinear

Test d'écritures parallèles & investigations 

Lançons un test écrivant un millier de fichiers en parallèle :

.. code-block:: bash
    
    seq -w 1000 | /usr/bin/time xargs -P 1000 -I '{}' bash -c "echo Hello File '{}' > /media/MyGlusterLinear/File.'{}'"

Cette commande prend un peu moins d'une minute sur une machine lente.

Lançons maintenant une lecture tout aussi parallèle

.. code-block:: bash
    
    ls /media/MyGlusterLinear/File.* | /usr/bin/time xargs -P 1000 -I '{}' md5sum '{}'

Cette commande ne prend quelques quelques secondes.

Il est possible de voir comment sont distribués les fichiers sur les différents serveurs :

.. code-block:: bash
    
    clush -w root@peer[1-4] 'ls /MyGlusterLinear/File.* | wc -l'

.. code-block:: bash
    
    root@peer4: 0
    root@peer4: ls: impossible d'accéder à /MyGlusterLinear/File.*: Aucun fichier ou dossier de ce type
    root@peer1: 506
    root@peer2: 494
    root@peer3: 0
    root@peer3: ls: impossible d'accéder à /MyGlusterLinear/File.*: Aucun fichier ou dossier de ce type
  
Il y a donc à peu près équirépartition des écritures entre les serveurs **peer1** et **peer2** : GlusterFS remplit donc son office !

Ajoutons une brique avec **peer3** :

.. code-block:: bash
    
    ssh root@peer1 gluster volume add-brick MyGlusterLinear peer3:/MyGlusterLinear force

En cas de succès, nous obtenons :

.. code-block:: bash
    
    volume add-brick: success

.. code-block:: bash
    
    ssh root@peer3 gluster volume info

.. code-block:: bash
    
    Volume Name: MyGlusterLinear
    Type: Distribute
    Volume ID: e6cc9af2-5f48-4599-bc8e-12a7ee9d39b1
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 3
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterLinear
    Brick2: peer2:/MyGlusterLinear
    Brick3: peer3:/MyGlusterLinear
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Regardons si l'espace disponible s'est étendu par la commande ``df``:

.. code-block:: bash
    
    Sys. de fichiers      Taille Utilisé Dispo Uti% Monté sur
    udev                     10M       0   10M   0% /dev
    tmpfs                   200M    3,0M  197M   2% /run
    /dev/sda1               3,8G    1,7G  1,9G  47% /
    tmpfs                   499M       0  499M   0% /dev/shm
    tmpfs                   5,0M       0  5,0M   0% /run/lock
    tmpfs                   499M       0  499M   0% /sys/fs/cgroup
    peer1:MyGlusterLinear   5,6G    2,5G  2,8G  47% /media/MyGlusterLinear

L'espace s'est étendu d'autant !

Lançons le mécanisme de répartition avec ``balance`` :

.. code-block:: bash
    
    ssh root@peer1 gluster volume rebalance MyGlusterLinear start

.. code-block:: bash
    
    volume rebalance: MyGlusterLinear: success: Rebalance on MyGlusterLinear has been started successfully. Use rebalance status command to check status of the rebalance process.
    ID: 58ce178d-5fd8-44b2-b484-382f71ad0a02

Cette procédure pouvant être assez longue, l'état du ``rebalance`` s'obtient par un simple ``status`` à la place de ``start``.

.. code-block:: bash
    
    ssh root@peer1 gluster volume rebalance MyGlusterLinear status

Nous avons une sortie comparable à ce qui suit :

.. code-block:: bash
    
                                        Node Rebalanced-files          size       scanned      failures       skipped               status  run time in h:m:s
                                    ---------      -----------   -----------   -----------   -----------   -----------         ------------     --------------
                                    localhost              171         2.7KB           506             0             0            completed        0:0:8
                                        peer3                0        0Bytes             2             0             0            completed        0:0:0
                                        peer2                0        0Bytes           494             0           147            completed        0:0:4
    volume rebalance: MyGlusterLinear: success


Si nous regardons la redistribution, nous obtenons :

.. code-block:: bash
    
    clush -w root@peer[1-4] 'ls /MyGlusterLinear/File.* | wc -l'

.. code-block:: bash
    
    root@peer2: 347
    root@peer1: 335
    root@peer4: 0
    root@peer4: ls: impossible d'accéder à /MyGlusterLinear/File.*: Aucun fichier ou dossier de ce type
    root@peer3: 318

La redistribution n'est pas parfaite, mais elle reste correcte !

Supprimons maintenant la brique issue de **peer1** à partir de **peer2** :

.. code-block:: bash
    
    ssh root@peer2 gluster volume remove-brick MyGlusterLinear peer1:/MyGlusterLinear start

Le message suivant indique que la procédure a démarré

.. code-block:: bash
    
    volume remove-brick start: success
    ID: 92c17fc7-9980-4c73-83fd-fd011a8be530

Contrôlons la progression de la migration des données issues de la demande de suppression :

.. code-block:: bash
    
    ssh root@peer2 gluster volume remove-brick MyGlusterLinear peer1:/MyGlusterLinear status

Une fois terminé, nous avons pour la même commande précédente :

.. code-block:: bash
    
                                    Node Rebalanced-files          size       scanned      failures       skipped               status  run time in h:m:s
                               ---------      -----------   -----------   -----------   -----------   -----------         ------------     --------------
                      peer1.gluster.zone              335         5.2KB           335             0             0            completed        0:0:13

Relançons la commande pour voir la distribution sur les différents serveurs

.. code-block:: bash
    
    clush -w root@peer[1-4] 'ls /MyGlusterLinear/File.* | wc -l'

Nous obtenons :

.. code-block:: bash
    
    root@peer1: 0
    root@peer1: ls: impossible d'accéder à /MyGlusterLinear/File.*: Aucun fichier ou dossier de ce type
    root@peer4: 0
    root@peer4: ls: impossible d'accéder à /MyGlusterLinear/File.*: Aucun fichier ou dossier de ce type
    root@peer2: 347
    root@peer3: 653

Les fichiers ont bien disparu de **peer1** et se sont retrouvés sur **peer3** !

Validons la suppression

.. code-block:: bash
    
    ssh root@peer2 'echo y | gluster volume remove-brick MyGlusterLinear peer1:/MyGlusterLinear commit'

Un petit message nous invite à la prudence, pour, au pire, restaurer les données :

.. code-block:: bash

    
    Removing brick(s) can result in data loss. Do you want to Continue? (y/n) volume remove-brick commit: success
    Check the removed bricks to ensure all files are migrated.
    If files with data are found on the brick path, copy them via a gluster mount point before re-purposing the removed brick. 


.. code-block:: bash

    ssh root@peer3 gluster volume info

.. code-block:: bash
    
    Volume Name: MyGlusterLinear
    Type: Distribute
    Volume ID: e6cc9af2-5f48-4599-bc8e-12a7ee9d39b1
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 2
    Transport-type: tcp
    Bricks:
    Brick1: peer2:/MyGlusterLinear
    Brick3: peer3:/MyGlusterLinear
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Effaçons ces fichiers et démontons le volume monté sur le client :

.. code-block:: bash
    
    rm /media/MyGlusterLinear/File.*
    sudo umount /media/MyGlusterLinear

.. container:: note note-important

    Il ne faut utiliser la commande ``replace-brick`` **uniquement** dans le cadre d'un volume ``replica`` !</note>

Création d’un volume de type ``striped`` (équivalent RAID0)
-----------------------------------------------------------

.. code-block:: bash
    
    clush -w root@peer[1-4] mkdir /MyGlusterRAID0

.. code-block:: bash
    
    ssh root@peer1 gluster volume create MyGlusterRAID0 stripe 2 peer1:/MyGlusterRAID0 peer2:/MyGlusterRAID0 force
    ssh root@peer1 gluster volume start MyGlusterRAID0

.. code-block:: bash
    
    volume create: MyGlusterRAID0: success: please start the volume to access data
    volume start: MyGlusterRAID0: success

.. code-block:: bash
    
    ssh root@peer1 gluster volume info MyGlusterRAID0

.. code-block:: bash
    
    Volume Name: MyGlusterRAID0
    Type: Stripe
    Volume ID: 4b7451de-36cc-4679-925e-f0846e4325b9
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 1 x 2 = 2
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterRAID0
    Brick2: peer2:/MyGlusterRAID0
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Montage sur le client & réglages de droits d'accès

.. code-block:: bash
    
    mkdir /media/MyGlusterRAID0
    sudo mount -t glusterfs -o noatime peer1:MyGlusterRAID0 /media/MyGlusterRAID0
    sudo chmod 777 /media/MyGlusterRAID0
    sudo chmod o+t /media/MyGlusterRAID0

Ecriture de données & cohérence des données 

.. code-block:: bash
    
    seq -w 1000 | /usr/bin/time xargs -P 1000 -I '{}' bash -c "echo Hello File '{}' > /media/MyGlusterRAID0/File.'{}'"

Si nous regardons les MD5 dans ``/media/MyGlusterRAID0/`` et sur les deux serveurs **peer1** et **peer2** dans ``/MyGlusterRAID0/``, nous constatons uniquement des fichiers de taille nulle sont sur **peer2** et les mêmes signature sur **peer1** : ceci est dû à la taille au delà de laquelle les données sont découpées.

En effet, la commande ``ssh root@peer1 gluster volume get MyGlusterRAID0 all | grep stripe-block-size``

.. code-block:: bash
    
    cluster.stripe-block-size               128KB                                   

Essayons avec 10 fichiers de 1MB générés aléatoirement pour dépasser cette limite

.. code-block:: bash
    
    rm /media/MyGlusterRAID0/File.*
    seq -w 10 | /usr/bin/time xargs -P 10 -I '{}' bash -c "base64 /dev/urandom | head -c 1048576 > /media/MyGlusterRAID0/File.'{}'"

.. code-block:: bash
    
    ls /media/MyGlusterRAID0/File.* | xargs -P 10 -I '{}' md5sum '{}' | sort
    ssh root@peer1 "ls /MyGlusterRAID0/File.* | xargs -I '{}' md5sum '{}'" | sort
    ssh root@peer2 "ls /MyGlusterRAID0/File.* | xargs -I '{}' md5sum '{}'" | sort

Nous voyons que les sommes MD5 ne sont pas identiques... En cas de plantage de GlusterFS, il n'y a pas possibilité de récupérer les informations en allant les chercher "à la main".

Création d’un volume de type ``replica`` (équivalent RAID1)
-----------------------------------------------------------

.. code-block:: bash
    
    clush -w root@peer[1-4] mkdir /MyGlusterRAID1

.. code-block:: bash
    
    ssh root@peer1 gluster volume create MyGlusterRAID1 replica 2 peer1:/MyGlusterRAID1 peer3:/MyGlusterRAID1 force
    ssh root@peer1 gluster volume start MyGlusterRAID1

.. code-block:: bash
    
    volume create: MyGlusterRAID1: success: please start the volume to access data
    volume start: MyGlusterRAID1: success

.. code-block:: bash
    
    ssh root@peer3 gluster volume info MyGlusterRAID1

.. code-block:: bash
    
    Volume Name: MyGlusterRAID1
    Type: Replicate
    Volume ID: 7bb3b6dd-a82c-45bd-bb28-5f9545438d84
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 1 x 2 = 2
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterRAID1
    Brick2: peer3:/MyGlusterRAID1
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Montage sur le client & réglages de droits d'accès

.. code-block:: bash
    
    mkdir /media/MyGlusterRAID1
    sudo mount -t glusterfs -o noatime peer1:MyGlusterRAID1 /media/MyGlusterRAID1
    sudo chmod 777 /media/MyGlusterRAID1
    sudo chmod o+t /media/MyGlusterRAID1

Ecriture de données & cohérence des données 

.. code-block:: bash
    
    seq -w 1000 | /usr/bin/time xargs -P 1000 -I '{}' bash -c "echo Hello File '{}' > /media/MyGlusterRAID1/File.'{}'"

.. code-block:: bash
    
    ls /media/MyGlusterRAID1/File.* | xargs -P 1000 -I '{}' md5sum '{}' | sort | awk '{ print $1 }' > /tmp/Gluster.md5
    ssh root@peer1 "ls /MyGlusterRAID1/File.* | xargs -P 1000 -I '{}' md5sum '{}'" | sort | awk '{ print $1 }' > /tmp/GlusterPeer1.md5
    ssh root@peer3 "ls /MyGlusterRAID1/File.* | xargs -P 1000 -I '{}' md5sum '{}'" | sort | awk '{ print $1 }' > /tmp/GlusterPeer3.md5

.. code-block:: bash
    
    md5sum /tmp/Gluster.md5 /tmp/GlusterPeer1.md5 /tmp/GlusterPeer3.md5 

.. code-block:: bash
    
    521e443b0dd9b639f7610c0a7e0dd001  /tmp/Gluster.md5
    521e443b0dd9b639f7610c0a7e0dd001  /tmp/GlusterPeer1.md5
    521e443b0dd9b639f7610c0a7e0dd001  /tmp/GlusterPeer3.md5

Essayons avec 10 fichiers de 1MB générés aléatoirement pour dépasser cette limite

.. code-block:: bash
    
    rm /media/MyGlusterRAID1/File.*
    seq -w 10 | /usr/bin/time xargs -P 10 -I '{}' bash -c "base64 /dev/urandom | head -c 1048576 > /media/MyGlusterRAID1/File.'{}'"

.. code-block:: bash
    
    ls /media/MyGlusterRAID1/File.* | xargs -P 10 -I '{}' md5sum '{}' | sort
    ssh root@peer1 "ls /MyGlusterRAID1/File.* | xargs -I '{}' md5sum '{}'" | sort
    ssh root@peer3 "ls /MyGlusterRAID1/File.* | xargs -I '{}' md5sum '{}'" | sort

Même pour des fichiers de taille plus importante, la cohérence des données est respectée.

AJout d'une brique sur le replica :

Etant donné que nous sommes en mode ``replica``, il est nécessaire d'associer une brique contenant deux espaces :

.. code-block:: bash
    
    ssh root@peer1 gluster volume add-brick MyGlusterRAID1 replica 2 peer2:/MyGlusterRAID1 peer4:/MyGlusterRAID1 force

Le ``gluster volume info MyGlusterRAID1`` fournit :

.. code-block:: bash
    
    Volume Name: MyGlusterRAID1
    Type: Distributed-Replicate
    Volume ID: 7bb3b6dd-a82c-45bd-bb28-5f9545438d84
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 2 x 2 = 4
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterRAID1
    Brick2: peer3:/MyGlusterRAID1
    Brick3: peer2:/MyGlusterRAID1
    Brick4: peer4:/MyGlusterRAID1
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Lançons un ``rebalance`` sur le volume ``ssh root@peer4 gluster volume rebalance MyGlusterRAID1 start``

.. code-block:: bash
    
    volume rebalance: MyGlusterRAID1: success: Rebalance on MyGlusterRAID1 has been started successfully. Use rebalance status command to check status of the rebalance process.
    ID: 12d11627-146d-4057-b1f7-e041f9b1b218

.. code-block:: bash
    
    ssh root@peer4 gluster volume rebalance MyGlusterRAID1 status

.. code-block:: bash
    
                                        Node Rebalanced-files          size       scanned      failures       skipped               status  run time in h:m:s
                                    ---------      -----------   -----------   -----------   -----------   -----------         ------------     --------------
                                    localhost                0        0Bytes             0             0             0            completed        0:0:0
                            peer1.gluster.zone                4         4.0MB            10             0             0            completed        0:0:1
                                        peer3                0        0Bytes             0             0             0            completed        0:0:0
                                        peer2                0        0Bytes             0             0             0            completed        0:0:1
    volume rebalance: MyGlusterRAID1: success

Eléments de sécurité sous GlusterFS
-----------------------------------

Résilience de l'accès au serveur
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Démontons le volume ``MyGlusterRAID1`` sur le client :

.. code-block:: bash
    
    sudo umount /media/GlusterRAID1/

Simulons une panne en arrêtant le démon ``glusterd`` sur **peer1** :

.. code-block:: bash
    
    ssh root@peer1 systemctl stop glusterfs-server.service

Essayons de remonter le volume ``MyGlusterRAID1``:

.. code-block:: bash
    
    sudo mount -t glusterfs peer1:MyGlusterRAID1 /media/MyGlusterRAID1/

Ca ne fonctionne pas avec le message :

.. code-block:: bash
    
    Mount failed. Please check the log file for more details.

En allant regarder dans les logs d'erreur :

.. code-block:: bash
    
 sudo cat /var/log/glusterfs/media-MyGlusterRAID1.log | grep ' E '

.. code-block:: bash
    
    [2016-12-14 14:43:55.901290] E [socket.c:2309:socket_connect_finish] 0-glusterfs: connection to 10.20.16.1:24007 failed (Connexion refusée)
    [2016-12-14 14:43:55.901332] E [glusterfsd-mgmt.c:1902:mgmt_rpc_notify] 0-glusterfsd-mgmt: failed to connect with remote-host: peer1 (Noeud final de transport n'est pas connecté)

Etant donné que notre volume est reparti sur 4 serveurs dont 1 indisponible, nous pouvons monter le partage en utilisant l'option ``backup-volfile-servers`` :

.. code-block:: bash
    
    sudo mount -t glusterfs -obackup-volfile-servers=peer1:peer2:peer3:peer4,noatime peer1:MyGlusterRAID1 /media/MyGlusterRAID1/

Le volume se monte et les données sont accessibles.

Réactivons quand même le service GlusterFS sur **peer1** :

.. code-block:: bash
    
    ssh root@peer1 systemctl start glusterfs-server.service

Vérifions que le démon est bien opérationnel par ``ssh root@peer1 gluster volume info MyGlusterRAID1``

Contrôle d'accès par adresse
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Objectif : filtrer l'accès au volume GlusterFS par adresse IP

Démontons le volume du client

.. code-block:: bash
    
    sudo umount /media/MyGlusterRAID1

Détermination de l'IP des machines

Les serveurs disposent d'une adresse de **10.20.16.1** à **10.20.16.4**. 

Restriction à uniquement les serveurs du pool avec l'attribut ``auth.allow`` définit à toutes les IP des serveurs de **peer1** à **peer4**.

.. code-block:: bash
    
    ssh root@peer1 gluster volume set MyGlusterRAID1 auth.allow 10.20.16.1,10.20.16.2,10.20.16.3,10.20.16.4

.. code-block:: bash
    
    gluster volume info

.. code-block:: bash
    
    Volume Name: MyGlusterRAID1
    Type: Distributed-Replicate
    Volume ID: 7bb3b6dd-a82c-45bd-bb28-5f9545438d84
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 2 x 2 = 4
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterRAID1
    Brick2: peer3:/MyGlusterRAID1
    Brick3: peer2:/MyGlusterRAID1
    Brick4: peer4:/MyGlusterRAID1
    Options Reconfigured:
    auth.allow: 10.20.16.1,10.20.16.2,10.20.16.3,10.20.16.4
    nfs.disable: on
    performance.readdir-ahead: on
    transport.address-family: inet

Lançons la commande de montage sur le client

.. code-block:: bash
    
    sudo mount -t glusterfs peer1:MyGlusterRAID1 /media/MyGlusterRAID1/

La commande s'exécute mais rien ne se monte : ``df | grep MyGlusterRAID1`` permet de s'en assurer...

Si nous rajoutons l'IP du client **10.20.16.254**, avec la commande :

.. code-block:: bash
    
    ssh root@peer1 gluster volume set MyGlusterRAID1 auth.allow 10.20.16.1,10.20.16.2,10.20.16.3,10.20.16.4,10.20.16.254

Nous pouvons monter le volume ``MyGlusterRAID1``.

Pour réinitialiser une valeur, nous utilisons : la commande ``reset`` sur l'attribut, ici ``auth.allow``

.. code-block:: bash
    
    ssh root@peer1 gluster volume reset MyGlusterRAID1 auth.allow

Démontage du volume du client par ``sudo umount /media/MyGlusterRAID1``

Chiffrement de la communication
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Objectif : assurer une confidentialité forte sur l'accès et le transit 

Démontage de 

Création de la clé OpenSSL, des certificats serveurs et client

.. code-block:: bash
    
    openssl genrsa -out glusterfs.key 1024
    openssl req -new -x509 -days 3650 -key glusterfs.key -subj /CN=gluster-client -out gluster-client.pem
    seq 4 | xargs -I '{}' openssl req -new -x509 -days 3650 -key glusterfs.key -subj /CN=peer'{}' -out peer'{}'.pem

.. code-block:: bash
    
    cat peer* >> glusterfs.ca

.. code-block:: bash
    
    seq 4 | xargs -I '{}' scp glusterfs.key root@peer'{}':/etc/ssl
    seq 4 | xargs -I '{}' scp glusterfs.ca root@peer'{}':/etc/ssl

.. code-block:: bash
    
    ssh root@peer1 gluster volume set MyGlusterRAID1 client.ssl on
    ssh root@peer1 gluster volume set MyGlusterRAID1 server.ssl on
    ssh root@peer1 gluster volume set MyGlusterRAID1 ssl.own-cert /etc/ssl/glusterfs.ca

.. code-block:: bash
    
    Volume Name: MyGlusterRAID1
    Type: Distributed-Replicate
    Volume ID: 7bb3b6dd-a82c-45bd-bb28-5f9545438d84
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 2 x 2 = 4
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterRAID1
    Brick2: peer3:/MyGlusterRAID1
    Brick3: peer2:/MyGlusterRAID1
    Brick4: peer4:/MyGlusterRAID1
    Options Reconfigured:
    ssl.own-cert: /etc/ssl/glusterfs.ca
    server.ssl: on
    client.ssl: on
    nfs.disable: on
    performance.readdir-ahead: on
    transport.address-family: inet

Création des points de montage & montage sur les serveurs :

.. code-block:: bash
    
    clush -w root@peer[1-4] mkdir /media/MyGlusterRAID1
    clush -w root@peer[1-4] mount -t glusterfs peer1:MyGlusterRAID1 /media/MyGlusterRAID1

Normalement, cela ne fonctionne pas et cela donne les messages suivants :

.. code-block:: bash
    
    root@peer2: Mount failed. Please check the log file for more details.
    clush: root@peer2: exited with exit code 1
    root@peer4: Mount failed. Please check the log file for more details.
    clush: root@peer4: exited with exit code 1
    root@peer3: Mount failed. Please check the log file for more details.
    clush: root@peer3: exited with exit code 1
    root@peer1: Mount failed. Please check the log file for more details.
    clush: root@peer1: exited with exit code 1

Il est en effet nécessaire d'arrêter et redémarrer le volume GlusterFS pour permettre l'accès au volume chiffré :

.. code-block:: bash
    
    ssh root@peer1 "echo y | gluster volume stop MyGlusterRAID1"
    ssh root@peer1 gluster volume start MyGlusterRAID1

Après cette opération :

.. code-block:: bash
    
    clush -w root@peer[1-4] mount -t glusterfs peer1:MyGlusterRAID1 /media/MyGlusterRAID1
    clush -w root@peer[1-4] df | grep MyGlusterRAID1

.. code-block:: bash
    
    root@peer1: peer1:MyGlusterRAID1     3903488 1730432    1934592  48% /media/MyGlusterRAID1
    root@peer3: peer1:MyGlusterRAID1     3903488 1730432    1934592  48% /media/MyGlusterRAID1
    root@peer4: peer1:MyGlusterRAID1     3903488 1730432    1934592  48% /media/MyGlusterRAID1
    root@peer2: peer1:MyGlusterRAID1     3903488 1730432    1934592  48% /media/MyGlusterRAID1

Essayons maintenant de monter le volume chiffré sur le client :

.. code-block:: bash
    
    sudo mount -t glusterfs peer1:MyGlusterRAID1 /media/MyGlusterRAID1

Le message d'erreur est sans équivoque

.. code-block:: bash
    
    Mount failed. Please check the log file for more details.

Si vous regardons les logs d'erreurs, nous trouvons :

.. code-block:: bash
    
    [2016-12-14 15:16:13.200191] E [dht-helper.c:1666:dht_inode_ctx_time_update] (-->/usr/lib/x86_64-linux-gnu/glusterfs/3.8.4/xlator/cluster/replicate.so(+0x4b19a) [0x7fa7a4b3c19a] -->/usr/lib/x86_64-linux-gnu/glusterfs/3.8.4/xlator/cluster/distribute.so(+0x33d09) [0x7fa7a489cd09] -->/usr/lib/x86_64-linux-gnu/glusterfs/3.8.4/xlator/cluster/distribute.so(+0xa464) [0x7fa7a4873464] ) 0-MyGlusterRAID1-dht: invalid argument: inode [Argument invalide]

Ceci est dû au fait que, lorsque nous avons agrégé les certificats (commande ``cat peer*.pem >> glusterfs.ca``, nous avons omis celui du client ``gluster-client.pem``.

Effectuons les opérations suivantes :

.. code-block:: bash
    
    # Demontage des volumes montes
    clush -w root@peer[1-4] umount /media/MyGlusterRAID1
    # Arret du volume MyGlusterRAID1
    ssh root@peer1 "echo y | gluster volume stop MyGlusterRAID1"
    # Creation du nouvel agregat de certificats
    cat peer*pem gluster-client.pem >> glusterfs.ca
    # Diffusion de l'agregat de certificats
    seq 4 | xargs -I '{}' scp glusterfs.ca root@peer'{}':/etc/ssl
    # Copie locale de la clé dans le bon dossier
    sudo cp glusterfs.key /etc/ssl
    # Copie locale de l'agregat de certificat
    sudo cp glusterfs.ca /etc/ssl
    # Demarrage du volume MyGlusterRAID1
    ssh root@peer1 gluster volume start MyGlusterRAID1

Nous pouvons (enfin) monter le volume de manière chiffrée :

.. code-block:: bash
    
    sudo mount -t glusterfs peer1:MyGlusterRAID1 /media/MyGlusterRAID1

Et vérifier son accès :

.. code-block:: bash
    
    md5sum /media/MyGlusterRAID1/File.*

.. code-block:: bash
    
    e0cebe0d913746ff4b506a4da55f986c  /media/MyGlusterRAID1/File.01
    e49e69ae967bc7bc0ffad0aa8e713300  /media/MyGlusterRAID1/File.02
    6e34c25900be11e3ed58ddee62f3d241  /media/MyGlusterRAID1/File.03
    de5256d745e9edcd0b006303fd7a9f7f  /media/MyGlusterRAID1/File.04
    fa748e331d8c0fd6fd87f7b7f9299cc3  /media/MyGlusterRAID1/File.05
    407a43d7a3fa120faff14357c2724503  /media/MyGlusterRAID1/File.06
    cb5432658b53aa208fcd9289bffb7106  /media/MyGlusterRAID1/File.07
    93949c9c1b1f685a2feff0572afff008  /media/MyGlusterRAID1/File.08
    eefcff95428ca6d18fdaf0562a43b33e  /media/MyGlusterRAID1/File.09
    0130dc26e947eb016197bad4a8f6d0ee  /media/MyGlusterRAID1/File.10

Fonctionnalités avancées
------------------------

Gestion du tiering
~~~~~~~~~~~~~~~~~~

.. code-block:: bash
    
    clush -w root@peer[1-4] mkdir /MyGlusterReplica
    ssh root@peer1 gluster volume create MyGlusterReplica replica 2 transport tcp peer1:/MyGlusterReplica peer3:/MyGlusterReplica force
    ssh root@peer1 gluster volume start MyGlusterReplica
    ssh root@peer1 gluster volume info

.. code-block:: bash
    
    Volume Name: MyGlusterReplica
    Type: Replicate
    Volume ID: 93689088-b6b5-413f-8a4b-3b395f6b965c
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 1 x 2 = 2
    Transport-type: tcp
    Bricks:
    Brick1: peer1:/MyGlusterReplica
    Brick2: peer3:/MyGlusterReplica
    Options Reconfigured:
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Activation du //tiering// sur les deux autres pairs **peer2** et **peer4** :

.. code-block:: bash
    
    ssh root@peer1 gluster volume tier MyGlusterReplica attach replica 2 peer2:/MyGlusterReplica peer4:/MyGlusterReplica force

.. code-block:: bash
    
    Tiering Migration Functionality: MyGlusterReplica: success: Attach tier is successful on MyGlusterReplica. use tier status to check the status.
    ID: f1084e85-f5cb-475e-8457-fe258dca4533

.. code-block:: bash
    
    ssh root@peer1 gluster volume tier status

.. code-block:: bash
    
    ssh root@peer1 gluster volume tier MyGlusterReplica status
    Node                 Promoted files       Demoted files        Status              
    ---------            ---------            ---------            ---------           
    localhost            0                    0                    in progress         
    peer4                0                    0                    in progress         
    peer3                0                    0                    in progress         
    peer2                0                    0                    in progress         
    Tiering Migration Functionality: MyGlusterReplica: success

.. code-block:: bash
    
    ssh root@peer1 gluster volume info

.. code-block:: bash

    Volume Name: MyGlusterReplica
    Type: Tier
    Volume ID: 4502aaf9-f9c6-4eec-9c73-a889f3b457c7
    Status: Started
    Snapshot Count: 0
    Number of Bricks: 4
    Transport-type: tcp
    Hot Tier :
    Hot Tier Type : Replicate
    Number of Bricks: 1 x 2 = 2
    Brick1: peer4:/MyGlusterReplica
    Brick2: peer2:/MyGlusterReplica
    Cold Tier:
    Cold Tier Type : Replicate
    Number of Bricks: 1 x 2 = 2
    Brick3: peer1:/MyGlusterReplica
    Brick4: peer3:/MyGlusterReplica
    Options Reconfigured:
    cluster.tier-mode: cache
    features.ctr-enabled: on
    transport.address-family: inet
    performance.readdir-ahead: on
    nfs.disable: on

Montage du volume sur le client

.. code-block:: bash

    sudo mkdir /media/MyGlusterReplica
    sudo mount -t glusterfs -o noatime peer1:MyGlusterReplica /media/MyGlusterReplica
    sudo chmod 777 /media/MyGlusterReplica
    sudo chmod o+t /media/MyGlusterReplica

.. code-block:: bash

    seq -w 1000 | /usr/bin/time xargs -P 1000 -I '{}' bash -c "echo Hello File '{}' > /media/MyGlusterReplica/File.'{}'"

.. code-block:: bash

    clush -w root@peer[1-4] 'ls /MyGlusterReplica/File.* | wc -l'

.. code-block:: bash
    
    root@peer1: 1000
    root@peer3: 1000
    root@peer4: 1000
    root@peer2: 1000

Résilience des disques 

Gestion des disques par LVM 

Localiser son fichier

getfattr  -n trusted.glusterfs.pathinfo -e text /media/MyGluster/File.txt

https://access.redhat.com/documentation/en-US/Red Hat Storage/3.1/html/Administration Guide/ch26s02.html 

Voir les fichiers accédés

https://access.redhat.com/documentation/en-US/Red Hat Storage/2.0/html/Administration Guide/sect-User Guide-Monitor Workload-Displaying Volume Status.html 

