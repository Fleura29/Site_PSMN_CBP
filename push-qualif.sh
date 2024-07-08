#!/bin/bash
# PSMN: $Id$
#
# based on sftp_img_stats.sh

# set -x

#exit 0

USER="cruiz01"  # src as anyone, with special ssh keypair
SSHID="/home/cruiz01/.ssh/qualif10_rsa"
HOST="vm-web-qualif12.pun.ens-lyon.fr"
SITE="${USER}@${HOST}"

TMPFILE=$(mktemp /tmp/"${SCRIPTNAME}".XXXXXXXX) || exit 1

# pousser en -R build/html/* dans /PSMN/Documentation
BASE_SRC="build/html"
BASE_DEST="/CBPsmn/sphinx"

#echo "cd ${BASE_DEST}" >> "${TMPFILE}"
echo "put -r ${BASE_SRC}/* ${BASE_DEST}/" >> "${TMPFILE}"
#echo "put commandes.txt /" >> "${TMPFILE}"

sftp -b "${TMPFILE}" -i "${SSHID}" "${SITE}"

rm -f "${TMPFILE}"
