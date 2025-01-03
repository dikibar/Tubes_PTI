@props(['jobCount2'])
<div>
    <section class="relative text-black overflow-hidden min-h-screen bg-cover bg-center flex items-center justify-center"
        style="background-image: url('img/bg2.png');">
        <!-- Background Decoration -->


        <!-- Hero Content -->
        <div class="flex flex-col">
        <div class="w-full flex flex-row gap-6 py-12 justify-between px-12">
            <!-- Left Section -->
            <div class="space-y-6 text-center lg:text-left animate-fade-in-left">
                <div class="inline-block px-4 py-2 text-sm rounded-full bg-blue-100 backdrop-blur-sm">
                    <span class="text-blue-800">New</span> Remote Job Platform
                </div>

                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl xl:text-6xl">
                    Find Your <br> <span class="text-blue-600 break-words">Dream Career</span>
                </h1>

                <p class="max-w-xl mx-auto text-lg text-sky-900 lg:mx-0 opacity-90">
                    Unlock endless possibilities with our cutting-edge job discovery platform. Connect with global
                    opportunities tailored just for you.
                </p>

                <div class="flex flex-col justify-center gap-4 sm:flex-row lg:justify-start ">
                    <article class="flex flex-col gap-4 rounded-xl border border-gray-200 bg-white p-6 w-1/2">
                <div class="inline-flex gap-2 self-end rounded bg-blue-100 p-1 text-green-600">
                    

                    <span class="text-xs font-medium"> 
                    <img src="img/fa_suitcase.svg" alt="">    
                    </span>
                </div>

                <div>
                    <strong class="block text-sm font-medium text-gray-500"> Total </strong>

                    <p>
                        <span class="text-5xl font-medium text-blue-700"> {{ $jobCount2 }}</span>
                        <br>
                        <span class="text-lg text-gray-500"> Job Available </span>
                    </p>
                </div>
            </article>
                </div>
            </div>
            <!-- Right Section -->

            <div class="w-[370px] h-[370px] bg-cover bg-center rounded-3xl hidden lg:flex"
                style="background-image: url('img/cewe.png');">
                <div class="absolute ml-60 mt-3">
                    <img src="img/dididd.png" alt="Hero Image" class="w-52 h-auto animate-floating">
                </div>
                <div class="absolute mt-16 -ml-16">
                    <img src="img/newest job.png" alt="Hero Image" class="w-52 h-auto animate-floating">
                </div>
                <div class="absolute mt-72 -ml-16">
                    <img src="img/2k.png" alt="Hero Image" class="w-52 h-auto animate-floating">
                </div>
            </div>

            
            {{-- <div class="flex flex-col border border-red-500 w-full h-full">
                        <div class="flex border border-blue-700">
                            <img src="/img/newest job.png" alt="" class="w-64 ">
                            <img src="/img/2k.png" alt="" class="w-64">
                        </div>
                        <img src="/img/easy apply.png" alt="" class="w-64">
                    </div> --}}

            <!-- CSS -->


            <style>
                @keyframes floating {

                    0%,
                    100% {
                        transform: translateY(0);
                    }

                    50% {
                        transform: translateY(-15px);
                        /* Naik 15px */
                    }
                }

                .animate-floating {
                    animation: floating 3s ease-in-out infinite;
                    /* Animasi berjalan terus */
                }
            </style>
        </div>
        
</div>

</div>

</section>
</div>
