<template>
    <div class="container">
    <div class="pageTitle">
        <div class="row">
            Hello from messages
        </div>
    </div>
    <!-- page title ends -->
    <hr />
    <router-view></router-view>
    </div>
</template>

<script>
export default {
       data() {
            return {
                apps:[],
                user_id:"",
                api:"",
            }
        },
         mounted(){
                console.log(this.user_id);
        },

        created() {

            axios.get('http://localhost:8000/api/getUser')
            .then(response => {
                this.user_id = response.data.user_id;
                this.api = 'http://sudeepmishra.com.np/api/my_applications/'+this.user_id;
                axios.get(this.api)
                .then(response => {
                    // console.log(response.data.data)
                    this.apps = response.data.data;
                });
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
