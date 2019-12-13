<template>
    <div>
        <form @submit.prevent="updateProduct">

            <div v-if="categories" class="form__group" :class="errors.category_id ? 'has__danger' : ''">
                <label for="category" class="form__label font--bold">Category</label>
                <select name="category_id" id="category" class="form__item" v-model="form.category_id">
                    <option v-for="category in categories" :key="category.id" :value="category.id" >{{ category.name }}</option>
                </select>
                <div class="form__helper" v-if="errors.category_id">
                    {{ errors.category_id[0] }}
                </div>
            </div>

            <div class="form__group" :class="errors.name ? 'has__danger' : ''">
                <label for="name" class="form__label font--bold">Product Name</label>
                <input id="name" type="text" class="form__item" name="name" v-model="form.name">
                <div class="form__helper" v-if="errors.name">
                    {{ errors.name[0] }}
                </div>
            </div>

            <div class="row">
                <div class="md-col-12">
                    <div class="form__group" :class="errors.sku ? 'has__danger' : ''">
                        <label for="sku" class="form__label font--bold">SKU</label>
                        <input id="sku" type="text" class="form__item" name="sku" v-model="form.sku">
                        <div class="form__helper" v-if="errors.sku">
                            {{ errors.sku[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="md-col-4">
                    <div class="form__group" :class="errors.price ? 'has__danger' : ''">
                        <label for="price" class="form__label font--bold">Price</label>
                        <input id="price" type="number" class="form__item" name="price" v-model="form.price">
                        <div class="form__helper" v-if="errors.price">
                            {{ errors.price[0] }}
                        </div>
                    </div>
                </div>
                <div class="md-col-4">
                    <div class="form__group" :class="errors.sales_price ? 'has__danger' : ''">
                        <label for="sales_price" class="form__label font--bold">Sales Price</label>
                        <input id="sales_price" type="number" class="form__item" name="sales_price" v-model="form.sales_price">
                        <div class="form__helper" v-if="errors.sales_price">
                            {{ errors.sales_price[0] }}
                        </div>
                    </div>
                </div>
                <div class="md-col-4">
                    <div class="form__group" :class="errors.sale_end ? 'has__danger' : ''">
                        <label for="sale_end" class="form__label font--bold">Sale Ends On</label>
                        <input id="sale_end" type="date" class="form__item" name="sale_end" v-model="form.sale_end">
                        <div class="form__helper" v-if="errors.sale_end">
                            {{ errors.sale_end[0] }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="md-col-6">
                    <div class="form__group">
                        <label class="form__label font--bold">
                            Product Availability
                        </label>
                        <select class="form__item" v-model="form.availability">
                            <option :selected="form.availability === 'instock'" value="instock">Instock</option>
                            <option :selected="form.availability === 'out-of-stock'" value="out-of-stock">Out of Stock</option>
                            <option :selected="form.availability === 'pre-order'" value="pre-order">Pre Order</option>
                            <option :selected="form.availability === 'coming-soon'" value="coming-soon">Coming Soon</option>
                        </select>
                    </div>
                </div>
                <div class="md-col-6">

                </div>
            </div>

            <div class="form__group" :class="errors.excerpt ? 'has__danger' : ''">
                <label for="excerpt" class="form__label font--bold">Body Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="form__item" cols="30" rows="5" v-model="form.excerpt"></textarea>
                <div class="form__helper" v-if="errors.excerpt">
                    {{ errors.excerpt[0] }}
                </div>
            </div>

            <div class="form__group" :class="errors.content ? 'has__danger' : ''">
                <label for="content" class="form__label font--bold">Body Content</label>
                <textarea name="content" ref="content" id="content" class="form__item" cols="30" rows="10" v-model="form.content"></textarea>
                <div class="form__helper" v-if="errors.content">
                    {{ errors.content[0] }}
                </div>
            </div>
            
            <blockquote class="blockquote blockquote--primary">
                <header class="blockquote__header background--primary-light">
                    This section is for posting add and notifacations
                </header>
                <aside class="blockquote__body">
                    <br>
                    The section will not reflect on the website. This is to post live notifacations
                </aside>
            </blockquote>

            <div class="form__group" :class="errors.ad_text ? 'has__danger' : ''">
                <label for="ad_text" class="form__label font--bold">Text for ads</label>
                <textarea name="ad_text" id="ad_text" class="form__item" cols="30" rows="5" v-model="form.ad_text"></textarea>
                <div class="form__helper" v-if="errors.ad_text">
                    {{ errors.ad_text[0] }}
                </div>
            </div>

            <div class="form__group">
                <button class="btn btn--primary-gradient">Update Product <span v-if="processing" class="mini-loader"></span></button>
            </div>
        </form>
    </div>
</template>
<script>
    import toastr from "toastr"
    toastr.options.progressBar = false
    toastr.options.timeOut = 30

    export default {
        name: "ProductEdit",
        components: {

        },
        props: [
            "product"
        ],
        data() {
            return {
                errors: [],
                categories: {},
                processing: false,
                form: this.product,
                data: null,
            }
        },
        computed: {
            price() {
                // return this.form.price.toFixed(2)
            }
        },
        methods: {
            getProduct(id) {
                return axios.get(`${appurl}/api/products/${id}`).then( (response) => {
                    this.form = response.data.data
                })
            },
            getCategories() {
                return axios.get(`${appurl}/api/categories`).then( (response) => {
                    this.categories = response.data.data
                })
            },
            updateProduct() {
                this.errors = []
                this.processing = true
                return axios.patch(`${appurl}/api/products/${this.product.id}`, this.form).then( (response) => {
                    this.data = response.data.data
                    toastr.success('Success!')
                    this.processing = false
                
                }).catch( (error) => {
                    this.errors = error.response.data.errors
                    this.processing = false
                    toastr.error('Error!')
                })
            }
        },
        created() {
            this.getCategories()
            this.getProduct(this.product.id)
        }

    }
</script>


