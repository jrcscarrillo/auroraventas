<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("quickbooks_queue", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit quickbooks_queue
    </h1>
</div>

{{ content() }}

{{ form("quickbooks_queue/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldQuickbooksTicketId" class="col-sm-2 control-label">Quickbooks Of Ticket</label>
    <div class="col-sm-10">
        {{ text_field("quickbooks_ticket_id", "type" : "numeric", "class" : "form-control", "id" : "fieldQuickbooksTicketId") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQbUsername" class="col-sm-2 control-label">Qb Of Username</label>
    <div class="col-sm-10">
        {{ text_field("qb_username", "size" : 30, "class" : "form-control", "id" : "fieldQbUsername") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQbAction" class="col-sm-2 control-label">Qb Of Action</label>
    <div class="col-sm-10">
        {{ text_field("qb_action", "size" : 30, "class" : "form-control", "id" : "fieldQbAction") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIdent" class="col-sm-2 control-label">Ident</label>
    <div class="col-sm-10">
        {{ text_field("ident", "size" : 30, "class" : "form-control", "id" : "fieldIdent") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldExtra" class="col-sm-2 control-label">Extra</label>
    <div class="col-sm-10">
        {{ text_area("extra", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldExtra") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQbxml" class="col-sm-2 control-label">Qbxml</label>
    <div class="col-sm-10">
        {{ text_area("qbxml", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldQbxml") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPriority" class="col-sm-2 control-label">Priority</label>
    <div class="col-sm-10">
        {{ text_field("priority", "type" : "numeric", "class" : "form-control", "id" : "fieldPriority") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldQbStatus" class="col-sm-2 control-label">Qb Of Status</label>
    <div class="col-sm-10">
        {{ select_static("qb_status", "using": [], "class" : "form-control", "id" : "fieldQbStatus") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMsg" class="col-sm-2 control-label">Msg</label>
    <div class="col-sm-10">
        {{ text_area("msg", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldMsg") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEnqueueDatetime" class="col-sm-2 control-label">Enqueue Of Datetime</label>
    <div class="col-sm-10">
        {{ text_field("enqueue_datetime", "size" : 30, "class" : "form-control", "id" : "fieldEnqueueDatetime") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDequeueDatetime" class="col-sm-2 control-label">Dequeue Of Datetime</label>
    <div class="col-sm-10">
        {{ text_field("dequeue_datetime", "size" : 30, "class" : "form-control", "id" : "fieldDequeueDatetime") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
