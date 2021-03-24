<template>
    <app-layout>
        <div>
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
                <input type="text" v-model="form.ville_siege_client">
                <button type="submit" :disabled="form.processing">Créer</button>
            </form>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    data(){
        return{
            form: this.$inertia.form({
                description_client : null,
                raison_sociale_client: null,
                statut_juridique_client: null,
                capital_client: null,
                siret_numero_client: null,
                naf_code_client: null,
                pays_siege_client: null,
                adresse_siege_client: null,
                code_postal_siege_client: null,
                ville_siege_client: null,
            })
        }
    },

    methods:{
        submit() {
            this.$inertia.post(this.route('clients.store'), this.form, {
                errorBag: 'errorBagId'
            })
        }
    }
}
</script>

<style scoped>

</style>
