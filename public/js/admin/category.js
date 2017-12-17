axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-categories',

	data: {
	    category: {
            'id': '',
            'name': '',
            'parent_id': 0,
            'status': 1,
            'link': '',
        },
        categories: [],
	},
    mounted: function(){
        this.listCategories();
    },
	methods: {
        resetData: function() {
            this.category = {
                'id': '',
                'name': '',
                'parent_id': 0,
                'status': 1,
                'link': '',
            };
        },
        /**
         * Pham Viet Toan
         * 09/21/2017
         * 
         * List patients
         */
        listCategories: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/listCategories',
                json: true
            }
            axios(authOptions).then(response => {
                this.categories = response.data;
            });   
        },
        /**
         * Pham Viet Toan
         * 09/21/2017
         * 
         * delete category with id
         * @param id
         * HTML DOM
         */
		deleteCategory: function(id) {
            let list = this;
            swal({
                    title: 'Are you sure?',
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
                        url: '/admin/category/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                        list.listCategories();
                    });   
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                        )
                    }
            });	
        },
        createCategory: function() {
            this.resetData();
            $('#newCategory').modal('show');
        },
        storeCategory: function() {
            var authOptions = {
                method: 'post',
                params: this.category,
                url: '/admin/category',
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                $('#newCategory').modal('hide');
                this.listCategories();
            });   
        },
        editCategory: function(id) {
            var authOptions = {
                method: 'get',
                url: '/admin/category/' + id + '/edit',
                json: true
            }
            axios(authOptions).then(response => {
                this.category = response.data;
                $('#updateCategory').modal('show');
            });  
        },
        updateCategory: function(id) {
            var authOptions = {
                method: 'put',
                params: this.category,
                url: '/admin/category/' + id,
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                $('#updateCategory').modal('hide');
                this.listCategories();
            }); 
        },   
	}
});
