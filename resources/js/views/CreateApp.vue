<template>
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 create_app">
                <div class="card mt-3">
                    <b-card-header class="d-flex">
                        <p class="text-left col-6">Leave Application Form</p>
                 <router-link :to="{ name: 'home_app'}" class="col-6 text-right"><i class="fas fa-arrow-left"></i></router-link>

                    </b-card-header>
                    <b-card-body class="">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="name">Student's Name</label>
                                <input type="text" name="name" id="name" class="form-control form-input" :value="this.name" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Application's Title</label>
                                <input type="text" name="title" id="title" class="form-control form-input" v-model="fields.title" placeholder="Sick leave"  required>
                            </div>
                            <div class="form-group">
                                <label for="description"></label>
                                <textarea name="description" id="description" class="form-control form-input" v-model="fields.description" placeholder="Application Body" required></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <b-form-datepicker v-model="fields.from" :min="FromMin" locale="en" placeholder="Leave From Date" aria-required="true" calendar-width="300px" calender-left="3px"></b-form-datepicker>
                                         <p v-for="error in this.errors.from" :key="error.from" class="text-danger">
                                         {{ error || '' }}
                                        </p>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <b-form-datepicker v-model="fields.to" :min="ToMin" locale="en" placeholder="Leave Upto Date" aria-required="true" calendar-width="300px"></b-form-datepicker>
                                       <p v-for="error in this.errors.to" :key="error.to" class="text-danger">
                                         {{ error || '' }}
                                        </p>
                                </div>
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
        const now = new Date()
        const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
        const FromMinDate = new Date(today)
        FromMinDate.setDate(FromMinDate.getDate()+1)
         const ToMinDate = new Date(today)
        ToMinDate.setDate(FromMinDate.getDate()+1)
        return {
            fields: {},
            errors: {},
            name: " ",
            FromMin: FromMinDate,
            ToMin: ToMinDate
        }
    },
     mounted(){
             $(document).ready(function() {
                 $("#add_app").hide()
             })
    },

    methods: {
        submit(){
            this.errors = {};
            axios.post('/api/add_app',this.fields)
            .then(response => {
                // console.log(response);
                if(response.data.status==200){
                    toastr.options = {
                        "newestOnTop": true,
                        "progressBar": true,
                        "showDuration": "200",
                        "hideDuration": "1000",
                        "timeOut": "2000",
                    }
                    toastr["success"](response.data.message);
                    axios.post('http://sudeepmishra.com.np/api/add_app',response.data.admin)
                    .then(res => {
                        // console.log(res);
                    });
                    this.$router.push({name: 'home_app'})
                }
            //    this.$router.push({name: 'home'})
            }).catch( error => {
                // console.log(error.response.data.errors.from);
                if (error.response.status===422) {
                    this.errors = error.response.data.errors || {};
                }
            }).finally(() => this.loading = false);
        },
    },
    created() {
        axios
            .get('/api/getUser')
            .then(response => {
                this.name = response.data.user;
            });
    },

}
</script>
