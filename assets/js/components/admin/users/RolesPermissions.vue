<template>
    <div class="row">
        <div class="md-col-3">

            {{form}}
            <h4>Products</h4>
            <div v-for="permission in permissions" class="switch" >
                <input type="checkbox" :id="permission.id" class="switch__input" v-model="form">
                <label :for="permission.id" class="switch__label font--bold ">{{ permission.name }}</label>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "RolesPermissions",
        props: [
            "permissions",
            "roles"
        ],
        data() {
            return {
                form: 'test'
            }
        }
    }
</script>

