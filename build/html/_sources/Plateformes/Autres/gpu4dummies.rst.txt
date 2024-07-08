.. _gpu4dummies:

Practical session for Astrosim 2017
===================================

Practical work support for `Astrosim 2017 <https://astrosim.sciencesconf.org/>`_

5 W/2H : Why ? What ? Where ? When ? Who ? How much ? How ?
-----------------------------------------------------------

5W/2H : CQQCOQP (Comment ? Quoi ? Qui, Combien ? Où ? Quand ? Pourquoi ?) in french...

* **Why ?** Have a look on GPUs and improve investigations process
* **What ?** Test with dummie examples
* **When ?** Friday, the 7th of July in the afternoon
* **How much ?** Nothing, Blaise Pascal Center provides GPU inside workstations & cluster nodes 
* **Where ?** On workstations, cluster nodes, laptop (well configured), inside terminals
* **Who ?** For people who want to open the hood 
* **How ?** Applying some simple commands (essentially shell ones)

Session Goal
------------
 
It's to take in the hands GPU components inside machines and compare performances to classical CPU trough simplistic examples and production codes.

Starting the session
--------------------
 
Prerequisites hardware, software and humanware
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 
In order to get a complete functional environment, Blaise Pascal Center provides hardware, software, and OS well designed. People who want to achieve this practical session on their own laptop must have a real Unix Operating System.

Prerequisite for hardware
"""""""""""""""""""""""""
 
* If using CBP resources, nothing... Just login...
* If NOT using CBP resources, a machine relatively recent with onboard GPU inside, Nvidia one are preferred

Prerequisite for software
"""""""""""""""""""""""""

* Open graphical session on one workstation, several terminals and your favorite browser
* If NOT using CBP resources, a GNU/Linux Operating System well configured with all GPU, Nvidia, OpenCL, PyOpenCL, PyCuda stuff

People who want to use huge GPU, GPGPU or accelerator can use connect to the following machines.

* **gtx1080alpha**, **gtx1080beta**, **gtx1080gamma**, **gtx1080delta** : virtual workstations with dedicated Nvidia GTX 1080
* **k80alpha**, **k80beta**, **k80gamma** : virtual workstations with dedicated one, one and two GPU inside Nvidia Tesla K80
* **p100alpha**, **p100beta** : virtual workstations with dedicated one Nvidia Tesla P100
* **k40m** : virtual workstations with dedicated one Nvidia Tesla K40m

Have a look to `Monitoring website for workstations <http://styx.cbp.ens-lyon.fr/ganglia/?r=hour&cs=&ce=&m=load_one&s=by+name&c=Workstations>`_ before connecting and launch your jobs! Huge requests may create DoS!

Prerequisite for humanware
""""""""""""""""""""""""""

* An allergy to command line will severely restrict the range of this practical session.
* A practice of shell scripts would be a asset, but you will improve it in this session!

Investigate GPU Hardware
------------------------

What inside my host ?
~~~~~~~~~~~~~~~~~~~~~

Hardware in computing science is defined by `Von Neumann architecture <https://upload.wikimedia.org/wikipedia/commons/e/e5/Von_Neumann_Architecture.svg>`_:

* CPU (Central Processing Unit) with CU (Control Unit) and ALU (Arithmetic and Logic Unit)
* MU (Memory Unit)
* Input and Output Devices

GPU are normally considered as Input/Output devices. As mainly peripherals installed on PC machines, they use a interconnection bus, `PCI <https://en.wikipedia.org/wiki/Conventional_PCI>`_ or `PCI Express <https://en.wikipedia.org/wiki/PCI_Express>`_.

To get the list of PCI devices, use ``lspci -nn`` command. Inside this huge list appear some **VGA** or **3D** devices. These are GPU or GPGPU devices.

This is an output of ``lspci -nn | egrep '(VGA|3D)'`` command
<code>
06:00.0 VGA compatible controller: Advanced Micro Devices, Inc. [AMD/ATI] Fiji [Radeon R9 FURY / NANO Series] (rev ca)
82:00.0 VGA compatible controller: NVIDIA Corporation Device 1b06 (rev a1)
</code>

