axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#index-contacts',

    data: {
        contacts:[],
        contact: {
            'id': '',
            'name': '',
            'phone': '',
            'email': '',
            'content': '',
            'status': '',
        },
        paginate: ['contacts'],
        search: {'name': ''}
    },
    mounted: function() {
        this.listContacts();
    },
    methods: {
        listContacts: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/listContacts',
                json: true
            }
            axios(authOptions).then(response => {
                this.contacts = response.data;
            });   
        },
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
        searchContact: function(event) {
            this.search.name= event.target.value;

            var authOptions = {
                    method: 'post',
                    url: '/admin/searchContact',
                    params: this.search.name,
            }
            axios(authOptions).then(response => {   
                this.contacts = response.data;
            }).catch((error) => {
                this.listContacts();
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
                    this.listContacts();
                    $('#detailContact').modal('hide');
                    toastr.success(response.data, '', {timeOut: 5000});
                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
            });
        },
    },
});