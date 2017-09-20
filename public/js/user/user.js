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
            'permistion': '',
            'confirm_pass': ''},
        fillItem: {'id':'', 'name': '', 'email': '', 'password':'', 'phone': '', 'avatar': '', 'level_id': '', 'status': ''},
        deleteItem: {'name':'','id':''}, 
        listSpecial: {'id': '', 'name': ''},
    },

    mounted : function(){
        $('#sepilisc').hide();
        this.showList();
    },

    methods: { 
        createItem: function(){
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
                        'permistion': '',
                        'confirm_pass': ''
                    };
                    this.this.formErrors = '';
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

        // comfirmDeleteItem: function(item) {
        //     var name = item.name.split('-');
        //     this.deleteItem.name = name[name.length -1];
        //     this.deleteItem.id = item.id;
        //     $("#delete-item").modal('show');
        // },

        // delItem: function(id) {
        //     $("#delete-item").modal('hide');
        //     axios.delete('/admin/user/'+id).then((response) => {
        //         if (response.data.status == 'error') {
        //             toastr.error(response.data.message, response.data.action, {timeOut: 5000});
        //         } else {
        //             toastr.success(response.data.message, response.data.action, {timeOut: 5000});
        //             this.changePage(this.pagination.current_page);
        //         }
        //     })

        // },

        // editItem: function(item){
        //     var avatar = $('#name-edit-image').val();
        //     this.fillItem.avatar = avatar;
        //     $('#edit-image-preview').attr('src', item.avatar);
        //     $('#name-edit-image').val(item.avatar);
        //     this.fillItem.name = item.name;
        //     this.fillItem.email = item.email;
        //     this.fillItem.phone = item.phone;
        //     this.fillItem.password = item.password;
        //     this.fillItem.id = item.id;
        //     $("#edit-item").modal('show');
        // },

        // updateItem: function(id){
        //     var input = this.fillItem;
        //     axios.put('/admin/user/'+id, input).then((response) => {
        //         this.changePage(this.pagination.current_page);
        //         $("#edit-item").modal('hide');
        //         if (response.data.status == 'error') {
        //             toastr.error(response.data.message, response.data.action, {timeOut: 5000});
        //         } else {
        //             toastr.success('', response.data.action, {timeOut: 5000});
        //         }
        //     }).catch((error) => {
        //         if (error.response.status == 422) {
        //             this.formErrorsUpdate = error.response.data
        //         }
        //     });
        // },

    }
});

Vue.config.devtools = true;
