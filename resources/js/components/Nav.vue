<template>
    <header>
        <div class="topBar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <a class="brand">Nagarjuna College of IT</a>
                    </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                        <a class="" href="#" role="button" data-toggle="dropdown">
                            {{ this.user }} <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               
                            </a>
                            <a class="dropdown-item" href="#">
                                Profile
                         </a>

                            <form id="logout-form" action="#" method="POST" style="display: none;">
                                <!-- @csrf -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script src="https://unpkg.com/bootstrap-vue@2.0.0-rc.11/dist/bootstrap-vue.min.js"></script>
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