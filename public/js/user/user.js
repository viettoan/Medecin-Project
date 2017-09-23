axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#adduser',

    data: {
        items: [],
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {
            'name': '',
            'email': '',
            'password': '',
            'age': '',
            'sex': '',
            'phone': '',
            'address': '',
            'specialist_id': 0,
            'permission': '',
            'confirm_pass': ''},
        fillItem: {
            'name': '',
            'email': '',
            'password': '',
            'age': '',
            'sex': '',
            'phone': '',
            'address': '',
            'specialist_id': 0,
            'permission': '',
            'confirm_pass': ''},
        deleteItem: {'name':'','id':''}, 
        listSpecial: {'id': '', 'name': ''},
    },

    mounted : function(){
        $('#sepilisc').hide();
        this.showList();
    },

    methods: {
        createItem: function(){
            if (!confirm('Do you want to create this user!')) return;
            var input = this.newItem;
            axios.post('/admin/user', input).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.newItem = {
                        'name': '',
                        'email': '',
                        'password': '',
                        'age': '',
                        'sex': '',
                        'phone': '',
                        'address': '',
                        'specialist_id': 0,
                        'permission': '',
                        'confirm_pass': ''
                    };
                    this.formErrors = '';
                }
            }).catch((error) => {
                this.formErrors = error.response.data;
                console.log(this.formErrors);
            });
        },

        specialist: function(event) {
            var permistion = event.target.value;
            if ( permistion == 2 ) {
                $('#sepilisc').show('1000');
            } else {
                $('#sepilisc').hide('1000');
                this.newItem.specialist_id = ""; 
            }
        },

        showList: function() {
            var self = this;
            var authOptions = {
                    method: 'GET',
                    url: '/admin/list-specialist',
                    json: true
                }
            axios(authOptions).then((response) => {
                this.$set(this, 'listSpecial', response.data);
            }).catch((error) => {
            });
        },
    }
});

Vue.config.devtools = true;
