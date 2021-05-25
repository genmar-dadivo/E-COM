<div class="col-lg-12">
    <div class="container">
        <div class="row">
            <div class="card border-0">
                <div class="card-body">
                    <div class="mt-5">
                        <table id="tevent" class="table table-striped responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"></th>
                                    <th style="width: 20px;">Title</th>
                                    <th style="width: 30px;">Desc</th>
                                    <th style="width: 5px;">Color</th>
                                    <th style="width: 10px;">STime</th>
                                    <th style="width: 10px;">ETime</th>
                                    <th style="width: 5px;">Date</th>
                                    <th style="width: 5px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 5px;"></th>
                                    <th style="width: 20px;">Title</th>
                                    <th style="width: 30px;">Desc</th>
                                    <th style="width: 5px;">Color</th>
                                    <th style="width: 10px;">STime</th>
                                    <th style="width: 10px;">ETime</th>
                                    <th style="width: 5px;">Date</th>
                                    <th style="width: 5px;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addevent" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <nav class="navbar navbar-light bg-light">
            </nav>
            <div class="modal-body custom-bg-2">
                <form id="formEvent">
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-sm-9">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border-0 shadow-sm" onblur="this.style='text-transform: capitalize;'" id="eventtitle" name="eventtitle" placeholder="Title" autocomplete="off" required>
                                    <label for="eventtitle">Event Title</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-floating mb-3">
                                    <div class="form-floating mb-3">
                                        <input type="color" class="form-control border-0 shadow-sm" id="eventcolor" name="eventcolor" placeholder="Event Color" autocomplete="off" required>
                                        <label for="eventcolor">Event Color</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control border-0 shadow-sm" placeholder="Event Desciption" id="eventdesc" name="eventdesc" style="height: 100px" onblur="this.style='text-transform: capitalize;'" autocomplete="off" required></textarea>
                                    <label for="eventdesc">Event Desciption</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" class="form-control border-0 shadow-sm" id="stime" name="stime" placeholder="Date Start" autocomplete="off" min="<?php echo date('Y-m-d') . 'T00:00'; ?>" required>
                                        <label for="stime">Date Start</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" class="form-control border-0 shadow-sm" id="etime" name="etime" placeholder="Date End" min="<?php echo date('Y-m-d', time() + 86400) . 'T00:00'; ?>" autocomplete="off" required>
                                        <label for="etime">Date End</label>
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
    function deleteevent(id) {
        if(confirm("Are you sure to delete this asset? \nEvents ID: " + id)) {
            $.ajax({
                type: 'POST',
                url: '../../content/action/formdeleteevent.php',
                data: {eventid: id},
                success: function(data) {
                    alert(data);
                    var tevent = $('#tevent').DataTable();
                    tevent.ajax.reload();
                }
            });
        }
        else { alert('cancelled'); }
    }
    $('#formEvent').on('submit', function(e) {
        $('#btnSubmit').prop("disabled", true);
        $("#btnSubmit").html('Loading ...');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../content/action/formevent.php',
            data: $('#formEvent').serialize(),
            success: function(data) {
                alert(data);
                $('#btnSubmit').prop("disabled", false);
                $("#btnSubmit").html('Submit');
                var thome = $('#tevent').DataTable();
                thome.ajax.reload();
                $('#addevent').modal('hide');
            }
        });
    });
    $('#tevent tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control border-1" type="text" placeholder="'+title+'" />' );
    });
    var table = $('#tevent').DataTable({
        dom: 'Brtip',
        "oLanguage": { "sSearch": "" },
        responsive: true,
        buttons: [
            {
                text: 'Add Event',
                className: "btn btn-sm btn-primary",
                action: function (e, dt, node, config) {
                    $('#addevent').appendTo("body");
                    $('#addevent').modal('show');
                }
            }
        ],
        "ajax": {
            'type': 'POST',
            'url': '../../content/action/getEvent.php?t=1',
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