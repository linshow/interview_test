<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首頁</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 

    <script>
    function delete_click(id) {
        console.log(id);
        if (confirm('確定要刪除資料？')) {
            $.ajax({
                type: "POST",
                url: "users/delete",
                data: {
                    id: id,
                },
                success: function() {
                    // alert("yes");
                    document.location.reload(true);

                },
                error: function() {
                    alert("刪除失敗");
                }

            });
        }
    }

    function edit_click(id, account, accountName, accountSex, accountEmail, birthDate, remark) {

        $('#id').val(id);
        $('#account').val(account);
        $('#accountName').val(accountName);
        // $('#accountSex').val(accountSex);
		$("input[name='accountSex']").val();
        $('#accountEmail').val(accountEmail);
        $('#birthDate').val(birthDate);
        $('#remark').val(remark);

        $('#updateToUser').modal('show');
    }

    function updateUser() {
        var id = $("#id").val();
        var account = $('#account').val();
        var accountName = $('#accountName').val();
		var accountSex=$("select[name='accountSex']").val();
        var accountEmail = $('#accountEmail').val();
        var birthDate = $('#birthDate').val();
        var remark = $('#remark').val();

        swal({
                title: "更改",
                text: "您確定要更改?!",
                icon: "info",
                buttons: true,
                // dangerMode: true,
            })

            .then((will) => {
                if (will) {
                    $.ajax({
                        type: "POST",
                        url: "users/update",

                        data: {
                            id: id,
                            account: account,
                            accountName: accountName,
                            accountSex: accountSex,
                            accountEmail: accountEmail,
                            birthDate: birthDate,
                            remark: remark,
                        },

                        success: function() {

                            swal("送出", {
                                icon: "success",
                            }).then((will) => location.reload(true));
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert("建立樣板錯誤！！");
                            alert(jqXHR.responseText);

                        },
                    });
                }
            });
    }

    $(document).ready(function() {
        $('table.display').DataTable({
            "sDom": 'T<"clear">lfrtip',
            //	"bStateSave": true,
            "bSort": true,
            "aaSorting": [],

            //	stateSave: true,
            "oLanguage": {
                "sProcessing": "處理中...",
                "sLengthMenu": "顯示 MENU 項結果",
                "sZeroRecords": "沒有匹配記錄",
                "sInfo": "顯示第 START 至 END 項結果，共 TOTAL 項",
                "sInfoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                "sInfoFiltered": "(從 MAX 項結果過濾)",
                "sSearch": "搜索:",
                "oPaginate": {
                    "sFirst": "首頁",
                    "sPrevious": "上頁",
                    "sNext": "下頁",
                    "sLast": "尾頁"
                }
            },

        });
    });
    </script>
</head>

<body>
    <input type="hidden" name="id" id="id">
	<div class="container" style="margin-top: 30px;">
    <div class="col-sm-12">
        <?php {?>
        <a href="<?php echo base_url('index.php/users/create_user_view')?>" class="btn btn-info" role="button">新增帳號</a>
        <?php echo form_close();?>
        <?php } ?>
		<?php {
			echo form_open('index.php/users/exportUserExcel')
			
		?>
		<button class="btn btn-primary" type="submit">匯出Excel</button>
		 <?php echo form_close();?>
		<?php }?>
		
        <div id='page_devider container' style='height: 15px;'></div>
        <div class="tab-content">
            <?php foreach ($record as $key => $value) {
    ?>

            <div id="table.display" class="tab-pane fade <?php if ($key==0) {
        echo 'in active';
	} ?>">
	
                <table class="table table-bordered table-striped display">
                    <thead>
                        <tr>
                            <th align="center" valign="middle">帳號</th>
                            <th align="center" valign="middle">姓名</th>
                            <th align="center" valign="middle">性別</th>
                            <th align="center" valign="middle">生日</th>
                            <th align="center" valign="middle">信箱</th>
                            <th align="center" valign="middle">備註</th>
                            <th align="center" valign="middle">功能 </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if (!empty($record)) {
                        foreach ($record as $row) {
                            ?>
                        <tr>
                            <td valign="middle"><?php echo $row->account?></td>
                            <td valign="middle"><?php echo $row->accountName?></td>
                            <td valign="middle"><?php echo $row->accountSex?></td>
                            <td valign="middle"><?php echo $row->birthDate?></td>
                            <td valign="middle"><?php echo $row->accountEmail?></td>
                            <td valign="middle"><?php echo $row->remark?></td>
                            <td valign="middle">
                                <img src="<?php echo base_url('/images/file_edit.png')?>" width="20px" height="20px"
                                    style="cursor:pointer;" title="編輯"
                                    onclick="edit_click(<?php echo "'".$row->id."'" .",". "'".$row->account."'" . ",". "'".$row->accountName."'". ",". "'".$row->accountSex."'". ",". "'".$row->accountEmail."'". ",". "'".$row->birthDate."'". ",". "'".$row->remark."'"?>)">&#160

                                <img src="<?php echo base_url('/images/file_delete.png')?>" width="20px" height="20px"
                                    style="cursor:pointer;" title="刪除" type="button"
                                    onclick="delete_click(<?php echo "'".$row->id."'"?>)">&#160

                            </td>
                        </tr>
                        <?php
                        }
                    } ?>
                    </tbody>
                </table>

            </div>
            <?php
}
        ?>
        </div>

    </div>
</div>
</body>





<!--===================================================================Start of inserttouser modal=========================================================================================================-->
<div class="modal fade bs-example-modal-md" id="updateToUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">


    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mailModalLabel">編輯帳號</h4> <br>
            </div>
            <div class="modal-body ">
                <input type='hidden' id='id' name='id' value=''>
                <div class="input-group">
                    <span class="input-group-addon">帳號</span>
                    <input type="text" class="form-control" name="account" placeholder="請輸入帳號" id="account" required
                        oninvalid="setCustomValidity('請輸入帳號')" oninput="setCustomValidity('')">
                </div>

                <div class="input-group">
                    <span class="input-group-addon">名字</span>
                    <input type="text" class="form-control" name="accountName" placeholder="請輸入名字" id="accountName"
                        required oninvalid="setCustomValidity('請輸入名字')" oninput="setCustomValidity('')">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">性別</span>
                    <select name="accountSex" class="form-control">
                        　 <option value="boy">男</option>
                        　 <option value="girl">女</option>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">生日</span>
                    <input type="date" class="form-control" name="birthDate" placeholder="請輸入生日" id="birthDate" required
                        oninvalid="setCustomValidity('請輸入生日')" oninput="setCustomValidity('')">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">信箱</span>
                    <input type="text" class="form-control" name="accountEmail" placeholder="請輸入信箱" id="accountEmail"
                        required oninvalid="setCustomValidity('請輸入信箱')" oninput="setCustomValidity('')">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">備註</span>
                    <input type="text" class="form-control" name="remark" placeholder="備註" id="remark">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">離開</button>
                    <button type="submit" class="btn btn-primary" value="送出" onclick="updateUser()">確定</button>
                </div>
            </div>
        </div>

    </div>
    <!--===============================End of edit rule date model=====================================-->