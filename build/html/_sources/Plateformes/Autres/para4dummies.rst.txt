.. _para4dummies:

Practical session for Astrosim 2017
===================================

Practical work support for `Astrosim 2017 <https://astrosim.sciencesconf.org/>`_

5 W/2H : Why ? What ? Where ? When ? Who ? How much ? How ?
-----------------------------------------------------------

5W/2H : CQQCOQP (Comment ? Quoi ? Qui, Combien ? Où ? Quand ? Pourquoi ?) in french...

* **Why ?** Have a look to parallelism on machines and improve investigations process
* **What ?** Test with dummie examples 
* **When ?** Friday, the 30th of June in the afternoon
* **How much ?** Nothing, Blaise Pascal Center provides workstations & cluster nodes 
* **Where ?** On workstations, cluster nodes, laptop (well configured), inside terminals
* **Who ?** For people who want to open the hood 
* **How ?** Applying some simple commands (essentially shell ones)

Session Goal
------------
 
It's to illustrate the relations between parallel hardware architectures and parallelized implementations of applications.

Starting the session
--------------------
 
Prerequisites hardware, software and humanware
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 
In order to get a complete functional environment, Blaise Pascal Center provides hardware, software, and OS well designed. People who want to achieve this practical session on their own laptop must have a real Unix Operating System.

Prerequisite for hardware
"""""""""""""""""""""""""
 
* If using CBP resources, nothing... Just login...
* If NOT using CBP resources, a machine relatively recent with multi-cores CPU

Prerequisite for software
"""""""""""""""""""""""""

* Open graphical session on one workstation, several terminals and your favorite browser
* If NOT using CBP resources, a GNU/Linux Operating System well configured

Prerequisite for humanware 
""""""""""""""""""""""""""

* An allergy to command line will severely restrict the range of this practical session.
* A practice of shell scripts would be a asset, but you will improve it in this session!

Investigate Hardware
--------------------

What inside my host ?
~~~~~~~~~~~~~~~~~~~~~

Hardware in computing science is defined by `Von Neumann architecture <https://upload.wikimedia.org/wikipedia/commons/e/e5/Von_Neumann_Architecture.svg>`_:
  
* CPU (Central Processing Unit) with CU (Control Unit) and ALU (Arithmetic and Logic Unit)
* MU (Memory Unit)
* Input and Output Devices

The first property of hardware is limited resources.

In Posix systems, everything is file. So you can retreive informations (or set configurations) by classical file commands inside a terminal. For example ``cat /proc/cpuinfo`` returns information about processor.

On **hd6450alpha**, the less powerfull workstation in CBP, ``cat /proc/cpuinfo`` returns:

.. code-block:: bash

    processor	: 0
    vendor_id	: GenuineIntel
    cpu family	: 15
    model		: 6
    model name	: Intel(R) Pentium(R) D CPU 3.40GHz
    stepping	: 4
    microcode	: 0x4
    cpu MHz		: 3388.919
    cache size	: 2048 KB
    physical id	: 0
    siblings	: 2
    core id		: 0
    cpu cores	: 2
    apicid		: 0
    initial apicid	: 0
    fpu		: yes
    fpu_exception	: yes
    cpuid level	: 6
    wp		: yes
    flags		: fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx lm constant_tsc pebs bts nopl eagerfpu pni dtes64 monitor ds_cpl est cid cx16 xtpr pdcm lahf_lm
    bugs		:
    bogomips	: 6777.83
    clflush size	: 64
    cache_alignment	: 128
    address sizes	: 36 bits physical, 48 bits virtual
    power management:

    processor	: 1
    vendor_id	: GenuineIntel
    cpu family	: 15
    model		: 6
    model name	: Intel(R) Pentium(R) D CPU 3.40GHz
    stepping	: 4
    microcode	: 0x4
    cpu MHz		: 3388.919
    cache size	: 2048 KB
    physical id	: 0
    siblings	: 2
    core id		: 1
    cpu cores	: 2
    apicid		: 1
    initial apicid	: 1
    fpu		: yes
    fpu_exception	: yes
    cpuid level	: 6
    wp		: yes
    flags		: fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx lm constant_tsc pebs bts nopl eagerfpu pni dtes64 monitor ds_cpl est cid cx16 xtpr pdcm lahf_lm
    bugs		:
    bogomips	: 6778.13
    clflush size	: 64
    cache_alignment	: 128
    address sizes	: 36 bits physical, 48 bits virtual
    power management:

This command provides lots of informations (54 lines) on computing capabilities. Several are physical ones (number of cores, size of caches, frequency), logical ones.

The command ``lscpu`` provides a more compact informations:

.. code-block:: bash

    Architecture:          x86_64
    CPU op-mode(s):        32-bit, 64-bit
    Byte Order:            Little Endian
    CPU(s):                2
    On-line CPU(s) list:   0,1
    Thread(s) per core:    1
    Core(s) per socket:    2
    Socket(s):             1
    NUMA node(s):          1
    Vendor ID:             GenuineIntel
    CPU family:            15
    Model:                 6
    Model name:            Intel(R) Pentium(R) D CPU 3.40GHz
    Stepping:              4
    CPU MHz:               3388.919
    BogoMIPS:              6777.83
    L1d cache:             16K
    L2 cache:              2048K
    NUMA node0 CPU(s):     0,1
    Flags:                 fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush dts acpi mmx fxsr sse sse2 ss ht tm pbe syscall nx lm constant_tsc pebs bts nopl eagerfpu pni dtes64 monitor ds_cpl est cid cx16 xtpr pdcm lahf_lm

Exercice #1: get this informations on your host with ``cat /proc/cpuinfo`` and compare to one above
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* How much lines of informations ?

Exercice #2 : get the informations on your host with ``lscpu`` command
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* What new informations appear on the output ? 
* How many CPUs ? Threads per core ? Cores per socket ? Sockets ?
* How many cache levels ?
* How many "flags" ? What do they represent ?