Exercice #1: get the list of (GP)GPU devices
""""""""""""""""""""""""""""""""""""""""""""

* How many VGA devices are listed ? How many 3D devices are listed ?
* Get the model of GPU device, its long name.
* Retreive on the www the following informations:

    * the number of compute units
    * the base frequency of the cores
    * the base frequency of the memory

All of the ``huge`` workstations hold Nvidia boards. 

In Posix operating systems, everything is file. Informations about Nvidia board and its discovery by the operating system on boot time can be get by a ``grep`` in ``dmesg``.

You can get kabalistic informations which are very important to

.. code-block:: bash

    [   19.545688] NVRM: The NVIDIA GPU 0000:82:00.0 (PCI ID: 10de:1b06)
                NVRM: NVIDIA Linux driver release.  Please see 'Appendix
                NVRM: A - Supported NVIDIA GPU Products' in this release's
                NVRM: at www.nvidia.com.
    [   19.545903] nvidia: probe of 0000:82:00.0 failed with error -1
    [   19.546254] NVRM: The NVIDIA probe routine failed for 1 device(s).
    [   19.546491] NVRM: None of the NVIDIA graphics adapters were initialized!
    [   19.782970] nvidia-nvlink: Nvlink Core is being initialized, major device number 244
    [   19.783084] NVRM: loading NVIDIA UNIX x86_64 Kernel Module  375.66  Mon May  1 15:29:16 PDT 2017 (using threaded interrupts)
    [   19.814046] nvidia-modeset: Loading NVIDIA Kernel Mode Setting Driver for UNIX platforms  375.66  Mon May  1 14:33:30 PDT 2017
    [   20.264453] [drm] [nvidia-drm] [GPU ID 0x00008200] Loading driver
    [   23.360807] input: HDA NVidia HDMI/DP,pcm=3 as /devices/pci0000:80/0000:80:02.0/0000:82:00.1/sound/card2/input19
    [   23.360885] input: HDA NVidia HDMI/DP,pcm=7 as /devices/pci0000:80/0000:80:02.0/0000:82:00.1/sound/card2/input20
    [   23.360996] input: HDA NVidia HDMI/DP,pcm=8 as /devices/pci0000:80/0000:80:02.0/0000:82:00.1/sound/card2/input21
    [   23.361065] input: HDA NVidia HDMI/DP,pcm=9 as /devices/pci0000:80/0000:80:02.0/0000:82:00.1/sound/card2/input22
    [   32.896510] [drm] [nvidia-drm] [GPU ID 0x00008200] Unloading driver
    [   32.935658] nvidia-modeset: Unloading
    [   32.967939] nvidia-nvlink: Unregistered the Nvlink Core, major device number 244
    [   33.034671] nvidia-nvlink: Nvlink Core is being initialized, major device number 244
    [   33.034724] NVRM: loading NVIDIA UNIX x86_64 Kernel Module  375.66  Mon May  1 15:29:16 PDT 2017 (using threaded interrupts)
    [   33.275804] nvidia-nvlink: Unregistered the Nvlink Core, major device number 244
    [   33.993460] nvidia-nvlink: Nvlink Core is being initialized, major device number 244
    [   33.993486] NVRM: loading NVIDIA UNIX x86_64 Kernel Module  375.66  Mon May  1 15:29:16 PDT 2017 (using threaded interrupts)
    [   35.110461] nvidia-modeset: Loading NVIDIA Kernel Mode Setting Driver for UNIX platforms  375.66  Mon May  1 14:33:30 PDT 2017
    [   35.111628] nvidia-modeset: Allocated GPU:0 (GPU-ccc95482-6681-052e-eb30-20b138412b92) @ PCI:0000:82:00.0
    [349272.210486] nvidia-uvm: Loaded the UVM driver in 8 mode, major device number 243

Exercice #2 : get the informations on your host with ``dmesg | grep -i nvidia`` command
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* What version of driver did the kernel load ?
* What represents, if it exists, the ``input: HDA NVidia`` device ? Is it a graphical one ?

