.. _sidusdoc:

SIDUS : "avec SIDUS, n'installe plus, démarre seulement tes machines !"
=======================================================================

.. container:: text-center

    .. image:: ../../../_static/sidus-800.png
        :class: img-max-width
        :alt: Logo Sidus

Démonstrateur SIDUS sous VirtualBox
-----------------------------------

Pendant 7 ans, le Centre Blaise Pascal mettait à disposition toute la documentation permettant à un administrateur système de déployer son propre SIDUS. Trop compliqué pour beaucoup, il leur était impossible d'avoir rapidement quelque chose de fonctionnel.

Pour simplifier la compréhension et la prise en main de SIDUS, le démonstrateur **Sidus4Labs** est mis à disposition sous forme d'une machine virtuelle sous `VirtualBox <https://www.virtualbox.org/wiki/Downloads>`_. Il permet de démarrer les trois versions de distributions les plus courantes en quelques secondes :

* `Debian Bullseye <https://www.debian.org/releases/bullseye/>`_ : la dernière distribution Debian, la 11.2
* `Debian Buster <https://www.debian.org/releases/buster/>`_ : la dernière distribution Debian, la 10.5
* `Ubuntu Local Fossa <https://releases.ubuntu.com/20.04/>`_ ; la dernière distribution Ubuntu, la 20.04
* `CentosOS <https://www.centos.org/centos-linux/>`_ : la dernière distribution CentOS, la 8

Ces 3 distributions proposent pour chaque client SIDUS au moins un bureau graphique complet, dont le "léger" XFCE. 

Récupération des archives VirtualBox
------------------------------------

Pour déployer ce SIDUS, il est donc indispensable d'installer préalablement l'application `VirtualBox <https://www.virtualbox.org/wiki/Downloads>`_ sur son équipement. VirtualBox existant sur la majorité des systèmes d'exploitation, rien ne s'oppose au déploiement de ce démonstrateur SIDUS sous la majorité des distributions GNU/Linux, Windows ou MacOSX. 

* `serveur Sidus4Labs <https://www.cbp.ens-lyon.fr/sidus/sidus4labs.ova>`_ : le système **"maître"** portant les 3 arbres SIDUS
* `client Sidus4Labs BIOS <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_bios.ova>`_ : le système "client" exploitant un BIOS au démarrage
* `client Sidus4Labs UEFI <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_uefi.ova>`_ : le système "client" exploitant un boot UEFI au démarrage

* Le serveur **Sidus4Labs** propose un environnement complet comprenant tout ce qui est nécessaire pour déployer plusieurs centaines de clients SIDUS. Il intègre les services suivants : TFTP, DHCP, DNS, NFS. Il fonctionne sous une distribution Debian Buster. Son occupation maximale de disque est fixée à 48GB. L'archive n'occupe que 10GB d'espace disque.
* Le client **Sidus4Labs BIOS** intègre simplement une machine virtuelle "vide" de disque et une interface réseau démarrant avec un BIOS standard.
* Le client **Sidus4Labs UEFI** intègre simplement une machine virtuelle avec une mini-partition UEFI et une interface réseau. Cette machine illustre le fonctionnement de SIDUS sur des machines récentes disposant d'un environnement de démarrage UEFI.

Installation du serveur et des clients
--------------------------------------

Avant d'installer les images, vérifiez que vous disposez d'au moins 48GB d'espace de stockage (en plus de l'archive **Sidus4Labs** de 10GB).

Une fois téléchargées, il suffit généralement de double-cliquer sur l'icône de ces archives pour les intégrer dans votre application VirtualBox : cela va dépendre des systèmes d'exploitation. Il est raisonnable de directement les intégrer "telle que" sans changer les adresses MAC comme demandé à l'installation.

L'espace total (maximal) occupé par **Sidus4Labs** est de 48GB d'espace disque. Le serveur **Sidus4Labs** et les clients **BIOS** et **UEFI** sont paramétrés pour occuper 2GB de RAM.

Démarrage du serveur et des clients
-----------------------------------

Le démarrage du serveur **Sidus4Labs** s'effectue en quelques secondes. Une fois l'invite du terminal disponible, le serveur **Sidus4Labs** est prêt à démarrer un client **Sidus4Labs**.

Le démarrage d'un client **Sidus4Labs** est alors possible, issu des 3 distributions disponibles : Debian, Ubuntu et CentOS.

* Démarrage d'une machine `sidus4labs <https://www.cbp.ens-lyon.fr/sidus/sidus4labs-boot.webm>`_ , le maître
* Démarrage d'une SIDUS **Debian Buster** en `BIOS <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_bios_Debian.webm>`_ et `UEFI <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_uefi_Debian.webm>`_
* Démarrage d'une SIDUS **Ubuntu 20.04** en `BIOS <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_bios_Ubuntu.webm>`_ et `UEFI <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_uefi_Ubuntu.webm>`_
* Démarrage d'une SIDUS **CentOS 8** en `BIOS <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_bios_CentOS.webm>`_ et `UEFI <https://www.cbp.ens-lyon.fr/sidus/sidus4labs_client_uefi_CentOS.webm>`_

