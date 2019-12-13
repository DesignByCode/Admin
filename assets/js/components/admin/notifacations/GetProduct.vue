<template>
	<div v-if="product">
		<div class="panel panel--default">	
			<img class="responsive__image panel__img" :src="product.images[0].versions.original">
			<div class="panel__header">
				<template v-if="!edit">
					{{ product.name }}
				</template>
				<template v-else>
					<div class="form__group" :class="errors.name ? 'has__danger' : ''">
					    <label for="name" class="form__label font--bold">Product Name</label>
					    <input disabled id="name" type="text" class="form__item" name="name" v-model="form.name">
					    <div class="form__helper" v-if="errors.name">
					        {{ errors.name[0] }}
					    </div>
					</div>
				</template>
			</div>
			<div class="panel__body">
				<template v-if="!edit">
					{{ product.ad_text }}
				</template>
				<template v-else>
					<div class="form__group" :class="errors.ad_text ? 'has__danger' : ''">
					    <label for="ad_text" class="form__label font--bold">Text for ads</label>
					    <textarea name="ad_text" id="ad_text" class="form__item" cols="30" rows="5" v-model="form.ad_text"></textarea>
					    <div class="form__helper" v-if="errors.ad_text">
					        {{ errors.ad_text[0] }}
					    </div>
					</div>
				</template>
			</div>
			<div class="panel__footer">
				<template v-if="!edit">
					<div class="btn__group">
						<button @click.prevent="edit = !edit" class="btn btn--primary-gradient">Edit</button>
						<button @click.prevent="sendingMessage" class="btn btn--success-gradient">Send Nofifacations <span v-if="sending" class="mini-loader"></span></button>
					</div>
				</template>
				<template v-else>
					<button @click.prevent="updateProduct" class="btn btn--primary-gradient">Update Product <span v-if="processing" class="mini-loader"></span></button>
				</template>
			</div>
		</div>
	</div>
</template>


<script>
	import toastr from "toastr"
	toastr.options.progressBar = false
	toastr.options.timeOut = 30

	export default {
		name: "GetProduct",
		data() {
			return {
				product: null,
				edit: false,
				data: null,
				form: {},
				errors: [],
				processing: false,
				sending: false
			}
		},
		methods: {
			getProduct(id) {
				return axios.get(`${appurl}/api/products/${id}`).then( (response) => {
					this.product = response.data.data
					this.form = this.product
				})
			},
			updateProduct() {
				this.errors = []
				this.processing = true
				return axios.patch(`${appurl}/api/products/${this.product.id}`, this.form).then( (response) => {
					this.data = response.data.data
					toastr.success('Success!')
					this.processing = false
					this.edit = false
				}).catch( (error) => {
                    this.errors = error.response.data.errors
                    this.processing = false
                    toastr.error('Error!')
                })
			},
			sendingMessage() {
				this.errors = []
				this.sending = true
				return axios.post(`${appurl}/api/notify/${this.product.id}`, this.form).then( (response) => {
					this.data = response.data.data
					toastr.success('Success!')
					this.sending = false
					this.edit = false
				}).catch( (error) => {
					this.errors = error.response.data.errors
					this.sending = false
					toastr.error('Error!')
				})
			}
		},
		mounted() {
			bus.$on('getselectedproduct', (id) => {
				this.getProduct(id)
			})
		}

	}
</script>

<style lang="sass" scoped>
	.panel__img 
		display: block
		margin: 0
</style>