The ``lsmod`` provides the list of modules loaded. Modules are small programs dedicated to the support of on function in a kernel, the engine of the Operating System. The support of a device needs one or several modules. 

An example of ``lsmod | grep nvidia`` on a workstation:

.. code-block:: bash

    nvidia_uvm            638976  0
    nvidia_modeset        790528  2
    nvidia              12312576  42 nvidia_modeset,nvidia_uvm

We see that 3 modules are loaded. The last column (empty for the two first lines) lists the dependencies between modules. Here, ``nvidia_modeset`` and ``nvidia_uvm`` depend on ``nvidia`` module.

Exercice #3 : get the informations on your host with ``lsmod | grep nvidia`` command 
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Are the informations on devices identical to the above ? Character by Character ?

The device also appears in ``/dev`` the root folder for devices. 

A ``ls -l /dev/nvidia*`` provides this kind of informations

.. code-block:: bash

    crw-rw-rw- 1 root root 195,   0 Jun 30 18:17 /dev/nvidia0
    crw-rw-rw- 1 root root 195, 255 Jun 30 18:17 /dev/nvidiactl
    crw-rw-rw- 1 root root 195, 254 Jun 30 18:17 /dev/nvidia-modeset
    crw-rw-rw- 1 root root 243,   0 Jul  4 19:17 /dev/nvidia-uvm
    crw-rw-rw- 1 root root 243,   1 Jul  4 19:17 /dev/nvidia-uvm-tools

We can see that everybody can access to the device. There is only one NVIDIA device, ``nvidia0``. On a multiple Nvidia GPU machine, we got ``nvidia0``, ``nvidia1``, etc...

Exercice #3 : get the informations on your host with ``dmesg | grep -i nvidia`` command
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* How many ``/dev/nvidia<number>`` do you get ?
* Is this information coherent to the 3 previous commands ?

Nvidia provides information about its recognized devices via ``nvidia-smi`` command. This command can also be used to configure some tricks inside the GPU.

An example of ``nvidia-smi`` output:

.. code-block:: bash

    Fri Jul  7 07:46:56 2017       
    +-----------------------------------------------------------------------------+
    | NVIDIA-SMI 375.66                 Driver Version: 375.66                    |
    |-------------------------------+----------------------+----------------------+
    | GPU  Name        Persistence-M| Bus-Id        Disp.A | Volatile Uncorr. ECC |
    | Fan  Temp  Perf  Pwr:Usage/Cap|         Memory-Usage | GPU-Util  Compute M. |
    |===============================+======================+======================|
    |   0  GeForce GTX 108...  Off  | 0000:82:00.0      On |                  N/A |
    | 23%   31C    P8    10W / 250W |     35MiB / 11172MiB |      0%      Default |
    +-------------------------------+----------------------+----------------------+
                                                                                
    +-----------------------------------------------------------------------------+
    | Processes:                                                       GPU Memory |
    |  GPU       PID  Type  Process name                               Usage      |
    |=============================================================================|
    |    0      4108    G   /usr/lib/xorg/Xorg                              32MiB |
    +-----------------------------------------------------------------------------+

Lots of informations are available in this output:
  
* version of driver and ``nvidia-smi`` software
* the ``id`` of GPU, 
* its name, 
* its bus location, 
* its fan speed, 
* its temperature, 
* its instantly and maximum consumption, 
* its occupied and available
* its processus and their location on GPU

Exercice #4 : get the informations with ``nvidia-smi`` command
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Identify the above characteristics and compare the elements
* How many process are listed in the bottom list ?

As we see in the introduction on GPU, programming them can be achieved with several ways. The first, for Nvidia devices, is to use CUDA environment. The problem is that it's impossible to reuse your program on other platform or compare directly with CPU. `OpenCL <https://www.khronos.org/opencl/>`_ is a more agnostic way.

On the workstations in CBP, all available implementations of OpenCL are available.

The command ``clinfo`` provides informations about devices. Here is an example of a short output with ``clinfo '-l'``:

