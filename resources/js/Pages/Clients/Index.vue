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
                <td>3</td>
            </tr>
            </tbody>
        </table>
    </app-layout>

</template>

<script>

import AppLayout from '@/Layouts/AppLayout'

export default {
    props: ['clients'],
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
