<template>
	<div>
		<div class="notify notify--danger" v-if="processing">
		    Deleting video
		</div>
		<div v-for="video in data" :key="video.id" class="media media--default">
			<div class="media__left media--top">
				<div class="media__image"></div><img src="" alt="" width="50px" height="50px" class="media__thumbnail">
			</div>
			<div class="media__body">
				<div class="ellipsis"><small >{{ video.url }} </small></div>
				<div><button @click.prevent="removeVideo(video.id)" :disabled="processing" class="btn btn--xs btn--danger">Remove</button></div>
			</div>
		</div>
	</div>
</template>


<script> 
	import toastr from "toastr"
	toastr.options.progressBar = true

	export default {
		name: 'VideoList',
		props: ['model'],
		data() {
			return {
				data: null,
				processing: false,
				errors: []
			}
		},
		methods: {
			getVideos() {
				return axios.get(`${appurl}/api/products/video/${this.model}`).then( (response) => {
					this.data = response.data.data
				})
			},
			removeVideo(id) {
				this.processing = true
				return axios.delete(`${appurl}/api/products/video/${id}`).then( (response) => {
					this.processing = false
					this.getVideos()
				}).catch( (error) => {
					this.errors = error.response.data.errors
					this.processing = false
					toastr.error('Somthing went wrong', 'Error')
				})
			}
		},
		created() {
			this.getVideos()
		},
		mounted() {
			bus.$on('videoaddetomodel', () => {

				this.getVideos()
			})
		}
	}

</script>
