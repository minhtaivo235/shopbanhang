<!doctype html>
<html lang="en">
<head>
    <?php
    require_once 'Views/backend/partitions/import_css.php';
    ?>
    <title>Admin</title>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
    require_once 'Views/backend/partitions/sidebar.php';
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php
            require_once 'Views/backend/partitions/topbar.php';
            ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row justify-content-between">
                            <h3 class="m-0 p-0 font-weight-bold text-primary">List Category</h3>
                            <a class="m-0 float-right btn btn-info" data-toggle="modal" data-target="#createCategory"
                               href="#"><i class="fas fa-plus-circle"></i></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableExample" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Parent</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Created by</th>
                                    <th>Updated by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Parent</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Created by</th>
                                    <th>Updated by</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($categories as $item) { ?>
                                    <tr>

                                            <td><?php echo $item['title'] ?></td>
                                            <?php foreach ($categories as $item2) { ?>
                                                <?php if ($item['parent_id'] == 0) { ?>
                                                    <td>No Parent</td>
                                                <?php break; }else  if ($item['parent_id'] == $item2['id']) {?>
                                                    <td><?php echo $item2['title'] ?></td>
                                                <?php } ?>
                                            <?php } ?>

                                            <td><?php echo $item['created_at'] ?></td>
                                            <td><?php echo $item['updated_at'] ?></td>
                                            <td><?php echo $item['created_by'] ?></td>
                                            <td><?php echo $item['updated_by'] ?></td>
                                            <td>
                                                <a href="admin.php?controller=category&action=show&id=<?php echo $item['id'] ?>"
                                                   class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-circle btn-sm"><i
                                                            class="fas fa-trash"></i></a>
                                            </td>

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!--         End of Main Content-->

        <?php
        require_once 'Views/backend/partitions/footer.php';
        ?>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->

    <div class="modal fade" id="createCategory">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Form Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post" action="admin.php?controller=category&action=store">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Title category">
                            <br>
                            <label for="sel1">Parent</label>
                            <select class="form-control" name="parent_id">
                                <option value="1">Default</option>
                                <?php foreach ($optionParent as $key => $value) { ?>
                                    <?php if ($value['level'] == 0) { ?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
                                    <?php } else if ($value['level'] == 1) { ?>
                                        <option value="<?php echo $value['id'] ?>">
                                            --<?php echo $value['title'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $value['id'] ?>">
                                            ----<?php echo $value['title'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <?php
    require_once 'Views/backend/partitions/import_js.php';
    ?>
    <!-- Page level custom scripts -->
    <script src="Public/backend/js/demo/datatables-demo.js"></script>

</div>
</body>
</html>



