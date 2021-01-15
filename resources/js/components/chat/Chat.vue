<template>
    <div>
        <messages></messages>
        <div class="form-group">
            <textarea @keydown="keydownMessage" v-model="body" class="form-control"></textarea>
        </div>

        <button :disabled="loading" @click.prevent="sendMessage" class="btn btn-success">
            <pulse-loader
                :loading="loading"
                :color="'#FFF'"
                :size="'8px'"
                class="float-left">
            </pulse-loader>
            Enviar
        </button>
    </div>
</template>

<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
    export default {
        data(){
            return {
                body:'',
                loading: false,
            }
        },
        methods:{
            keydownMessage(e){
                if(e.keyCode === 13 && !e.shiftKey){
                    e.preventDefault()
                    this.sendMessage()
                }
            },
            sendMessage(){
                if(!this.body || this.body.trim() === '' || this.loading)
                    return

                this.loading = true
                this.$store.dispatch('storeMessage',
                    {
                        body: this.body
                    }).then(() => this.body = '')
                .finally(() => this.loading = false);
            }
        },
        // Registro de Components
        components:{
            PulseLoader
        }
    }
</script>

<style>
    .float-left{
        float: left;
    }
</style>
