<template>
    <app-layout>
        <div id="opacity">
        <div class="relative z-0 w-full bg-gray-900">
            <div class="flex justify-around pt-20 pb-20 z-0 ">
                <h1 class="pb-10 ml-10 text-4xl text-white font-bold">{{form.raison_sociale_client}}</h1>
                <button class="text-white px-6 py-2 mb-6 bg-red-600 rounded-lg" v-on:click="confirmDelete">Delete</button>

            </div>
        </div>

     <div  class="flex justify-center" id="opacity">
        <form class="rounded-lg pl-16 bg-white top-56 absolute w-9/12 flex-direction: column" @submit.prevent="submit">

            <h2 class="pb-4 pt-8 font-bold text-3xl ">Information société</h2>
                <p class="pb-4 font-thin text-sm text-gray-400">Informations légales de l'entreprise</p>

                <div  class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="description">Description</label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="description" type="text" v-model="form.description_client">
                    <div class="text-red-600" v-if="errors.description_client">Une description est requise</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="raison">Raison Sociale</label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="raison" type="text" v-model="form.raison_sociale_client">
                    <div class="text-red-600"  v-if="errors.raison_sociale_client">Une raison sociale est requise</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="statut">Statut Juridique</label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="statut" type="text" v-model="form.statut_juridique_client">
                    <div class="text-red-600"  v-if="errors.statut_juridique_client">Un statut juridique est requis</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="capital">Capital</label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="capital" type="number" v-model="form.capital_client">
                    <div class="text-red-600"  v-if="errors.capital_client">Un capital est requis</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="siret">Numéro de siret</label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="siret" type="number" v-model="form.siret_numero_client">
                    <div class="text-red-600"  v-if="errors.siret_numero_client">Un numéro de siret est requis</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="naf">Code NAF (APE) </label>
                    <input  class="w-1/2 rounded-lg border-gray-300" name="naf" type="text" v-model="form.naf_code_client">
                    <div class="text-red-600"  v-if="errors.naf_code_client">Un code NAF est requis</div>

                </div>

                <h2 class="pb-4 pt-8 font-bold text-3xl ">Adresse</h2>
                <p class="pb-4 font-thin text-sm text-gray-400">Localisation du siège social</p>

                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="pays">Pays</label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="pays" type="text" v-model="form.pays_siege_client">
                    <div class="text-red-600"  v-if="errors.pays_siege_client">Un siège client est requis</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="adresse">Adresse</label>
                     <textarea class="w-1/2 rounded-lg border-gray-300" name="adresse" type="text" v-model="form.adresse_siege_client"/>
                    <div class="text-red-600"  v-if="errors.adresse_siege_client">Une adresse du siège est requise</div>

                </div>
                <div class="pb-4 pt-4 flex">
                    <label class="text-gray-700 w-1/4" for="codepostal">Code postal </label>
                    <input class="w-1/2 rounded-lg border-gray-300" name="codepostal" type="number" v-model="form.code_postal_siege_client">
                    <div class="text-red-600"  v-if="errors.code_postal_siege_client">Un code postal est requis</div>


                </div>
                 <div class="pb-4 pt-4 flex">
                     <label class="text-gray-700 w-1/4" for="ville">Ville</label>
                     <input class="w-1/2 rounded-lg border-gray-300" name="ville" type="text" v-model="form.ville_siege_client">
                     <div class="text-red-600"  v-if="errors.ville_siege_client">Une ville est requise</div>

                 </div>
            <button class="text-white p-3 mb-6 bg-blue-600 rounded-lg" type="submit" :disabled="form.processing">Editer</button>
        </form>
        </div>
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

    props:{
        client: Object,
        errors: Object
    },

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

            }),
            isConfirmed:false,
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

    }

</style>
