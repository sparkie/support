require('./filters');

Vue.component('support-kiosk', {

    /**
     * The components data.
     */
    data() {
        return {
            tickets: [],
            paginator: {},
            loading: false
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
            this.loading = true;
            this.$http.get('/kiosk/support/all')
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                    this.loading = false;
                });
        },

        next() {
            this.loading = true;
            this.$http.get('/kiosk/support/all?page=' + (this.paginator.current_page + 1))
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                    this.loading = false;
                });
        },

        previous() {
            this.loading = true;
            this.$http.get('/kiosk/support/all?page=' + (this.paginator.current_page - 1))
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                    this.loading = false;
                });
        }
    }
});
