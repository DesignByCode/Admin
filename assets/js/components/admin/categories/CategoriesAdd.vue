<template>
    <div>
        <form @submit.prevent="createCategory">
            <div class="form__group" :class="errors.name ? 'has__danger' : ''">
                <label class="form__label font--bold" for="name">Name:</label>
                <input @focus.prevent="resetErrors" type="text" name="name" class="form__item" id="name" v-model="form.name">
                <div class="form__helper" v-if="errors.name">
                    {{ errors.name[0]}}
                </div>
            </div>
            <div class="form__group">
                <button class="btn btn--primary" type="submit" >Create Category <span v-if="processing" class="mini-loader"></span></button>
            </div>
        </form>
    </div>
</template>

<script>
    import toastr from "toastr"
    toastr.options.progressBar = true

    export default {
        name: "CategoriesAdd",
        data() {
            return {
                data: {},
                form: {},
                errors: [],
                danger: false,
                processing: false
            }
        },
        methods: {
            resetErrors() {
                this.errors = []
                this.danger = false
            },
            createCategory() {
                this.errors =  []
                this.processing = true
                return axios.post(`${appurl}/api/categories`, this.form).then( (response) => {
                    this.data = response.data
                    this.processing = false
                    toastr.success(`${this.form.name} added`, 'Success')
                    this.form = {}
                    bus.$emit('creatingDataTableData')
                }).catch( (error) => {
                    this.errors = error.response.data.errors
                    this.processing = false
                    toastr.error('Somthing went wrong', 'Error')
                })
            }
        },
        mounted() {


        }
    }
</script>


