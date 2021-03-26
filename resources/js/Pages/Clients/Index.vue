<template>
    <app-layout>
        <div>
            <inertia-link id="create-projets" :href="route('clients.create')">Créer un client</inertia-link>
        </div>

        <table>
            <thead>
            <tr>
                <th>Raison sociale</th>
                <th>Description</th>
                <th>Projets</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clients">
                <td>{{ client.raison_sociale_client }}</td>
                <td>{{ client.description_client }}</td>
                <td>
                    <div v-for="client_projet in clients_projets">
                        <p v-if="client_projet.id === client.id">
                            {{ client_projet.client_projet_number }}
                        </p>
                    </div>
                </td>
                <td><inertia-link id="edit-client" :href="route('clients.edit', { id: client.id })">Editer</inertia-link></td>
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

#create-projets{
    margin-top: 100px;
}

</style>
