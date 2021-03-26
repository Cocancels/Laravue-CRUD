<template>
    <app-layout>
        <button v-on:click="delete">Delete</button>
        <form @submit.prevent="submit">

            <input type="text" v-model="form.description_client">
            <input type="text" v-model="form.raison_sociale_client">
            <input type="text" v-model="form.statut_juridique_client">
            <input type="number" v-model="form.capital_client">
            <input type="number" v-model="form.siret_numero_client">
            <input type="text" v-model="form.naf_code_client">
            <input type="text" v-model="form.pays_siege_client">
            <input type="text" v-model="form.adresse_siege_client">
            <input type="number" v-model="form.code_postal_siege_client">
            <button type="submit" :disabled="form.processing">Editer</button>
        </form>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button";
export default {

    props: ['client'],
    name: "Edit",
    components: {Button, AppLayout},

    data(){
        return{
            form: this.$inertia.form({
                description_client : this.client.description_client,
                raison_sociale_client: this.client.raison_sociale_client,
                statut_juridique_client: this.client.statut_juridique_client,
                capital_client: this.client.capital_client,
                siret_numero_client: this.client.siret_numero_client,
                naf_code_client: this.client.naf_code_client,
                pays_siege_client: this.client.pays_siege_client,
                debut_projet: this.client.debut_projet,
                adresse_siege_client: this.client.adresse_siege_client,
                code_postal_siege_client: this.client.code_postal_siege_client,
                ville_siege_client: this.client.ville_siege_client,
            })
        }
    },
    methods:{
        submit() {
            this.$inertia.put(this.route('clients.update', this.client.id), this.form, {
                errorBag: 'errorBagId'
            })
        },

        delete(){
            this.$inertia.delete(this.route('clients.destroy', this.client.id), this.form)
        }
    }
}
</script>

<style scoped>

</style>
