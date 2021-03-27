<template>
    <app-layout>
        <div class="relative z-0 w-full bg-gray-800">
            <div class="flex justify-between pt-20 pb-20 z-0 w-4/5 mx-auto">
                <h1 class="ml-20 text-4xl text-white font-bold">Projets</h1>
                <inertia-link class="mr-20 text-white bg-indigo-500 pt-4 pb-4 pr-6 pl-6 rounded-2xl" id="create-projets" :href="route('projets.create')">+  Créer un projet</inertia-link>
            </div>
        </div>

            <table class="table-fixed z-50 shadow rounded-2xl w-4/5 mx-auto">
                <thead>
                <tr class="border-b-2 uppercase text-gray-500">
                    <th class="text-left p-6 w-1/6">Titre</th>
                    <th class="text-left p-6 w-1/6">Client</th>
                    <th class="text-left p-6 w-2/6 overflow-hidden">Description</th>
                    <th class="text-left p-6 w-1/6">Tickets</th>
                    <th class="text-left p-6 w-1/6"></th>
                </tr>
                </thead>
                <tbody>
                <tr class="pl-6 text text-xl" v-for="projet in projets">
                    <td class="pl-6 pt-5 pb-5">{{ projet.titre_projet }}</td>
                    <td class="pl-6 pt-5 pb-5">
                        <div v-for="client in clients">
                            <p v-if="client.id === projet.client_id">
                                {{ client.raison_sociale_client }}
                            </p>
                        </div>
                    </td>
                    <td class="pl-6 pt-5 pb-5">
                        <p class="font-thin">
                        {{ projet.description_projet }}
                        </p>
                    </td>
                    <td class="pl-6 pt-5 pb-5" >
                        <p class="bg-yellow-100 text-yellow-800 inline p-2 rounded" v-if="projet.status_projet === 'En cours'">
                            {{ projet.status_projet }}
                        </p>
                        <p class="bg-green-100 text-green-800 inline p-2 rounded" v-if="projet.status_projet === 'Terminé'">
                            {{ projet.status_projet }}
                        </p>
                        <p class="bg-red-100 text-red-800 inline p-2 rounded" v-if="projet.status_projet === 'Annulé'">
                            {{ projet.status_projet }}
                        </p>

                    </td>
                    <td class="pl-6">
                        <inertia-link class="text-blue-500" id="edit-projets" :href="route('projets.edit', { id: projet.id })">Editer</inertia-link>
                    </td>
                </tr>
                </tbody>
            </table>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props: ['projets', 'clients'],
    name: "Index",
    components: {AppLayout},


}
</script>

<style scoped>
    body{
        background: white;
        font-family: Inter, 'sans-serif';

    }


    #termine{
        background-color: green;
    }
</style>
