<template>
    <div class="messages">
        <rise-loader
            :loading="loading"
            :color="'#000'"
            :size="size"
            :height="height"
            :width="width">
        </rise-loader>

        <!--Exibição de Mensagens-->
        <message v-for="message in messages" :key="message.id" :message="message"></message>
    </div>
</template>

<script>
import RiseLoader from 'vue-spinner/src/RiseLoader.vue'

    export default {
        created (){
            this.loadMessages()
        },

        data () {
            return {
                loading: false,
            }
        },

        //Retorno de mensagens
        computed:{
            messages(){
                return this.$store.state.chat.messages
            }
        },

        methods:{
            loadMessages (){
                this.loading = true
                this.$store.dispatch('loadMessages')
                    .finally(() => this.loading = false)
            }
        },
        components:{
            RiseLoader
        }
    }
</script>
