<div class="p-4">
     <p class="h4 mb-4 hft">ลูกค้าของฉัน</p>
     <div class="d-flex align-items-center">
          <div class="input-group mb-0 w-25">
               <input type="text" class="form-control" placeholder="product name, product type" aria-label="Recipient's username" aria-describedby="basic-addon2" id="inputSearch">
               <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
          </div>
          <a type="button" id="btnaddCstm" onclick="ShowaddCustomer()" class="btn btn-primary ms-auto">+ เพิ่มลูกค้า</a>
     </div>
     <table class="table table-hover border shadow-sm mt-4" style="width: 100%;" id="table">
          <thead>
               <tr>
                    <th style="width: 12%;">รหัสลูกค้า</th>
                    <th style="width: 30%;">Fullname</th>
                    <th style="width: 10%;">Tel</th>
                    <th style="width: 10%;">Job</th>
                    <th style="width: 25%;">Location</th>
                    <th style="width: 8%;"></th>
               </tr>
          </thead>
          <tbody id="prdtable">
               <?php $i = 0;
               foreach ($CustomerQuery as $cstmQ) {
                    $i++; ?>
                    <?php if($cstmQ->agent == $this->session->userdata('fullname')){ ?>
                         <tr>
                              <td><?php echo $cstmQ->customer_id; ?></td>
                              <td>
                                   <div class="d-flex align-items-center">
                                        <p class="mb-0 text-primary fw-bold"><?php echo $cstmQ->fullname ?></p>
                                   </div>
                              </td>
                              <td><?php echo $cstmQ->telephone_number ?></td>
                              <td><?php echo $cstmQ->job ?></td>
                              <td><?php echo $cstmQ->location ?></td>
                              <td>
                                   <!-- <a type="button" class="editdata01 text-dark" name="p_name" value="edit" id="<?php echo $cstmQ->fullname; ?>"><i class="bi bi-pencil-square"></i></a>
                              <a type="button" class="delete ms-4 text-danger" value="delete" id="<?php echo $cstmQ->fullname; ?>"><i class="bi bi-x-circle"></i></a> -->
                              </td>
                         </tr>
                    <?php } ?>
               <?php } ?>
          </tbody>
     </table>
     <div id="addCustomerView">
          <form action="<?php echo site_url('Customer/addNewCustomer') ?>" method="POST">
               <div class="p-3 shadow-sm mt-4" style="border-radius: 10px; background-color: #fff;">
                    <p class="h4 mb-4 hft border-bottom pb-3">เพิ่มข้อมูลลูกค้า</p>
                    <div class="d-flex" style="width: 100%;">
                         <p class="mb-0" style="width: 8%;"><b>ชื่อ-นามสกุล : </b></p>
                         <div class="input-group input-group-sm" style="width: 42%;">
                              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="ชื่อและนามสกุล" required>
                         </div>
                         <p class="ms-3 mb-0" style="width: 8%;"><b>เบอร์ติดต่อ : </b></p>
                         <div class="input-group input-group-sm" style="width: 42%;">
                              <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="08x-xxx-xxxx" required>
                         </div>
                    </div>
                    <div class="d-flex mt-2" style="width: 100%;">
                         <p class="mb-0" style="width: 16%;"><b>อาชีพ : </b></p>
                         <div class="input-group input-group-sm" style="width: 42%;">
                              <input type="text" class="form-control" id="job" name="job" placeholder="อาชีพของลูกค้า">
                         </div>
                         <p class="ms-3 mb-0" style="width: 8%;"><b>อายุ : </b></p>
                         <div class="input-group input-group-sm" style="width: 20%;">
                              <input type="number" class="form-control" id="age" name="age" placeholder="อายุ">
                         </div>
                         <p class="ms-3 mb-0" style="width: 8%;"><b>สถานะ : </b></p>
                         <select class="form-select form-select-sm" name="status" aria-label="Default select example">
                              <option selected>สถานะ</option>
                              <option value="ติดต่อได้">ติดต่อได้</option>
                              <option value="ติดต่อไม่ได้">ติดต่อไม่ได้</option>
                         </select>
                    </div>
                    <div class="d-flex mt-2" style="width: 100%;">
                         <p class="mb-0" style="width: 8%;"><b>ที่อยู่ : </b></p>
                         <div class="input-group input-group-sm" style="width: 92%;">
                              <input type="text" class="form-control" id="location" name="location" placeholder="ที่อยู่" required>
                         </div>
                    </div>
                    <div class="d-flex mt-2" style="width: 100%;">
                         <p class="mb-0" style="width: 15%;"><b>แหล่งที่มาของรายชื่อ : </b></p>
                         <select class="form-select form-select-sm" name="source" aria-label="Default select example">
                              <option selected>แหล่งที่มาของรายชื่อ</option>
                              <option value="ออกบูธ 89 พลาซ่า">ออกบูธ 89 พลาซ่า</option>
                              <option value="ถนนคนเดินสันกำแพง">ถนนคนเดินสันกำแพง</option>
                              <option value="สำนักงานเทศบาลนครเชียงใหม่">สำนักงานเทศบาลนครเชียงใหม่</option>
                              <option value="กลุ่มเงินออม">กลุ่มเงินออม</option>
                         </select>
                    </div>
               </div>
               <button type="submit" class="btn btn-primary mt-2">บันทึก</button>
               <a id="cancleBtn" onclick="cancleBtn()" class="btn btn-secondary mt-2 ms-1">ยกเลิก</a>
          </form>
     </div>
</div>
<script>
    // find id
    let table = document.getElementById("table");
    let addCustomerView = document.getElementById("addCustomerView");
    addCustomerView.style.display = 'none';

    function ShowaddCustomer() {
        // display
        table.style.display = 'none';
        addCustomerView.style.display = 'block';
    }

    function cancleBtn() {
        // display
        table.style.display = 'block';
        addCustomerView.style.display = 'none';
    }
</script>