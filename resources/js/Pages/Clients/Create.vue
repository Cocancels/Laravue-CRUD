<template>
    <app-layout>
         <div class="relative z-0 w-full bg-gray-900">
            <div class="flex justify-between pt-20 pb-20 z-0 ">
                <h1 class="pb-20 ml-72 text-4xl text-white font-bold">Créer un Client</h1>
            </div>
        </div>
        <div  class="flex justify-center">
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




                <button onclick="test" class="text-white p-3 mb-6 bg-blue-600 rounded-lg" type="submit" :disabled="form.processing">Créer</button>
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

    props: {
      errors: Object,
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
            this.$inertia.post(this.route('clients.store'), this.form)
        },

    }
}
</script>

<style scoped>

</style>
