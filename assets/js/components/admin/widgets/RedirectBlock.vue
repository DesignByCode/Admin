<template>
    <div class="redirecting">
        <div class="redirecting__circle"></div>
        <strong>{{ text }}</strong>
    </div>
</template>

<script>
    export default {
        name: "RedirectBlock",
        props: {
            text: {
                title: String,
                default: 'Redirecting....'
            }
        }
    }
</script>
