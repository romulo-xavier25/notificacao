export default {
    state: {
        itens: []
    },

    mutations: {
        LOAD_NOTIFICACOES (state, notificacoes) {
            state.itens = notificacoes
        },
        MARCAR_COMO_LIDO (state, id) {
            let index = state.itens.filter(notificacao => notificacao.id = id)
            state.itens.splice(index, 1);
        },
        MARCAR_TODAS_COMO_LIDAS (state) {
            state.itens = []
        }
    },

    actions: {
        loadNotificacoes(context) {
            axios.get('/notificacoes')
                    .then(response => {
                        context.commit('LOAD_NOTIFICACOES', response.data.notificacoes)
                    })
        },

        marcarComoLido(context, params) {
            axios.put('/notificacoes-lida/', params)
                    .then(() => context.commit('MARCAR_COMO_LIDO', params.id))
        },

        marcarTodascomoLida(context) {
            axios.put('/todas-notificacoes-lida')
                    .then(() => context.commit('MARCAR_TODAS_COMO_LIDAS'))
        }
    }
}