.. _s3dpet:

Logiciel de simulation 3D des phénomènes d'écoulement et de transport
=====================================================================

.. image:: ../../../_static/Réalisations/figuresoftp.png
    :class: img-float pe-2
    :alt: Image figuresoftp

* **Contact** : Cerasela Calugaru 

SoFTP is an improved version of SETMP code which has been developped in scientific computing team of Besancon to solve flow and mass (solute) transport in porous media. SETMP has been intensively used in various applications as intrusion of saline sea water in coastal aquifers, propagation of pollutants in aquifers, decontamination of polluted aquifers by pumping technics, study of seismic precursors, oil extraction, etc. 

The main new features of SoFTP are its capacities to:

* solve these phenomena in a more general case, including full filled fluid subdomains (as lakes, rivers, ...)
* simulate other transport phenomena, including heat transport

In addition, to make pre and post processing processes easier and more convivial, a graphical user interface has been developped with Tcl/Tk.

SoFTP uses appropriate finite element method of degree 2 (Lagrange elements for Darcy flow and SUPG method for discretization of transport equations). For the Stokes flow, Hood-Taylor (P2-P1) element is used combined with Uzawa algorithm. The multiphysics couplings are solved by fixed-point algorithms and multidomains couplings (including Darcy-Stokes coupling) are solved by using non-overlapping Schwarz algorithms. Porous-porous interfaces are treated by using Aitken acceleration of these domain decomposition methods.

SoFTP was initially writen in Fortran 77 language because it used MODULEF library for several tasks (mesh generation, solvers, visualization) but now, an evolution to Fortran 90/95 is carried out. Parallel implementations using PETSc and MPI have been also realized. 

.. image:: ../../../_static/Réalisations/3d.jpeg 
    :class: img-fluid center
    :alt: Image 3d
