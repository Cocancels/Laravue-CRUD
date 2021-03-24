<template>
    <app-layout>
        <div>
            <inertia-link id="create-projets" :href="route('projets.create')">Créer un projet</inertia-link>
        </div>

        <table>
            <thead>
            <tr>
                <th>Titre</th>
                <th>Client</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="projet in projets">
                <td>{{ projet.titre_projet }}</td>
                <td v-for="client in clients">
                    <p v-if="client.id === projet.client_id">
                        {{ client.raison_sociale_client }}
                    </p>
                </td>
                <td>{{ projet.description_projet }}</td>
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

</style>
