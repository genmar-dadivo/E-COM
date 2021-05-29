<div class="col-lg-12">
    <div class="container">
        <div class="row">
            <div class="card border-0">
                <div class="card-body">
                    <div class="mt-5">
                        <table id="thome" class="table table-striped responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;"></th>
                                    <th style="width: 20px;">Type</th>
                                    <th style="width: 300px;">Title</th>
                                    <th style="width: 20px;">File</th>
                                    <th style="width: 20px;">Date</th>
                                    <th style="width: 30px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 10px;"></th>
                                    <th style="width: 20px;">Type</th>
                                    <th style="width: 300px;">Title</th>
                                    <th style="width: 20px;">File</th>
                                    <th style="width: 20px;">Date</th>
                                    <th style="width: 30px;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addassethome" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <nav class="navbar navbar-light bg-light">
            </nav>
            <div class="modal-body custom-bg-2">
                <form id="formHomeasset">
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select border-0 shadow-sm" id="assettype" name="assettype" required>
                                        <option disabled selected value="">Asset Type</option>
                                        <option value="1">Carousel</option>
                                        <option value="2">Card</option>
                                    </select>
                                    <label for="assettype">Select</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border-0 shadow-sm" onblur="this.style='text-transform: capitalize;'" id="assettitle" name="assettitle" placeholder="Title" autocomplete="off" required>
                                    <label for="assettitle">Asset Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control border-0 shadow-sm" placeholder="Asset Desciption" id="assetdescription" name="assetdescription" style="height: 100px" onblur="this.style='text-transform: capitalize;'" autocomplete="off" required></textarea>
                                    <label for="assetdescription">Asset Desciption</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="showhide" name="showhide">
                                    <label class="form-check-label" for="showhide">Show upon adding</label>
                                  </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <input type="file" class="form-control border-0 shadow-sm" id="assetfile" name="assetfile" placeholder="Asset File" accept="image/*" required>
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
<div class="modal fade" id="editassethome" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <nav class="navbar navbar-light bg-light">
            </nav>
            <div class="modal-body custom-bg-2">
                <form id="formEdithomeasset">
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="form-select border-0 shadow-sm" id="editassettype" name="editassettype" required>
                                        <option disabled selected value="">Asset Type</option>
                                        <option value="1">Carousel</option>
                                        <option value="2">Card</option>
                                    </select>
                                    <label for="editassettype">Select</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border-0 shadow-sm" onblur="this.style='text-transform: capitalize;'" id="editassettitle" name="editassettitle" placeholder="Title" autocomplete="off" required>
                                    <label for="editassettitle">Asset Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control border-0 shadow-sm" placeholder="Asset Desciption" id="editassetdescription" name="editassetdescription" style="height: 100px" onblur="this.style='text-transform: capitalize;'" autocomplete="off" required></textarea>
                                    <label for="editassetdescription">Asset Desciption</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="editshowhide" name="editshowhide">
                                    <label class="form-check-label" for="editshowhide">Show upon adding</label>
                                  </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <input type="file" class="form-control border-0 shadow-sm" id="editassetfile" name="editassetfile" placeholder="Asset File" accept="image/*" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <button type="submit" id="btnEditsubmit" class="btn btn-primary"> Submit </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function editassethome(assetid) {
        $('#editassethome').modal('show');
        $('#editassethome').appendTo('body');
        $.ajax({
            url: '../../content/action/getAdminhomedata.php?id=' + assetid,
            success: function(data) {
            }
        });
    }
    function deleteassethome(assetid) {
        if(confirm("Are you sure to delete this asset? \nAsset ID: " + assetid)) {
            $.ajax({
                type: 'POST',
                url: '../../content/action/formdeleteasset.php',
                data: {assetid: assetid},
                success: function(data) {
                    alert(data);
                    var thome = $('#thome').DataTable();
                    thome.ajax.reload();
                }
            });
        }
        else { alert('cancelled'); }
    }
    $('#assettype').on('change', function(e) {
        var type = this.value;
        if (type == 1) {
            // Carou
            $("#assetdescription").prop('required', false);
            $("#assetfile").prop('required', true);
        }
        else if (type == 2) {
            // Card
            $("#assetdescription").prop('required', true);
            $("#assetfile").prop('required', false);
        }
        else { alert('Error'); }
    });
    // Home Asset Mecha
    $('#formHomeasset').on('submit', function(e) {
        $('#btnSubmit').prop("disabled", true);
        $("#btnSubmit").html('Loading ...');
        e.preventDefault();
        var assetfile = $('#assetfile').prop('files')[0];
        var formData = new FormData(this);
        formData.append('file', assetfile);
        $.ajax({
            type: 'POST',
            url: '../../content/action/formhomeasset.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data);
                $('#btnSubmit').prop("disabled", false);
                $("#btnSubmit").html('Submit');
                var thome = $('#thome').DataTable();
                thome.ajax.reload();
                $('#addassethome').modal('hide');
            }
        });
    });
    var d = new Date();
    var gettime = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
    console.log('%cStarts @ ' + gettime, 'background: #222; color: #bada55');
    $('#thome tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control border-1" type="text" placeholder="'+title+'" />' );
    });
    var table = $('#thome').DataTable({
        dom: 'Brtip',
        "oLanguage": { "sSearch": "" },
        responsive: true,
        buttons: [
            {
                text: 'Add Asset',
                className: "btn btn-sm btn-primary",
                action: function (e, dt, node, config) {
                    $('#addassethome').appendTo("body");
                    $('#addassethome').modal('show');
                }
            }
        ],
        "ajax": {
            'type': 'POST',
            'url': '../../content/action/getAdminhomedata.php',
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