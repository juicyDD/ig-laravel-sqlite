<template>
    <div>
        <button v-text="buttonText" class="btn btn-primary rounded-2" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.follows,
                }
        },

        methods: {
            followUser() {
                //console.log(this.userId);
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        //this.status = !this.status;
                        this.status=(this.status==="true")?"false" :"true";
                        //console.log(this.status);
                        //console.log(response.data);
                    }
                    
                    )
                    .catch(errors=>{
                        if(errors.response.status ==401)
                        {
                            window.location = '/login';
                        }
                    });
                    
            }
        },

        computed: {
            buttonText(){
                //console.log(this.status);
                return (this.status=="true") ? 'Unfollowed' : 'Follow';
            }
        }

    }
</script>