.. code-block:: bash

    Platform #0: Clover
    Platform #1: Portable Computing Language
    `-- Device #0: pthread-Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Platform #2: NVIDIA CUDA
    `-- Device #0: GeForce GTX 1080 Ti
    Platform #3: Intel(R) OpenCL
    `-- Device #0:        Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Platform #4: AMD Accelerated Parallel Processing
    `-- Device #0: Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz

* The ``#0`` **Clover** implementation is a GPU one, based on Open Source drivers of GNU/Linux and provided by `Mesa <https://en.wikipedia.org/wiki/Mesa_%28computer_graphics%29>`_
* The ``#1`` **Portable Computing Language** is a CPU one. Not very efficient but Open Source.
* The ``#2`` **NVIDIA CUDA** implementation is a GPU one. The devices detected are listed below
* The ``#3`` **Intel(R) OpenCL** implementation is a CPU one. Provided by Intel, very efficient but FP results are sometimes strange.
* The ``#4`` **AMD Accelerated Parallel Processing** is a CPU one. Provided by AMD, rather efficient, the oldest one.

Exercice #5 : get the informations with ``clinfo -l`` command
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Identify and compare with list above.
* How many graphical devices do you get ?

The command ``clinfo`` without options provides lots (to much...) informations. You can restrict them for example to several attributes as ``Platform Name``, ``Device Name``, ``Max compute``, ``Max clock``.

On the example platform, the command ``clinfo | egrep '(Platform Name|Device Name|Max compute|Max clock)'`` provides the output:

.. code-block:: bash

    Platform Name                                   Clover
    Platform Name                                   Portable Computing Language
    Platform Name                                   NVIDIA CUDA
    Platform Name                                   Intel(R) OpenCL
    Platform Name                                   AMD Accelerated Parallel Processing
    Platform Name                                   Clover
    Platform Name                                   Portable Computing Language
    Device Name                                     pthread-Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Max compute units                               32
    Max clock frequency                             2401MHz
    Platform Name                                   NVIDIA CUDA
    Device Name                                     GeForce GTX 1080 Ti
    Max compute units                               28
    Max clock frequency                             1582MHz
    Platform Name                                   Intel(R) OpenCL
    Device Name                                     Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Max compute units                               32
    Max clock frequency                             2400MHz
    Platform Name                                   AMD Accelerated Parallel Processing
    Device Name                                     Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Max compute units                               32
    Max clock frequency                             1200MHz

Exercice #6 : get the informations with the previous and filtered ``clinfo`` command
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Compare the informations between CPU implementations. Why these differencies ?
* Compare the number of compute units to the number you find on WWW. 
* Compare the frequencies to the frequencies found on WWW.

Exploration with original one : xGEMM
-------------------------------------

From BLAS to xGEMM : implementations
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In the lecture about the GPUs, we present the GPU as a great matrix multiplier. On of the most common Linear Algebra librairies is BLAS one, formelly `Basic Linear Algebra Subprograms <https://en.wikipedia.org/wiki/Basic_Linear_Algebra_Subprograms>`_.

These subprograms can be considered as //standard// one. Lots of implementations exist on all architectures. On GPU, Nvidia provides its version with `cuBLAS <http://docs.nvidia.com/cuda/cublas/index.html>`_ and AMD release in Open Source its OpenCL implementation `clBLAS <https://github.com/clMathLibraries/clBLAS>`_. 

On CPU, Intel sells its optimized implementation in `MKL librairies <https://software.intel.com/en-us/mkl>`_ but an Open Source equivalent, `OpenBLAS <http://www.openblas.net/>`_. Several others implementations exist and are deployed on CBP machines : `ATLAS <http://math-atlas.sourceforge.net/>`_ and `GSL <https://www.gnu.org/software/gsl/>`_.

The implementation on Matrix Multiply in BLAS librairies is ``xGEMM``, with ``x`` to be replaced by ``S``, ``D``, ``C`` and ``Z`` respectively for Simple precision (32 bits), Double precision (64 bits), Complex & Simple precision, Complex & Double precision.

Test examples 
~~~~~~~~~~~~~

Inside ``/scratch/Astrosim2017/xGEMM`` are programs implementing xGEMM for simple ``xGEMM_SP_<version>`` or double ``xGEMM_DP_<version>``:

