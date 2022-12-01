<main class="app-content">
  <form action="news/ThemNews" method="post" enctype="multipart/form-data">
  <div class="row container">
    <div class="col-md-12 my-5">
      <div class="tile">
        <h3 class="tile-title">Tạo tin tức mới</h3>
        <div class="tile-body">
          <form class="row">
          <label for="" class="form-label">Tên tiêu đề</label>
          <input type="text" class="form-control" name="tieuDe" required>
          <label for="" class="form-label">Ngày viết</label>
          <input type="date" class="form-control" name="ngay" required>
          <label for="hinh" class="form-label">Ảnh tiêu đề</label>
          <input type="file" class="form-control" id="anhtieude" name="anhtieude" required>
          <label for="hinh" class="form-label">Nội dung</label>
          <textarea name="noiDung" class="form-control" cols="30" rows="10" required></textarea>
          <?php if (isset($data['Thongbao'])) echo $data['Thongbao'] ?>

        </div>
        <div class="form-group py-3">
        <input type="submit" name="btn-update" class="btn btn-primary" value="Cập nhật">
        <input type="reset" class="btn btn-danger" value="Nhập lại">
        <a href="news" class="btn btn-success">Danh sách</a>
    </div>
      </div>
    </div>
  </div>
  </form>
 
</main>