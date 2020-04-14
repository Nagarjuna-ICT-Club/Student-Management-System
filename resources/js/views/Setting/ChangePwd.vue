<template>
     <div class="row">
            <div class="col-xl-8 col-md-12 col-sm-12 create_app m-auto">
                <div class="card mt-3">
                    <b-card-header class="d-flex">
                        <p class="text-left col-8"><i class="fas fa-key"></i> Change Password</p>
                 <router-link :to="{ name: 'Settings'}" class="col-4 text-right"><i class="fas fa-arrow-left"></i></router-link>

                    </b-card-header>
                    <b-card-body class="">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="cpass">Current Password</label>
                                <input type="password" name="current_pass" id="cpass" v-model="fields.password" class="form-control form-input">
                            </div>
                             <div class="form-group">
                                <label for="new_pass">New Password</label>
                                <input type="password" name="" id="new_pass" v-model="fields.new_password" class="form-control form-input">
                            </div>
                             <div class="form-group">
                                <label for="new_pass_conf">Re:Type New Password</label>
                                <input type="password" name="" id="new_pass_conf" v-model="fields.new_password_conf" class="form-control form-input">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="submit" class="btn btn-sm g-btn">
                            </div>
                        </form>
                    </b-card-body>
                </div>
            </div>
        </div>
</template>
<script>
export default {
    data(){
        return{
            fields:{
                password: '',
                new_password: '',
                new_password_conf: ''
            },
            errors:[]
        }
    },
    methods:{
        checkpass(){
              if (this.fields.new_password!==this.fields.new_password_conf) {
                  $('#new_pass_conf').addClass('is-invalid');
                  toastr.error("Password Didn't Matched");
            }else{
                return true;
            }
        },
        submit(){
           if (this.checkpass()) {
               const CancelToken = axios.CancelToken;
                const source = CancelToken.source();
            // console.log(this.fields)
             axios.post('/password/update',this.fields, {
                    cancelToken: source.token
                    })
                    .then(res => {
                        //  console.log(res);
                        if(res.status==200){
                            toastr.options = {
                                "newestOnTop": true,
                                "progressBar": true,
                                "showDuration": "200",
                                "hideDuration": "1000",
                                "timeOut": "2000",
                            }
                            toastr["success"](res.data.message);
                            this.$router.push({name: 'Settings'});
                        }
                    }).catch( error => {
                        if (error.response.status===422) {
                            this.errors = error.response.data.errors || {};
                            toastr.error(this.errors.password);
                            $('#cpass').addClass('is-invalid');
                            source.cancel();
                            NProgress.done();
                        }
            }).finally(() => this.loading = false);
            console.clear()
        }}
    }
}
</script>
