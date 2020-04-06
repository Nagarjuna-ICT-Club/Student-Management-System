<template>
    <div class="container">
            Hello from messages
    <!-- page title ends -->
    <router-view></router-view>
    </div>
</template>

<script>
export default {
       data() {
            return {
                messages:[],

            }
        },
         mounted(){
                console.log(this.user_id);
        },

        created() {

            axios.get('http://localhost:8000/chat/messages')
            .then(response => {
                this.messages = response.data;

            });
            axios.interceptors.request.use( config=>{
                    NProgress.start()
                    return config;
                })
            axios.interceptors.response.use(response => {
                    NProgress.done()
                    return response;
            })
        },

}
</script>
