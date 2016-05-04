require('./filters');

Vue.component('support-kiosk', {

    /**
     * The components data.
     */
    data() {
        return {
            tickets: [],
            paginator: {}
        }
    },

    /**
     * Prepare the component.
     */
    ready() {
        this.getTickets();
    },

    methods: {

        /**
         * Get the tickets.
         */
        getTickets() {
            this.$http.get('/kiosk/support/all')
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                });
        },

        next() {
            this.$http.get('/kiosk/support/all?page=' + (this.paginator.current_page + 1))
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                });
        },

        previous() {
            this.$http.get('/kiosk/support/all?page=' + (this.paginator.current_page - 1))
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                });
        }
    }
});
