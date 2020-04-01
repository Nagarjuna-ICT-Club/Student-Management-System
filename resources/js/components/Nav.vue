<template>
    <header>
        <div class="topBar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <a class="brand" href="/">Nagarjuna College of IT</a>
                    </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                        <b-nav-item-dropdown
                            id="my-nav-dropdown"
                            :text= user
                            toggle-class="nav-link-custom p-0"
                            right>

                            <b-dropdown-item>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            </b-dropdown-item>
                                <b-dropdown-item>
                                    <a class="dropdown-item" href="#">
                                        Profile
                                    </a>
                                </b-dropdown-item>
                        </b-nav-item-dropdown>
                            <form id="logout-form" action="#" method="POST" style="display: none;">
                                <!-- @csrf -->
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
    export default {
        data() {
            return {
                user:" ",
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/getUser')
                .then(response => {
                    this.user = response.data.user;
                });
        },
    }
</script>
