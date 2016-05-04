require('./filters');

Vue.component('support-kiosk', {

    /**
     * The components data.
     */
    data() {
        return {
            tickets: [],
            paginator: {},
            loading: false,
            viewingTicket: false
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
        getTickets(direction) {
            this.loading = true;

            var url = '/kiosk/support/all';
            if(direction == 'next') {
                url += '?page=' + (this.paginator.current_page + 1)
            }

            if(direction == 'previous' || direction == 'prev') {
                url += '?page=' + (this.paginator.current_page - 1)
            }

            this.$http.get(url)
                .then(response => {
                    this.paginator = response.data;
                    this.tickets = response.data.data;
                    this.loading = false;

                    // TODO: remove
                    this.viewTicket(this.tickets[0]);
                });
        },

        /**
         * View a Ticket
         */
        viewTicket(ticket) {
            this.viewingTicket = ticket;
        }
    }
});
