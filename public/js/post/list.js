axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#listPost',

    data: {
        listPosts: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4, 
        fillItem: {'id': '', 'title': '', 'image': '', 'content': '', 'description': '', 'status': ''},
        search: {}
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
            axios.get('/admin/post?page='+ page).then(response => {
                this.$set(this, 'listPosts', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },

        showDetail: function(post)
        {   
            // console.log(post);
            this.fillItem.id = post.id;
            this.fillItem.content = post.content;
            this.fillItem.description = post.description;
            this.fillItem.image = post.image;
            this.fillItem.status = post.status;
            this.fillItem.title = post.title;
            console.log(this.fillItem);
            $('#detailPost').modal('show');
        },

        searchPost: function(event) {
            this.search = event.target.value;
            var authOptions = {
                    method: 'post',
                    url: '/admin/searchPost',
                    params: this.search,
            }
            axios(authOptions).then(response => {
                this.$set(this, 'listPosts', response.data);
            }).catch((error) => {
                this.showInfor(this.pagination.current_page);
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        },
        
        deletePost: function(id) {
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
                        url: '/admin/post/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success',
                        );
                        $("#Post-" + id).remove();
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
        }
    }
});

Vue.config.devtools = true;
