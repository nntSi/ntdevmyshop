<form action="Order/addWithdrawLog" method="post">
    <div class="shadow-sm pb-0 pt-3" style="background-color: #fff; border-radius: 10px;">
        <div class="d-flex align-items-center ps-3 pe-3 pb-3 border-bottom">
            <i class="bi bi-shop me-2"></i>
            <p class="mb-0 me-4">
                Helena Thailand
            </p>
        </div>
        <table class="table" style="width: 100%;">
            <thead>
                <tr class="bg-light">
                    <th style="width: 8%;" scope="col">
                        <p class="ms-4 mb-0">รายการ</p>
                    </th>
                    <th style="width: 20%;" scope="col"></th>
                    <th style="width: 10%;" scope="col">
                        <p class="mb-0">รหัสสินค้า</p>
                    </th>
                    <th style="width: 10%;" scope="col">
                        <p class="mb-0">จำนวน</p>
                    </th>
                    <th scope="col" style="width: 10%;">
                        <p class="mb-0">ราคาต้นทุน</p>
                    </th>
                    <th scope="col" style="width: 10%;">
                        <p class="mb-0">ราคาขาย</p>
                    </th>
                </tr>
            </thead>
            <?php $order = 0;
            foreach ($this->cart->contents() as $items) {
                $order++; 
                if ($items['p_name'] != ''){ ?>
                <tbody>
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input me-3" type="checkbox" value="" id="ch">
                                <img class="shadow-sm" style="border-radius: 5px; height: 80px;" src="<?php echo base_url('img/products_img'); ?>/<?php echo $items['img_0'] ?>">
                            </div>
                        </th>
                        <td>
                            <?php echo $items['p_name'] ?>
                            <input type="hidden" name="<?php echo "p".$order ?>" value="<?php echo $items['p_name'] ?>">
                        </td>
                        <td>
                            <p class="mb-0"><?php echo $items['id'] ?></p>
                        </td>
                        <td>
                            <div class="input-group input-group-sm" style="width: 70%;">
                                <input type="number" class="form-control" value="<?php echo $items['qty'] ?>">
                            </div>
                        </td>
                        <td>฿<?php echo $items['p_cost'] * $items['qty'] ?></td>
                        <td>
                            ฿<?php echo $items['price'] * $items['qty'] ?>
                        </td>
                    </tr>
                </tbody>
            <?php } } ?>
        </table>
    </div>

    <div class="p-4 shadow-sm" style="background-color: #fff; border-radius: 10px;">
        <div class="d-flex align-items-center mb-3">
            <p class="mb-0 me-3"><b>ผู้ทำรายการ</b> : <?php echo $this->session->userdata('fullname') ?></p>
            <input type="hidden" name="moderator" value="<?php echo $this->session->userdata('fullname') ?>">
            <p class="mb-0 me-2"><b>ได้ให้ผู้เบิกสินค้า :</b></p>
            <div class="input-group input-group-sm me-2" style="width: 20%;">
                <input type="text" name="picker" class="form-control" placeholder="ชื่อผู้เบิกสินค้า">
            </div>
            <p class="mb-0 me-2"><b>เลือกสินค้า :</b></p>
            <select class="form-select form-select-sm me-3" style="width: 9%;" name="origin" aria-label=".form-select-sm example">
                <option selected>
                    <p class="mb-0">คลังสินค้า</p>
                </option>
                <option value="p_stock_main">
                    <p class="mb-0">Main stock</p>
                </option>
            </select>
        </div>
        <div class="d-flex align-items-center mb-3">
            <p class="mb-0 me-2"><b>ไปใช้เนื่องจาก :</b></p>
            <div class="input-group input-group-sm" style="width: 55%;">
                <input type="text" name="reason" class="form-control" placeholder="เหตุผล">
            </div>
        </div>
        <div class="d-flex align-items-center mb-3">
            <?php if(!empty($this->session->userdata('cart_contents'))){ ;?>
                <p class="mb-0 me-3"><b>รวมทั้งหมด</b> : <?php echo $this->session->userdata('cart_contents')['total_items'] ?> รายการ</p>
                <input type="hidden" name="total_qty" value="<?php echo $this->session->userdata('cart_contents')['total_items'] ?>">
                <p class="mb-0 me-2"><b>เป็นจำนวนเงินทั้งสิ้น : </b><?php echo number_format($this->session->userdata('cart_contents')['cart_total'], 2) ?> บาท</p>
                <input type="hidden" name="total_price" value="<?php echo $this->session->userdata('cart_contents')['cart_total'] ?>">
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-outline-success">ยืนยันการทำรายการ</button>
    </div>
</form>