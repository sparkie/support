<support-kiosk inline-template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Tickets</div>

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
                            <li v-if="paginator.prev_page_url"><a @click="previous()">&leftarrow;</a></li>
                            <li class="disabled"><span>Page @{{ paginator.current_page }} of @{{ paginator.last_page }}</span></li>
                            <li v-if="paginator.next_page_url"><a @click="next()">&rightarrow;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</support-kiosk>