Exploration
~~~~~~~~~~~

Some hardware libraries provides you a graphical view of hardware system, including peripherals. The command ``hwloc-ls`` from ``hwloc`` library offers this output:

.. image:: ../../_static/Plateformes/lstopo_035.png
    :class: img-fluid center
    :alt: Image hwloc-ls

Exercice #3 : get a graphical representation of hardware with ``hwloc-ls`` command
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Locate and identify the elements provided with ``lscpu`` command
* How much memory does your host hold ?

The peripherals are listed and prefixed by ``PCI``. The command ``lspci -nn`` provides the list of PCI devices:

.. code-block:: bash

    00:00.0 Host bridge [0600]: Intel Corporation 82Q963/Q965 Memory Controller Hub [8086:2990] (rev 02)
    00:01.0 PCI bridge [0604]: Intel Corporation 82Q963/Q965 PCI Express Root Port [8086:2991] (rev 02)
    00:1a.0 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB UHCI Controller #4 [8086:2834] (rev 02)
    00:1a.1 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB UHCI Controller #5 [8086:2835] (rev 02)
    00:1a.7 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB2 EHCI Controller #2 [8086:283a] (rev 02)
    00:1b.0 Audio device [0403]: Intel Corporation 82801H (ICH8 Family) HD Audio Controller [8086:284b] (rev 02)
    00:1c.0 PCI bridge [0604]: Intel Corporation 82801H (ICH8 Family) PCI Express Port 1 [8086:283f] (rev 02)
    00:1c.4 PCI bridge [0604]: Intel Corporation 82801H (ICH8 Family) PCI Express Port 5 [8086:2847] (rev 02)
    00:1d.0 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB UHCI Controller #1 [8086:2830] (rev 02)
    00:1d.1 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB UHCI Controller #2 [8086:2831] (rev 02)
    00:1d.2 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB UHCI Controller #3 [8086:2832] (rev 02)
    00:1d.7 USB controller [0c03]: Intel Corporation 82801H (ICH8 Family) USB2 EHCI Controller #1 [8086:2836] (rev 02)
    00:1e.0 PCI bridge [0604]: Intel Corporation 82801 PCI Bridge [8086:244e] (rev f2)
    00:1f.0 ISA bridge [0601]: Intel Corporation 82801HB/HR (ICH8/R) LPC Interface Controller [8086:2810] (rev 02)
    00:1f.2 IDE interface [0101]: Intel Corporation 82801H (ICH8 Family) 4 port SATA Controller [IDE mode] [8086:2820] (rev 02)
    00:1f.3 SMBus [0c05]: Intel Corporation 82801H (ICH8 Family) SMBus Controller [8086:283e] (rev 02)
    00:1f.5 IDE interface [0101]: Intel Corporation 82801HR/HO/HH (ICH8R/DO/DH) 2 port SATA Controller [IDE mode] [8086:2825] (rev 02)
    01:00.0 VGA compatible controller [0300]: Advanced Micro Devices, Inc. [AMD/ATI] Caicos [Radeon HD 6450/7450/8450 / R5 230 OEM] [1002:6779]
    01:00.1 Audio device [0403]: Advanced Micro Devices, Inc. [AMD/ATI] Caicos HDMI Audio [Radeon HD 6450 / 7450/8450/8490 OEM / R5 230/235/235X OEM] [1002:a...
    03:00.0 Ethernet controller [0200]: Broadcom Limited NetXtreme BCM5754 Gigabit Ethernet PCI Express [14e4:167a] (rev 02)

Exercice #4 : list the PCI peripherals with ``lspci`` command
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

    * How many devices do you get ?
    * Can you identify the devices listed with graphical representation ?
    * What keywords on graphical representation define the VGA device ?

Exploring dynamic system
~~~~~~~~~~~~~~~~~~~~~~~~

Your hosts run a `GNU/Linux <http://www.kernel.org>`_ operating system based on `Debian <http://www.debian.org>`_ Stretch distribution. 

As when your drive a car, it's useful to get informations about running system during process. The commands ``top`` and ``htop``

Exercice #5: open ``htop`` and ``top`` in two terminals
"""""""""""""""""""""""""""""""""""""""""""""""""""""""

* What do you see first ?
* How much memory have you ?
* How much swap ?
* How many tasks are launched ? How many threads ?

Tiny metrology with ``/usr/bin/time``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. container:: note note-important

    Be careful, there is a difference between ``time`` included as command in shells and ``time`` as standalone program. In order not to get difficulties, the program ``time`` has to be resquested by ``/usr/bin/time``!

Difference between ``time`` build in command and ``time`` standalone program.

``time (date ; sleep 10 ; date)``

.. code-block:: bash

    Thu Jun 29 09:15:53 CEST 2017
    Thu Jun 29 09:16:03 CEST 2017

    real	0m10.012s
    user	0m0.000s
    sys	0m0.000s

``/usr/bin/time bash -c 'date ; sleep 10 ; date' ``

.. code-block:: bash

    Thu Jun 29 09:18:51 CEST 2017
    Thu Jun 29 09:19:01 CEST 2017
    0.00user 0.00system 0:10.01elapsed 0%CPU (0avgtext+0avgdata 2984maxresident)k
    0inputs+0outputs (0major+481minor)pagefaults 0swaps

Have a close eye to the difference of the syntax if you would like to get metrology on a sequence of commands: a prefix by ``bash -c`` and the quotes on the boundaries are needed.

The defaut output of ``/usr/bin/time`` is more verbose but not easily to parse. It's better to define the output with ``TIME`` variable. Copy/paste the following in terminal:

.. code-block:: bash

    export TIME='TIME Command being timed: "%C"
    TIME User time (seconds): %U
    TIME System time (seconds): %S
    TIME Elapsed (wall clock) time : %e
    TIME Percent of CPU this job got: %P
    TIME Average shared text size (kbytes): %X
    TIME Average unshared data size (kbytes): %D
    TIME Average stack size (kbytes): %p
    TIME Average total size (kbytes): %K
    TIME Maximum resident set size (kbytes): %M
    TIME Average resident set size (kbytes): %t
    TIME Major (requiring I/O) page faults: %F
    TIME Minor (reclaiming a frame) page faults: %R
    TIME Voluntary context switches: %w
    TIME Involuntary context switches: %c
    TIME Swaps: %W
    TIME File system inputs: %I
    TIME File system outputs: %O
    TIME Socket messages sent: %s
    TIME Socket messages received: %r
    TIME Signals delivered: %k
    TIME Page size (bytes): %Z
    TIME Exit status: %x'

``echo $TIME``

.. code-block:: bash

    TIME Command being timed: "%C" TIME User time (seconds): %U TIME System time (seconds): %S TIME Elapsed (wall clock) time : %e TIME Percent of CPU this job got: %P TIME Average shared text size (kbytes): %X TIME Average unshared data size (kbytes): %D TIME Average stack size (kbytes): %p TIME Average total size (kbytes): %K TIME Maximum resident set size (kbytes): %M TIME Average resident set size (kbytes): %t TIME Major (requiring I/O) page faults: %F TIME Minor (reclaiming a frame) page faults: %R TIME Voluntary context switches: %w TIME Involuntary context switches: %c TIME Swaps: %W TIME File system inputs: %I TIME File system outputs: %O TIME Socket messages sent: %s TIME Socket messages received: %r TIME Signals delivered: %k TIME Page size (bytes): %Z TIME Exit status: %x

For the execution line above, we got something like:

.. code-block:: bash

    Thu Jun 29 09:32:34 CEST 2017
    Thu Jun 29 09:32:44 CEST 2017
    TIME Command being timed: "bash -c date ; sleep 10 ; date"
    TIME User time (seconds): 0.00
    TIME System time (seconds): 0.00
    TIME Elapsed (wall clock) time : 10.01
    TIME Percent of CPU this job got: 0%
    TIME Average shared text size (kbytes): 0
    TIME Average unshared data size (kbytes): 0
    TIME Average stack size (kbytes): 0
    TIME Average total size (kbytes): 0
    TIME Maximum resident set size (kbytes): 3072
    TIME Average resident set size (kbytes): 0
    TIME Major (requiring I/O) page faults: 0
    TIME Minor (reclaiming a frame) page faults: 488
    TIME Voluntary context switches: 32
    TIME Involuntary context switches: 4
    TIME Swaps: 0
    TIME File system inputs: 0
    TIME File system outputs: 0
    TIME Socket messages sent: 0
    TIME Socket messages received: 0
    TIME Signals delivered: 0
    TIME Page size (bytes): 4096
    TIME Exit status: 0

Exercice #6 : exploration of ``/usr/bin/time`` on several command Unix commands or your small programs 
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

Statistics on the fly ! Penstacle of statistics
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

`R project <https://www.r-project.org/>`_ is a complete and extended software for statistics. 

* ``minimum``: the best (in time) or the worst (in performance)
* ``maximum``: the worst (in time) or the best (in performance)
* ``average``: the classical metric used (but not the best on computing dynamic systems)
* ``median``: the best metric on a set of experiments
* ``stddev`` or standard deviation: 

* variability is defined as the ratio between median and standard deviation

The tool ``/tmp/Rmmmms-$USER.r`` estimates the *penstacle* of statistics and adds on the rightest column the variability on a standard input stream. 

To create ``/tmp/Rmmmms-$USER.r``, copy/paste following lines in a terminal. 

.. code-block:: bash
        
    tee /tmp/Rmmmms-$USER.r <<EOF
    #! /usr/bin/env Rscript
    d<-scan("stdin", quiet=TRUE)
    cat(min(d), max(d), median(d), mean(d), sd(d), sd(d)/median(d), sep="\t")
    cat("\n")
    EOF
    chmod u+x /tmp/Rmmmms-$USER.r

To evaluate the variability to MemCopy test memory in ``mbw`` tool on 10 launches with a size of 1GB, the command is:

.. code-block:: bash

    mbw -a -t 0 -n 10 1000

This is an example of output:

.. code-block:: bash

    Long uses 8 bytes. Allocating 2*131072000 elements = 2097152000 bytes of memory.
    Getting down to business... Doing 10 runs per test.
    0	Method: MEMCPY	Elapsed: 0.17240	MiB: 1000.00000	Copy: 5800.430 MiB/s
    1	Method: MEMCPY	Elapsed: 0.17239	MiB: 1000.00000	Copy: 5800.700 MiB/s
    2	Method: MEMCPY	Elapsed: 0.17320	MiB: 1000.00000	Copy: 5773.672 MiB/s
    3	Method: MEMCPY	Elapsed: 0.17304	MiB: 1000.00000	Copy: 5779.044 MiB/s
    4	Method: MEMCPY	Elapsed: 0.17311	MiB: 1000.00000	Copy: 5776.741 MiB/s
    5	Method: MEMCPY	Elapsed: 0.17315	MiB: 1000.00000	Copy: 5775.473 MiB/s
    6	Method: MEMCPY	Elapsed: 0.17337	MiB: 1000.00000	Copy: 5767.911 MiB/s
    7	Method: MEMCPY	Elapsed: 0.17429	MiB: 1000.00000	Copy: 5737.531 MiB/s
    8	Method: MEMCPY	Elapsed: 0.17365	MiB: 1000.00000	Copy: 5758.776 MiB/s
    9	Method: MEMCPY	Elapsed: 0.17327	MiB: 1000.00000	Copy: 5771.240 MiB/s

To filter and extract statistics *on the fly*:

.. code-block:: bash

    mbw -a -t 0 -n 10 1000 | grep MEMCPY | awk '{ print $9 }' | /tmp/Rmmmms-$USER.r 

This is an example of output:

.. code-block:: bash

    5595.783	5673.179	5624.503	5625.749	21.81671	0.003878869

Exercice #7 : practice ``Rmmmms-$USER.r`` and investigate variability
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Launch previous command to 10000, 1000, 100 launchs with respectly sizes of 10, 100, 1000
* Have a look on statistics estimators : what tipically variability do you reach ?

This will be very useful to extract and provides statistics of times.

An illustrative example: Pi Dart Dash
-------------------------------------

Principle, inputs & outputs
~~~~~~~~~~~~~~~~~~~~~~~~~~~

The most common example of Monte Carlo program: estimate Pi number by the ratio between the number of points located in the quarter of a circle where random points are uniformly distributed. It needs:

* a random number generator for the 2 coordonates: pseudo-random number generators are generally based on logic and arithmetic functions on integer.
* operators of estimate the square of the 2 numbers and their sum 
* a comparator

The input & output are the simplest one:
  
* Input: an integer as number of iterations
* Output: an integer as number of points inside the quarter of circle
* Output (bis): an estimation of Pi number (very inefficient method but the result is well known, so easy checked).
* Output (ter): the total amount of iterations (just to remind)

The following implementation is as ``bash`` shell script one. The ``RANDOM`` command provides a random number between 0 and 32767. So the frontier is located on ``32767*32767``. 

Copy/Paste the following block inside a terminal.

.. code-block:: bash

    tee /tmp/PiMC-$USER.sh <<EOF
    #!/bin/bash

    if [ -z "\$1" ] 
    then
        echo "Please provide a number of iterations!"
        exit
    fi

    INSIDE=0
    THEONE=\$((32767**2))

    ITERATION=0

    while [ \$ITERATION -lt \$1 ]
    do

        X=\$((RANDOM))
        Y=\$((RANDOM))

        if [ \$((\$X*\$X+\$Y*\$Y)) -le \$THEONE ]
        then
        INSIDE=\$((\$INSIDE+1))
        fi
        ITERATION=\$((\$ITERATION+1))
    done

    echo Pi \$(echo 4.*\$INSIDE/\$ITERATION | bc -l)
    echo Inside \$INSIDE
    echo Iterations \$1
    EOF
    chmod u+x /tmp/PiMC-$USER.sh

A program name ``PiMC-$USER.sh`` located in ``/tmp`` where ``$USER`` is your login is created and ready to use.

Exercice #8: launch ``PiMC`` program with several number of iterations: from 100 to 1000000
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* What is the typical precision of the result ?

Exercice #9: launch ``PiMC`` program prefixed by ``/usr/bin/time`` with several number of iterations: 100 to 1000000 
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Grep the ``Elapsed`` and ``Iterations`` and estimate manually the **ITOPS** (ITerative Operations Per Second) for this program implementation
* Improve the test to estimate the ITOPS *on the fly*: apply to different amount of iterations and several time

One Solution:

.. code-block:: bash

    echo $(/usr/bin/time /tmp/PiMC-$USER.sh 100000 2>&1 | egrep '(Elapsed|Iterations)' | awk '{ print $NF }' | tr '\n' '/')1 | bc -l

For 100000 iterations, 10 times:

.. code-block:: bash

    31250.00000000000000000000
    31645.56962025316455696202
    28248.58757062146892655367
    30864.19753086419753086419
    31847.13375796178343949044
    32362.45954692556634304207
    32467.53246753246753246753
    31545.74132492113564668769
    32573.28990228013029315960
    32362.45954692556634304207

Example of code for previous results:

.. code-block:: bash

    for i in $(seq 10 ) ; do echo $(/usr/bin/time /tmp/PiMC-$USER.sh 100000 2>&1 | egrep '(Elapsed|Iterations)' | awk '{ print $NF }' | tr '\n' '/')1 | bc -l ; done

From 1000 to 1000000, 1 time:

.. code-block:: bash

    1000	20000.00000000000000000000
    10000	26315.78947368421052631578
    100000	32154.34083601286173633440
    1000000	31685.67807351077313054499

Example of code for previous results:

.. code-block:: bash

    for POWER in $(seq 3 1 6); do ITERATIONS=$((10**$POWER)) ; echo -ne $ITERATIONS'\t' ; echo $(/usr/bin/time /tmp/PiMC-$USER.sh $ITERATIONS 2>&1 | egrep '(Elapsed|Iterations)' | awk '{ print $NF }' | tr '\n' '/')1 | bc -l ; done

Split the execution in equal parts
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The following command line divides the job to do (10000000 iterations) into ``PR`` equal jobs.

* Define the number of iterations of each job
* Launch sequentially jobs with the association of ``seq`` and xargs

.. code-block:: bash

    ITERATIONS=1000000
    PR=1
    EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1)))
    seq $PR | /usr/bin/time xargs -I PR /tmp/PiMC-$USER.sh $EACHJOB PR 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

