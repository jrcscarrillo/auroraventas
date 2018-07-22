{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("yourcode/index", "&larr; Go Back") }}
    </li>
    <li class="pull-right">
        {{ link_to("yourcode/new", "Add snippet code to your account") }}
    </li>
</ul>

{% for miscodigos in page.items %}
{% if loop.first %}
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>User</th>
            <th>Code</th>
            <th>Date Added</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
{% endif %}
    <tbody>
        <tr>
            <td>{{ miscodigos.getUsers().name }}</td>
            <td>{{ miscodigos.codeId }}</td>
            <td>{{ miscodigos.dateAdded }}</td>
            <td>{{ miscodigos.obs }}</td>
            <td>{{ miscodigos.status }}</td>
            <td width="2%">{{ link_to("yourcode/edit/" ~ miscodigos.id, '<i class="glyphicon glyphicon-edit"></i>', "class": "btn btn-default") }}</td>
            <td width="2%">{{ link_to("yourcode/delete/" ~ miscodigos.id, '<i class="glyphicon glyphicon-remove"></i>', "class": "btn btn-default") }}</td>
        </tr>
    </tbody>
{% if loop.last %}
    <tbody>
        <tr>
            <td colspan="7" align="right">
                <div class="btn-group">
                    {{ link_to("yourcode/search", '<i class="icon-fast-backward"></i> First', "class": "btn btn-default") }}
                    {{ link_to("yourcode/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn btn-default") }}
                    {{ link_to("yourcode/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn btn-default") }}
                    {{ link_to("yourcode/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn btn-default") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
    <tbody>
</table>
{% endif %}
{% else %}
    No snippets code are recorded into your account
{% endfor %}
