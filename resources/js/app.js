new Vue({
    el: '#app',
    created: function(){
        this.getAllUsers()
    },
    data: {
        users: []
    },

    methods: {
        getAllUsers: function(page){
            var urlUsers = "users"
            axios.get(urlUsers).then(response => {
                this.users = response.data
            })
        },
    }
})