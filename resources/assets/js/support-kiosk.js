require('./filters');

Vue.component('support-kiosk', {

    /**
     * The components data.
     */
    data() {
        return {
            tickets: []
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
                    this.tickets = response.data;
                });
        }
    }
});
