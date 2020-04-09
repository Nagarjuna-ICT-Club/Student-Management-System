<template>
    <router-view></router-view>
</template>
<script>
export default {
   created(){
         axios.interceptors.request.use( config=>{
                    NProgress.start()
                    return config;
                })
            axios.interceptors.response.use(response => {
                    NProgress.done()
                    return response;
            })
   }
}
</script>
