<template>
    <div class="message">
        {{ message.user.name }} disse: {{ message.body }}
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>