Example of execution on 32 coresHT

.. code-block:: bash

    Pi 3.14100400000000000000
    Inside 785251
    Iterations 1000000
    TIME User time (seconds): 30.32
    TIME System time (seconds): 0.08
    TIME Elapsed (wall clock) time : 30.43

On the previous launch, User time represents 99.6% of Elapsed time. Internal system operations only 0.4%.

Exercice #10 : identification of the cost of splitting process
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Explore the values of ``User``, ``System`` and ``Elapsed`` times for different values of iterations
* Estimate the ratio between ``User time`` and ``Elapsed time`` for the results
* Estimate the ratio between ``System time`` and ``Elapsed time`` for the results
* What could you conclude ?

Replace the ``PR`` set as ``1`` by the detected number of CPU with ``lspcu`` command.

.. code-block:: bash

    ITERATIONS=1000000
    PR=$(lscpu | grep '^CPU(s):' | awk '{ print $NF }')
    EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1)))
    seq $PR | /usr/bin/time xargs -I '{}' /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

On a bi-socket workstation with 8-cores CPU and Hyper Threading acivated, 32 CPUs are detected

.. code-block:: bash

    Pi 3.14073600000000000000
    Inside 24537
    Iterations 31250
    Pi 3.14073600000000000000
    Inside 24537
    Iterations 31250
    Pi 3.12870400000000000000
    Inside 24443
    Iterations 31250
    Pi 3.11910400000000000000
    Inside 24368
    Iterations 31250
    Pi 3.11667200000000000000
    Inside 24349
    Iterations 31250
    Pi 3.13625600000000000000
    Inside 24502
    Iterations 31250
    Pi 3.14176000000000000000
    Inside 24545
    Iterations 31250
    Pi 3.13254400000000000000
    Inside 24473
    Iterations 31250
    Pi 3.14496000000000000000
    Inside 24570
    Iterations 31250
    Pi 3.12960000000000000000
    Inside 24450
    Iterations 31250
    Pi 3.12140800000000000000
    Inside 24386
    Iterations 31250
    Pi 3.13587200000000000000
    Inside 24499
    Iterations 31250
    Pi 3.14880000000000000000
    Inside 24600
    Iterations 31250
    Pi 3.12870400000000000000
    Inside 24443
    Iterations 31250
    Pi 3.14368000000000000000
    Inside 24560
    Iterations 31250
    Pi 3.13945600000000000000
    Inside 24527
    Iterations 31250
    Pi 3.13203200000000000000
    Inside 24469
    Iterations 31250
    Pi 3.14803200000000000000
    Inside 24594
    Iterations 31250
    Pi 3.14688000000000000000
    Inside 24585
    Iterations 31250
    Pi 3.14368000000000000000
    Inside 24560
    Iterations 31250
    Pi 3.13305600000000000000
    Inside 24477
    Iterations 31250
    Pi 3.15276800000000000000
    Inside 24631
    Iterations 31250
    Pi 3.14931200000000000000
    Inside 24604
    Iterations 31250
    Pi 3.15072000000000000000
    Inside 24615
    Iterations 31250
    Pi 3.14265600000000000000
    Inside 24552
    Iterations 31250
    Pi 3.14790400000000000000
    Inside 24593
    Iterations 31250
    Pi 3.14572800000000000000
    Inside 24576
    Iterations 31250
    Pi 3.14496000000000000000
    Inside 24570
    Iterations 31250
    Pi 3.14240000000000000000
    Inside 24550
    Iterations 31250
    Pi 3.12908800000000000000
    Inside 24446
    Iterations 31250
    Pi 3.13344000000000000000
    Inside 24480
    Iterations 31250
    Pi 3.12755200000000000000
    Inside 24434
    Iterations 31250
    TIME User time (seconds): 32.56
    TIME System time (seconds): 0.12
    TIME Elapsed (wall clock) time : 33.05

