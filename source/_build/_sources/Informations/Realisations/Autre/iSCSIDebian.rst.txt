.. _iscsis:

Booter iSCSI sous Debian Wheezy
===============================

.. |br| raw:: html

   <br>

.. role:: underline
    :class: underline

Contexte
--------

**Pourquoi ?** |br|
Pour permettre le démarrage directement sur le réseau d'une machine

**Quoi ?** |br|
Utiliser le protocole iSCSI pour offrir un OS complet sur un périphérique équivalent à un disque

**Quand ?** |br|
N'importe quand. Seule une demi-heure est nécessaire dans environnement maîtrisé (sous Linux/Debian) pour réaliser cette opération.

**Qui ?** |br|
N'importe quel administrateur de 2 machines (ayant un minimum de connaissances, notamment pour le copier/coller des commandes suivantes)

**Où ?** |br|
Sur un réseau local ou distant (un réseau haut débit est préférable, un réseau local également mais iSCSI utilise TCP/IP)

**Combien ?** |br|
Pour l'hôte de cibles iSCSI ou pour le client, n'importe quelle machine suffit, du moment que la machine cliente peut démarrer en PXE 

**Comment ?** |br|
C'est ce que nous allons voir

iSCSI ou le SCSI par le réseau dans l'environnement Debian
----------------------------------------------------------

Le protocole `iSCSI <http://fr.wikipedia.org/wiki/ISCSI>`_ permet à un hôte d'offrir un espace disque (du *mode bloc*) à un hôte distant.

Linux/Debian intègre dans la Wheezy (version 7) tout ce qui permet d'accéder à des volumes iSCSI ou de les créer.
  * `Open-ISCSI <http://www.open-iscsi.org>`_ pour accéder à des ressources offertes en iSCSI
  * `iSCSItarget <http://iscsitarget.sourceforge.net/>`_ pour offrir des *targets* iSCSI avec un module noyau
  * `TGT <http://stgt.sourceforge.net/>`_ pour offrir des *targets* iSCSI sans module noyau

De mon expérience (près de 5 ans sur iSCSItarget et un 1 et demi mois sur TGT), j'aurai tendance à préférer iSCSItarget. Le principal avantage de TGT réside dans son absence de module noyau et donc facile implantation sur un serveur, mais il a un problème de taille : impossible de retirer un volume déclaré !

Les prérequis
-------------

* une machine portant les "cibles" iSCSI, appelée MyHost

    * elle dispose d'un espace disque disponible en mode bloc (fichiers, disques, volumes)
    * elle a installé une implémentation de cibles iSCSI 
* une machine portant un serveur TFTP avec les images PXE, appelée MyPXE
* une machine pouvant démarrer en PXE, d'adresse MAC simplement 00:AA:BB:CC:DD:EE, disposant d'une IP fournie par DHCP

Machine portant les partages iSCSI
----------------------------------

Il est supposé que la machine MyHost dispose d'une infrastructure LVM :
  
* son VG est MyVG
* le nom du LV à créer est MyLViSCSI |br| |br|

* :underline:`Création du volume LVM de 20G sur le VG Raid6`

.. container:: border-dashed

    lvcreate -L 20G -n MyLViSCSI MyVG

* :underline:`Formatage en Ext3`

.. container:: border-dashed

    mkfs.ext3 -m 0 /dev/MyVG/MyLViSCSI

* :underline:`Montage du volume sur le système hôte`

.. container:: border-dashed

    mkdir /media/MyLViSCSI
    mount -o noatime /dev/MyVG/MyLViSCSI /media/MyLViSCSI

* :underline:`Etablissement d'un label sur la partition`

.. container:: border-dashed

    e2label /dev/MyVG/MyLViSCSI MyLViSCSI

* :underline:`Installation au besoin de debootstrap`

.. container:: border-dashed
    
    apt-get install debootstrap

* :underline:`Installation du système de base Wheezy, architecture x86_64 ou i386`

.. container:: border-dashed

    # pour une architecture x86_64
    debootstrap --arch amd64 wheezy /media/MyLViSCSI http://ftp.fr.debian.org/debian
    # pour une architecture i386
    debootstrap --arch i386 wheezy /media/MyLViSCSI http://ftp.fr.debian.org/debian

* :underline:`Passage dans l'environnement`

.. container:: border-dashed
    
    chroot /media/MyLViSCSI

* :underline:`Création d'une nouvelle liste de paquets`

