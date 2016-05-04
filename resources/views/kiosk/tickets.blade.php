<support-kiosk inline-template>
    <div>
        <!-- All Tickets -->
        <div v-if="! viewingTicket">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tickets
                    <div class="pull-right" v-if="loading">
                        <i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-borderless m-b-none">
                        <thead>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Updated At</th>
                        <th></th>
                        </thead>

                        <tbody>
                        <tr v-for="ticket in tickets">
                            <!-- Title -->
                            <td>
                                <div class="btn-table-align" title="@{{ ticket.title }}">
                                    @{{ ticket.title | limitTitle}}
                                </div>
                            </td>

                            <!-- Status -->
                            <td>
                                <div class="btn-table-align">
                                    <span class="label @{{ ticket.status_label }}">@{{ ticket.readable_status }}</span>
                                </div>
                            </td>

                            <!-- Last Updated At -->
                            <td>
                                <div class="btn-table-align">
                                    <span>
                                        @{{ ticket.updated_at }}
                                    </span>
                                </div>
                            </td>

                            <!-- View Button -->
                            <td>
                                <button class="btn btn-primary" @click="viewTicket(ticket)">
                                <i class="fa fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-12">
                            <ul class="pagination pull-right">
                                <li v-if="paginator.prev_page_url"><a @click="getTickets('previous')">&leftarrow;</a></li>
                                <li class="disabled"><span>Page @{{ paginator.current_page }} of @{{ paginator.last_page }}</span></li>
                                <li v-if="paginator.next_page_url"><a @click="getTickets('next')">&rightarrow;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- View Ticket -->
        <div v-if="viewingTicket">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-left">
                        <div class="btn-table-align">
                            <i class="fa fa-btn fa-times" style="cursor: pointer;" @click="viewTicket(false)"></i>
                            Ticket
                        </div>
                    </div>

                    <div class="pull-right" style="padding-top: 2px;">
                        <span class="label @{{ viewingTicket.status_label }}">@{{ viewingTicket.readable_status }}</span>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</support-kiosk>
