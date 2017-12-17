axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

var followView = new Vue({
    el: '#editPost',

    data: {
        items: [],
        listCategories:{},
        imageData: "",
        image: "",
        formPostErrors: {},
        formErrorsUpdate: {},
        postItem: {'title': '', 'description': '', 'content': '', 'category_id': '', 'image': '', 'status': ''},
    },

    mounted : function(){
        this.getListCategory();
    },

    methods: {
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
        getListCategory: function(){
            axios.get('/admin/list-category').then((response) => {
                this.listCategories = response.data.data;
            }).catch((e) => {
                this.formPostErrors = e.response.data;
            })
        },
        editPost: function(id) {
            var input = this.postItem;
        }
    }
});

Vue.config.devtools = true;