.. container:: border-dashed

    tee /etc/apt/sources.list <<EOF
    deb http://ftp.fr.debian.org/debian/ wheezy main contrib non-free
    deb-src http://ftp.fr.debian.org/debian/ sid main contrib non-free
    deb-src http://ftp.fr.debian.org/debian/ experimental main contrib non-free
    deb http://security.debian.org/ wheezy/updates main contrib non-free
    deb-src http://security.debian.org/ wheezy/updates main contrib non-free
    EOF

* :underline:`Mise à jour de la base des paquets :`

.. container:: border-dashed
    
    apt-get update 
  
* :underline:`Montage du /proc pendant l'installation`

.. container:: border-dashed

    mount -t proc none /proc

* :underline:`Initialisation du mot de passe superutilisateur`

.. container:: border-dashed
    
    echo "root:MyStrongPassword" | chpasswd

* :underline:`Installation de paquets nécessaires`

.. container:: border-dashed

    apt-get -y install dhcp3-common openssh-server locales initramfs-tools dhcp3-client aufs-tools firmware-linux-nonfree firmware-linux firmware-bnx2 open-iscsi iftop htop iotop emacs mtr lsof tshark mbw memtest86 cpuburn bonnie dbench iozone3 console-setup less && apt-get clean
    # Pour les architectures i686
    apt-get -y install linux-image-3.2.0-4-686-pae
    # Pour les architectures x86_64
    apt-get -y install linux-image-3.2.0-4-amd64

* :underline:`Purge des archives de paquets :`

.. container:: border-dashed
    
    apt-get clean

* :underline:`Suppression du démarrage du démon iSCSI (en noyau 3.2, le script plante et empêche le démarrage)`

.. container:: border-dashed
    
    insserv -r open-iscsi

* :underline:`Paramétrage d'un boot iSCSI`

.. container:: border-dashed

    touch /etc/iscsi/iscsi.initramfs
    update-initramfs -k all -u

* :underline:`Vérification de la présence du support iSCSI 'lsinitramfs /boot/initrd.img-* | grep "local-top/iscsi"' retourne :` 

.. container:: border-dashed

    scripts/local-top/iscsi
    scripts/local-top/iscsi

* :underline:`Paramétrage de l'interface de démarrage iSCSI`

.. container:: text-center 

    .. container:: d-inline-block bg-danger-subtle pt-3 mb-2 rounded fs-13

        En cas d'interfaces multiples, il est INDISPENSABLE de préciser l'interface de démarrage, sinon...

.. container:: border-dashed

    sed -i "s/DEVICE\=/DEVICE\=eth0/g" /etc/initramfs-tools/initramfs.conf

* :underline:`Suppression du hostname pour le paramétrage automatique du HOST`

.. container:: border-dashed
    
    rm /etc/hostname

* :underline:`Définition de l'interface de loopback`

.. container:: border-dashed

    tee /etc/network/interfaces <<EOF
    auto lo
    iface lo inet loopback
    EOF

* :underline:`Démontage du /proc`

.. container:: border-dashed

    umount /proc

* :underline:`Sortie de l'environnement chrooté`

.. container:: border-dashed
    
    exit

* :underline:`Arrêt des services démarrés à l'installation`

.. container:: border-dashed

    lsof | grep /media/MyLViSCSI | awk '{ print $2 }' | sort -u | xargs -I '{}' kill '{}' 

Configuration du démarrage PXE
------------------------------

Sur le porteur de cibles iSCSI
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* :underline:`Copie des composants pour le PXE`

.. container:: border-dashed

    cp /media/MyLViSCSI/boot/initrd.img-3.2.0-4-686-pae /root/initrd.img-3.2.0-4-686-pae-iSCSI
    cp /media/MyLViSCSI/boot/vmlinuz-3.2.0-4-686-pae /root/vmlinuz-3.2.0-4-686-pae-iSCSI
    cp /media/MyLViSCSI/boot/initrd.img-3.2.0-4-amd64 /root/initrd.img-3.2.0-4-amd64-iSCSI
    cp /media/MyLViSCSI/boot/vmlinuz-3.2.0-4-amd64 /root/vmlinuz-3.2.0-4-amd64-iSCSI

* :underline:`Copie des clés autorisées`

.. container:: border-dashed
    
    mkdir /media/MyLViSCSI/root/.ssh
    cp -a /root/.ssh/authorized_keys /media/MyLViSCSI/root/.ssh/

* :underline:`Démontage de la partition`

.. container:: border-dashed

    umount /media/MyLViSCSI

* :underline:`Copie des composants de démarrage sur le serveur PXE`

