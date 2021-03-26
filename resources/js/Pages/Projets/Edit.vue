<template>
    <app-layout>
        <div id="opacity">
            <button v-on:click="confirmDelete">Delete</button>
            <form @submit.prevent="submit">
                <select v-model="form.client_id">
                    <option v-for="client in clients">{{ client.raison_sociale_client }}</option>
                </select>
                <input type="text" v-model="form.nom_responsable_projet">
                <input type="text" v-model="form.prenom_responsable_projet">
                <input type="number" v-model="form.telephone_responsable_projet">
                <input type="text" v-model="form.mail_responsable_projet">
                <input type="text" v-model="form.titre_projet">
                <input type="text" v-model="form.description_projet">
                <input type="date" v-model="form.debut_projet">
                <input type="date" v-model="form.fin_projet">
                <select name="status" id="status" v-model="form.status_projet">
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                    <option value="Annulé">Annulé</option>
                </select>
                <input type="number" v-model="form.jours_vendus_projet">
                <button type="submit" :disabled="form.processing">Editer</button>
            </form>

        </div>

        <div id="none" v-show="isConfirmed">
            <p>NAYLEK NAYLEKNAYLEKNAYLEKNAYLEKNAYLEKNAYLEKNAYLEKNAYLEKNAYLEKNAYLEK</p>
            <button v-on:click="confirmDelete">Retour</button>
            <button v-on:click="delete">Delete</button>

        </div>
    </app-layout>



</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button";
export default {

    props: ['projet', 'clients', 'actualClient'],
    name: "Edit",
    components: {Button, AppLayout},

    data(){
        return{
            form: this.$inertia.form({
                client_id : this.actualClient[0].raison_sociale_client,
                nom_responsable_projet: this.projet.nom_responsable_projet,
                prenom_responsable_projet: this.projet.prenom_responsable_projet,
                telephone_responsable_projet: this.projet.telephone_responsable_projet,
                mail_responsable_projet: this.projet.mail_responsable_projet,
                titre_projet: this.projet.titre_projet,
                description_projet: this.projet.description_projet,
                debut_projet: this.projet.debut_projet,
                fin_projet: this.projet.fin_projet,
                status_projet: this.projet.status_projet,
                jours_vendus_projet: this.projet.jours_vendus_projet,
            }),
            isConfirmed: false,

        }
    },
    methods:{
        submit() {
            this.$inertia.put(this.route('projets.update', this.projet.id), this.form, {
                errorBag: 'errorBagId'
            })
        },

        delete(){
            this.$inertia.delete(this.route('projets.destroy', this.projet.id), this.form)
        },

        confirmDelete(){
            if(this.isConfirmed){
                this.isConfirmed = false
                document.getElementById("opacity").style.opacity = "1"
            } else{
                this.isConfirmed = true
                document.getElementById("opacity").style.opacity = "0.25"
            }
        }
    }
}
</script>

<style scoped>
    #none{
        top: 50%;
        margin-left: 50%;
        position: absolute;
        transform: translateX(-50%)  translateY(-50%);
        background-color: white;
    }
</style>
