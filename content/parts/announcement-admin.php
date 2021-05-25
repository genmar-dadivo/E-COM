<div class="col-lg-12">
    <div class="container">
        <div class="row">
            <div class="card border-0">
                <div class="card-body">
                    <div class="mt-5">
                        <table id="tannounce" class="table table-striped responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"></th>
                                    <th style="width: 20px;">Title</th>
                                    <th style="width: 100px;">Description</th>
                                    <th style="width: 10px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 5px;"></th>
                                    <th style="width: 20px;">Title</th>
                                    <th style="width: 100px;">Description</th>
                                    <th style="width: 10px;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addannouncement" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <nav class="navbar navbar-light bg-light">
            </nav>
            <div class="modal-body custom-bg-2">
                <form id="formAnnouncement">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-sm-9">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border-0 shadow-sm" onblur="this.style='text-transform: capitalize;'" id="eventtitle" name="eventtitle" placeholder="Title" autocomplete="off" required>
                                    <label for="eventtitle">Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0 shadow-sm" placeholder="Announcement" id="announcement" name="announcement" style="min-height: 250px; resize: none;"></textarea>
                                    <label for="announcement">Announcement</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <button type="submit" id="btnSubmit" class="btn btn-primary"> Submit </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteannouncement(id) {
        if(confirm("Are you sure to delete this asset? \nAnnouncement ID: " + id)) {
            $.ajax({
                type: 'POST',
                url: '../../content/action/formdeleteannouncement.php',
                data: {tannounce: id},
                success: function(data) {
                    alert(data);
                    var tannounce = $('#tannounce').DataTable();
                    tannounce.ajax.reload();
                }
            });
        }
        else { alert('cancelled'); }
    }
    $('#formAnnouncement').on('submit', function(e) {
        $('#btnSubmit').prop("disabled", true);
        $("#btnSubmit").html('Loading ...');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../content/action/formannouncement.php',
            data: $('#formAnnouncement').serialize(),
            success: function(data) {
                alert(data);
                $('#btnSubmit').prop("disabled", false);
                $("#btnSubmit").html('Submit');
                var thome = $('#tevent').DataTable();
                thome.ajax.reload();
                $('#addannouncement').modal('hide');
            }
        });
    });
    $('#tannounce tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control border-1" type="text" placeholder="'+title+'">' );
    });
    var table = $('#tannounce').DataTable({
        dom: 'Brtip',
        "oLanguage": { "sSearch": "" },
        responsive: true,
        buttons: [
            {
                text: 'Add Announcement',
                className: "btn btn-sm btn-primary",
                action: function (e, dt, node, config) {
                    $('#addannouncement').appendTo("body");
                    $('#addannouncement').modal('show');
                }
            }
        ],
        "ajax": {
            'type': 'POST',
            'url': '../../content/action/getAnnounce.php?',
        },
        initComplete: function () {
                // Apply the search
                this.api().columns().every(function () {
                    var that = this;
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
    });
</script>