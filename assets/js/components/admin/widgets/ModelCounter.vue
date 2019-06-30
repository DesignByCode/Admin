<template>

    <div class="info-block info-block--primary">
        <span class="info-block__icon">
            <i v-if="loaded" class="lunacon" :class="data.icon"></i>

        </span>
        <div class="info-block__details">
            <div class="info-block__name">{{ data.model }}</div>
            <div class="info-block__count">{{ count }}</div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "ModelCounter",
        components: {},
        props: ['data'],
        data() {
            return {
                item: this.data,
                count: '',
                loaded: false
            }
        },
        methods: {
            getData() {
                return axios.get(`${appurl}/${this.item.url}`).then( (response) => {
                    this.count = response.data
                    this.loaded = true
                })
            }
        },
        mounted() {
            this.getData()

        }
    }
</script>

