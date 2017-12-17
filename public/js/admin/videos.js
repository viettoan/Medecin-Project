axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-videos',

	data: {
        video: {video: '', status: 3},
        videoData: "",
        videos: [],
	},
    mounted: function(){
        this.listVideos();
    },
	methods: {
        
        /**
         * Pham Viet Toan
         * 10/08/2017
         *
         * List videos
         */
        listVideos: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/listVideos',
                json: true
            }
            axios(authOptions).then(response => {
                this.videos = response.data;
            });
        },
        createVideo: function() {
            $('#newVideo').modal('show');
        },
        onFileChange(event) {
            this.video.video = event.target.files[0] || event.dataTransfer.files[0];
            this.createFile(this.video.video);
        },
        createFile(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.videoData = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        storeVideo: function() {
            var form = new FormData();
            form.append('video', this.video.video);
            form.append('status', this.video.status);
            axios.post('/admin/videos', form).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});
                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                this.listVideos();
                $('#newVideo').modal('hide');
            });
        },
        deleteVideo: function(id) {
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
                        url: '/admin/videos/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                        list.listVideos();
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
                url: '/admin/videos/' + id,
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                this.listVideos();
            });
        },
    }
});
