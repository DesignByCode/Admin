<template>
	<div>
		<div v-if="data" class="form__group">
			<label class="form__label font--bold" for="name">Select a product</label>
			<select class="form__item" v-model="productId" @change="getProduct">
				<option default value="">Select a product</option>
				<option v-for="item in data" :key="item.id" :value="item.id"> {{ item.name }} </option>
			</select>
		</div>
	</div>
</template>

<script>
	export default {
		name: "SelectProduct",
		data() {
			return {
				data: null,
				productId: null
			}
		},
		methods: {
			getProducts(id) {
				// this.data = null
				return axios.get(`${appurl}/api/category-products/${id}`).then( (response) => {
					this.data = response.data
				})
			},
			getProduct() {
				bus.$emit('getselectedproduct', this.productId)
			}
		},
		mounted() {
			bus.$on('category-selected', (id) => {
				this.getProducts(id)
			})
		}
	}
</script>
