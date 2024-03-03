<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><a href="index.php?page=bangsp">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item"><a href="index.php?page=sanpham">Thêm sản phẩm</a></li>
    </ul>
    <div id="clock"></div>
  </div>

  <div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" href="index.php?page=sanpham" title="Thêm">
                            <i class="fas fa-plus"></i> Tạo mới Sản phẩm
                        </a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)">
                            <i class="fas fa-trash-alt"></i> Xóa tất cả
                        </a>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
                        id="sampleTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="all"></th>
                                <th>ID Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Avatar</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>View</th>
                                <th>Tính năng</th>
                                <th>Tính năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sp = getall_tabel();
                            foreach ($sp as $show) {
                                echo '
                                <tr>
                                    <td><input type="checkbox" name="check1" value="1"></td>
                                    <td>' . $show['id'] . '</td>
                                    <td>' . $show['ten'] . '</td>
                                    <td><img class="img-card-person" src="../uploadsPr/' . $show['img'] . '" alt=""></td>
                                    <td>' . $show['gia'] . '</td>
                                    <td>' . $show['soluong'] . '</td>
                                    <td>' . $show['view'] . '</td>
                                    <td class="table-td-center">
                                        <button class="btn btn-primary btn-sm trash" type="button" data-id="' . $show['id'] . '" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                    <td class="table-td-center">
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" data-toggle="modal" data-target="#ModalUP"
                                            data-id="' . $show['id'] . '"
                                            data-name="' . $show['ten'] . '"
                                            data-img="../uploads/' . $show['img'] . '"
                                            data-gia="' . $show['gia'] . '"
                                            data-soluong="' . $show['soluong'] . '"
                                            data-view="' . $show['view'] . '">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>
  $(document).ready(function () {
    $('.edit').click(function () {
      var userId = $(this).data('id');
    var ten = $(this).data('name');
    var gia = $(this).data('gia');
    var soluong = $(this).data('soluong'); 
    var img = $(this).data('img');
    var view = $(this).data('view');
    
    console.log(userId );
    $('#userId').val(userId);
    $('#userName').val(ten);
    $('#gia').val(gia);
    $('#soluong').val(soluong);
    $('#view').val(view);
    // $('#img').val(img);
   
    });

  });
</script>

<!--
  MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="editForm" method="post" action="index.php?page=updsp" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa sản phẩm</h5>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="control-label">Tên</label>
              <input class="form-control" type="text" id="userName" name="ten">
              <input class="hidden-input" id="userId" name="id" type="text" style="visibility:hidden;">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Giá</label>
              <input class="form-control" type="number" id="gia" name="gia">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Số lượng</label>
              <input class="form-control" type="text" id="soluong" name="soluong">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">View</label>
              <input class="form-control" type="text" id="view" name="view">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Ảnh</label>
              <input class="form-control" type="file" id="img" name="img">
            </div>
          </div>
          <br>
          <div id="errorMessages" style="color: red;"></div>

          <button class="btn btn-save" type="submit">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <br>
        </div>
        <div class="modal-footer"></div>
      </form>
    </div>
  </div>
</div>
<!--
  MODAL
-->
<script>
document.getElementById("editForm").addEventListener("submit", function(event) {
  var ten = document.getElementById("userName").value;
  var gia = document.getElementById("gia").value;
  var soluong = document.getElementById("soluong").value;
  var view = document.getElementById("view").value;
  var img = document.getElementById("img").value;

  var errors = [];

  if (ten === '') {
      errors.push("Vui lòng nhập Tên");
  }

  if (gia === '') {
      errors.push("Vui lòng nhập Giá");
  }

  if (soluong === '') {
      errors.push("Vui lòng nhập Số lượng");
  } else if (isNaN(soluong)) {
      errors.push("Số lượng phải là số");
  }

  if (view === '') {
      errors.push("Vui lòng nhập View");
  }

  if (img === '') {
      errors.push("Vui lòng chọn Ảnh");
  }

  if (errors.length > 0) {
      var errorMessage = "<ul>";
      for (var i = 0; i < errors.length; i++) {
          errorMessage += "<li>" + errors[i] + "</li>";
      }
      errorMessage += "</ul>";

      document.getElementById("errorMessages").innerHTML = errorMessage;
      document.getElementById("errorMessages").style.display = "block";
      event.preventDefault();
  }
  return true;

});
</script>
<!-- Essential javascripts for application to work-->
<script src="Assets/js/js/jquery-3.2.1.min.js"></script>
<script src="Assets/js/js/popper.min.js"></script>
<script src="Assets/js/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="Assets/js/js/plugins/jquery.table2excel.js"></script> -->
<script src="Assets/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="Assets/js/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<!-- <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script> -->
<script>
  jQuery(function () {
    jQuery(".trash").click(function () {
      var rowToDelete = jQuery(this).closest("tr");
    
       // Tìm hàng chứa nút xóa

      swal({
        title: "Cảnh báo",
        text: "Bạn có chắc chắn muốn xóa sản phẩm này?",
        buttons: ["Hủy bỏ", "Đồng ý"],
      }).then((willDelete) => {
        if (willDelete) {
          var id = rowToDelete.data('id');
          var ids = jQuery(this).data('id');
        
          // Gọi AJAX để xóa người dùng thông qua PHP
          jQuery.ajax({
            type: 'GET',
            url: 'index.php?page=xoasp&id=' + ids,
            data: { ids: ids },
            success: function (response) {
              rowToDelete.remove(); // Xóa hàng khỏi bảng sau khi xóa thành công
              swal("Đã xóa thành công!", {
                icon: "success",
               
              });
            },
            error: function (error) {
              swal("Đã xảy ra lỗi khi xóa!", {
                icon: "error",
              });
            }
          });
        }
      });
    });
    

  });
  //Thời Gian
  function time() {
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Chủ Nhật";
    weekday[1] = "Thứ Hai";
    weekday[2] = "Thứ Ba";
    weekday[3] = "Thứ Tư";
    weekday[4] = "Thứ Năm";
    weekday[5] = "Thứ Sáu";
    weekday[6] = "Thứ Bảy";
    var day = weekday[today.getDay()];
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    nowTime = h + " giờ " + m + " phút " + s + " giây";
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = day + ', ' + dd + '/' + mm + '/' + yyyy;
    tmp = '<span class="date"> ' + today + ' - ' + nowTime +
      '</span>';
    document.getElementById("clock").innerHTML = tmp;
    clocktime = setTimeout("time()", "1000", "Javascript");

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  }
  //In dữ liệu
  var myApp = new function () {
    this.printTable = function () {
      var tab = document.getElementById('sampleTable');
      var win = window.open('', '', 'height=700,width=700');
      win.document.write(tab.outerHTML);
      win.document.close();
      win.print();
    }
  }
  //     //Sao chép dữ liệu
  //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

  // copyTextareaBtn.addEventListener('click', function(event) {
  //   var copyTextarea = document.querySelector('.js-copytextarea');
  //   copyTextarea.focus();
  //   copyTextarea.sele ct();

  //   try {
  //     var successful = document.execCommand('copy');
  //     var msg = successful ? 'successful' : 'unsuccessful';
  //     console.log('Copying text command was ' + msg);
  //   } catch (err) {
  //     console.log('Oops, unable to copy');
  //   }
  // });


  //Modal
  $("#show-emp").on("click", function () {
    $("#ModalUP").modal({ backdrop: false, keyboard: false })
  });
</script>
</body>

</html>