
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>上機測試</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .example{
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
        }
	
    </style>
  </head>

  <body>
    <div class="container">
        <div class="example">
        <div class="col-md-offset-4 col-md-4">
            <h4><center><strong>建立新帳號</strong></center></h4>
    
            <?php echo form_open('index.php/users/create_user');?>

    <div class="input-group">
        <span class="input-group-addon" >帳號</span>
        <input type="text" class="form-control" name="account" placeholder="請輸入帳號"
        required oninvalid="setCustomValidity('請輸入帳號')" oninput="setCustomValidity('')" >
        
    </div>

    <div class="input-group">
        <span class="input-group-addon" >名字</span>
        <input type="text" class="form-control" name="accountName" placeholder="請輸入名字"
        required oninvalid="setCustomValidity('請輸入名字')" oninput="setCustomValidity('')">
    </div>
    <div class="input-group">
        <span class="input-group-addon" >性別</span>
        <select name="accountSex" class="form-control">
　       <option value="boy">男</option>
　       <option value="girl">女</option>
        </select> 
    </div>
    <div class="input-group">
        <span class="input-group-addon" >生日</span>
        <input type="date" class="form-control" name="birthDate" placeholder="請輸入生日"
        required oninvalid="setCustomValidity('請輸入生日')" oninput="setCustomValidity('')">
    </div>
    <div class="input-group">
        <span class="input-group-addon" >信箱</span>
        <input type="text" class="form-control" name="accountEmail" placeholder="請輸入信箱"
        required oninvalid="setCustomValidity('請輸入信箱')" oninput="setCustomValidity('')">
    </div>
    <div class="input-group">
        <span class="input-group-addon" >備註</span>
        <input type="text" class="form-control" name="remark" placeholder="備註">
    </div>


    <center>
    <button type="submit" class="btn btn-primary">建立新帳號</button>
    <!-- <button type="button" class="btn btn-warning" onclick="location.href='/CodeIgniter-3.1.5/index.php/users'">離開</button> -->
    </center>

    <?php echo form_close(); ?>


        </div>
        </div>
    </div>

  

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>