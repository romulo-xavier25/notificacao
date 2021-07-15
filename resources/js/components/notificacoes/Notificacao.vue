<template>
    <div>
        <a class="dropdown-item" href="#">
            <span @click.prevent="marcarComoLido(notificacao.id)">Lida</span>
            {{ comentario.user.name }} comentou {{ comentario.titulo }}
        </a>
    </div>
</template>

<script>
export default {
    props: ['notificacao'],

    computed: {
        comentario() {
            return this.notificacao.data.comentario
        }
    },

    methods: {
        marcarComoLido(idNotificacao) {
            this.$store.dispatch('marcarComoLido', {id: idNotificacao})
        }
    }
}
</script>
