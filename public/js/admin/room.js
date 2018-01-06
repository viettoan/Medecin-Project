axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#rooms',

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
        lists: {'name': ''},
        newItem: { 'name': '' },
        fillItem: {'name': '', 'id': '' },
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
            axios.get('/admin/showroom?page='+ page).then(response => {
                this.$set(this, 'lists', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },

        showRooms: function(item) {
            this.fillItem.id = item.id;
            this.fillItem.name = item.name;
            $('#editRoom').modal('show');
        },
   
        editRoom: function(id) {
            if (!confirm('Bạn Có Muốn Sửa Phòng Ban Này Không!')) return;
            var input = this.fillItem;
            axios.put('/admin/uproom/'+id, input).then((response) => {
                $("#editRoom").modal('hide');
                this.showInfor(this.pagination.current_page);                
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success('', response.data.action, {timeOut: 5000});
                }
            }).catch((error) => {
                toastr.error('Tên Phòng Ban Này Đã Tồn Tại! Mời Bạn Nhâp Laij', 'Cảnh Báo', {timeOut: 5000});
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        },

        deleteRoom: function(id) {
            swal({
                    title: 'Are you sure? ',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    var authOptions = {
                        method: 'DELETE',
                        url: '/admin/deleteroom/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        $("#User-" + id).remove();
                    });   
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                        );
                    }
            }); 
        },
        createRoom: function(){
            // if (!confirm('Do you want to create this user!')) return;
            var input = this.newItem;
            axios.post('/admin/addroom', input).then((response) => {
                console.log(response);
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.newItem = {'name': ''};
                    this.showInfor(this.pagination.current_page);
                }
            }).catch((error) => {
                toastr.error('Tên Phòng Ban Này Đã Tồn Tại! Mời Bạn Nhâp Laij', 'Cảnh Báo', {timeOut: 5000});
            });
        },
    }
});

Vue.config.devtools = true;
