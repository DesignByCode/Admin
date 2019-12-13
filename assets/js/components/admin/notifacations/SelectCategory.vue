<template>
	<div class="form__group">
		<label class="form__label font--bold" for="name">Select a category</label>
		<select id="name" class="form__item" @change="categoryChanged" v-model="categoryId">
			<option default value="">Select a category</option>
			<option v-for="cat in data" :key="cat.id" :value="cat.id"> {{ cat.name }} </option>
		</select>
	</div>
</template>

<script>
	
	export default {
		name: "SelectCategory",
		data() {
			return {
				data: null,
				categoryId: ''
			}
		},
		methods: {
			getCategories() {
				
				return axios.get(`${appurl}/api/categories`).then( (response) => {
					this.data = response.data.data
				})
				
			},
			categoryChanged() {
				if(this.categoryId !== null || this.categoryId !== '') {
					bus.$emit('category-selected', this.categoryId)
				}
			}
		},
		mounted() {
			this.getCategories()
		}
	}

</script>
