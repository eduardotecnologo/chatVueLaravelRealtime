<template>
    <div class="messages" ref="messages">
        <rise-loader
            :loading="loading"
            :color="'#000'"
            :size="'size'"
            :height="'height'"
            :width="'width'">
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
                return this.$store.getters.messages
                //return this.$store.state.chat.messages
            }
        },

        methods:{
            loadMessages (){
                this.loading = true
                this.$store.dispatch('loadMessages')
                    .finally(() => {
                        this.loading = false
                        this.scrollMessages()
                    })
        },

        scrollMessages() {
            setTimeout(() => {
                //this.$refs.messages.scrollTo(0, this.$refs.messages.scrollHeight)
                this.$refs.messages.scroll({
                    top: this.$refs.messages.scrollHeight,
                    let: 0,
                    behavior: 'smooth'
                })
            }, 100)
        }
        },

        watch:{
            messages(){
                this.scrollMessages()
            }
        },

        components:{
            RiseLoader
        }
    }
</script>

<style scoped>
    .messages{
        height: 400px;
        max-height: 400px;
        overflow-x: hidden;
        overflow-y: auto;
    }
</style>
