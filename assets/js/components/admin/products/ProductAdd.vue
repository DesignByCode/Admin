<template>
    <div>
        <form @submit.prevent="createProduct">

            <div v-if="categories" class="form__group" :class="errors.category_id ? 'has__danger' : ''">
                <label for="category" class="font--bold">Category</label>
                <select name="category_id" id="category" class="form__item" v-model="form.category_id">
                    <option v-for="category in categories" :key="category.id" :value="category.id" >{{ category.name }}</option>
                </select>
                <div class="form__helper" v-if="errors.category_id">
                    {{ errors.category_id[0] }}
                </div>
            </div>

            <div class="form__group" :class="errors.name ? 'has__danger' : ''">
                <label for="name" class="font--bold">Name</label>
                <input id="name" type="text" class="form__item" name="name" v-model="form.name">
                <div class="form__helper" v-if="errors.name">
                    {{ errors.name[0] }}
                </div>
            </div>

            <div class="form__group">
                <button class="btn btn--primary-gradient">Create Product <span v-if="processing" class="mini-loader"></span> </button>
            </div>


            <template v-if="redirecting">
                <redirect-block></redirect-block>
            </template>

        </form>
    </div>
</template>

<script>
    import toastr from "toastr"
    toastr.options.progressBar = true

    export default {
        name: "CreateProduct",
        data() {
            return {
                data: {},
                form: {},
                errors: [],
                categories: {},
                processing: false,
                message: '',
                redirecting: false
            }
        },
        methods: {
            createProduct() {
                this.errors = []
                this.processing = true
                return axios.post(`${appurl}/api/products`, this.form).then( (response) => {
                    this.data = response.data.data
                    toastr.success(`${this.data.name} added successfully`, 'Success!')
                    this.redirecting = true
                    bus.$emit('creatingDataTableData')
                    setTimeout( () => {
                        window.location.href = `${appurl}/admin/products/${this.data.id}`
                    }, 2000)
                    this.processing = false
                }).catch( (error) => {
                    this.errors = error.response.data.errors
                    this.processing = false
                    toastr.error('Somthing went wrong', 'Sorry!')
                })
            },
            getCategories() {
                return axios.get(`${appurl}/api/categories`).then( (response) => {
                    this.categories = response.data.data
                })
            }
        },
        mounted() {
            this.getCategories()
        }
    }
</script>
