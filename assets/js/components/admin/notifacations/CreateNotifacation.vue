<template>
	<div>
		<div class="panel panel--default">
		    <div class="panel__header">Notifacations</div>
		    <div class="panel__body">
				<select-category></select-category>
				<select-product></select-product>
		    </div>
		</div>
		<get-product></get-product>
	</div>

</template>

<script>

	import SelectCategory from './SelectCategory'

	export default {
		name: "CreateNotifacation",
		components: {
			SelectCategory
		},
		data() {
			return {
				categoryId: null
			}
		},
		methods: {
			getProducts() {
				alert('hi')
			},
			categoryChanged(id) {
				this.categoryId = id
			}
		},
		mounted() {

		}
	}


</script>
