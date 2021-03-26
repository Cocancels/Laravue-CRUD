<template>
    <app-layout>
        <div class="relative z-0 w-full bg-gray-900">
            <div class="flex justify-between pt-20 pb-20 z-0 ">
                <h1 class="ml-20 text-4xl text-white font-bold">Projets</h1>
                <inertia-link class="mr-20 text-white bg-indigo-500 pt-4 pb-4 pr-6 pl-6 rounded-2xl" id="create-projets" :href="route('projets.create')">+  Créer un projet</inertia-link>
            </div>
        </div>

            <table class="table-auto z-50 shadow">
                <thead>
                <tr>
                    <th class="p-6">Titre</th>
                    <th class="p-6">Client</th>
                    <th class="p-6">Description</th>
                    <th class="p-6">Tickets</th>
                </tr>
                </thead>
                <tbody>
                <tr class="pl-1.5" v-for="projet in projets">
                    <td class="pl-1.5">{{ projet.titre_projet }}</td>
                    <td>
                        <div v-for="client in clients">
                            <p v-if="client.id === projet.client_id">
                                {{ client.raison_sociale_client }}
                            </p>
                        </div>
                    </td>
                    <td>{{ projet.description_projet }}</td>
                    <td>

                    </td>
                    <td>
                        <inertia-link id="edit-projets" :href="route('projets.edit', { id: projet.id })">Editer</inertia-link>
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
    components: {AppLayout}
}
</script>

<style scoped>
    body{
        background: white;
        font-family: Inter, 'sans-serif';

    }

    table{
        margin: auto;
    }
</style>
