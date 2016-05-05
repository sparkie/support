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

                <div class="panel-body">
                    <table class="table table-borderless m-b-none">
                        <tbody>
                        <tr>
                            <td>
                                <div class="btn-table-align"><strong>Title: </strong>@{{ viewingTicket.title }}</div>
                            </td>

                            <td>
                                <div class="btn-table-align"><strong>User Name: </strong>John Doe</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="btn-table-align"><strong>Created: </strong>@{{ viewingTicket.created_at }}</div>
                            </td>

                            <td>
                                <div class="btn-table-align"><strong>User Email: </strong>john@example.com</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <p>
                        @{{ viewingTicket.body }}
                    </p>

                </div>
            </div> <!-- end panel -->

            <div class="panel panel-info">
                <div class="panel-heading">
                    John Doe
                </div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTQ4MDY2ZmM5MyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NDgwNjZmYzkzIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy40Njg3NSIgeT0iMzYuNSI+NjR4NjQ8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
                            </a>
                        </div>
                        <div class="media-body">
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    Replied at: some date
                </div>
            </div>

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="pull-right">
                        Ashley Clarke - Staff
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-body">
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </div>
                        <div class="media-right">
                            <a href="#">
                                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTQ4MDY2ZTkxYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NDgwNjZlOTFhIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy40Njg3NSIgeT0iMzYuNSI+NjR4NjQ8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    Replied at: some date
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="panel-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default">Reply</button>
                        <button type="button" class="btn btn-danger">Reply &amp; Close</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
</support-kiosk>
