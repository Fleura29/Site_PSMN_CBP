.. _cgmdnaii:

* :ref:`Workshops 2011 <workshop2011>`

Coarse-Grain Mechanics of DNA: Part II From Electrons to Oligomers
==================================================================

.. |br| raw:: html

   <br>

Location: CECAM-HQ-EPFL, Lausanne, Switzerland |br|
August 30, 2011 to September 2, 2011 |br|
`Website of the event <http://www.cecam.org/workshop-0-539.html>`_

Organisers:

* **John H. Maddocks**, Swiss Federal Institute of Technology Lausanne (EPFL), Switzerland
* **Ralf Everaers**, École Normale Supérieure de Lyon, France
* **Helmut Schiessel**, Instituut-Lorentz for Theoretical Physics, Leiden, The Netherlands

Supports:

* **CECAM**
* **EPFL**

Description
-----------

DNA carries genetic information so that understanding processes such as transcription and replication are central to biology.  In the simplest classic view, the DNA sequence carries information merely via codons of three bases which encode for an amino acid when transcribed. Recently, this view has broadened to encompass the idea that the detailed chemistry of the four possible bases also provide a sequence-dependent modulation of the physical properties of the DNA, such as nonzero intrinsic curvature, varying intrinsic twist, and variations in stiffness, and that these sequence-dependent variations of the physical properties of the DNA are actually key to the control and regulation of the biological processes involving the DNA. For example, recently Segal et al [1] proposed that Nature exploits the redundancy of the genetic code (64 codons but only 20 amino acids) to create a "second genetic code" via the sequence-dependent mechanical properties of DNA which control the preferred locations of nucleosomes along the DNA. And the sequence-dependent mechanical properties of DNA is believed to be significant in other biological systems too.

The workshop will be a venue to discuss subjects surrounding the sequence-dependent physical properties of DNA. It is the second in a series of such discussions including the CECAM workshop “Coarse-Grain Mechanics of DNA: Bases to Chromosomes” which was  held in Lyon in 2010. The third, to be organized by the Netherlands CECAM node, is anticipated for 2012. This second workshop will be tightly focused on discussing the shorter, biologically pertinent length scales of DNA, i.e. a few hundreds of base-pairs down to single bases and below. We are particularly interested in encouraging discussions between experimentalists and practitioners of modelling of various types. Specifically the participants will include experts in simulations at divers levels of coarse graining, ranging from a) quantum simulations of nucleic acids, b) atomistic molecular dynamics simulations, c) rigid base and base-pair simulations, and d) sequence-dependent continuum mechanics and polymer simulations up to lengths of one or two hundred base pairs. This is the scale of a DNA double-helix persistence length, which is believed to be rather important in biology. This range of length scales will be matched with the participation of experimentalists, from crystallographers at the atomistic level, to practitioners of looping, cyclization and mini-circle experiments, which offer a direct probe of sequence-dependent DNA mechanical properties. On the simulation side one of the primary issues is how one can quantitatively pass information between models at multiple scales. And of course interaction with experimentalists is key to the verification of model parameters at the various scales.

We believe that the undoubted importance of DNA in biology is already a powerful justification for a detailed study of its sequence-dependent physical properties. The mechanical properties of DNA do vary significantly with sequence, and to determine definitively whether and how these modulations are exploited in biology, requires an improved and quantitative understanding of the variations. In addition it should be realised that DNA is increasingly being adopted as a construction material in non-biological nanoscience, due to the inherent self-assembly properties of the double helix. However in the design of artificial nanostructures made from DNA, the sequence-dependence of the duplex DNA mechanical properties has not as yet been exploited, in part due to a lack of quantification of these properties. Accordingly a secondary, minor theme of the workshop will be to discuss such non-biological uses of DNA.

State of the art
----------------

Atomistic Molecular Dynamics Simulations of Short Oligomers
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The year 2011 will be the tenth anniversary of the forming of the ABC (or Ascona B-DNA Consortium) collaboration. The ABC was born at an interdisciplinary workshop organized by John Maddocks. The idea was that by pooling computational resources between groups, a database of entirely consistent simulations of DNA oligomers covering "all possible" sequence-dependence could be constructed. The most recent ABC publication [2], which is based on a data set of nearly 5microseconds of simulation time of 39 different 18 base-pair oligomers, is only now starting to approach that goal, and of course much was learnt along the way. For example, previous ABC data sets revealed serious limitations of the underlying Amber atomistic force field, which lead to a re-parametrization from quantum simulations [3]. The current data set has no known inconsistencies with experimental data, and has various specific predictions, for example bimodal distribution of twist at certain specific base-pair steps.
 
