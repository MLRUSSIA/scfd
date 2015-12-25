new Vue({
    el: '#drivers',
    http: {
        root: '/',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    data:{
        input: '',
        ok: false,
        drivers: []
    },
    methods: {
        search: function () {
            if (this.input.length > 0){

                this.$http.post('/drivers/search/'+this.input).then(function (response) {

                    // set data on vm
                    this.$set('drivers', response.data)


                });
                this.ok = true;
                console.log(this.input.length)

            }
            else {
                this.ok = false;
                this.drivers = [];
                console.log('Скрываем список')
            }
        }
    }
});
