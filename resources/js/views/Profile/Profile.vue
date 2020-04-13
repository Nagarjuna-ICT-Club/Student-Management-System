<template>
    <div class="row justify-content-center">
        <div class="col-md-12 col-xl-12 col-sm-12">
            <div class="card border-0 mt-4 profile-wrapper">
                <div class="card-header d-flex bg-white p-0">
                 <div class="col-8">
                     <p class="p-2"> Student Profile
                     </p>
                     </div>
                 <div class="col-4 text-right">
                     <router-link :to="{ name: 'profileUpdate',params: { user_id: this.user.uid, user_name: this.user.full_name }}" class="px-4 btn"><i class="fas fa-user-edit"></i></router-link>
                   </div>
                </div>
                <div class="card-body profile_body bg-white">
                    <div class="pre_loader bg-white col-md-12 m-auto">
                        <img src="http://localhost:8000/asset/img/gloader.gif" alt="">
                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 profile_info border-bottom">
                            <div class="row">
                            <div class="col-md-6 col-xl-4 col-sm-12">
                                <div class="pp mb-3" style=" background-image:url('../asset/img/garima.jpg')">
                                </div>
                            </div>
                            <div class="col-xl-8 col-sm-6 col-md-6">
                                 <div class="w-100 d-block mt-4">
                                <span class="user_name">{{ this.user.full_name }}</span>
                            <span class="faculty">{{ this.profiles.program_id }}</span><br><span class="sem">{{ this.profiles.semester_id }}</span>
                            </div>
                        </div></div>
                    </div>
                        <div class="col-md-6 col-sm-12">
                            <p>Social</p><hr>
                            <div class="social_links mt-3">
                            <a href="#" class="btn btn-outline-primary " v-if="profiles.fb!==null"> Facebook <i class="fab fa-facebook-square"></i></a>
                            <a href="#"  class="btn btn-outline-dark" v-if="profiles.gh!==null"> GitHub <i class="fab fa-github"></i></a>
                            <a href="#"  class="btn btn-outline-dark" v-if="profiles.li!==null"> Linkedin <i class="fab fa-github"></i></a>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
          $(document).ready(function(){
        setTimeout(function(){
            $('.pre_loader').hide()
        },2000)
    });
    },
    data(){
        return{
            profiles:{
                fb:null,
                gh:null,
            },
            user:{},
            api:"",
        }
    },
    created(){
        axios.get('/api/getUser')
            .then(response => {
                this.user_id = response.data.user_id;
                this.api = 'http://sudeepmishra.com.np/api/profile/'+this.user_id;
                axios.get(this.api)
                .then(response => {
                    // console.log(response.data.data)
                    this.profiles = response.data.profile;
                    this.user=response.data;
                });
            });
    }
}
</script>
