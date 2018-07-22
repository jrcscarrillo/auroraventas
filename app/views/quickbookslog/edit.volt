<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("quickbooks_log", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit quickbooks_log
    </h1>
</div>

{{ content() }}

{{ form("quickbooks_log/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldQuickbooksTicketId" class="col-sm-2 control-label">Quickbooks Of Ticket</label>
    <div class="col-sm-10">
        {{ text_field("quickbooks_ticket_id", "type" : "numeric", "class" : "form-control", "id" : "fieldQuickbooksTicketId") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBatch" class="col-sm-2 control-label">Batch</label>
    <div class="col-sm-10">
        {{ text_field("batch", "type" : "numeric", "class" : "form-control", "id" : "fieldBatch") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldMsg" class="col-sm-2 control-label">Msg</label>
    <div class="col-sm-10">
        {{ text_area("msg", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldMsg") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLogDatetime" class="col-sm-2 control-label">Log Of Datetime</label>
    <div class="col-sm-10">
        {{ text_field("log_datetime", "size" : 30, "class" : "form-control", "id" : "fieldLogDatetime") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
