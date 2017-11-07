<template lang="html">
    <div class="chat-composer">
        <!--<input type="text" placeholder="Digite sua mensagem aqui...">-->
        <input type="text" placeholder="Digite sua mensagem aqui..." v-model="messageText" @keyup.enter="sendMessage">
        <button type="button" class="btn btn-primary" @click="sendMessage">Eviar</button>
    </div>
</template>


<script>
    export default{
        data() {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage(){
                this.$emit('messagesent', {
                    message: this.messageText,
                    user: {
                        name: $('.navbar-right .dropdown-toggle').text()
                    }
                });
//                console.log(this.messageText);
                this.messageText = '';
            }
        }
    }
</script>

<style lang="css">
    .chat-composer {
        display: flex;
    }

    .chat-composer input {
        flex: 1 auto;
    }

    .chat-composer button {
        border-radius: 0;
    }
</style>