<?php
require_once 'Views/backend/partitions/header.php';
?>
<section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Responsive Table
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Created Day</th>
                        <th>Updated Day</th>
                        <th style="width:50px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($whyChooses as $key => $whyChoose) { ?>
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td><?php echo $whyChoose['title'] ?></td>
                        <td><img src="<?php echo $whyChoose['image'] ?>" alt=""></td>
                        <td style="width: 200px;height: 120px;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 5;overflow: hidden;line-height: 20px"><?php echo $whyChoose['content'] ?></td>
                        <?php if ($whyChoose['status'] == 'active') { ?>
                            <td><a class="btn btn-sm btn-info"
                                   href="admin.php?controller=whychoose&action=inActiveStatus&id=<?php echo $whyChoose['id'] ?>"><?php echo $whyChoose['status'] ?></a>
                            </td>
                        <?php } ?>
                        <?php if ($whyChoose['status'] == 'inactive') { ?>
                            <td><a class="btn btn-sm btn-danger"
                                   href="admin.php?controller=whychoose&action=activeStatus&id=<?php echo $whyChoose['id'] ?>"><?php echo $whyChoose['status'] ?></a>
                            </td>
                        <?php } ?>
                        <td><span class="text-ellipsis"><?php echo $whyChoose['created_at'] ?></span></td>
                        <td><span class="text-ellipsis"><?php echo $whyChoose['updated_at'] ?></span></td>
                        <td>
                            <a href="admin.php?controller=whychoose&action=show&id=<?php echo $whyChoose['id'] ?>" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="admin.php?controller=whychoose&action=delete&id=<?php echo $whyChoose['id'] ?>" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <?php if ($pagination['total_record'] > $pagination['limit']){ ?>
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <?php if($pagination['page'] > 1){ ?>
                                <li><a href="admin.php?controller=whychoose&action=get_list&page=1"><i class="fa fa-angle-double-left" style="font-weight: bold;font-size: 15px;"></i></a></li>
                                <li><a href="admin.php?controller=whychoose&action=get_list&page=<?php echo $pagination['page']-1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                            <?php } ?>
                            <?php for ($i = $pagination['min']; $i <= $pagination['max']; $i++) { ?>
                                <?php if ($pagination['page'] == $i) { ?>
                                    <li><span style="z-index: 3;color: #23527c;background-color: #eee;border-color: #ddd;"><?php echo $i ?></span></li>
                                <?php } else {?>
                                    <li><a href="admin.php?controller=category&action=get_list&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php } ?>
                            <?php } ?>
                            <?php if($pagination['page'] < $pagination['total_page']){ ?>
                                <li><a href="admin.php?controller=whychoose&action=get_list&page=<?php echo $pagination['page']+1 ?>"><i class="fa fa-chevron-right" ></i></a></li>
                                <li><a href="admin.php?controller=whychoose&action=get_list&page=<?php echo $pagination['total_page'] ?>"><i class="fa fa-angle-double-right" style="font-weight: bold;font-size: 15px;"></i></a></li>
                            <?php } ?>

                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</section>
<?php
require_once 'Views/backend/partitions/footer.php';
?>