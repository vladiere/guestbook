const { createApp } = Vue

createApp({
    data() {
        return {
            guests:[]
        }
    },
    methods: {
        funcSaveGuest: function(evt) {
            evt.preventDefault()
            let form = evt.currentTarget
            let count = 4
            
            const data = new FormData(form)
            
            for (const [key, value] of data.entries()) {
                if (value === '') {
                    console.log(`Empty: ${key} ${value}`)
                    count -= 1
                }
            }
            
            if (count == 4) {
                data.append('func', 'funcSaveGuest')
                axios.post('models/guestModel.php', data)
                form.reset()
                this.funcGetGuest();
            }

        },

        funcGetGuest: function() {
            const vm = this;
            const data = new FormData();
            data.append('func', 'funcGetGuest')

            axios.post('models/guestModel.php', data)
                .then(function (res) {
                    vm.guests = [];

                    res.data.forEach(function (value) {
                        vm.guests.push({
                            fullname: value.guest_name,
                            emailadd: value.guest_email,
                            website: value.guest_website,
                            comment: value.guest_comments,
                            date_inserted: value.date_inserted

                        })
                    })
                })
        },
    },
    created: function () {
        this.funcGetGuest();
    },
}).mount('#guestbook')