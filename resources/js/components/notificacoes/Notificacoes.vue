<template>
    <div>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="images/bell.png" class="iconeSino" alt="">
                Notificações ({{ notificacoes.length }})
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <notificacao
                    v-for="notificacao in notificacoes" 
                    :key="notificacao.id"
                    :notificacao="notificacao">
                </notificacao>

                <a class="dropdown-item" href="#" @click.prevent="marcarTodascomoLida()">
                    Marcar todas como lidas
                </a>
            </div>
        </li>
    </div>

</template>

<script>
export default {
    created () {
        this.$store.dispatch('loadNotificacoes')
    },
    computed: {
        notificacoes () {
            return this.$store.state.notificacoes.itens
        }
    },

    methods: {
        marcarTodascomoLida(){
            this.$store.dispatch('marcarTodascomoLida')
        },
    }

}
</script>
