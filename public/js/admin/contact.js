axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#index-contacts',

    data: {
        contact:[],
    },

    methods: {
        getDetailContact: function(id) {
            var options = {
                method: 'GET',
                url: '/admin/contact/' + id,
                json: true
            };

            axios(options).then(response => {
                this.$set(this, 'contact', response.data);
                $('#detailContact').modal('show');
            });
        },

        changeStatus: function(id) {
            var options = {
                method: 'PUT',
                url: '/admin/contact/' + id,
                json: true
            };

            axios(options).then(response => {
                if (response.status == 200) {
                    $("#contact-status-" + id).html('<span class="label label-success">Accept</span></th>');
                    $('#detailContact').modal('hide');
                    toastr.success(response.data, '', {timeOut: 5000});
                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
            });
        },
    },
});