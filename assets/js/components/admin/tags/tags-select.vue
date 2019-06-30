<template>
    <form>
        <div class="form__group">
            <label for="tags" class="form__label font--bold">Tags</label>
            <select style="height:200px"  name="tags" id="tags" multiple class="form__item">
                <option v-for="tag in data" :key="tag.id" :value="tag.slug">{{tag.name}}</option>
            </select>
        </div>
        <div class="form__group">
            <button class="btn btn--primary-gradient">Update Tags <span v-if="processing" class="mini-loader"></span></button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "tags-select",
        data() {
            return {
                data: null,
                form: null
            }
        },
        methods: {
            getAllTags() {
                return axios.get(`${appurl}/api/tags`).then( (response) => {
                    this.data = response.data.data
                })
            }
        },
        mounted() {
            this.getAllTags()
        }
    }
</script>