In this example, we see that the User time represents 98.52% of the Elapsed time. The total Elapsed time is greater up to 10% to unsplitted one. So, splitting has a cost. The system time represents 0.4% of Elapsed time.

Exercice #11 : identification of the cost of splitting process
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Explore the values of ``User``, ``System`` and ``Elapsed`` times for different values of iterations
* Estimate the ratio between ``User time`` and ``Elapsed time`` for the results
* Estimate the ratio between ``System time`` and ``Elapsed time`` for the results
* What could you conclude ?

Exercice #12 : merging results & improve metrology
""""""""""""""""""""""""""""""""""""""""""""""""""

* Append the program to extract the total amount of *Inside* number of iterations
* Set timers inside command lines to estimate the total Elapsed time

Solution: the timer used are based on ``date`` command

.. code-block:: bash

    ITERATIONS=1000000
    START=$(date '+%s.%N')
    PR=$(lscpu | grep '^CPU(s):' | awk '{ print $NF }')
    EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1)))
    seq $PR | /usr/bin/time xargs -I '{}' /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep ^Inside | awk '{ sum+=$2 } END { printf "Insides %i", sum }' ; echo
    STOP=$(date '+%s.%N')
    echo Total Elapsed time: $(echo $STOP-$START | bc -l) 

After splitting, finally the parallelization
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In this illustrative case, each job is independant to others. They can be distributed to all the computing resources available. ``xargs`` command line builder do it for you with ``-P <ConcurrentProcess>``.

