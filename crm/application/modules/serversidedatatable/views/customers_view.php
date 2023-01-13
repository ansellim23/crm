<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Serverside jQuery Datatable</title>
    <link href="<?php echo base_url('bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head> 
<body>
    <div class="container">
        <h1 style="font-size:20pt">Simple Serverside Datatable Codeigniter</h1>

        <h3>Customers Data</h3>
        <br />
       
        <table id="table" class="table table-bordered" id="historyleadtable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                  <th>Lead ID</th> 
                  <th>Package Name</th>
                  <th>Author Name</th>
                  <th>Book Title</th>
                  <th>Email Address</th>
                  <th>Contact #</th>
                  <th>Income Level</th>
                  <th>Agent Assign</th>
                  <th>Price</th>
                  <th>Status and Date</th>
                  <th>Contract Status</th>
                  <th>Special Note</th>
                  <th>Date Assigned</th>
<!--                   <th>Last Contact Date</th>
 -->                  <th>Remark History</th>
                  <th>Collection</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    <script type="text/javascript">
             var base_url = "<?php echo base_url(); ?>";

    </script>
    <!-- Bootstrap -->

    <script src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.12.1/pagination/select.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url(); ?>js/serverside_detatable.js"></script>
    <!-- DateJS -->

</body>
</html>