.. container:: border-dashed
        
    # Le serveur TFTP/PXE est MyPXE:
    scp /root/*iSCSI PyPXE:/srv/tftp

* :underline:`Création d'un partage iSCSI nécessitant les paramètres`

    * IQN (pour iSCSI Qualified Name) : 'iqn.2012-04.MySite.MyHost:MyLViSCSI'
    * identifiant : 'inputname'
    * mot de passe : 'MyInputPwd'
    * chemin : '/dev/MyVG/MyLViSCSI'

* :underline:`Paramétrage de la cible IET`

.. container:: border-dashed

    # Renommage de l'ancien fichier de configuration
    cp /etc/iet/ietd.conf /etc/iet/ietd.conf-$(date +%Y%m%d)
    # Ajout de l'entree précedente
    tee -a /etc/iet/ietd.conf <<EOF
    Target iqn.2013-06.MySite.MyHost:MyLViSCSI
    IncomingUser inputname MyInputPwd
    Lun 0 Path=/dev/MyVG/MyLViSCSI,BlockSize=4096,Type=fileio
    EOF

* :underline:`Activation des partages`

.. container:: border-dashed

    ietadm --op new --tid=100 --params Name=iqn.2013-06.MySite.MyHost:MyLViSCSI
    ietadm --op new --tid=100 --lun=0 --params Path=/dev/MyVG/MyLViSCSI,BlockSize=4096,Type=fileio
    ietadm --op new --tid=100 --lun=0 --user --params IncomingUser=inputname,Password=MyInputPwd

* :underline:`Vérification des partages par la commande 'cat /proc/net/iet/volume  | grep MyLViSCSI'`

.. container:: border-dashed

    cat /proc/net/iet/volume  | grep MyLViSCSI
    tid:86 name:iqn.2013-03.MySite.MyHost:MyLViSCSI
    lun:0 state:0 iotype:fileio iomode:wt blocks:5242880 blocksize:4096 path:/dev/MyVG/MyLViSCSI

Sur le serveur TFTP de boot PXE 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* :underline:`Déplacement dans le dossier de configuration TFTP, anciennement '/srv/tftp', maintenant`

.. container:: border-dashed

    cd /srv/tftp/pxelinux.cfg

* :underline:`Déclaration de l'entrée TFTP pour notre entrée`

    * ISCSI_TARGET_NAME : IQN
    * ISCSI_TARGET_IP : hôte de cibles iSCSI
    * ISCSI_INITIATOR : IQN 
    * ISCSI_USERNAME : identifiant
    * ISCSI_PASSWORD : mot de passe
    * ISCSI_TARGET_GROUP : groupe, généralement 1

.. container:: border-dashed

    tee iscsi <<EOF
    DEFAULT linux64

    LABEL linux64
    KERNEL vmlinuz-3.2.0-4-amd64-iSCSI
    APPEND console=tty1 initrd=initrd.img-3.2.0-4-amd64-iSCSI ip=dhcp rw ISCSI_TARGET_NAME=iqn.2013-06.MySite.MyHost:MyLViSCSI ISCSI_TARGET_IP=MyHost ISCSI_INITIATOR=iqn.2013-06.MySite.MyHost:default ISCSI_USERNAME=inputname ISCSI_TARGET_GROUP=1 ISCSI_PASSWORD=MyInputPwd root=LABEL=MyLViSCSI rootflags=data=journal

    LABEL linux32
    KERNEL vmlinuz-3.2.0-4-686-pae-iSCSI
    APPEND console=tty1 initrd=initrd.img-3.2.0-4-686-pae-iSCSI ip=dhcp rw ISCSI_TARGET_NAME=iqn.2013-06.MySite.MyHost:MyLViSCSI ISCSI_TARGET_IP=MyHost ISCSI_INITIATOR=iqn.2013-06.MySite.MyHost:default ISCSI_USERNAME=inputname ISCSI_TARGET_GROUP=1 ISCSI_PASSWORD=MyInputPwd root=LABEL=MyLViSCSI rootflags=data=journal
    EOF

* :underline:`Création des liens pour chaque machine spécifique. L'adresse MAC de la forme : "00:AA:BB:CC:DD:EE" doit être écrite sous la forme 01-00-aa-bb-cc-dd-ee en MINUSCULE !`

.. container:: border-dashed

    ln -sf iscsi 01-00-aa-bb-cc-dd-ee

`Emmanuel Quemener <emmanuel.quemener@ens-lyon.fr>`_ *2013/06/13 06:05*