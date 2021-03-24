<template>
    <app-layout>
        <div>
            <form @submit.prevent="submit">
                <select v-model="form.client_id">
                    <option>1</option>
                </select>
                <input type="text" v-model="form.nom_responsable_projet">
                <input type="text" v-model="form.prenom_responsable_projet">
                <input type="number" v-model="form.telephone_responsable_projet">
                <input type="text" v-model="form.mail_responsable_projet">
                <input type="text" v-model="form.titre_projet">
                <input type="text" v-model="form.description_projet">
                <input type="date" v-model="form.debut_projet">
                <input type="date" v-model="form.fin_projet">
                <input type="number" v-model="form.jours_vendus_projet">
                <button type="submit" :disabled="form.processing">Créer</button>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Create",
    components: {AppLayout},

    data(){
        return{
            form: this.$inertia.form({
                client_id : null,
                nom_responsable_projet: null,
                prenom_responsable_projet: null,
                telephone_responsable_projet: null,
                mail_responsable_projet: null,
                titre_projet: null,
                description_projet: null,
                debut_projet: null,
                fin_projet: null,
                status_projet: null,
                jours_vendus_projet: null,
            })
        }
    },
    methods:{
        submit() {
            this.$inertia.post(this.route('projets.store'), this.form, {
                errorBag: 'errorBagId'
            })
        }
    }
}
</script>

<style scoped>

</style>
