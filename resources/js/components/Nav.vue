<template>
    <header>
        <div class="topBar">
            <div class="container">
                <div class="row topnav">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <a class="brand" href="/">Nagarjuna College of IT</a>
                    </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                             <a href="#" class="px-3"><i class="fas fa-bell">
                                 <div class="notify" style="width:2px; height:3px;"></div></i></a>
                        <i class="fas fa-user"></i>
                        <b-nav-item-dropdown
                            id="my-nav-dropdown"
                            :text= this.user
                            toggle-class="nav-link-custom p-0"
                            class="nav-user px-1"
                            right>

                            <b-dropdown-item>
                                <a class="dropdown-item" href="#" v-on:click="logout">
                               Logout
                            </a>
                            </b-dropdown-item>
                                <b-dropdown-item>
                                    <a class="dropdown-item"  v-on:click="profile">
                                        Profile
                                    </a>
                                </b-dropdown-item>
                        </b-nav-item-dropdown>

                        </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
    export default {
        props: {
            user: ""
            },
        // data() {
        //     return {
        //         user:" ",

        //     }
        // },
        created() {
            // axios
            //     .get('http://localhost:8000/api/getUser')
            //     .then(response => {
            //         this.user = response.data.user;
            //     });
        },
        methods: {
            logout: function () {
                  axios
                .post('http://localhost:8000/logout')
                .then(response => {
                    window.location.replace('http://localhost:8000/');
                });
            },
            profile: function(){
                window.location="/profile";
            }
        }
    }
</script>
