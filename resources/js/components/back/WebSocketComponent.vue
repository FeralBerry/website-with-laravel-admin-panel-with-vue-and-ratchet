<template>

</template>
<script>
    export default {
        name: "WebSocketComponent",
        props: ['data'],
        data(){
            return {

            }
        },
        mounted() {

        },
        created() {
            let connection = new WebSocket("ws://127.0.0.1:4710");
            let user_id = document.querySelector('meta[name="user_id"]').content;
            /*var protocol = 'ws://';
            if (window.location.protocol === 'https:') {
                protocol = 'wss://';
            }
            var wsUri =protocol+ "127.0.0.1:4710";
            this.connection = new WebSocket(wsUri)*/
            connection.onmessage = function(event) {
                let data = JSON.parse(event.data);
                if(data.message === 'new_message'){

                }
            }
            connection.onopen = function(event) {
                connection.send('{"command":"connect","user_id":"'+user_id+'"}');
                console.log("Соединение установлено");
            }
        }
    }
</script>
