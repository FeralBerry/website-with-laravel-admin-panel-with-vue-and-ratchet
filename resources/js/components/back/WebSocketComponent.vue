<template>

</template>
<script>
    export default {
        name: "WebSocketComponent",
        props: ['data'],
        data(){
            return {
                user_id:document.querySelector('meta[name="user_id"]').content,
            }
        },
        mounted() {

        },
        created() {
            let connection = new WebSocket("ws://127.0.0.1:4710");
            /*var protocol = 'ws://';
            if (window.location.protocol === 'https:') {
                protocol = 'wss://';
            }
            var wsUri =protocol+ "127.0.0.1:4710";
            this.connection = new WebSocket(wsUri)*/
            connection.onmessage = function(event) {

            }
            connection.onopen = function(event) {
                connection.send('{"command":"connect","user_id":"'+this.user_id+'"}');
                console.log("Соединение установлено");

            }
        }
    }
</script>