* ``fblas`` using ATLAS libraries
* ``openblas`` using OpenBLAS libraries
* ``gsl`` using GSL librairies
* ``cublas`` using cuBLAS libraries with internal memory management
* ``thunking`` using cuBLAS libraries with external memory management

The source code and ``Makefile`` using to compile these examples is available in tarball at:

* on workstations: ``/scratch/AstroSim2017/xGEMM_EQ_170707.tgz``
* on website: `xGEMM_EQ_170707.tgz <http://www.cbp.ens-lyon.fr/emmanuel.quemener/documents/Astrosim2017/xGEMM_EQ_170707.tgz>`_

The program call with ``-h`` option provides tiny informations to launch it. Input parameters are:

* size of square matrix
* number of iterations

The output provides:

* the mean elapsed time of each cycle
* the number of estimated GFlops
* the error estimated by the difference between trace of matrix multiply results

Examples on runs on the several implementations:

.. code-block:: bash

    # ./xGEMM_SP_fblas 1000 10 1 0
    Using FBLAS: 10 iterations for 1000x1000 matrix

    Duration of each cycle : 0.2133281000 s
    Number of GFlops : 18.741 
    Error 0.0000000000

    # ./xGEMM_SP_gsl 1000 10 1 0
    Using GSL: 10 iterations for 1000x1000 matrix

    Duration of each cycle : 8.1447937000 s
    Number of GFlops : 0.491 
    Error 0.0000000000

    # ./xGEMM_SP_openblas 1000 1000 1 0
    Using CBLAS: 1000 iterations for 1000x1000 matrix

    Duration of each cycle : 0.0161011820 s
    Number of GFlops : 248.305 
    Error 0.0000000000

    # ./xGEMM_SP_cublas 1000 1000 1 0
    Using CuBLAS: 1000 iterations for 1000x1000 matrix

    Duration of memory allocation : 0.6675190000 s
    Duration of memory free : 0.0004700000 s
    Duration of each cycle : 0.0005507960 s
    Number of GFlops : 7258.586 
    Error 0.0000000000

    # ./xGEMM_SP_thunking 1000 1000 1 0
    Using CuBLAS/Thunking: 1000 iterations for 1000x1000 matrix

    Duration of each cycle : 0.0143951160 s
    Number of GFlops : 277.733 
    Error 0.0000000000

    # ./xGEMM_SP_clblas 1000 1000 1 0
    Using CLBLAS: 1000 iterations for 1000x1000 matrix on (1,0)
    Device (1,0): GeForce GTX 1080 Ti

    Duration of memory allocation : 0.6057190000 s
    Duration of memory free : 0.0049670000 s
    Duration of each cycle : 0.0029998720 s
    Number of GFlops : 1332.724 
    Error 0.0000000000

Exercice #6 : launch ``xGEMM_<precision>_<implementation>`` with different sizes and iterations
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Which on the CPU implementations is the powerful
* Increase the size of matrix to ``2000``, ``4000``, ``8000`` on GPU and check the results
* Move from simple precision to double precision (SP to DP) and examine the elapsed time on CPU
* Move from simple precision to double precision (SP to DP) and examine the elapsed time on GPU

Exploration with dummie codes
-----------------------------

Pi Monte Carlo, a Compute Bound Example
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The ``PiXPU.py`` code is a implementation of PiMC Pi Dart Dash on GPU, on OpenCL and CUDA devices. It's useful to evaluate que compute power of *PU devices as, CPU, GPU (both Nvidia, AMD and Intel), and CPU through the 3 implementations. 

It's available on:

* on file: ``/scratch/AstroSim2017/PiXPU.py`` on workstations
* on website: `PiXPU.py <http://www.cbp.ens-lyon.fr/emmanuel.quemener/documents/Astrosim2017/PiXPU.py>`_

Copy the ``PiXPU.py`` inside your folder to use it

.. code-block:: bash

    mkdir /scratch/$USER
    cd /scratch/$USER
    cp /scratch/AstroSim2017/PiXPU.py /scratch/$USER

