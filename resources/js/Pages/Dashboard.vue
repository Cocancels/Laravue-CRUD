<template>
    <app-layout>
        <div class="relative z-0 w-full bg-gray-800">
            <div class="flex justify-between pt-20 pb-20 z-0 w-4/5 mx-auto">
                <h1 class="ml-20 text-4xl text-white font-bold">Dashboard</h1>
            </div>
        </div>
        <div class="w-4/5 mx-auto shadow rounded-2xl p-7">
            <h1 class="font-bold text-2xl">Statistiques</h1>

            <div class="flex justify-between w-3/4 mt-20">
                <div>
                    <div class="flex">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="6" fill="#6366F1"/>
                            <path d="M24 16.3542C24.7329 15.5238 25.8053 15 27 15C29.2091 15 31 16.7909 31 19C31 21.2091 29.2091 23 27 23C25.8053 23 24.7329 22.4762 24 21.6458M27 33H15V32C15 28.6863 17.6863 26 21 26C24.3137 26 27 28.6863 27 32V33ZM27 33H33V32C33 28.6863 30.3137 26 27 26C25.9071 26 24.8825 26.2922 24 26.8027M25 19C25 21.2091 23.2091 23 21 23C18.7909 23 17 21.2091 17 19C17 16.7909 18.7909 15 21 15C23.2091 15 25 16.7909 25 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="ml-5">
                            <h2 class="text-l text-gray-500">Nombres de clients </h2>
                            <div class="flex">
                                <p class="font-bold text-2xl">{{ clients.length }}</p>
                                <div class="flex self-center ml-5">
                                    <svg class="self-center" width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.293153 5.70679C0.105447 5.51926 0 5.26495 0 4.99979C0 4.73462 0.105447 4.48031 0.293153 4.29279L4.29816 0.292787C4.48592 0.105316 4.74055 0 5.00604 0C5.27154 0 5.52617 0.105316 5.71393 0.292787L9.71894 4.29279C9.90132 4.48139 10.0022 4.73399 9.99996 4.99619C9.99768 5.25838 9.89238 5.5092 9.70674 5.6946C9.5211 5.88001 9.26997 5.98518 9.00745 5.98746C8.74492 5.98974 8.49201 5.88894 8.30317 5.70679L6.0073 3.41379V10.9998C6.0073 11.265 5.90181 11.5194 5.71404 11.7069C5.52627 11.8944 5.27159 11.9998 5.00604 11.9998C4.7405 11.9998 4.48582 11.8944 4.29805 11.7069C4.11028 11.5194 4.00479 11.265 4.00479 10.9998V3.41379L1.70892 5.70679C1.52116 5.89426 1.26653 5.99957 1.00104 5.99957C0.735542 5.99957 0.480915 5.89426 0.293153 5.70679Z" fill="#10B981"/>
                                    </svg>
                                    <p class="text-green-600 font-bold">{{ numberClients }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <inertia-link class="mt-10 text-indigo-500" :href="route('clients.index')">Voir tous les clients</inertia-link>
                    </div>
                </div>

                <div>
                    <div class="flex">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="48" height="48" rx="6" fill="#6366F1"/>
                            <path d="M26.9998 27L24.9998 32L20.9998 21L31.9998 25L26.9998 27ZM26.9998 27L31.9998 32M19.1881 14.2385L19.9645 17.1363M17.1361 19.9647L14.2383 19.1883M25.9495 16.0503L23.8282 18.1716M18.1715 23.8284L16.0501 25.9497" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <div class="ml-5">
                            <h2 class="text-l text-gray-500">Nombres de projets </h2>
                            <div class="flex">
                                <p class="font-bold text-2xl">{{ projets.length }}</p>
                                <div class="flex self-center ml-5">
                                    <svg class="self-center" width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.293153 5.70679C0.105447 5.51926 0 5.26495 0 4.99979C0 4.73462 0.105447 4.48031 0.293153 4.29279L4.29816 0.292787C4.48592 0.105316 4.74055 0 5.00604 0C5.27154 0 5.52617 0.105316 5.71393 0.292787L9.71894 4.29279C9.90132 4.48139 10.0022 4.73399 9.99996 4.99619C9.99768 5.25838 9.89238 5.5092 9.70674 5.6946C9.5211 5.88001 9.26997 5.98518 9.00745 5.98746C8.74492 5.98974 8.49201 5.88894 8.30317 5.70679L6.0073 3.41379V10.9998C6.0073 11.265 5.90181 11.5194 5.71404 11.7069C5.52627 11.8944 5.27159 11.9998 5.00604 11.9998C4.7405 11.9998 4.48582 11.8944 4.29805 11.7069C4.11028 11.5194 4.00479 11.265 4.00479 10.9998V3.41379L1.70892 5.70679C1.52116 5.89426 1.26653 5.99957 1.00104 5.99957C0.735542 5.99957 0.480915 5.89426 0.293153 5.70679Z" fill="#10B981"/>
                                    </svg>
                                    <p class="text-green-600 font-bold">{{ pourcentage }} %</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <inertia-link class="mt-10 text-indigo-500" :href="route('projets.index')">Voir tous les projets</inertia-link>
                    </div>

                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'


    export default {
        props: ['numberClients', 'pourcentage', 'clients', 'projets'],
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