Quelques remarques fondamentales
--------------------------------

Par défaut, le mot de passe **root** du serveur **sidus4labs** est **Sidus4LABS** (pas très original donc à changer par vos soins).

Il y a 24 comptes accessibles, les 24 lettres grecques de **alpha** à **omega**. Le mot de passe de chacun est son login avec la première lettre en majuscule et immédiatement suivi de cette funeste année, 2020 : donc de **Alpha2020** à **Omega2020**.

Le compte **alpha** est un compte **sudo**. Il est donc possible de passer **root** en exploitant ce compte. Il est donc préférable de changer le mot de passe du compte **alpha** si vous *sortez* cet environnement Sidus4LABS de votre poste de travail.

Le compte **root** dispose de deux clés d'accès **ssh** : 

* celle sans mot de passe : pour se connecter à **root** de **root** sur le serveur et sur n'importe quel client SIDUS. 
* celle du créateur de Sidus4LABS : pour de la maintenance initiale mais aussi pour lui permettre d'accéder au serveur en cas de demande d'intervention
* si vous craignez quoi que ce soit, rm /root/.ssh/authorized_keys

Les deux interfaces réseau du serveurs **sidus4labs** sont NATés. Pour accéder au serveur de l'extérieur, il existe une redirection du port 22022 sur le port 22. Pour accéder au serveur **sidus4labs** de sa machine hôte, il suffit d'un ssh -p 22022 <login>@localhost.

Chacun des systèmes proposés au démarrage dispose d'un environnement graphique comparable, XFCE, plutôt léger. D'autres environnements sont proposés, mais ils requièrent un matériel graphique conséquent. Il se peut donc que GNOME3, choisi comme environnement par défaut par certaines distributions, ne fonctionne pas correctement. XFCE fonctionne dans tous les cas.

.. container:: text-center 
    
    .. container:: d-inline-block bg-danger-subtle pt-2 mb-2 rounded fs-13
        
        Pour en savoir plus sur SIDUS, c'est là-dessous

SIDUS en quelques phrases
-------------------------

**SIDUS** est l'acronyme de *Single Instance Distributing Universal System* et se propose de simplifier à l'extrême l'administration de machines. 

Son `origine latine <http://fr.wiktionary.org/wiki/sidus>`_ *d'ensemble de corps stellaires* est une allégorie : nous vous laissons trouver celle qui vous convient le mieux =).

**SIDUS** a deux principales propriétés : 

* **l'unicité de configuration** : deux machines démarrant sous Sidus ont exactement le même système d'exploitation
* **l'usage des ressources locales** : les processeurs et mémoire vive sollicités sont ceux de la machine locale

**SIDUS** n'est donc :

* **ni LTSP** pour *Linux Terminal Server Project* : LTSP propose une gestion simplifiée de terminaux légers en offrant un accès X11 ou RDP à un serveur : ce dernier supporte ainsi toute la charge de traitement. A contrario, SIDUS exploite entièrement (ou à discrétion de l'utilisateur) toute la machine qui s'y raccroche. Seul le stockage du système d'exploitation est déporté sur des machines tierces.
* **ni FAI** pour *Fully Automatic Installation* : FAI ou Kickstart proposent une installation complète simplifiée permettant de limiter voire d'éliminer toute action de l'administrateur. A contrario, SIDUS propose un système unique dans un arbre intégrant à la fois le système de base et toutes les applications installées manuellement.
* **ni un LiveCD** sur réseau : un LiveCD démarre un système minimaliste, nécessairement figé. Il est toujours possible de créer son propre LiveCD mais c'est une opération assez lourde. Avec SIDUS, il est possible d'installer à la volée sur tous ses clients un logiciel instantanément, de le reconfigurer. 

CQQCOQP : les 7 questions sur SIDUS
-----------------------------------

`CQQCOQP <http://fr.wikipedia.org/wiki/QQOQCCP>`_ est une démarche analytique simple vous permettant, simplement en lisant les réponses aux questions élémentaires *Pourquoi ? Quoi ? Qui ? Où ? Quand ? Combien ? et Comment ?* les tenants et les aboutissants de SIDUS.

Pourquoi ?
~~~~~~~~~~

Le temps d'administration système des équipements informatiques (noeud de calcul, poste personnel ou station de travail, machine virtuelle d'expérimentation) augmente avec leur nombre et leur diversité. Ainsi, tous ces matériels partagent essentiellement les mêmes fichiers, mais chacun sur son propre disque. Comment limiter le temps d'installation et d'administration des machines tout en conservant la flexibilité liée à leur destination ?

