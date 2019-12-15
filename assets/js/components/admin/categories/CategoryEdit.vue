<template>
    <div>
        <form ref="form" @submit.prevent="updateCategory">
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

            <template v-if="more">

                <div class="form__group" :class="errors.description ? 'has__danger' : ''">
                    <label for="slug" class="font--bold">Category Description</label>
                    <textarea name="description" id="description"  class="form__item" rows="5" v-model="form.description"></textarea>
                    <div class="form__helper" v-if="errors.description">
                        {{ errors.description[0] }}
                    </div>
                </div>


                <div class="form__group" :class="errors.content ? 'has__danger' : ''">
                    <label for="slug" class="font--bold">Category Content</label>
                    <!-- <textarea name="content" id="content"  class="form__item" rows="10" v-model="form.content"></textarea> -->
                    <code-editor :data="form.content" v-model="form.content"></code-editor>
                    <div class="form__helper" v-if="errors.content">
                        {{ errors.content[0] }}
                    </div>
                </div>

            </template>
            <template v-else>
                <div class="form__group">
                    <button @click.prevent="showMore" class="btn btn--default">Show More</button>
                </div>
            </template>

            <template v-if="more">
                <div class="form__group">
                    <button @click.prevent="showMore" class="btn btn--default">Show Less</button>
                </div>
            </template>

            <div class="form__group">
                <button class="btn btn--primary-gradient">Update Category <span v-if="processing" class="mini-loader"></span></button>
            </div>
        </form>
    </div>
</template>

<script>
    import CodeEditor from '../widgets/CodeEditor'
    import hotkeys from 'hotkeys-js'
    import toastr from "toastr"
    toastr.options.progressBar = false
    toastr.options.timeOut = 30

    export default {
        name: "CategoryEdit",
        components: {
            CodeEditor
        },
        props: [
            "category"
        ],
        data() {
            return {
                errors: [],
                processing: false,
                form: this.category,
                data: null,
                show: false
            }
        },
        computed: {
            slug() {
                var slug = this.sanitizeTitle(this.category.name);
                return slug;
            },
            more () {
                if(this.form.description || this.form.content && !this.show) {
                    return !this.show
                }
                return this.show
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
            },
            showMore() {
                this.show = !this.show
            },
            saveFile() {
                hotkeys('ctrl+s',  (event, handler) => {
                    event.preventDefault()
                    this.updateCategory()
                })
            }
        },
        mounted() {
            this.saveFile()
        }

    }
</script>
