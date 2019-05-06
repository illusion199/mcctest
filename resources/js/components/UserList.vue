<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Short Description</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in userInfo" >
                        <td><router-link :to="'/user/' + item.id">{{item.id}}</router-link></td>
                        <td><router-link :to="'/user/' + item.id">{{item.name}}</router-link> </td>
                        <td><router-link :to="'/user/' + item.id">{{item.position}}</router-link></td>
                        <td><router-link :to="'/user/' + item.id">{{item.shrtDesc}}</router-link></td>
                        <td><router-link :to="'/user/' + item.id">{{item.email}}</router-link></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                userInfo: {},
                errors: {}
            }
        },
        methods:{
            fetchUserinfo(slug) {
                //alert(id);
                axios
                    .get('/getuserinfo')
                    .then(res => {

                        this.userInfo = res.data;

                    })
                    .catch(error => (this.errors = error.response.data.errors));
            },
        },
        mounted() {
            console.log('User List mounted.');
            this.fetchUserinfo();
        }
    }
</script>
