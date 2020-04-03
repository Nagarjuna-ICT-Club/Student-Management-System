<template>
<div class="d-flex">
    <nav id="sidebar" class="active">
                <ul>
                    <li>
                        <i class="fas fa-home"></i> Home
                    </li>
                    <li>
                        <i class="fas fa-newspaper"></i> Attendance
                    </li>
                    <li>
                        <i class="fas fa-dollar-sign"></i> Fees Details
                    </li>
                    <li>
                        <i class="fas fa-list-ul"></i> Assignments
                    </li>
                    <li>
                        <i class="far fa-question-circle"></i> Examination
                    </li>
                    <li>
                        <i class="fas fa-scroll"></i> Results
                    </li>
                    <li>
                        <i class="far fa-envelope"></i> Messages <div class="badge badge-pill badge-warning">{{ this.count }}</div>
                    </li>
                    <li>
                        <i class="fas fa-gift"></i> Opportunities
                    </li>
                    <li>
                        <i class="fas fa-code"></i> Practicals
                    </li>
                    <li>
                        <a href="/application/home"><i class="far fa-check-circle"></i> Approved Application</a>
                    </li>
                    <li>
                        <i class="far fa-user"></i> Faculty
                    </li>
                </ul>
            </nav>
            <div id="content">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
                user_id:" ",
                count:{ },
                api:"",

            }
        },
        created() {
            axios.get('http://localhost:8000/api/getUser')
                .then(response => {
                    this.user_id = response.data.user_id;
                     this.api = 'http://sudeepmishra.com.np/api/newmsg_count/'+this.user_id;
                        axios.get(this.api)
                        .then(response => {
                            // console.log(response.data)
                            this.count = response.data.count;
                        });
                });
            axios.interceptors.request.use( config=>{
                    NProgress.start()
                    return config;
                })
            axios.interceptors.response.use(response => {
                    NProgress.done()
                    return response;
            })
        },

    }
</script>
