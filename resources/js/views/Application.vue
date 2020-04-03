<template>
    <div class="container">
    <router-link :to="{ name: 'add_app'}" class="add_app" id="add_app"><i class="fas fa-plus-circle"></i></router-link>
    <router-view></router-view>
    </div>
</template>

<script>
export default {
       data() {
            return {
                apps:[],
                date: new Date(),
            }
        },


}
</script>
