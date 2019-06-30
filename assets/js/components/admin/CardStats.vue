<template>
    <div>
        <roller-loader v-if="loading"></roller-loader>
        <div v-else class="card__stats">
            <div class="card__stats__icon">
                    <i class="lunacon" :class="data.icon"></i>
            </div>
            <div class="card__stats__info">
                <div class="card__stats__info__type">{{ data.type }}</div>
                <div class="card__stats__info__count">{{ data.count }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CardStats",
        props: [
            'url'
        ],
        data() {
            return {
                data: null,
                loading: true
            }
        },
        methods: {
            getData() {
                return axios.get(`${appurl}/${this.url}`).then( (response) => {
                    this.data = response.data
                    this.loading = false
                })
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>

