<template>
         <div class="row">
             <div class="col-xl-10 col-md-10 col-sm-12 m-auto">
                <div class="d-block mt-4">
                    <div class="application-wrapper mb-4" v-for="app in this.apps" :key="app.id">
                        <div class="app-body p-3 border-4">
                            <div :class="app.status==0 ? 'badge bg-pending': 'badge bg-approved'">
                                <span v-if="app.status==0">Pending</span>
                                <span v-if="app.status==1">Approved</span>
                            </div>
                            <p> About: {{ app.title }}</p>
                            <p> Applied on: {{ app.created_at | moment("ddd, Do MMM YYYY") }}</p>
                        </div>
                    </div>
                </div>
            </div>
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
             $(document).ready(function() {
                 $("#add_app").show()
             })
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
