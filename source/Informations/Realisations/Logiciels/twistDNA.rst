.. _twistDNA:

Twist-DNA
=========

Local opening of the DNA double-helix is required in many fundamental biological processes and is in part controlled by the degree of superhelicity imposed in vivo by the protein machinery. In particular, positions of superhelically destabilized regions correlate with regulatory sites along the genome. Based on a self-consistent linearization of a thermodynamic model of superhelical DNA introduced by Benham, we have developed Twist-DNA, a program that predicts the locations of these regions by efficiently computing base-pair and bubble opening probabilities in genomic DNA. The program allows visualization of results in standard genome browsers to compare DNA opening properties to other available datasets.

Source code of Twist-DNA are available :download:`here <../../../_static/twist-dna_1.1.tar.gz>`

Data for the genomes of E. coli and B. subtilis in physiological conditions (Temperature 37C, Salt concentration 0.1 M and Superhelical density -0.06) are available :download:`here <../../../_static/data_ecoli_bsubtilis.tar.gz>` in BED format.

A Twist-DNA wrapper for Galaxy has been developed by Björn Grüning. It is integrated in the `Galaxy Toolshed <http://testtoolshed.g2.bx.psu.edu/repository?repository_id=dfa99e996b65c815>`_ and is also available :download:`here <../../../_static/twistdna_galaxywrapper.zip>`.

.. container:: text-center

    .. image:: ../../../_static/Réalisations/twistdna2.gif
        :class: img-fluid
        :alt: Image twistdna