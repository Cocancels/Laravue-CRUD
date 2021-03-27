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
                    <div class="text-red-600" v-if="errors.client_id">Un client est requis</div>

                </div>
                <div class=" pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="nom">Nom</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="nom" type="text" v-model="form.nom_responsable_projet">
                    <div class="text-red-600" v-if="errors.nom_responsable_projet">Un nom du responsable est requis</div>

                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="prenom">Prénom</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="prenom" type="text" v-model="form.prenom_responsable_projet">
                    <div class="text-red-600" v-if="errors.prenom_responsable_projet">Un prénom du responsable est requis</div>

                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="telephone">Téléphone</label>
                <input class="w-1/2 rounded-lg border-gray-300" placeholder="+33 06 06 06 06 60" name="telephone" type="number" v-model="form.telephone_responsable_projet">
                    <div class="text-red-600" v-if="errors.telephone_responsable_projet">Un téléphone du responsable est requis</div>

                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="email">Email</label>
                <input class="w-1/2 rounded-lg border-gray-300" placeholder="you@example.fr" name="email" type="email" v-model="form.mail_responsable_projet">
                    <div class="text-red-600" v-if="errors.mail_responsable_projet">Un mail du responsable est requis</div>

                </div>
                <h2 class="pb-4 pt-8 font-bold text-3xl">Information projet</h2>

                <p class="pb-4 font-thin text-sm text-gray-400">Use a permanent address where you can receive mail.</p>

               <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="titre">Titre</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="titre" type="text" v-model="form.titre_projet">
                   <div class="text-red-600" v-if="errors.titre_projet">Un titre du projet est requis</div>

               </div>
               <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="description">Description</label>
                <textarea class="w-1/2 rounded-lg border-gray-300" name="description" type="text" v-model="form.description_projet"/>
                   <div class="text-red-600" v-if="errors.description_projet">Une description du projet est requise</div>

               </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="debut">Début du projet</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="debut" type="date" v-model="form.debut_projet">
                    <div class="text-red-600" v-if="errors.debut_projet">Un début du projet est requis</div>

                </div>
               <div class="pb-4  flex">
                 <label class="text-gray-700 w-1/4" for="fin">Fin du projet estimé</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="fin" type="date" v-model="form.fin_projet">
                   <div class="text-red-600" v-if="errors.fin_projet">Une fin du projet est requise</div>

               </div>
                <div  class="pb-4  flex">
                    <label class="text-gray-700 w-1/4" for="status">Status du projet</label>
                    <select class="w-1/2 rounded-lg border-gray-300" name="status" id="status" v-model="form.status_projet">
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                    <option value="Annulé">Annulé</option>
                </select>
                    <div class="text-red-600" v-if="errors.status_projet">Un statut du projet est requis</div>

                </div>
                <div class="pb-4 flex">
                 <label class="text-gray-700 w-1/4" for="vendus">Nombre de jours vendus</label>
                <input class="w-1/2 rounded-lg border-gray-300" name="vendus" type="number" v-model="form.jours_vendus_projet">
                    <div class="text-red-600" v-if="errors.jours_vendus_projet">Le nombre de jours vendus est requis</div>

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

    props: {
        clients: [],
        errors: Object,
},

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
            this.$inertia.post(this.route('projets.store'), this.form)
        }
    }
}
</script>

<style scoped>

</style>
