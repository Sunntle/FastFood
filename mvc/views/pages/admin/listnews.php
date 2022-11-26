<div class="row container">
    <div class="col-md-12">
        <div class="tile">
        <div class="card-header">
            <h4 class="p-3 text-center">QUẢN LÍ TIN TỨC</h4>
        </div>
            <div class="tile-body">
                  </div>
                  <div class="d-flex border text-center align-items-center flex-wrap">
                <table class="table table-hover table-bordered" id="sampleTable">

                    <thead>
                        <tr>
                            <th>Mã bài viết</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh bìa</th>
                            <th>Ngày viết</th>
                            <th>Nội dung</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>                
                        <?php foreach($data['AllNews'] as $kq) { ?>
                            <?php
                            $content = $kq['noiDung'];
                            $string = strip_tags($content);
                            if(strlen($string) > 200){
                                $stringCut = substr($string,0,200);
                                $endPoint = strrpos($stringCut,' ');
                                $string = $endPoint?substr($stringCut,0,$endPoint):substr($stringCut,0);
                                $string.='...';
                            }
                        ?>
                        <tr>
                            <td style="width: 50px;"><?php echo $kq['id']?></td>
                            <td style="width: 50px;"><?php echo $kq['tieuDe']?></td>
                            <td><img src=".<?php echo $kq['anhtieude']?>" alt="" width="400px;"></td>
                            <td style="width: 150px;"><?php echo $kq['ngay']?></td>
<<<<<<< HEAD
                            <td style="width: 500px;"><?php echo $string?></td>
=======
                            <td style="width: 500px;"><?php echo substr($kq['noiDung'],0, 255)?> ....</td>
>>>>>>> 676b963471c8c84642f9ab310b2062f88dc6cd52
                            <td class="col-2">
                                <form action="news/SuaNews" method="post">
                                <input type="hidden" name="id" value="<?=$kq['id']?>">
                                <input type="submit" class="btn btn-success" value="Sửa"></input>
                                <a href="news/XoaNews&id=<?=$kq['id']?>" class="btn btn-danger">Xóa</a>
                                </form>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>