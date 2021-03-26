<template>
    <app-layout>
        <div>
            <h1>Statistiques</h1>
            <div>
                <p>Nombres de clients</p>
            </div>

            <div>
                <p>Nombre de projets</p>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
