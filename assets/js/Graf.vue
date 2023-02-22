
<script>
export default {
    data() {
        return {
            message: 'Salut à tous',
            lien: '/api/grafikart',
            success: true,
            persons: ['John', 'Marion', 'Marine', 'Jean', 'Patoche'],
            seconds: 0
        };
    },
    methods: {
        mounted() {
            this.timer = setInterval(() => {
                console.log("Une seconde")
            }, 1000)
        },
        destroyed() {
            clearInterval(this.timer)
        },
        close() {
            if (this.success) {
                this.success = false
                this.message = "Reactivez la sécurité, j'ai peur"
            }
            else {
                this.success = true
                this.message = 'Salut à tous'
            }
        },
        addPerson() {
            this.persons.push("Mael");
        }

    }
}
</script>

<template>
    <a :href="lien">{{ message }}</a><br>
    <p>Temps passé : {{ seconds }}</p>
    <button class="close icon" @click="close">X</button>
    <div class="alert  alert-dismissible" :class="success ? 'alert-success' : 'alert-danger'" role="alert">
        <p v-if="success">SECURITE ACTIVE</p>
        <p v-else>SECURITE OFFLINE</p>
    </div>
    <div class="ui success message" v-if="success">

        <p>V-IF affiche l'élément si valide, et le retire du code HTML si non valide</p>
    </div>
    <div class="ui success message" v-else>
        <p>la variable associée a V-IF n'est pas valide</p>
    </div>
    <div class="ui success message" v-show="!!success">
        <p>V-SHOW affiche l'élément si valide, et le cache si non valide</p>
    </div>
    <ul>
        <li v-for="person in persons">{{ person }}</li>
    </ul>
    <button @click="addPerson">Ajouter une personne</button>
    <input type="text" v-model="message">
</template>