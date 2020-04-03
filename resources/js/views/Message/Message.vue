<template>
    <div class="container">
    <div class="pageTitle">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <router-link :to="{ name: 'home_msg'}" id=""><i class="fas fa-book"></i> Message</router-link>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                Today: <span class="date">{{ date | moment("Do MMMM") }}</span>
            </div>
        </div>
    </div>
    <!-- page title ends -->
    <hr />
    <router-view></router-view>
    </div>
</template>

<script>
export default {
       data() {
            return {
                apps:[],
                date: new Date(),
            }
        },


}
</script>