So, the previous command becomes

.. code-block:: bash

    ITERATIONS=1000000
    PR=$(lscpu | grep '^CPU(s):' | awk '{ print $NF }')
    EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1)))
    seq $PR | /usr/bin/time xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

.. code-block:: bash

    Pi 3.13843200000000000000
    Inside 24519
    Iterations 31250
    Pi 3.14688000000000000000
    Inside 24585
    Iterations 31250
    Pi 3.15686400000000000000
    Inside 24663
    Iterations 31250
    Pi 3.14508800000000000000
    Inside 24571
    Iterations 31250
    Pi 3.14572800000000000000
    Inside 24576
    Iterations 31250
    Pi 3.15174400000000000000
    Inside 24623
    Iterations 31250
    Pi 3.14547200000000000000
    Inside 24574
    Iterations 31250
    Pi 3.12972800000000000000
    Inside 24451
    Iterations 31250
    Pi 3.14688000000000000000
    Inside 24585
    Iterations 31250
    Pi 3.14521600000000000000
    Inside 24572
    Iterations 31250
    Pi 3.13740800000000000000
    Inside 24511
    Iterations 31250
    Pi 3.14316800000000000000
    Inside 24556
    Iterations 31250
    Pi 3.16147200000000000000
    Inside 24699
    Iterations 31250
    Pi 3.12665600000000000000
    Inside 24427
    Iterations 31250
    Pi 3.13625600000000000000
    Inside 24502
    Iterations 31250
    Pi 3.14496000000000000000
    Inside 24570
    Iterations 31250
    Pi 3.14163200000000000000
    Inside 24544
    Iterations 31250
    Pi 3.13510400000000000000
    Inside 24493
    Iterations 31250
    Pi 3.13830400000000000000
    Inside 24518
    Iterations 31250
    Pi 3.14419200000000000000
    Inside 24564
    Iterations 31250
    Pi 3.14035200000000000000
    Inside 24534
    Iterations 31250
    Pi 3.14624000000000000000
    Inside 24580
    Iterations 31250
    Pi 3.13190400000000000000
    Inside 24468
    Iterations 31250
    Pi 3.15097600000000000000
    Inside 24617
    Iterations 31250
    Pi 3.15494400000000000000
    Inside 24648
    Iterations 31250
    Pi 3.13817600000000000000
    Inside 24517
    Iterations 31250
    Pi 3.14547200000000000000
    Inside 24574
    Iterations 31250
    Pi 3.15814400000000000000
    Inside 24673
    Iterations 31250
    Pi 3.13459200000000000000
    Inside 24489
    Iterations 31250
    Pi 3.12985600000000000000
    Inside 24452
    Iterations 31250
    Pi 3.15238400000000000000
    Inside 24628
    Iterations 31250
    Pi 3.15072000000000000000
    Inside 24615
    Iterations 31250
    TIME User time (seconds): 59.52
    TIME System time (seconds): 0.16
    TIME Elapsed (wall clock) time : 2.06

