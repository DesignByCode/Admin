<template>
    <div>
        <transition name="bounce" >
        <div v-if="show">
                <div v-if="notLive" class="notify notify--success">Product is Live</div>
                <div v-else class="notify notify--danger">Product Not Viewable On Frontend</div>
        </div>
        </transition>

    </div>
</template>

<script>
    export default {
        name: "ProductNotify",
        data() {
            return {
                notLive: null,
                show: false
            }
        },
        methods: {
            setStatus(data) {
                this.notLive = (data.live) ? true : false
            }
        },
        mounted() {
            bus.$on('productSetToActive', (data) => {
                this.setStatus(data)
                setTimeout(() => {
                    this.show = true
                }, 1000)
            })
        }
    }
</script>

