<template>
    <app-layout>
        <div class="relative z-0 w-full bg-gray-900">
            <div class="flex  pt-20 pb-20 z-0 ">
                <h1 class="pb-20 ml-72 text-4xl text-white font-bold">Créer un Projet</h1>

            </div>
        </div>
        <div class="flex justify-center">
            <form class="rounded-lg pl-16 bg-white top-56 absolute w-9/12 flex-direction: column" @submit.prevent="submit">

                <h2 class="pb-4 pt-8 font-bold text-3xl ">Responsable projet</h2>
                <p class="pb-4 font-thin text-sm text-gray-400">Ces informations serviront a savoir qui dirige le projet du coté du client</p>

                <div class="pb-4 pt-4 flex">
                <label class=" text-gray-700 w-1/4" for="client">Client</label>
                <select  class="w-36 rounded-lg border-gray-300" name="client" v-model="form.client_id">
                    <option v-for="client in clients">{{ client.raison_sociale_client }}</option>
                </select>
                </div>
                <div class=" pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="nom">Nom</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="nom" type="text" v-model="form.nom_responsable_projet">
                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="prenom">Prénom</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="prenom" type="text" v-model="form.prenom_responsable_projet">
                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="telephone">Téléphone</label>
                <input class="w-1/2 rounded-lg border-gray-300" placeholder="+33 06 06 06 06 60" name="telephone" type="number" v-model="form.telephone_responsable_projet">
                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="email">Email</label>
                <input class="w-1/2 rounded-lg border-gray-300" placeholder="you@example.fr" name="email" type="email" v-model="form.mail_responsable_projet">
                </div>
                <h2 class="pb-4 pt-8 font-bold text-3xl">Information projet</h2>

                <p class="pb-4 font-thin text-sm text-gray-400">Use a permanent address where you can receive mail.</p>

               <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="titre">Titre</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="titre" type="text" v-model="form.titre_projet">
                </div>
               <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="description">Description</label>
                <textarea class="w-1/2 rounded-lg border-gray-300" name="description" type="text" v-model="form.description_projet"/>
                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="debut">Début du projet</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="debut" type="date" v-model="form.debut_projet">
                </div>
               <div class="pb-4  flex">
                 <label class="text-gray-700 w-1/4" for="fin">Fin du projet estimé</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="fin" type="date" v-model="form.fin_projet">
                </div>
                <select name="status" id="status" v-model="form.status_projet">
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                    <option value="Annulé">Annulé</option>
                </select>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="vendus">Nombre de jours vendus</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="vendus" type="number" v-model="form.jours_vendus_projet">
                </div>

                <button class="text-white p-3 mb-6 bg-blue-600 rounded-lg" type="submit" :disabled="form.processing">Sauvegarder</button>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Create",
    components: {AppLayout},

    props: ['clients'],

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
