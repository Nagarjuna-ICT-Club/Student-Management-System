<template>
    <header>
        <div class="topBar">
            <div class="container">
                <div class="row topnav">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <a class="brand" href="/">Nagarjuna College of IT</a>
                    </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                            <b-dropdown toggle-class="text-decoration-none" no-caret class="px-4 notification_btn" >
                                <template v-slot:button-content>
                                    <i class="fas fa-bell"><span v-if="count!==0"><div class="notify"></div>
                                    </span></i>
                                </template>
                                <b-dropdown-item aria-role="listitem" v-for="notif in this.notifications" :key="notif.id" v-bind:class="(notif.status==0)?'new':'old'">{{ notif.notification }}</b-dropdown-item>
                                <b-dropdown-item href="/notifications" class="see_more">See more</b-dropdown-item>
                                </b-dropdown>

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
            user: "",
            id:"",
            },
        data() {
            return {
                count:0,
                notifications:[],
            }
        },
        created() {
         axios.post(`http://sudeepmishra.com.np/api/my_notifications/${this.id}`)
                        .then(response => {
                            this.count = response.data.count;
                            this.notifications = response.data.messages;
                        });
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
