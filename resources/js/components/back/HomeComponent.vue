<template>
<div>

</div>
</template>
<script>
    export default {
        name: "MainComponent",
        props: ['data'],
        mounted() {

        },
        created() {
            let connection = new WebSocket("ws://127.0.0.1:4710");
            let user_id = document.querySelector('meta[name="user_id"]').content;
            connection.onopen = function(event){
                connection.send('{"command":"connect","user_id":"'+user_id+'"}');
            };
        }
    }
</script>
