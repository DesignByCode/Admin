<template>
	<div>
		<div class="form__group"  :class="errors.url ? 'has__danger' : ''">
			<label class="form__label font--bold">Add Video URL</label>
			<input class="form__item" name="url" v-model="data.url"></input>
			<div class="form__helper" v-if="errors.url">
			    {{ errors.url[0]}}
			</div>
		</div>
		<div class="form__group">
			 <button class="btn btn--primary" type="submit" @click.prevent="addVideo" >Add Video <span v-if="processing" class="mini-loader"></span></button>
		</div>
	</div>
</template>


<script>
	import toastr from "toastr"
	toastr.options.progressBar = true

	export default {
		name: 'VideoAdd',
		props: ['model'],
		data() {
			return {
				data: this.model,
				processing: false,
				errors: []
			}
		},
		methods: {
			addVideo() {
				this.processing = true
				this.errors = []
				return axios.post(`${appurl}/api/products/video/${this.data.id}`, this.data).then( (response) => {
					this.processing = false
					bus.$emit('videoaddetomodel')
					toastr.success(`Video URL added`, 'Success')
					this.data.url = ''
				}).catch( (error) => {
					this.processing = false
					this.errors = error.response.data.errors
					toastr.error('Somthing went wrong', 'Error')
				})
				this.processing = false
			}
		},
		created() {

		},
		mounted() {

		}

	}

</script>
