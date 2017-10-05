axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#OK',

    data: {
        lists: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {'name': '', 'status': 0},
        fillItem: {'id': '', 'name': '', 'status': 0},
        deleteItem: {'name':'','id':''},
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    mounted : function(){
        this.showInfor(this.pagination.current_page);
    },

    methods: {
        showInfor: function(page) {
            axios.get('/admin/specialist?page='+ page).then(response => {
                this.$set(this, 'lists', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },
        updateSpecial: function(id){
            if (!confirm('Do you want to update this specialist!')) return;
            var input = this.fillItem;
            axios.put('/admin/specialist/'+id, input).then((response) => {
                this.changePage(this.pagination.current_page);
                $('#infoSpecialist').modal('hide');
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success('Chinh Sua Chuyen Khoa Thanh Cong!', response.data.action, {timeOut: 5000});
                    this.showInfor(this.pagination.current_page);

                }
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.formErrorsUpdate = error.response.data;
                }
            });
        },
        showList: function(item) {
            this.fillItem.id = item.id;
            this.fillItem.name = item.name;
            this.fillItem.status = item.status;
            $('#infoSpecialist').modal('show');
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        },
        createSpecial: function(){
            if (!confirm('Do you want to create this user!')) return;
            var input = this.newItem;
            console.log(input);
            axios.post('/admin/specialist', input).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.newItem = { 'name': '', 'status': 0 };
                    this.showInfor(this.pagination.current_page);
                }
            }).catch((error) => {
                this.formErrors = error.response.data;
                console.log(this.formErrors);
            });
        },

    }
});

Vue.config.devtools = true;
