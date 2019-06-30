<template>
    <div class="time__body">
        <p class="time" v-text="currentTime"></p>
    </div>
</template>

<script>
    import * as moment from 'moment'
    export default {
        name: "Clock",
        data() {
            return {
                currentTime: null
            }
        },
        methods: {
            updateCurrentTime() {
                this.currentTime = moment().format('LTS');
            }
        },
        created() {
            this.currentTime = moment().format('LTS');
            setInterval(() => {
                this.updateCurrentTime()
            }, 1000)
        }
    }
</script>

