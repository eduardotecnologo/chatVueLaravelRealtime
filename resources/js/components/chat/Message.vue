<template>
    <div class="message">
      {{ message.user.name }}<strong>disse:</strong>  {{ message.body }}
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>