Atomistic Molecular Dynamics Simulations of DNA Minicircles and Experiment:
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The study of J-factors, or the probability of formation of DNA minicircles, is a classic technique for studying DNA mechanics. And minicircle formation has even been proposed as a way to determine experimentally the sequence-dependent mechanical properties of DNA [4]. In particular some specific sequences were observed to cyclize remarkably efficiently compared to predictions made by standard, sequence-independent theories [5], although there is still some controversy over the experimental results [6,7]. Motivated by these results there have been two published molecular dynamics simulations of full minicircles [8,9], the first of which observed localized kink deformations of the DNA duplex, remarkably similar to those discussed theoretically thirty years previously [10]. The 3D conformations of slightly longer DNA minicircles can be observed using stereo-cryo-EM [11, 12] although the method is very close to the limits of resolution. Nevertheless after the introduction of new statistical tests for curves in 3D, a statistically significant difference in the fluctuations of two minicircles formed from two different sequences could be observed [13].

Rigid base and base-pair models:
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

A standard model of the elasticity of double-helical DNA on the few nm length scale is the rigid base-pair model (rbpm), whose conformation variables are the relative positions and orientations of adjacent base pairs [14]. Corresponding sequence-dependent local elastic potentials have been obtained from (combinations of) all-atom MD simulation and from high-resolution crystal structure data [15,16,17,18] and have been used with some success to model DNA-protein binding [17] and nucleosome positioning [18, 19]. Nevertheless the analysis of [20] has shown that at length scales of a few tens of base-pairs, a rbpm with a localized energy is not consistent with molecular dynamics data sets of the type obtained in [2], while a rigid base model with localized interactions is consistent with molecular dynamics data.

Sequence-dependent continuum mechanics models:
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Beyond the 100nm scale, DNA is successfully described by a worm like chain model with homogeneous elastic properties [21], which can be determined via a systematic coarse-graining procedure from the rbpm [22]. Modifications to model kinking have also been proposed [23].  On the wormlike chain level a systematic treatment of small fluctuations (semi classical approximation) of the statistical mechanics of chains is now available [24,25].Sequence-dependent continuum models ignoring fluctuations have been applied to model cyclization data [26].

References 
~~~~~~~~~~

[1] E. Segal, Y. Fondufe-Mittendorf, L. Chen, A. Thastrom, Y. Field, I. Moore, J. Wang, J. Widom,
‘Nucleosome sequence preferences influence in vivo nucleosome organization’, Nature 442, 772
(2006) 

[2] R. Lavery, K. Zakrzewska, D. Beveridge, T. C. Bishop, D. A. Case, T.E. Cheatham III, S. Dixit,
B. Jayaram, F. Lankas, Ch. Laughton, J.H. Maddocks, A. Michon, R. Osman, M. Orozco, A. Perez,
T. Singh, N. Spackova, J. Sponer, "A systematic molecular dynamics study of nearest neighbor effects
on base pair and base pair step conformations and fluctuations in B-DNA", Nucleic Acids Research
1-15 (2009).  

[3] A. Perez, I. Marchan, D. Svozil, J. Sponer, T.E. Cheatham III, C.A. Laughton, M. Orozco, "Refinement
of the AMBER force field for nucleic acids: Improving the description of alpha/gamma conformers",
Biophys. J. 92, 3817-3829 (2007).  

[4] Y. Zhang, D.M. Crothers, "High-throughput approach for detection of DNA bending and flexibility based
on cylization", Proc. Acad. Sci. USA 100, 3161-3166 (2003).  

[5] T.E. Cloutier, J. Widom, "Spontaneous Sharp Bending of Double-Stranded DNA", Mol. Cell 14 355-362
(2004).  

[6] Q. Du, C. Smith, N. Shiffeldrim, M. Vologodskaia, A. Vologodskii, "Cyclization of short DNA fragments
and bending fluctuations of the double helix", Proc. Natl. Acad. Sci. USA 102, 5397-5404 (2005).    

