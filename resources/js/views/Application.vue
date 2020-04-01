<template>
    <div class="container">
        <div class="row">
             <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="d-block text-center">
                    applications
                    <!-- <b-button-group size="lg">
                        <b-button class="btn">Pending </b-button>
                        <b-button class="butn"> Approved </b-button>
                    </b-button-group> -->
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {
       data() {
            return {
                apps:[],
            }
        },
        created() {
            axios
                .post('http://localhost:8000/api/getApplications')
                .then(response => {
                    this.apps = response.data.applications;
                });
        },

}
</script>