C'est le défi relevé par SIDUS (pour Single Instance Distributing Universal System), développée au Centre Blaise Pascal à l'origine essentiellement pour simplifier la tâche de l'unique administrateur système face à la gestion de centaines de machines de toutes natures pour toutes destinations (plateaux techniques multi-noeuds, multi-coeurs, GPU, etc).

Quoi ?
~~~~~~

Une approche permettant le démarrage en réseau et l'offre d'un système parfaitement générique pour toutes les machines.

Quand ?
~~~~~~~

La première version de Sidus date de février 2010, elle était à l'origine sur Debian Etch. Elle a suivi toutes les évolutions de la distribution Debian, socle essentiel (voire exclusif) du Centre Blaise Pascal.

Mi 2015, SIDUS sert 76 noeuds permanents de cluster au CBP (jusqu'à 120 simultanés en fonction des prêts), des serveurs de GPGPU, des stations de travail multi-coeurs et des postes *COMOD* (pour *Compute On My Own Device*).

Pour Qui ?
~~~~~~~~~~

SIDUS s'adresse à tous ceux qui veulent se simplifier la tâche et qui :

* disposent de groupes de machines ayant toute la même destination :

    * des noeuds de cluster de calcul
    * des machines de salle libre service
    * des machines virtuelles dans le cadre de formations
    
* veulent analyser des équipements sans jamais toucher au système

Où ?
~~~~

Le Centre Blaise Pascal, hôtel à projets de l'ENS-Lyon dans le domaine du calcul et de l'informatique scientifiques, utilise SIDUS pour tous ses équipements dont l'uniformité doit être conservée le plus possible : un simple redémarrage doit suffire à replacer le système dans son état d'origine.

Le Pôle Scientifique de Modélisation Numérique (PSMN), centre de calcul de l'ENS-Lyon, utilise maintenant SIDUS sur une centaine de noeuds et prépare sa généralisation pour la mise en place de Equip@Meso (près de 200 noeuds supplémentaires).

Le laboratoire de Chimie utilise "COMOD" pour quelques postes de travail "à la demande".

Les laboratoires de l'IGFL, du LBMC et du LJC utilisent "COMOD" : un cluster de 5 stations de travail gavées de GPU au LBMC, des stations graphiques à l'IGFL et au LJC.

L'université Joseph Fourier, dans le cadre de ses écoles thématiques sur le calcul scientifique, utilise depuis 2011 SIDUS pour l'infrastructure de travaux pratiques des auditeurs.

Combien ?
~~~~~~~~~

De 8 clients légers Neoware gonflés en CPU et mémoire et détournés début 2010 de leur vocation originelle, nous approchons les 120 machines au CBP utilisant ce système. 

De quelques machines déployées à des fins expérimentales, le Pôle Scientifique de Modélisation Numérique utilise également SIDUS en production pour 480 noeuds. L'équipement informatique Equip@Meso d'environ 200 noeuds à lui tout seul, utilise également SIDUS comme socle.

Quelques chercheurs du laboratoire de chimie utilisent SIDUS via COMOD : la disponibilité en offrant la possibilité de déployer une machine complète et opérationnelle sur son poste de travail en quelques secondes.

Lors des école thématiques des Houches sur le calcul scientifique, SIDUS était servi à près d'une cinquantaine de machines simultanément.

Quant au prix du logiciel (question posée au dernier Scipy 2013), tous les composants qu'il utilise étant Open Source, SIDUS l'est aussi, ainsi que toutes les documentations associées ! SIDUS est donc sous licence CeCILL.

Si vous utilisez SIDUS, informez l'`auteur <emmanuel.quemener@ens-lyon.fr>`_ et faites en la promotion !

Si vous voulez déployer SIDUS sur vos installations et vous faire aider, vous pouvez contacter l'`auteur <emmanuel.quemener@ens-lyon.fr>`_.

Comment ?
~~~~~~~~~

SIDUS se base sur une majorité de composants simples et éprouvés, disponible sur la majorité des distributions GNU/Linux.

Dans les pages des années précédentes sous SIDUS, une documentation d'installation pour Debian était détaillée... Malheureusement, le prérequis d'installation rendait son appropriation inaccessible aux débutants.

Il a donc été choisi de proposer une machine virtuelle complète sous VirtualBox permettant de démarrer les 3 distributions les plus courantes avec SIDUS :

* la `Debian 10 "Buster" <https://www.debian.org/releases/buster/>`_
* la `Ubuntu 20.04 "Focal Fossa" <https://releases.ubuntu.com/20.04/>`_
* la `CentOS version 8 <https://www.centos.org/>`_


