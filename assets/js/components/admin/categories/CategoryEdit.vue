<template>
    <div>
        <form @submit.prevent="updateCategory">
            <div class="form__group" :class="errors.name ? 'has__danger' : ''">
                <label for="name" class="font--bold">Category Name</label>
                <input id="name" type="text" class="form__item" name="name" v-model="form.name">
                <div class="form__helper" v-if="errors.name">
                    {{ errors.name[0] }}
                </div>
            </div>

            <div class="form__group" :class="errors.slug ? 'has__danger' : ''">
                <label for="slug" class="font--bold">Category Slug</label>
                <input disabled="disabled" id="slug" type="text" class="form__item" name="slug" v-model="slug">
                <div class="form__helper" v-if="errors.slug">
                    {{ errors.slug[0] }}
                </div>
            </div>

            <div class="form__group">
                <button class="btn btn--primary-gradient">Update Category <span v-if="processing" class="mini-loader"></span></button>
            </div>
        </form>
    </div>
</template>

<script>
    import toastr from "toastr"
    toastr.options.progressBar = false
    toastr.options.timeOut = 30

    export default {
        name: "CategoryEdit",
        components: {

        },
        props: [
            "category"
        ],
        data() {
            return {
                errors: [],
                processing: false,
                form: this.category,
                data: null
            }
        },
        computed: {
            slug: function() {
                var slug = this.sanitizeTitle(this.category.name);
                return slug;
            }
        },
        methods: {
            updateCategory() {
                this.errors = []
                this.processing = true
                return axios.patch(`${appurl}/api/categories/${this.category.id}`, this.form).then( (response) => {
                    this.data = response.data.data
                    toastr.success('Success!')
                    this.processing = false
                }).catch( (error) => {
                    this.errors = error.response.data.errors
                    this.processing = false
                    toastr.error('Error!')
                })
            },
            sanitizeTitle: function(title) {
                var slug = "";
                // Change to lower case
                var titleLower = title.toLowerCase();
                // Letter "e"
                slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
                // Letter "a"
                slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
                // Letter "o"
                slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
                // Letter "u"
                slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
                // Letter "d"
                slug = slug.replace(/đ/gi, 'd');
                // Trim the last whitespace
                slug = slug.replace(/\s*$/g, '');
                // Change whitespace to "-"
                slug = slug.replace(/\s+/g, '-');

                return slug;
            }
        },
        created() {

        }

    }
</script>
