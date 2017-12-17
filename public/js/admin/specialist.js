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
        imageData: "",
        newItem: {'name': '', 'image': '', 'description': '', 'content': '', 'status': 0},
        fillItem: {'id': '', 'name': '', 'image': '', 'description': '', 'content': '', 'status': 0},
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
            input.image = this.imageData;
            console.log(input);
            axios.put('/admin/specialist/'+id, input).then((response) => {
                this.changePage(this.pagination.current_page);
                $('#infoSpecialist').modal('hide');
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success('Chinh Sua Chuyen Khoa Thanh Cong!', response.data.action, {timeOut: 5000});
                    this.fillItem = {'image': ''},
                    this.imageData = "";
                    $('#infoSpecialist').modal('hide');
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
            this.fillItem.image = item.image;
            this.fillItem.description = item.description;
            this.fillItem.content = item.content;
            $('#infoSpecialist').modal('show');
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        },

        previewImage: function(event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        },

        createSpecial: function(){
            if (!confirm('Do you want to create this speciallist!')) return;
            var input = this.newItem;
            input.image = this.imageData;
            var content = CKEDITOR.instances['content'].getData();
            input.content = content;
            axios.post('/admin/specialist', input).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.newItem = { 'name': '', 'image': '', 'description': '', 'content': '', 'status': 0};
                    this.imageData = "";
                    this.showInfor(this.pagination.current_page);
                }
            }).catch((error) => {
                this.formErrors = error.response.data;
            });
        },

    }
});

Vue.config.devtools = true;
