<template>
<div class="row">
    <router-link :to="{ name: 'add_app'}" class="add_app float-action-button" id="add_app">
    <i class="far fa-edit"></i>
</router-link>
             <div class="col-xl-12 col-md-12 col-sm-12 mt-3">
                 <b-tabs class="app_types mt-3">
                     <!-- All -->
                    <b-tab title="All" active>
                        <div class="pre_loader bg-white col-md-6 m-auto text-center">
                        <img src="http://localhost:8000/asset/img/gloader.gif" alt="">
                        </div>
                        <div class="application-wrapper" v-for="app in this.apps" :key="app.id">
                        <div class="app-body">
                            <div class="profile">
                                <div class="pp mb-3" style=" background-image:url('../asset/img/laxman.jpg')">
                            </div>
                        </div>
                        <div class="info">
                            <div class="heading">
                                <h2 class="title">{{ app.title }}</h2>
                                <h2 class="name">{{ user }}, 1st Sem
                                    <span :class="(app.status==0 )? 'badge bg-pending': (app.status==1) ? 'badge bg-approved' : 'badge text-danger'">
                                        <span v-if="app.status==0">Pending</span>
                                        <span v-if="app.status==1">Approved</span>
                                        <span v-if="app.status==2">Rejected</span>
                                    </span>
                                    </h2>
                                </div>
                            <div class="desc">
                            <p> {{ app.description }}</p>
                            </div>
                            <div class="action">
                                <router-link :to="{ name: 'EditApplication',params: { app_id: app.app_id }}" class="btn btn-primary">Edit</router-link>
                                <button class="btn btn-danger mx-2" @click="deleteApp(app.app_id,app.id)">Cancel</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </b-tab>


                    <!-- pending -->
                    <b-tab title="Pending">
                        <div class="application-wrapper" v-for="app in this.apps" :key="app.id">
                            <div class="app-body" v-if="app.status==0">
                                <div class="profile">
                                    <div class="pp mb-3" style=" background-image:url('../asset/img/laxman.jpg')">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="heading">
                                        <h2 class="title">{{ app.title }}</h2>
                                        <h2 class="name">{{ user }}, 1st Sem
                                            <span class="badge bg-pending">
                                                <span>Pending</span>
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="desc">
                                    <p> {{ app.description }}</p>
                                    </div>
                                    <div class="action">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger mx-2">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-tab>

                    <!-- Approved -->

                    <b-tab title="Approved">
                        <div class="application-wrapper" v-for="app in this.apps" :key="app.id">
                            <div class="app-body" v-if="app.status==1">
                                <div class="profile">
                                    <div class="pp mb-3" style=" background-image:url('../asset/img/laxman.jpg')">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="heading">
                                        <h2 class="title">{{ app.title }}</h2>
                                        <h2 class="name">{{ user }}, 1st Sem
                                            <span class="badge bg-approved">
                                                <span>Approved</span>
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="desc">
                                    <p> {{ app.description }}</p>
                                    </div>
                                    <div class="action">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger mx-2">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-tab>
                    <!-- Rejected -->
                     <b-tab title="Rejected">
                        <div class="application-wrapper" v-for="app in this.apps" :key="app.id">
                            <div class="app-body" v-if="app.status==2">
                                <div class="profile">
                                    <div class="pp mb-3" style=" background-image:url('../asset/img/laxman.jpg')">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="heading">
                                        <h2 class="title">{{ app.title }}</h2>
                                        <h2 class="name">{{ user }}, 1st Sem
                                            <span class="badge text-danger">
                                                <span>Rejected</span>
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="desc">
                                    <p> {{ app.description }}</p>
                                    </div>
                                    <div class="action">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger mx-2">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-tab>

                </b-tabs>
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
                user: "",
            }
        },
        mounted(){
          $(document).ready(function(){
            setTimeout(function(){
                $('.pre_loader').hide()
                },2000)
            });
        },

        methods: {
            deleteApp(app_id,id) {
                axios
                    .delete(`http://sudeepmishra.com.np/api/cancelApp/${app_id}`)
                    .then(response => {
                        let i = this.apps.map(app => app.id).indexOf(id); // find index of your object
                        this.apps.splice(i, 1)
                    });
            }
        },

        created() {

            axios.get('/api/getUser')
            .then(response => {
                this.user_id = response.data.user_id;
                this.user = response.data.user;
                console.log(this.user);
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
