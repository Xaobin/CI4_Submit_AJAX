<!DOCTYPE html>
<html lang="en">

<head>
    <title>CodeIgniter 4 Formulário de Envio via método ajax </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" rel="stylesheet" />
    <style>
        #frm-add-user label.error{
            color:red;
        }
    </style>
</head>

<body>

    <div class="container">
        <h4 style="text-align: center;">CodeIgniter 4 Formulário de Envio via método ajax</h4>
        <div class="panel panel-primary">
            <div class="panel-heading">CodeIgniter 4 Formulário de Envio via método ajax</div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="frm-add-user">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="name" placeholder="Insira o nome" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required id="email" placeholder="Adicione um email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" required id="password" placeholder="Entre com uma senha" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Validation library file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!-- Sweetalert library file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

<script>
    $(function() {

        // Adding form validation
        $('#frm-add-user').validate();

        // Ajax form submission with image
        $('#frm-add-user').on('submit', function(e) {

            e.preventDefault();

            var formData = new FormData(this);
            // OR var formData = $(this).serialize();

            //We can add more values to form data
            //formData.append("key", "value");

            $.ajax({
                url: "<?= site_url('save-user') ?>",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        Swal.fire('Salvo!', '', 'success')
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Erro ao adicionar dados');
                }
            });
        });
    });
</script>