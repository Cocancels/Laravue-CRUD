<template>
    <app-layout>
        <div class="relative z-0 w-full bg-gray-800">
            <div class="flex justify-between pt-20 pb-20 z-0 w-4/5 mx-auto">
                <h1 class="ml-20 text-4xl text-white font-bold">Clients</h1>
                <inertia-link class="mr-20 text-white bg-indigo-500 pt-4 pb-4 pr-6 pl-6 rounded-2xl" :href="route('clients.create')">+  Créer un client</inertia-link>
            </div>
        </div>



        <table class="rounded-lg ml-32 bg-white top-56 absolute table-fixed z-50 shadow rounded-2xl w-4/5 mx-auto">
            <thead>
            <tr class="border-b-2 uppercase text-gray-500">
                <th class="text-left p-6 w-1/5">Raison sociale</th>
                <th class="text-left p-6 w-1/5">Description</th>
                <th class="text-left p-6 w-2/5">Projets</th>
                <th class="text-left p-6 w-1/5"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clients">
                <td class="pl-6 pt-5 pb-5">{{ client.raison_sociale_client }}</td>
                <td class="pl-6 pt-5 pb-5">{{ client.description_client }}</td>
                <td class="pl-6 pt-5 pb-5">
                    <div v-for="client_projet in clients_projets">
                        <p v-if="client_projet.id === client.id">
                            {{ client_projet.client_projet_number }}
                        </p>
                    </div>
                </td>
                <td class="pr-6 pt-5 pb-5 text-right"><inertia-link id="edit-client" :href="route('clients.edit', { id: client.id })">Editer</inertia-link></td>
            </tr>
            </tbody>
        </table>
    </app-layout>

</template>

<script>

import AppLayout from '@/Layouts/AppLayout'

export default {
    props: ['clients', 'projets', 'clients_projets'],
    components: {
        AppLayout,
    },


}
</script>

<style scoped>


</style>
