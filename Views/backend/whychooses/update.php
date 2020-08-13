<?php
require_once 'Views/backend/partitions/header.php';
?>
    <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Category Form
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="admin.php?controller=whychoose&action=update&id=<?php echo $whyChoose['id'] ?>" method="post"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Title</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $whyChoose['title'] ?>"  placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="hidden" class="form-control" name="image" value="<?php echo $whyChoose['image'] ?>" id="image_id"  placeholder="Image">
                                    <a href="plugins/responsive_filemanager/filemanager/dialog.php?type=0&field_id=image_id" class="btn iframe-btn" type="button">Open Filemanager</a>
                                    <img class="img-preview" style="width: 200px; height: 150px;display: block" src="<?php echo $whyChoose['image'] ?>" alt="">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" id="content" style="width: 100%" rows="8"><?php echo $whyChoose['content'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>

                            <script>
                                var url = 'minhtai.local/';
                                CKEDITOR.replace( 'content' ,{
                                    filebrowserBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
                                    filebrowserUploadUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
                                    filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
                                });
                            </script>
                            <script>
                                $('.iframe-btn').fancybox({
                                    'width'		: 900,
                                    'height'	: 600,
                                    'type'		: 'iframe',
                                    'autoScale'    	: false
                                });
                                function responsive_filemanager_callback(field_id){
                                    var url=jQuery('#'+field_id).val();
                                    $(".img-preview").attr('src',url);
                                    $(".img-preview").css('display','block');
                                }
                            </script>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
<?php
require_once 'Views/backend/partitions/footer.php';
?>