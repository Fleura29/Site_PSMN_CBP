.. _sidusfr:

Errata de l'article dans Linux Journal sur SIDUS
================================================

Quelques erreurs se sont glissées dans l'`article <http://www.linuxjournal.com/content/november-2013-issue-linux-journal-system-administration>`_ de Linux Journal de novembre 2013 sur SIDUS.

Si vous suivez pas à pas la :ref:`documentation complète <sidusdoc>`  de SIDUS, ces erreurs sont corrigées.

'Next-Server' page 102
----------------------

Page 102, il est proposé comme adresse de serveur TFTP ``172.16.20.251``. Elle est incohérente avec le reste de l'article.

Comme nous plaçons le serveur TFTP sur le même serveur que le serveur NFSroot, la ligne avec le ``next-server``, dans ``/etc/dhcp/dhcpd.conf`` est à remplacer comme suit : 

.. code-block:: bash

    next-server 10.13.20.13;

MyInclude & MyExclude page 104
------------------------------

Page 104, il est proposé d'utiliser les variables ``MyInclude`` et ``MyExclude`` pour installer dès le `debootstrap <https://wiki.debian.org/Debootstrap>`_ un certain nombre de paquets. 

Certains sont installés "de base" par ``debootstrap``. SIDUS exige le noyau (``linux-image-3.2.0-4-amd64`` pour architecture AMD64) et les outils initrd (``initramfs-tools``). D'autres sont bien utiles pour reconnaître un maximum de périphériques au démarrage (firmware) ou encore pour toute investigation interne.

Voici ce que nous proposons pour MyInclude :

.. code-block:: bash
    
    export MyInclude="adduser,apt,apt-utils,aptitude,aptitude-common,aspell,aspell-en,aufs-tools,bsdmainutils,btrfs-tools,busybox,ca-certificates,clusterssh,console-setup,cpio,cron,cups-pdf,debian-archive-keyring,dmidecode,dselect,emacs,environment-modules,ethtool,firmware-bnx2,firmware-linux,firmware-linux-nonfree,gnupg,gpgv,groff-base,htop,hwinfo,hwloc,iftop,ifupdown,info,initramfs-tools,install-info,iotop,iperf,ipmitool,iproute,iptables,iputils-ping,isc-dhcp-client,isc-dhcp-common,kmod,ldap-utils,less,libapt-inst1.5,libapt-pkg4.12,libboost-iostreams1.49.0,libcwidget3,libept1.4.12,libgcrypt11,libgdbm3,libgnutls26,libgpg-error0,libidn11,libkmod2,libncursesw5,libnet-ldap-perl,libnewt0.52,libnfnetlink0,libnss-ldap,libp11-kit0,libpam-ldap,libpipeline1,libpopt0,libprocps0,libreadline6,libsigc++-2.0-0c2a,libsqlite3-0,libssl1.0.0,libstdc++6,libtasn1-3,libudev0,libusb-0.1-4,libxapian22,linux-headers-3.2.0-4-amd64,linux-image-3.2.0-4-amd64,locales,logrotate,lsof,man-db,manpages,mbw,mtr,mutt,nano,net-tools,netbase,netcat-traditional,nfs-common,nscd,ntpdate,open-iscsi,openssh-server,pciutils,procps,python-ldap,readline-common,rsyslog,screen,scsitools,sdparm,ssh,ssmtp,sudo,tasksel,tasksel-data,tmux,traceroute,tshark,udev,usbutils,vim,wget,whiptail,xinit,python-html2text"

Dans MyExclude, nous excluons des paquets généralement entrant en conflit avec d'autres dans cette phase, des serveurs que nous ne désirons pas lancer sur le client SIDUS.

Voici ce que nous proposons pour MyExclude :

.. code-block:: bash

    export MyExclude="nano,exim,mysql-server,mysql-server-5.5,mysql-server-core-5.5,network-manager,apache2,apache2-mpm-worker,apache2-utils,apache2.2-bin,apache2.2-common,libapache2-mod-dnssd,libapache2-mod-php5,r-cran-fecofin,libmpich1.0gf,gerris,gspiceui,qucs,ktimetrace,kseg,ghdl,earth3d,libopenigtlink1,qtdmm,scilab-overload,gmsh,klogic,g++-doc,openturns-wrapper,xorsa,r-cran-rpvm,labplot,zygrib,libteem1,magnus,libcomplearn-dev,libtorque2,torque-common,torque-server,gridengine-client,gridengine-exec,gridengine-master,gridengine-qmon,gnuplot,gnuplot-nox,rtai,rtai-doc,libhdf5-dev,libhdf5-1.8,libgd2-xpm"

Hook 'policy-rc.d' page 104
---------------------------

Page 104, il est proposé de supprimer après l'installation complète le *hook* ``${SIDUS}/usr/sbin/policy-rc.d``. 

Il peut être utile de le conserver pour éviter qu'à l'installation d'un nouveau service, l'installeur ne le démarre pas.

'rootaufs' page 106
-------------------

Page 106, le ``wget`` proposé pour télécharger et installer *coeur* de démarrage de SIDUS dans le ``initrd`` est incomplet. De plus, le mettre exécutable est un plus !

Il faut remplacer cette ligne par :

.. code-block:: bash
    
    wget -O ${SIDUS}/etc/initramfs-tools/scripts/init-bottom/rootaufs http://www.cbp.ens-lyon.fr/sidus/rootaufs
    chmod 755 ${SIDUS}/etc/initramfs-tools/scripts/init-bottom/rootaufs

'vmlinux-Sidus' et 'initrd-Sidus' page 107
------------------------------------------

Page 107, il y a une référence à ``vmlinux-Sidus`` et ``initrd-Sidus`` pour copier le noyau et le initrd dans le dossier du serveur TFTP. Les fichiers destinations sont incohérents avec la définition du ``/srv/tftp/pxelinux.cfg/default``.

Il faut remplacer cette ligne par :

.. code-block:: bash

    cp ${SIDUS}/vmlinuz /srv/tftp/vmlinuz-Sidus
    cp ${SIDUS}/srv/nfsroot/boot/initrd /srv/tftp/initrd.img-Sidus

.. raw:: html

    <i><a href="mailto:emmanuel.quemener@ens-lyon.fr">Emmanuel Quemener</a> 2013/11/07 10:55</i>