<template>
<div class="row">
    <router-link :to="{ name: 'add_app'}" class="add_app float-action-button" id="add_app">
    <i class="far fa-edit"></i>
</router-link>
             <div class="col-xl-12 col-md-12 col-sm-12 mt-3">
                 <router-link :to="{ name: 'add_app'}" class="px-4">All</router-link>
                 <router-link :to="{ name: 'add_app'}" class="px-4">Pending</router-link>
                 <router-link :to="{ name: 'add_app'}" class="px-4">Approved</router-link>
                 <router-link :to="{ name: 'add_app'}" class="px-4">Cancelled</router-link>
             </div>
             <div class="col-xl-12 col-md-12 col-sm-12 m-auto">
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
                console.log(this.user_id);
        },

        created() {

            axios.get('/api/getUser')
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