The documentation is available by the call of ``/scratch/$USER/PiXPU.py -h``:

.. code-block:: bash

    PiXPU.py -o (Out of Core Metrology) -c (Print Curves) -d <DeviceId> -g <CUDA/OpenCL> -i <Iterations> -b <BlocksBegin> -e <BlocksEnd> -s <BlocksStep> -f <ThreadsFirst> -l <ThreadsLast> -t <ThreadssTep> -r <RedoToImproveStats> -m <SHR3/CONG/MWC/KISS> -v <INT32/INT64/FP32/FP64>

    Informations about devices detected under OpenCL API:
    Device #0 from The pocl project of type *PU : pthread-Intel(R) Xeon(R) CPU E5-2620 0 @ 2.00GHz
    Device #1 from NVIDIA Corporation of type *PU : GeForce GTX TITAN
    Device #2 from Intel(R) Corporation of type *PU : Intel(R) Xeon(R) CPU E5-2620 0 @ 2.00GHz
    Device #3 from Advanced Micro Devices, Inc. of type *PU : Intel(R) Xeon(R) CPU E5-2620 0 @ 2.00GHz

    Informations about devices detected under CUDA API:
    Device #0 of type GPU : GeForce GTX TITAN

The ``-h`` also detects the OpenCL and CUDA devices and sends each an ID which must be used for their specific call. 

.. code-block:: bash

    Devices Identification : [0]
    GpuStyle used : OpenCL
    Iterations : 1000000
    Number of Blocks on begin : 1
    Number of Blocks on end : 1
    Step on Blocks : 1
    Number of Threads on begin : 1
    Number of Threads on end : 1
    Step on Threads : 1
    Number of redo : 1
    Metrology done out of XPU : False
    Type of Marsaglia RNG used : MWC
    Type of variable : FP32
    Device #0 from The pocl project of type xPU : pthread-Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Device #1 from NVIDIA Corporation of type xPU : GeForce GTX 1080 Ti
    Device #2 from Intel(R) Corporation of type xPU : Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    Device #3 from Advanced Micro Devices, Inc. of type xPU : Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz
    ('CPU/GPU selected: ', 'pthread-Intel(R) Xeon(R) CPU E5-2665 0 @ 2.40GHz')
    Pi estimation 3.14192800
    0.03 0.03 0.00 0.03 0.03 37357749 37357749 0 37357749 37357749

Two file are created by default:

* ``Pi_FP32_MWC_xPU_OpenCL_1_1_1_1_01000000_Device0_InMetro_titan.npz``
* ``Pi_FP32_MWC_xPU_OpenCL_1_1_1_1_01000000_Device0_InMetro_titan``

Exercice #7 : explore ``PiXPU.py`` with several simple configurations pour ``PR=1``
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Without any parameters (the default ones) : 

    * what is the selected device ? How many itops (iterative operations per second) do you reach ?
* With only the device parameter as ``-d 1`` to select ``#1`` for all the available devices :

    * What are the different ratios between the devices ? Which one is the most powerful ?
* With the selector of device and increasing the number of iterations and the number of redo :

    * What arrive to itops values ? What is the typical variability on results ?

.. code-block:: bash
    
    /scratch/$USER/PiXPU.py

.. code-block:: bash

    /scratch/$USER/PiXPU.py -d 1
    /scratch/$USER/PiXPU.py -d 2
    /scratch/$USER/PiXPU.py -d 3

.. code-block:: bash

    /scratch/$USER/PiXPU.py -d 0 -i 100000000 -r 10
    /scratch/$USER/PiXPU.py -d 1 -i 100000000 -r 10
    /scratch/$USER/PiXPU.py -d 2 -i 100000000 -r 10
    /scratch/$USER/PiXPU.py -d 3 -i 100000000 -r 10

Exercice #8 : explore ``PiXPU.py`` by increasing the Parallel Rate ``PR``
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* With a PR from ``1`` to ``64`` set by ``-b`` and ``-e``, a the number of iterations of 1 billion, and 10 times and on default device
    
    * How decrease the elapsed time of 
