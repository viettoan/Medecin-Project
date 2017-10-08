axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-sliders',

	data: {
        slider: {image: '', status: 2},
        imageData: "",
        sliders: [],
	},
    mounted: function(){
        this.listSliders();
    },
	methods: {
        
        /**
         * Pham Viet Toan
         * 10/08/2017
         *
         * List sliders
         */
        listSliders: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/listSliders',
                json: true
            }
            axios(authOptions).then(response => {
                this.sliders = response.data;
            });
        },
        resetData: function() {
            $('#image').attr('value') == '';
            this.slider = {image: '', status: 2};
        },
        createSlider: function() {
            this.resetData();
            $('#newSlider').modal('show');
        },
        onFileChange(event) {
            this.slider.image = event.target.files[0] || event.dataTransfer.files[0];
            this.createImage(this.slider.image);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.imageData = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        storeSlider: function() {
            var form = new FormData();
            form.append('image', this.slider.image);
            form.append('status', this.slider.status);
            axios.post('/admin/sliders', form).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});
                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                this.listSliders();
                $('#newSlider').modal('hide');
            });
        },
        deleteSlider: function(id) {
            console.log(id);
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
                        url: '/admin/sliders/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                        list.listSliders();
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
        changeStatus :function(id) {
            var authOptions = {
                method: 'put',
                url: '/admin/sliders/' + id,
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                this.listSliders();
            });
        },
    }
});
