<template>
          <div class="card border-0 mt-4 profile-wrapper">
                <div class="card-header d-flex bg-white p-0">
                 <div class="col-8">
                     <p class="p-2"> Edit Profile
                     </p>
                     </div>
                 <div class="col-4 text-right">
                     <router-link :to="{ name: 'profile'}" class="px-4 btn"><i class="fas fa-arrow-left"></i></router-link>

                   </div>
                </div>
                <div class="card-body profile_body bg-white">
                    <div class="container">
                        <form method="post" id="profile_ed_form">
                            <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="Username" class="form-control form-input" v-model="this.username" id="username" placeholder="Username" disabled readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone" id="" v-model="profile.contact_number" class="form-control form-input" placeholder="+9779808989898">
                                </div>
                                <div class="form-group">
                                    <textarea name="bio" id="" cols="30" rows="5" class="form-input" placeholder="Your bio here !!!" v-model="profile.bio"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="label profile_edit social mb-3 g-bg">
                                    <span>Social</span>
                                </div>
                                <div class="form-group">
                                <input class="form-control form-input" type="url" v-model="profile.fb" name="fb" id="" placeholder="facebook profile">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-input" type="url" v-model="profile.gh" name="gh" id="" placeholder="github profile">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-input" type="url" v-model="profile.li" name="li" id="" placeholder="linkedin profile">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn g-btn">Save</button>
                                     <button type="submit" class="btn g-dark">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</template>
<script>
export default {
    data(){
        return{
            profile:{},
            username:String,
        }
    },
    created(){
                this.username= `${this.$route.params.user_name}`;
                axios.get(`http://sudeepmishra.com.np/api/edit_profile/${this.$route.params.user_id}`)
                .then(response => {
                    this.profile = response.data;
                });
    }
}
</script>
