<template lang="html">
    <div class="chat-message">
        <p>{{message}}</p>
        <small>{{user}}</small>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                message: "This is one message.",
                user: "john doe"
            }
        }
    }
</script>

<style lang="css">
    .chat-message{
        padding: 1rem;
    }

    .chat-message > p {
        margin-bottom: .5rem;
    }
</style>
        
