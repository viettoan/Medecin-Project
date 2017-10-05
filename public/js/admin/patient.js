axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-patients',

	data: {
		patient: {
            'id': '',
            'name': '',
            'email': '',
            'address': '',
            'phone': '',
            'age': '',
            'sex': 1,
        },
        patients: [],
        paginate: ['patients'],
				modal: {
					id: ''
				}
	},
    mounted: function(){
        this.listPatients();
    },
	methods: {
        /**
         * Pham Viet Toan
         * 09/21/2017
         *
         * List patients
         */
        listPatients: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/listPatients',
                json: true
            }
            axios(authOptions).then(response => {
                this.patients = response.data;
            });
        },

        /**
         * Pham Viet Toan
         * 09/21/2017
         *
         * delete patient with id
         * @param id
         * HTML DOM
         */
		deletePatient: function(id) {
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
                        url: '/admin/patient/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                        list.listPatients();
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
        createPatient: function () {
            $('#newPatient').modal('show');
        },
        storePatient: function() {
            var authOptions = {
                method: 'post',
                params: this.patient,
                url: '/admin/patient',
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                $('#newPatient').modal('hide');
                this.listPatients();
            });
        },
        editPatient: function(id) {
            var authOptions = {
                method: 'get',
                url: '/admin/patient/' + id + '/edit',
                json: true
            }
            axios(authOptions).then(response => {
                this.patient = response.data;
                $('#updatePatient').modal('show');
            });
        },
        updatePatient: function(id) {
            var authOptions = {
                method: 'put',
                params: this.patient,
                url: '/admin/patient/' + id,
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                $('#updatePatient').modal('hide');
                this.listPatients();
            });
        },
				addIdModal: function(id) {
					this.modal.id = id
				}
	}
});
