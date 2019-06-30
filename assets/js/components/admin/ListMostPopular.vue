<template>
    <div>
        <div class="panel__body" v-if="redirect">
            <span >Redirecting  <span class="mini-loader mini-loader--primary"></span></span>
        </div>
        <template v-else>
            <roller-loader v-if="loading"></roller-loader>
            <ul v-else class="list" v-for="property in data">
                <li class="list__item"><a @click.prevent="goto(property.id)" href="#">{{ property.name }}</a></li>
            </ul>
        </template>
    </div>
</template>

<script>
    import RollerLoader from "../RollerLoader";
    export default {
        name: "ListMostPopular",
        components: {RollerLoader},
        props: [
            'url'
        ],
        data() {
            return {
                data: null,
                loading: true,
                redirect: false
            }
        },
        methods: {
            getData() {
                return axios.get(`${appurl}/${this.url}`).then( (response) => {
                    this.data = response.data.data
                    this.loading = false
                })
            },
            goto(id) {
                this.redirect = true
                window.location.href = `${appurl}/admin/product/${id}`
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>
