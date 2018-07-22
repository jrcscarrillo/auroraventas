<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("quickbooks_queue/index", "Go Back") }}</li>
            <li class="next">{{ link_to("quickbooks_queue/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Quickbooks Of Queue</th>
            <th>Quickbooks Of Ticket</th>
            <th>Qb Of Username</th>
            <th>Qb Of Action</th>
            <th>Ident</th>
            <th>Extra</th>
            <th>Qbxml</th>
            <th>Priority</th>
            <th>Qb Of Status</th>
            <th>Msg</th>
            <th>Enqueue Of Datetime</th>
            <th>Dequeue Of Datetime</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for quickbooks_queue in page.items %}
            <tr>
                <td>{{ quickbooks_queue.getQuickbooksQueueId() }}</td>
            <td>{{ quickbooks_queue.getQuickbooksTicketId() }}</td>
            <td>{{ quickbooks_queue.getQbUsername() }}</td>
            <td>{{ quickbooks_queue.getQbAction() }}</td>
            <td>{{ quickbooks_queue.getIdent() }}</td>
            <td>{{ quickbooks_queue.getExtra() }}</td>
            <td>{{ quickbooks_queue.getQbxml() }}</td>
            <td>{{ quickbooks_queue.getPriority() }}</td>
            <td>{{ quickbooks_queue.getQbStatus() }}</td>
            <td>{{ quickbooks_queue.getMsg() }}</td>
            <td>{{ quickbooks_queue.getEnqueueDatetime() }}</td>
            <td>{{ quickbooks_queue.getDequeueDatetime() }}</td>

                <td>{{ link_to("quickbooks_queue/edit/"~quickbooks_queue.getQuickbooksQueueId(), "Edit") }}</td>
                <td>{{ link_to("quickbooks_queue/delete/"~quickbooks_queue.getQuickbooksQueueId(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("quickbooks_queue/search", "First") }}</li>
                <li>{{ link_to("quickbooks_queue/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("quickbooks_queue/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("quickbooks_queue/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
