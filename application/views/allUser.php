

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首頁</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .example{
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
        }
        #heig{
        height:25px;
        }
        #colsr{
            background-color: #E5E5E5;
        }
	
    </style>

</head>
<body>	
	<input type="hidden" name="id" id="id">
	
    <div class="col-sm-9"> 
	    <?php {?>
		    <a href="<?php echo base_url('index.php/users/create_user_view')?>" class="btn btn-info" role="button">新增帳號</a>
		<?php echo form_close();?>
	    <?php } ?>	
	<div id='page_devider container' style='height: 15px;'></div>
		<div class="tab-content">
		<?php foreach ($record as $key => $value) {
		?>

		<div id="table.display" class="tab-pane fade <?php if($key==0) echo 'in active'?>" >
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
					if(!empty($record))
					{
						foreach($record as $row)
						{
							
							?>
							<tr>
									<td  valign="middle"><?php echo $row->account?></td>
									<td  valign="middle"><?php echo $row->accountName?></td>
									<td  valign="middle"><?php echo $row->accountSex?></td>
									<td  valign="middle"><?php echo $row->birthDate?></td>
									<td  valign="middle"><?php echo $row->accountEmail?></td>
									<td  valign="middle"><?php echo $row->remark?></td>
					
									<td  valign="middle">
										<img src="<?php echo base_url('/images/file_edit.png')?>" width="20px" height="20px" style="cursor:pointer;" title="編輯" onclick="edit_click(<?php echo "'".$row->id."'"?>)">&#160 
									
										<img src="<?php echo base_url('/images/file_delete.png')?>" width="20px" height="20px" style="cursor:pointer;" title="刪除" type="button" onclick="delete_click(<?php echo "'".$row->id."'"?>)">&#160 
										
									</td>	
							</tr>		
							<?php
							
						}
					}
				?>
			</tbody>
		</table>	

				</div>
		<?php	 
			}
		?>
		</div>
		
</div>

</body>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>

	function delete_click(id)
		{
			console.log(id);
			if(confirm('確定要刪除資料？'))
			{
				$.ajax({
				type: "POST", 
				url: "/index.php/users/delete",
				data:{
					id:id,
				},
				success: function(){
					// alert("yes");
					document.location.reload(true);
				
				},
				error: function(){
					alert("刪除失敗");
				}
							
				});
			}
		}

	function edit_click(id)
		{
  			$('#id').val(id);
  			document.forms["edit_user"].submit();
		}

$(document).ready( function () {
    $('table.display').DataTable({
        "sDom": 'T<"clear">lfrtip',
	//	"bStateSave": true,
		"bSort": true,
		"aaSorting": [],

	//	stateSave: true,
		"oLanguage":{"sProcessing":"處理中...",
                                     "sLengthMenu":"顯示 MENU 項結果",
                                     "sZeroRecords":"沒有匹配記錄",
                                     "sInfo":"顯示第 START 至 END 項結果，共 TOTAL 項",
                                     "sInfoEmpty":"顯示第 0 至 0 項結果，共 0 項",
                                     "sInfoFiltered":"(從 MAX 項結果過濾)",
                                     "sSearch":"搜索:",
                                     "oPaginate":{"sFirst":"首頁",
                                                          "sPrevious":"上頁",
                                                          "sNext":"下頁",
                                                          "sLast":"尾頁"}
		},

    });
});
</script>	