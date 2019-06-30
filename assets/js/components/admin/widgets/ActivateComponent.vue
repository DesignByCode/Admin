<template>
    <div>
        <div v-if="loading" class="switch switch--success">
            <input @change.prevent="activate"
                   :checked="(active.live === 0) ? 'checked' : ''"
                   type="checkbox" id="activate" v-model="active.live" class="switch__input">
            <label for="activate" class="switch__label">Activated <span class="toggle--on">Yes</span><span class="toggle--off">No</span> </label>
        </div>
        <div v-else>
            <span class="mini-loader mini-loader--primary"></span> &nbsp; &nbsp;
        </div>

    </div>
</template>

<script>
    import toastr from "toastr"

    toastr.options.progressBar = false
    toastr.options.timeOut = 10

    export default {
        name: "ActivateComponent",
        components: {},
        props: [
            'data'
        ],
        data() {
            return {
                loading: false,
                active: {
                    live: ''
                }
            }
        },
        methods: {
            getData() {
                return axios.get(`${appurl}/api/products/${this.data.id}`).then( (response) => {
                    this.active = response.data.data
                    bus.$emit('productSetToActive', this.active)
                    this.loading = true
                })
            },
            activate() {
                return axios.post(`${appurl}/api/products/${this.data.id}/active`, this.active ).then( (response) => {
                    // toastr.success('Success!')
                    bus.$emit('productSetToActive', this.active)
                }).catch( (error) => {
                    toastr.error('Error!')
                })
            }
        },
        mounted() {

            this.getData()
        }

    }
</script>