* With the selector of device and increasing the number of iterations and the number of redo :
    
    * What arrive to itops values ? What is the typical variability on results ?

.. code-block:: bash
    
    ./PiXPU.py -d 0 -b 1 -e 32 -i 1000000000 -r 10

In this case, we define a gnuplot config file as follow. Adapt to your files and configuration.

.. code-block:: bash

    set xlabel 'Parallel Rate'
    set ylabel 'Itops'
    plot 'Pi_FP32_MWC_xPU_OpenCL_1_64_1_1_1000000000_Device0_InMetro_titan' using 1:9 title 'CPU with OpenCL'

.. image:: ../../_static/Plateformes/pimc_1_64_cpu.png
    :class: img-fluid center
    :alt: Image pimc_1_64_cpu

Exercice #9 : explore ``PiXPU.py`` with large PR on GPU (mostly power of 2)
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Explore with ``PR`` from ``2048`` to ``32768`` with a 128 step
* For which ``PR`` the itops is the higher on you device ?

To explore on this platform the GPU device (device #1) from 2048 to 32768 as parallel rates with a step of 128 and 1000000000 iterations: 

.. code-block:: bash

    ./PiXPU.py -d 1 -b 2048 -e $((2048*16)) -s 128 -i 10000000000 -r 10

Output files are: 

* ``Pi_FP32_MWC_xPU_OpenCL_2048_32768_1_1_1000000000_Device1_InMetro_titan.npz``
* ``Pi_FP32_MWC_xPU_OpenCL_2048_32768_1_1_1000000000_Device1_InMetro_titan``

In this case, you can define a gnuplot config file

.. code-block:: bash

    set xlabel 'Parallel Rate'
    set ylabel 'Itops'
    plot 'Pi_FP32_MWC_xPU_OpenCL_2048_32768_1_1_10000000000_Device1_InMetro_titan' using 1:9 title 'GTX 1080 Ti'

.. image:: ../../_static/Plateformes/pimc_2048_32768_gtx1080ti.png
    :class: img-fluid center
    :alt: Image pimc_2048_32768_gtx1080ti

Exercice #10 : explore ``PiXPU.py`` with around a large ``PR``
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

.. code-block:: bash
    
    ./PiXPU.py -d 1 -b $((2048-8)) -e $((2048+8)) -i 10000000000 -r 10

* ``Pi_FP32_MWC_xPU_OpenCL_2040_2056_1_1_10000000000_Device1_InMetro_titan``
* ``Pi_FP32_MWC_xPU_OpenCL_2040_2056_1_1_10000000000_Device1_InMetro_titan.npz``

In this case, you can define a gnuplot config file

.. code-block:: bash

    set xlabel 'Parallel Rate'
    set ylabel 'Itops'
    plot 'Pi_FP32_MWC_xPU_OpenCL_2040_2056_1_1_10000000000_Device1_InMetro_titan' using 1:9 title 'GTX 1080 Ti'

.. image:: ../../_static/Plateformes/pimc_2040_2056_gtx1080ti.png
    :class: img-fluid center
    :alt: Image pimc_2040_2056_gtx1080ti

NBody, a simplistic simulator
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The ``NBody.py`` code is a implementation of N-Body kepkerian system on OpenCL devices. 

It's available on:

* on file: ``/scratch/AstroSim2017/NBody.py`` on workstations
* on website: `NBody.py <http://www.cbp.ens-lyon.fr/emmanuel.quemener/documents/Astrosim2017/NBody.py>`_

Launch the code with a ``N=2`` on ``1000`` iterations with a graphical output

.. code-block:: bash

    python NBody.py -n 2 -g -i 1000 

.. image:: ../../_static/Plateformes/nbody_n2_gpu.png
    :class: img-fluid center
    :alt: Image nbody_n2_gpu

Exercice #10 : explore ``NBody.py`` with different devices
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Exercice #11 : explore ``NBody.py`` with steps and iterations
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Exercice #12 : explore ``NBody.py`` with Double Precision
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Exploration with production codes
---------------------------------

PKDGRAV3
~~~~~~~~
