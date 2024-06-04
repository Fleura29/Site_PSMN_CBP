.. _famst:

Flexible Approximate MUlti-layer Sparse Transforms (FAµST)
==========================================================

.. |br| raw:: html

   <br>

.. container:: d-flex mb-3
    
    .. image:: ../../_static/img_projets/faust.png
        :class: img-fluid
        :alt: Image faust

    .. container::

        **IXXI, ENS-Lyon** : Hakim Hadj-Djilani |br|
        **Centre Blaise Pascal :** Emmanuel Quémener

The FAµST toolbox provides algorithms and data structures to decompose a given dense matrix into a product of sparse matrices in order to reduce its computational complexity (both for storage and manipulation).  FaµST can be used to :

  * speedup / reduce the memory footprint of iterative algorithms commonly used for solving high dimensional linear inverse problems.
  * learn dictionaries with an intrinsically efficient implementation
  * compute (approximate) fast Fourier transforms on graphs.

A C++ implementation (versions 2.x), including Matlab and Python wrappers, is available under an Inria licence.

More information about FAµST is available on the dedicated website: https://faust.inria.fr

The CBP has provided resources to host virtual machines running Windows systems which are necessary in the process of gitlab continuous integration (for tests execution, generation of packages, etc.).

Contribution du CBP
-------------------

The Centre Blaise Pascal provides :

* support and ressources for deep learning training and optimization
* expertise in GPU programming