The total User time jumped from 32 to 59 seconds (+83%)! But Elapsed time is reduced from 33.05 to 2.06 (-84%). The System time represents 7% of Elapsed time. 

In conclusion, splitting a huge job into small jobs has a Operating System cost. But distribute the jobs using system can very efficient to reduce Elapsed time.

Exercice #13 : launch with ``-P`` set with the number of CPU detected
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Examine the ``Elapsed time``: decrease or not ?
* Examine the ``User time``: increase or not ?
* Examine the ``System time``: increase or not ?

Exercice #14 : append the program to improve statistics
"""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Add iterator to redo the program 10 times
* Store the ``time`` estimators inside an output file defined as : ``/tmp/PiMC-$USER_YYYYmmddHHMM.log``
* Parse the output file and extract statistics on 3 times estimators.
* Estimate the speedup between ``PR=1`` and ``PR=<NumberOfCPU>``
* Multiply by 10 the number of iterations and estimate the speedup

Solution:

.. code-block:: bash

    ITERATIONS=1000000
    PR=$(lscpu | grep '^CPU(s):' | awk '{ print $NF }')
    EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1)))
    LOGFILE=/tmp/$(basename /tmp/PiMC-$USER .sh)_$(date '+%Y%m%d%H%M').log
    seq 10 | while read ITEM
    do
    seq $PR | /usr/bin/time xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(time)'
    done > $LOGFILE
    echo Results stored in $LOGFILE

Example of output file:

.. code-block:: bash

    TIME User time (seconds): 59.81
    TIME System time (seconds): 0.14
    TIME Elapsed (wall clock) time : 2.02
    TIME User time (seconds): 59.38
    TIME System time (seconds): 0.10
    TIME Elapsed (wall clock) time : 1.96
    TIME User time (seconds): 59.20
    TIME System time (seconds): 0.22
    TIME Elapsed (wall clock) time : 1.97
    TIME User time (seconds): 59.50
    TIME System time (seconds): 0.09
    TIME Elapsed (wall clock) time : 1.98
    TIME User time (seconds): 59.37
    TIME System time (seconds): 0.14
    TIME Elapsed (wall clock) time : 1.97
    TIME User time (seconds): 59.61
    TIME System time (seconds): 0.16
    TIME Elapsed (wall clock) time : 2.01
    TIME User time (seconds): 59.12
    TIME System time (seconds): 0.16
    TIME Elapsed (wall clock) time : 2.00
    TIME User time (seconds): 59.70
    TIME System time (seconds): 0.12
    TIME Elapsed (wall clock) time : 1.99
    TIME User time (seconds): 59.34
    TIME System time (seconds): 0.14
    TIME Elapsed (wall clock) time : 1.99
    TIME User time (seconds): 59.33
    TIME System time (seconds): 0.12
    TIME Elapsed (wall clock) time : 1.98

Examples of statistics on estimators:
With *magic* ``Rmmmms-$USER.r`` command, we can extract statistics on different times 

* for *Elapsed time* : ``cat /tmp/PiMC-$USER_201706291231.log | grep Elapsed | awk '{ print $NF }' | /tmp/Rmmmms-$USER.r``:

.. code-block:: bash
    
    1.96	2.02	1.985	1.987	0.01888562	0.009514167

* for *System time* : ``cat /tmp/PiMC-$USER_201706291231.log | grep System | awk '{ print $NF }' | /tmp/Rmmmms-$USER.r``:

.. code-block:: bash
    
    0.09	0.22	0.14	0.139	0.03665151	0.2617965

* for *User time* : ``cat /tmp/PiMC-$USER_201706291231.log | grep User | awk '{ print $NF }' | /tmp/Rmmmms-$USER.r``:

.. code-block:: bash
    
    59.12	59.81	59.375	59.436	0.2179297	0.003670394

The previous results show that the variability, in this cas, in 

If we take 10x the previous number of iterations:
  
* With ``PR=1``:

.. code-block:: bash
        
    TIME User time (seconds): 313.36
    TIME System time (seconds): 0.93
    TIME Elapsed (wall clock) time : 314.40

* With ``PR=32``:

.. code-block:: bash

    TIME User time (seconds): 606.06
    TIME System time (seconds): 1.65
    TIME Elapsed (wall clock) time : 19.46

Select the execution cores
~~~~~~~~~~~~~~~~~~~~~~~~~~

It's possible with the ``hwloc-bind`` command to select the cores on which you would like to execute your program. You just have to specify the physical units with the format *from* ``-`` *to*. For example, if you want to execute the parallelized application MyParallelApplication on a machine with 8 cores (defined from ``0`` to ``7``) only on the two first:

.. code-block:: bash

    hwloc-bind -p pu:0-1 ./MyParallelApplication

If you want to select only one atomic core, the last one, for example:

.. code-block:: bash

    hwloc-bind -p pu:7-7 ./MyParallelApplication

If you want to select several non adjacent cores, the first and the last ones, for example:

.. code-block:: bash

    hwloc-bind -p pu:0-0 pu:7-7 ./MyParallelApplication

.. container:: note note-important

    You can control the selection by watching in another terminal the ``htop`` activity of cores

Exercice #15 : launch the previous program on a slice of machine
""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* Identify and launch the program on only the first core
* Identify and launch the program on the first half of cores
* Identify and launch the program on the second half of cores
* Identify and launch on two first cores
* Identify and launch on first on the first half and first on the second half of cores
* Why is there a so great difference between elapsed time 

Watch inside terminal with ``htop`` to check the right distribution of tasks.

Solutions for a 32 cores workstation:

* On the first core: 0 

.. code-block:: bash

    ITERATIONS=10000000 ; PR=$(($(lscpu | grep '^CPU(s):' | awk '{ print $NF }')/2)) ; EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1))) ; seq $PR | /usr/bin/time hwloc-bind -p pu:0-0 xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

* On the first half of cores: 0 to 15

.. code-block:: bash

    ITERATIONS=10000000 ; PR=$(($(lscpu | grep '^CPU(s):' | awk '{ print $NF }')/2)) ; EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1))) ; seq $PR | /usr/bin/time hwloc-bind -p pu:0-15 xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

* On the second half of cores: 16 to 31

.. code-block:: bash

    ITERATIONS=10000000 ; PR=$(($(lscpu | grep '^CPU(s):' | awk '{ print $NF }')*2)) ; EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1))) ; seq $PR | /usr/bin/time hwloc-bind -p pu:16-31 xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

* On the first of first half and first of second half of cores: 0 and 8

.. code-block:: bash

    ITERATIONS=10000000 ; PR=$(($(lscpu | grep '^CPU(s):' | awk '{ print $NF }')*2)) ; EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1))) ; seq $PR | /usr/bin/time hwloc-bind -p pu:0-1 xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

* On the first of first half and first of second half of cores: 0 and 8

.. code-block:: bash

    ITERATIONS=10000000 ; PR=$(($(lscpu | grep '^CPU(s):' | awk '{ print $NF }')*2)) ; EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1))) ; seq $PR | /usr/bin/time hwloc-bind -p pu:0-0 pu:8-8 xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep -v timed | egrep '(Pi|Inside|Iterations|time)'

Exercice #17 : from exploration to laws estimation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

* explore with previous program from ``PR=1`` to ``PR=<2x CPU>``, 10x for each
* store the results in a file

Solution:

.. code-block:: bash
    
    ITERATIONS=1000000 ;
    REDO=10 ;
    PR_START=1 ; 
    PR_STOP=$(($(lscpu | grep '^CPU(s):' | awk '{ print $NF }')*2)) ;
    OUTPUT=/tmp/$(basename /tmp/PiMC-$USER.sh .sh)_${PR_START}_${PR_STOP}_$(date "+%Y%m%d%H%M").dat
    seq $PR_START 1 $PR_STOP | while read PR ;
    do 
        echo -ne "$PR\t" ; 
        EACHJOB=$([ $(($ITERATIONS % $PR)) == 0 ] && echo $(($ITERATIONS/$PR)) || echo $(($ITERATIONS/$PR+1))) ;
        seq $REDO | while read STEP ;
        do
        seq $PR | /usr/bin/time xargs -I '{}' -P $PR /tmp/PiMC-$USER.sh $EACHJOB '{}' 2>&1 | grep Elapsed | awk '{ print $NF }' 
        done | /tmp/Rmmmms-$USER.r
    done > $OUTPUT
    echo Results in $OUTPUT file

As an example, a 32HT cores workstation, we got:

.. code-block:: bash

    # PR	MIN	MAX	AVG	MED	STDEV	Variability
    1	29.94	35.16	30.56	30.99	1.54438	0.05053601
    2	15.09	16.73	15.445	15.531	0.4647449	0.03009031
    3	10.3	12.02	10.555	10.795	0.6131567	0.05809158
    4	7.78	8.21	7.97	7.975	0.1269514	0.01592866
    5	6.31	6.53	6.435	6.416	0.07366591	0.01144769
    6	5.27	5.57	5.41	5.415	0.09778093	0.01807411
    7	4.61	5.67	4.74	4.901	0.3989277	0.08416197
    8	4.03	4.35	4.115	4.146	0.09800227	0.02381586
    9	3.66	3.92	3.71	3.718	0.07420692	0.02000186
    10	3.32	4.29	3.36	3.453	0.295524	0.08795358
    11	3.01	4.45	3.08	3.229	0.4330114	0.1405881
    12	2.77	4.29	2.86	3.019	0.4609519	0.161172
    13	2.61	2.89	2.68	2.707	0.08602971	0.03210064
    14	2.51	4.03	2.615	2.842	0.4982369	0.1905304
    15	2.31	3.42	2.41	2.565	0.3422231	0.1420013
    16	2.31	3.03	2.66	2.675	0.2382459	0.08956613
    17	2.42	3.11	2.7	2.722	0.2395737	0.088731
    18	2.42	2.8	2.67	2.627	0.1477272	0.05532855
    19	2.52	2.72	2.605	2.615	0.06114645	0.02347273
    20	2.43	2.91	2.54	2.579	0.136337	0.05367598
    21	2.37	2.91	2.49	2.509	0.1540166	0.06185405
    22	2.28	2.73	2.37	2.407	0.1271963	0.05366931
    23	2.3	2.54	2.35	2.37	0.06879922	0.02927627
    24	2.25	2.37	2.285	2.287	0.03368151	0.01474027
    25	2.19	2.37	2.225	2.246	0.06022181	0.02706598
    26	2.1	2.32	2.18	2.191	0.05606544	0.02571809
    27	2.14	2.27	2.205	2.198	0.04516636	0.02048361
    28	2.07	2.21	2.14	2.134	0.04273952	0.01997174
    29	2.02	2.11	2.07	2.065	0.02758824	0.01332765
    30	2	2.13	2.035	2.036	0.03806427	0.0187048
    31	1.98	2.07	1.99	2.002	0.02820559	0.01417367
    32	1.97	2.02	1.99	1.993	0.01766981	0.008879302
    33	2.05	2.25	2.12	2.129	0.06402257	0.03019932
    34	2.08	2.23	2.15	2.155	0.0457651	0.02128609
    35	2.08	2.25	2.16	2.156	0.05853774	0.0271008
    36	2.02	2.21	2.13	2.129	0.05782156	0.02714627
    37	2.08	2.2	2.15	2.147	0.03560587	0.01656087
    38	2.01	2.19	2.125	2.119	0.05384133	0.0253371
    39	2.05	2.2	2.105	2.111	0.05108816	0.02426991
    40	2.06	2.2	2.11	2.124	0.04526465	0.02145244
    41	2.07	2.18	2.09	2.102	0.03425395	0.01638945
    42	2.04	2.13	2.095	2.092	0.0265832	0.01268888
    43	2.03	2.12	2.08	2.076	0.03025815	0.01454719
    44	2.04	2.14	2.085	2.086	0.03204164	0.01536769
    45	2.02	2.13	2.08	2.082	0.03392803	0.01631155
    46	2.05	2.12	2.075	2.081	0.0218327	0.01052178
    47	1.98	2.15	2.08	2.073	0.05250397	0.02524229
    48	1.99	2.14	2.085	2.081	0.04557046	0.02185633
    49	2.04	2.18	2.085	2.087	0.04321779	0.02072796
    50	2.06	2.17	2.12	2.116	0.03657564	0.01725266
    51	2.02	2.16	2.09	2.086	0.03864367	0.01848979
    52	2.03	2.13	2.08	2.075	0.02915476	0.01401671
    53	2.03	2.14	2.095	2.093	0.03465705	0.01654274
    54	2	2.11	2.075	2.069	0.03212822	0.01548348
    55	2.02	2.15	2.095	2.085	0.04062019	0.01938911
    56	2.05	2.11	2.09	2.081	0.02078995	0.009947347
    57	2.03	2.09	2.065	2.065	0.01840894	0.008914739
    58	2.06	2.11	2.07	2.082	0.02250926	0.01087404
    59	2.02	2.11	2.07	2.067	0.02451757	0.01184424
    60	2.02	2.1	2.055	2.057	0.02406011	0.01170808
    61	2.03	2.15	2.065	2.07	0.03333333	0.01614205
    62	2.01	2.13	2.06	2.059	0.03842742	0.01865409
    63	2.01	2.09	2.07	2.06	0.03018462	0.01458194
    64	2.02	2.11	2.075	2.077	0.02945807	0.01419666

Question #18 : plot & fit with Amdahl and Mylq laws
"""""""""""""""""""""""""""""""""""""""""""""""""""

