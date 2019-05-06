<template>
   <div>
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-12">
                   <div class="card" style="padding: 50px 10px 0 10px">

                       <div class="inner text-center" style="background-color: #dddddd;padding-bottom: 10px;">
                           <img :src="userDetail.imgUrl" alt="" style="height: 100px;
    width: 100px;
    border-radius: 50px;
    position: relative;
    top: -43px;object-fit: cover">
                           <h5>{{userDetail.name}}</h5>
                           <h6>{{userDetail.position}}</h6>
                           <p>{{userDetail.shrtDesc}}</p>
                           <span style="margin-bottom: 15px">
                            <button class="btn btn-success">Follow</button>
                        </span>
                       </div>

                   </div>
                   <br>
                   <router-link class="btn btn-info" to="/user">Back</router-link>
               </div>
           </div>
       </div>
   </div>
</template>

<script>
    export default {
        data() {
            return {
                uId: this.$route.params.id,
                userDetail: {},
                errors: {}
            }
        },
        created() {
            // fetch the data when the view is created and the data is
            // already being observed
            //alert(this.$route.params.id);
            this.fetchuserDetailinfo(this.$route.params.id)
        },
        watch: {
            '$route'(to, from) {
                alert(to.params.id)
            }
        },
        methods: {
            fetchuserDetailinfo(id) {
                //alert(id);
                axios
                    .get('/getuserDetail/' + id)
                    .then(res => {

                        this.userDetail = res.data;

                    })
                    .catch(error => (this.errors = error.response.data.errors));
            },
        },
        mounted() {
            console.log('User Detail mounted.')
        }
    }
</script>
