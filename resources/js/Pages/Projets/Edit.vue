<template>
    <app-layout>
    <div class="relative z-0 w-full bg-gray-900">
            <div class="flex justify-around pt-20 pb-20 z-0 ">
                <h1  class="pb-10 ml-10 text-4xl text-white font-bold">{{ form.titre_projet }}</h1>
                 <button  class="text-white px-6 py-2 mb-6 bg-red-600 rounded-lg" v-on:click="confirmDelete">Delete</button>
            </div>
     </div>
        <div class="flex justify-center " id="opacity">

            <form class="rounded-lg pl-16 bg-white top-56 absolute w-9/12 flex-direction: column" @submit.prevent="submit">

                <h2 class="pb-4 pt-8 font-bold text-3xl ">Responsable projet</h2>
                <p class="pb-4 font-thin text-sm text-gray-400">Ces informations serviront a savoir qui dirige le projet du coté du client</p>

                <div class="pb-4 pt-4 flex">
                <label class="text-gray-700 w-1/4" for="client">Client</label>
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
                <button class="text-white p-3 mb-6 bg-blue-600 rounded-lg" type="submit" :disabled="form.processing">Editer</button>
            </form>

        </div>

        <div class="border-4 p-16 rounded-lg" id="none" v-show="isConfirmed">
            <p>Supprimer le projet {{ form.titre_projet }} </p>
            <p></p>
            <button class="text-white p-3 mb-6 bg-blue-600 rounded-lg mr-8 mt-8" v-on:click="confirmDelete">Retour</button>
            <button class="text-white p-3 mb-6 bg-red-600 rounded-lg" v-on:click="delete">Delete</button>

        </div>
    </app-layout>



</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button";
export default {

    name: "Edit",
    components: {Button, AppLayout},

    props: {
        projet: Object,
        clients: [],
        actualClient: Object,
        errors: Object,
    },

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
        background-color: grey;

    }
</style>
