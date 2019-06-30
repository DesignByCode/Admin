<template>
    <div>
        <form @submit.prevent="submit">
            <div class="form__group" :class="errors.name ? 'has__danger' : ''">
                <label for="name" class="form__label font--bold">Gallery Name</label>
                <input @focus.prevent="resetErrors"  type="text" name="name" id="name" class="form__item" v-model="form.name">
                <div class="form__helper" v-if="errors.name">
                    {{ errors.name[0]}}
                </div>
            </div>
            <div class="form__group">
                <button class="btn btn--primary" type="submit" >Create Gallery <span v-if="processing" class="mini-loader"></span></button>
            </div>
        </form>

    </div>
</template>

<script>
    import toastr from "toastr"
    toastr.options.progressBar = true

    export default {
        name: "GalleryAdd",
        data() {
            return {
                form: {},
                errors: [],
                processing: false
            }
        },
        methods: {
            resetErrors() {
                this.errors = []
                this.danger = false
            },
            submit() {
                this.errors =  []
                this.processing = true
                return axios.post(`${appurl}/api/galleries`, this.form).then( (response) => {
                    bus.$emit('creatingDataTableData')
                    this.processing = false
                    toastr.success(`${this.form.name} added`, 'Success')
                    this.form = {}
                }).catch( (error) => {
                    this.errors = error.response.data.errors
                    this.processing = false
                    toastr.error('Somthing went wrong', 'Error')
                })
            }
        }
    }
</script>
