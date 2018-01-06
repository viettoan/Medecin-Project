axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
	el: '#index-calendar',

	data: {
	    calendar: {
            'id': '',
            'user_id': '',
            'room_id': '',
            'mon': 0,
            'tue': 0,
            'wed': 0,
            'thu': 0,
            'fri': 0,
            'sat': 0,
            'sun': 0
        },
        calendars: [],
        doctors: [],
        rooms: [],
	},
    mounted: function(){
        this.listCalendars();
        this.getDoctors();
    },
	methods: {
        resetData: function() {
            this.calendar = {
                'user_id': '',
                'room_id': '',
                'mon': 0,
                'tue': 0,
                'wed': 0,
                'thu': 0,
                'fri': 0,
                'sat': 0,
                'sun': 0
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
                console.log(response.data);
                this.rooms = response.data;
                this.calendars = response.data;
            });   
        },
        convert : function(){
            if (this.calendar.mon == true) {
                this.calendar.mon = 1;
            } else {
                this.calendar.mon = 0;
            }
            if (this.calendar.tue == true) {
                this.calendar.tue = 1;
            } else {
                this.calendar.tue = 0;
            }
            if (this.calendar.wed == true) {
                this.calendar.wed = 1;
            } else {
                this.calendar.wed = 0;
            }
            if (this.calendar.thu == true) {
                this.calendar.thu = 1;
            } else {
                this.calendar.thu = 0;
            }
            if (this.calendar.fri == true) {
                this.calendar.fri = 1;
            } else {
                this.calendar.fri = 0;
            }
            if (this.calendar.sat == true) {
                this.calendar.sat = 1;
            } else {
                this.calendar.sat = 0;
            }
            if (this.calendar.sun == true) {
                this.calendar.sun = 1;
            } else {
                this.calendar.sun = 0;
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
            console.log(this.calendar);
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
