<template>
	<div class="panel panel--default">
		<div class="panel__header">
			Edit Details
		</div>
		<div class="panel__body">

			<div class="form__group" :class="errors.name ? 'has__danger' : ''">
				<label for="name" class="form__label font--bold">Product Name</label>
				<input id="name" type="text" class="form__item" name="name" v-model="form.name">
				<div class="form__helper" v-if="errors.name">
					{{ errors.name[0] }}
				</div>
			</div>

			<div class="form__group">
				<label class="form__label">Description</label>
				<code-editor :data="form.description" v-model="form.description"></code-editor>
			</div>
			<div class="form__group">
				<button class="btn btn--primary" @click.prevent="updateGallery">Save <span v-if="processing" class="mini-loader"></span></button>
			</div>
		</div>
	</div>
</template>


<script>
	import CodeEditor from '../widgets/CodeEditor'
	import hotkeys from 'hotkeys-js'
	import toastr from "toastr"
	toastr.options.progressBar = false
	toastr.options.timeOut = 30
	
	export default {
		name: 'GalleryEdit',
		props: [
		'gallery'
		],
		data() {
			return {
				data: null,
				form: this.gallery,
				errors: [],
				processing: false,
				data: null,
				show: false,
			}
		},
		methods: {
			getGallery(id) {
				return axios.get(`${appurl}/api/galleries/${id}`).then( (response) => {
					this.data = response.data.data
				})
			},
			updateGallery() {
				this.errors = []
				this.processing = true
				return axios.patch(`${appurl}/api/galleries/${this.gallery.id}`, this.form).then( (response) => {
					this.data = response.data.data
					toastr.success('Success!')
					this.processing = false

				}).catch( (error) => {
					this.errors = error.response.data.errors
					this.processing = false
					toastr.error('Error!')
				})
			},
			saveFile() {
				hotkeys('ctrl+s', (event, handler) => {
					event.preventDefault()
					this.updateGallery()
				})
			}
		},
		created() {
			this.getGallery(this.gallery.id)
		},
		mounted() {
			this.saveFile()
		}
	}


</script>
