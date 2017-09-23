axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-patients',

	data: {
		listPatient: []
	},

	methods: {
        /**
         * Pham Viet Toan
         * 09/21/2017
         * 
         * delete patient with id
         * @param id
         * HTML DOM
         */
		deletePatient: function(id) {
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
                        url: '/admin/patient/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                        $("#patient-" + id).remove();
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
			
        }
	}
});