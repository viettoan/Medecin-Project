axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#header_admin',

    data: {
        formErrors: {},
        profile:{'id':'', 'name': '', 'email': '', 'age': '', 'specialist_id': '', 'phone': '', 'address': '', 'permission': ''},
        changepass: {'password': '', 'confirm_password': ''},
    },
    mounted: function() {
        $('#change_password').hide();
        $('#edit_profile').hide();
    },
    methods: {
        showProfile: function(id) {
            var authOptions = {
                    method: 'GET',
                    url: '/admin/user/' + id,
                    json: true
                }

            axios(authOptions).then((response) => {
                this.profile = response.data;
                $('#Profile_amind').modal('show'); 
            }).catch((error) => { 
            });           
        },
        tranfomer_profile: function() {
            $('#change_password').hide('10000');
            $('#infor_user_admin').show('10000');
            $('#edit_profile').hide('10000');

        },
        change_password: function() {
            $('#infor_user_admin').hide('10000');
            $('#change_password').show('10000');
            $('#edit_profile').hide('10000');

        },
        show_form_edit: function(id) {
            $('#edit_profile').show('10000');
             $('#change_password').hide('10000');
            $('#infor_user_admin').hide('10000');
            var authOptions = {
                    method: 'GET',
                    url: '/admin/user/' + id,
                    json: true
                }

            axios(authOptions).then((response) => {
                this.profile = response.data;
                console.log(response);
            }).catch((error) => { 
            });
        },
        updateProfile: function(id) {
            if (!confirm('Do you want to update!')) return;
            var input = this.profile;
            axios.put('/admin/user/'+id, input).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success('', response.data.action, {timeOut: 5000});
                }
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.formErrors = error.response.data;
                    for (key in this.formErrors) {
                        toastr.error(this.formErrors[key], '', {timeOut: 10000});
                    }  
                }
            });
        },
        updatepass: function(id) {
            if (!confirm('Do you want to update pass!')) return;
            var input = this.changepass;
            var authOptions = {
                    method: 'PUT',
                    url: '/admin/changepass/' + id,
                    params: input,
                    json: true
                }

            axios(authOptions).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                   this.changepass = {'password': '', 'confirm_password': ''},
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                }
            }).catch((error) => {
                this.formErrors = error.response.data;
                for (key in this.formErrors) {
                    toastr.error(this.formErrors[key], '', {timeOut: 10000});
                }   
            });
        }
    },
});
