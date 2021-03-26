<template>
    <app-layout>
        <div>
            <h1>Statistiques</h1>
            <div>
                <p>Nombres de clients : {{ numberClients }}</p>
            </div>

            <div>
                <p>Nombre de projets: + {{ pourcentage }}%</p>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'


    export default {
        props: ['numberClients', 'pourcentage'],
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
