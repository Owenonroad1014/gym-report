<?php require __DIR__ . '/includes/init.php';?>
<?php
$title = "新增訂單";
$pageName = "order-add"; 
?>
<?php include __DIR__ . '/includes/html-header.php'; ?>
<?php include __DIR__ . '/includes/html-sidebar.php'; ?>
<?php include __DIR__ . '/includes/html-layout-navbar-admin.php'; ?>
<?php include __DIR__ . '/includes/html-content wrapper-start.php'; ?>

<div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">新增訂單</h5> 
        <small class="text-muted float-end"> <a href="./order.php" class="nav-link">回到訂單列表</a>
        </small>
      </div>
      <div class="card-body">
        <form onsubmit="sendData(event)">
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-order_id">訂單號碼</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="basic-default-order_id" placeholder="order_id" name="order_id">
              <div id="order_idError" class="color-danger my-2"></div>
            </div>
            
          </div>
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-member">會員編號</label>
            <div class="col-sm-10">
              <input type="number" class="form-control " id="basic-default-member_id" name="member_id" placeholder="ID" min=1 required>
            </div>
            
          </div>
          <!-- <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-id">商品編號</label>
            <div class="col-sm-10">
              <input type="text" class="form-control " id="basic-default-id" name="id" placeholder="product_ID">
              <div id="idError" class="color-danger my-2"></div>
            </div>
            <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-name">商品名稱</label>
            <div class="col-sm-10">
              <input type="text" class="form-control " id="basic-default-name" name="name">
              <div id="nameError" class="color-danger my-2"></div>
            </div>
            
          </div> -->
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-total_amount">總金額</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="basic-default-total_amount" rows="1" name="total_amount" ></input>
              <div id="total_amount_error"></div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-checkbox" >自取門市</label >
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <select id="self_pickup_store" class="form-select" name="self_pickup_store">
                            <option value="健身房A" selected="">健身房A</option>
                            <option value="健身房B">健身房B</option>
                            <option value="健身房C">健身房C</option>
                            <option value="健身房D">健身房D</option>
                            <option value="健身房E">健身房E</option>
                        </select>
                    </div>
                </div>
                
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-checkbox" >付款方式</label >
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <select id="payment_method" class="form-select" name="payment_method">
                            <option value="現金" selected="">現金</option>
                            <option value="信用卡">信用卡</option>
                        </select>
                    </div>
                </div>
                
            </div>
          </div>
   
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="basic-default-checkbox" >訂單狀態</label >
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <select id="status" class="form-select" name="status">
                            <option value="已完成" selected="">已完成</option>
                            <option value="已取消">已取消</option>
                            <option value="待處理">待處理</option>
                        </select>
                    </div>
                </div>
                
            </div>
          </div>
          <div class="mt-6 text-end">
            <button type="submit" class="btn btn-primary me-3">新增</button>
            <button type="reset" class="btn btn-outline-secondary">重設</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  

<?php include __DIR__ . '/includes/html-content wrapper-end.php'; ?>
<!-- modal success -->
<div class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true" id="success-modal">
    <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel2">新增結果</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!-- alert -->
            <div class="alert alert-primary" role="alert">
            成功!
            </div>
        </div>
        <div class="modal-footer">
          <a href="./order.php" class="nav-link">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> 
            <i class="fa-solid fa-door-open me-4"></i>回到列表</a>
            </button>
        </div>
    </div>
    </div>
</div>

<script>
    
    
    const sendData = e=>{
        e.preventDefault(); //不要讓表單以傳統方式送出
        document.querySelector('#order_idError').innerHTML = '';
        document.querySelector('#total_amount_error').innerHTML = '';
        
        
        //資料欄位的檢查
        let isPass = true; 

        const order_id = document.querySelector('#basic-default-order_id');
        const member_id = document.querySelector('#basic-default-member_id');
        const total_amount = document.querySelector('#basic-default-total_amount');
    if (!order_id.value || order_id.value <= 0) {
        isPass = false;
        document.querySelector('#order_idError').innerHTML = '必填';
        order_id.classList.add('is-invalid');
    } else {
        order_id.classList.remove('is-invalid');
    }

    if (!member_id.value || member_id.value <= 0) {
        isPass = false;
        member_id.classList.add('is-invalid');
    } else {
        member_id.classList.remove('is-invalid');
    }
    if (!total_amount.value || total_amount.value <= 0) {
        isPass = false;
        document.querySelector('#total_amount_error').innerHTML = '必填';
        total_amount.classList.add('is-invalid');
    } else {
        total_amount.classList.remove('is-invalid');
    }
        
    
    if (isPass) {
          const fd = new FormData(document.forms[0]); //會拿到所有表單,這個頁面只有1個表單(索引值0),然後用 fetch 來發送
          const myModal = new bootstrap.Modal('#success-modal')
          //fetch 發送, 第2個物件設定{},裡面要設定方法
          fetch(`order-add-api.php`, {
            method: 'POST', //'POST'是用http的方法來送
            body: fd       //資料塞在body裡面
            }).then(r => r.json())  //respond以後,要把回來的資料看成json
            .then(obj => {          //第2個 then,才會拿到真正的資料
            console.log(obj);
            if (!obj.success && obj.error) {
                alert(obj.error)
            }
            if (obj.success) {
                myModal.show()
            }
            }).catch(console.warn);
        
    }
  };
</script>
<?php include __DIR__ . '/includes/html-script.php'; ?>
<?php include __DIR__ . '/includes/html-footer.php'; ?>
