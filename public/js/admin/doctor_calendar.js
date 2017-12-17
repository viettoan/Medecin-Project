axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-calendar',

	data: {
	    calendar: {
            'id': '',
            'user_id': '',
            'room': '',
            'morning': 0,
            'afternoon': 0,
            'night': 0,
        },
        calendars: [],
        doctors: [],
	},
    mounted: function(){
        this.listCalendars();
        this.getDoctors();
    },
	methods: {
        resetData: function() {
            this.calendar = {
                'user_id': '',
                'room': '',
                'morning': 0,
                'afternoon': 0,
                'night': 0,
            };
        },
        /**
         * Pham Viet Toan
         * 09/21/2017
         * 
         * List calendars
         */
        listCalendars: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/listCalendars',
                json: true
            }
            axios(authOptions).then(response => {
                this.calendars = response.data;
            });   
        },
        convert : function(){
            if (this.calendar.morning == true) {
                this.calendar.morning = 1;
            } else {
                this.calendar.morning = 0;
            }
            if (this.calendar.afternoon == true) {
                this.calendar.afternoon = 1;
            } else {
                this.calendar.afternoon = 0;
            }
            if (this.calendar.night == true) {
                this.calendar.night = 1;
            } else {
                this.calendar.night = 0;
            }
        },
        /**
         * Pham Viet Toan
         * 09/21/2017
         * 
         * delete calendars with id
         * @param id
         * HTML DOM
         */
		deleteCalendar: function(id) {
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
                        url: '/admin/doctor-calendar/' + id,
                        json: true
                    }
                    axios(authOptions).then(response => {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        );
                        list.listCalendars();
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
        getDoctors: function() {
            var authOptions = {
                method: 'get',
                url: '/admin/doctor-calendar/create',
                json: true
            }
            axios(authOptions).then(response => {
               this.doctors = response.data;
            });   
        },
        createCalendar: function() {
            this.resetData();
            $('#newCalendar').modal('show');
        },
        storeCalendar: function() {
            this.convert();
            var authOptions = {
                method: 'post',
                params: this.calendar,
                url: '/admin/doctor-calendar',
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                $('#newCalendar').modal('hide');
                this.listCalendars();
            });   
        },
        editCalendar: function(id) {
            var authOptions = {
                method: 'get',
                url: '/admin/doctor-calendar/' + id + '/edit',
                json: true
            }
            axios(authOptions).then(response => {
                this.calendar = response.data;
                $('#updateCalendar').modal('show');
            });  
        },
        updateCalendar: function(id) {
            this.convert();
            var authOptions = {
                method: 'put',
                params: this.calendar,
                url: '/admin/doctor-calendar/' + id,
                json: true
            }
            axios(authOptions).then(response => {
                if (response.status == 200) {
                    toastr.success(response.data, '', {timeOut: 5000});

                } else {
                    toastr.error(response.data, '', {timeOut: 5000});
                }
                $('#updateCalendar').modal('hide');
                this.listCalendars();
            }); 
        }      
	}
});
