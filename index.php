<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2
    "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="events.js"></script>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-bordered table-hover" id="articlestable">
                    <thead>
                        <tr>
                            <td>Code</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Modify</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                </table>
                <button class="btn btn-sm btn-primary" id="addBtn">Add Article</button>
            </div>
        </div>

        <!-- Formulario (Agregar, Modificar) -->

        <div class="modal fade" id="artForm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="code">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description:</label>
                                <input type="text" id="description" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Price:</label>
                                <input type="number" id="price" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="addConfirm" class="btn btn-success">Add</button>
                            <button type="button" id="modConfirm" class="btn btn-success">Modify</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</body>

</html>