* plot the curve with your favorite plotter the different values, focus on median one !
* fit with an Amdahl law where ``T=s+p/N`` where ``N`` is ``PR``
* fit with a Mylq law where ``T=s+c*N+p/N`` 
* what law match the best

Examples of gnuplot bunch of commands to do the job. Adapt to your file and ``PR``...

.. code-block:: bash

    Ta(x)=T1*(1-Pa+Pa/x)
    fit [x=1:16] Ta(x) 'PiMC_1_64.dat' using 1:4 via T1,Pa
    Tm(x)=Sm+Cm*x+Pm/x
    fit [x=1:16] Tm(x) 'PiMC_1_64.dat' using 1:4 via Sm,Cm,Pm
    set xlabel 'Parallel Rate'
    set xrange [1:64]
    set ylabel "Speedup Factor"
    set title "PiMC : parallel execution with Bash for distributed iterations"
    plot    'PiMC_1_64.dat' using ($1):(Tm(1)/$4) title 'Mesures' with points,\
        Tm(1)/Tm(x) title "Mylq Law" with lines,\
        Ta(1)/Ta(x) title "Amdahl Law" with lines

.. image:: ../../_static/Plateformes/pimc_1_64.png
    :class: img-fluid center
    :alt: Image pimc_1_64

Other sample codes (used for courses)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