[7] Q. Du, A. Kotlyar, A. Vologodskii, "Kinking the double helix by bending deformation," Nucleic Acids
Research, Vol. 36, No. 4 1120-1128 (2008).    

[8] F. Lankas, R. Lavery, J.H. Maddocks, "DNA kinking occurs during molecular dynamics simulations of
small DNA minicircles", Structure 14, 1527- 1534 (2006).    

[9] S.A. Harris, C.A. Laughton, T.B. Liverpool, "Mapping the phase diagram of the writhe of DNA
nanocircles using atomistic molecular dynamics simulations", Nucleic Acids Research 36, 1-29 (2008).    

[10] F.H.C. Crick, A. Klug, "Kinky helix", Nature 255, 530-533 (1975).    

[11] A. Amzallag, C. Vaillant, M. Jacob, M. Unser, J. Bednar, J.D. Kahn, J. Dubo- chet, A. Stasiak,
J.H. Maddocks, ‘3D reconstruction and comparison of shapes of DNA minicircles observed by cryo-
electron microscopy’, Nucleic Acids Res. 34, e125 (2006).    

[12] D. Demurtas, A. Amzallag, E.J. Rawdon, J.H. Maddocks, J. Dubochet, A. Stasiak, ‘Bending modes of
DNA directly addressed by cryo-electron microscopy of DNA minicircles’, Nucleic Acids Research,
37, 9, 2882-2893 (2009).    

[13] V.M. Panaretos, D. Kraus, J.H. Maddocks, ‘Second-Order Comparison of Gaussian Random Curves
and the Geometry of DNA Minicircles’, J. Am. Stat. Ass. 105, 670-682 (2010)    

[14] B. D. Coleman, W. K. Olson, D. Swigon, ‘Theory of sequence-dependent DNA elasticity’,
J. Chem. Phys. 118, 7127 (2003).    

[15] W. Olson, A. Gorin, X. Lu, L. Hock, V. Zhurkin, ‘DNA sequence-dependent deformability deduced
from protein-DNA crystal complexes’, Proc. Natl. Acad. Sci. U.S.A. 95, 11163-11168 (1998).    

[16] F. Lankas, J. Sponer, J. Langowski, T. E. Cheatham III, ‘DNA basepair step deformability inferred
from molecular dynamics simulations,’ Biophys. J. 85, 2872 (2003).    

[17] N.B. Becker, L. Wolff and R. Everaers, ‘Indirect readout: Detection of optimized subsequences and
calculation of relative binding affinities using different DNA elastic potential’, Nucleic Acids Res.
34, 5638 - 5649 (2006).    

[18] A.V. Morozov, K. Fortne, D.A. Gaykalova, V.M. Studitsky, J. Widom, E. D. Siggia, ‘Using DNA
mechanics to predict in vitro nucleosome positions and formation energies’, Nucleic Acids Res.,
37, 4707-22 (2009)    

[19] N. B. Becker, R. Everaers, ‘DNA Nanomechanics in the Nucleosome’, Structure 17, 579-589 (2009).    

[20] F. Lankas, O. Gonzalez, L. M. Heffler, G. Stoll, M. Moakher, J. H. Maddocks, ‘On the parameterization
of rigid base and basepair models of DNA from molecular dynamics simulations’, Phys. Chem. Chem.
Phys. 11, 10565-10588 (2009).    

[21] J. F. Marko, E. D. Siggia, ‘Bending and Twisting Elasticity of DNA’, Macromolecules 27, 981-988
(1994).    

[22] N.B. Becker, R.Everaers, ‘DNA: From rigid base-pairs to semiflexible polymers’, Phys. Rev. E 76,
021923 (2007).    

[23] P.A. Wiggins, R. Phillips, P.C. Nelson, ‘Exact theory of kinkable elastic polymers’, Phys. Rev. E 71,
021909 (2005).    

[24] M. Emanuel, H. Mohrbach, M. Sayar, H. Schiessel, I. M. Kulic, ‘Bucling of stiff polymers: Influence of
thermal fluctuations’, Phys. Rev. E 76, 061907-1-13 (2007).    

[25] M. Emanuel, H. Mohrbach. M. Sayar, H. Schiessel, I. M. 26 R.S. Manning, J.H. Maddocks, J.D. Kahn,
‘A continuum rod model of sequence-dependent DNA structure’, J. Chem. Phys. 105, 5626-5646
(1996)    