In folder ``/scratch/AstroSim2017``, you will find the following executables:

* ``PiXPU.py`` : Pi Monte Carlo Dart Dash in PyOpenCL
* ``NBody.py`` : N-Body in PyOpenCL
* ``xGEMM_DP_openblas`` : Matrix-Matrix multiplication with multithreaded OpenBLAS library in double precision
* ``xGEMM_SP_openblas`` : Matrix-Matrix multiplication with multithreaded OpenBLAS library in simple precision
* ``xGEMM_DP_clblas`` : Matrix-Matrix multiplication for OpenCL library in double precision
* ``xGEMM_SP_clblas`` : Matrix-Matrix multiplication for OpenCL library in simple precision
* ``xGEMM_DP_cublas`` : Matrix-Matrix multiplication for CUDA library in double precision
* ``xGEMM_SP_cublas`` : Matrix-Matrix multiplication for CUDA library in simple precision

Exercice #19 : select parallelized program and explore salability
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* launch one of the upper code with ``PR`` from ``1`` to the 2 times the number of CPUs
* draw the scalability curve
* estimates the parameters with Amdahl Law and Mylq Law

Your prefered software
~~~~~~~~~~~~~~~~~~~~~~

Exercice #20 : select parallelized program and explore salability
"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""

* launch your MPI code with ``PR`` from ``1`` to the 2 times the number of CPUs
* draw the scalability curve
* estimates the parameters with Amdahl Law and Mylq Law

--- `Emmanuel Quemener <emmanuel.quemener@ens-lyon.fr>`_ 2017/06/30 14:26