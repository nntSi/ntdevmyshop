<?php
    $notapnum = 0;
    foreach ($NotAPQuery as $ntapq){
        $notapnum++;
    }
?>

<div class="d-flex mt-4 mb-4" id="dvt">
    <p class="h4 hft" id="h4">การอนุมัติ</p>
    <!-- <a type="button" id="btnadp" href="<?php echo site_url('Stock/addstock_view'); ?>" class="btn btn-primary ms-auto">+
        เพิ่มสินค้า</a> -->
</div>
<div class="d-flex align-items-center" id="search">
    <div class="input-group mb-0 w-25">
        <input type="text" class="form-control" placeholder="product name, product type" aria-label="Recipient's username" aria-describedby="basic-addon2" id="inputSearch">
        <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
    </div>
    <button type="button" class="btn btn-outline-dark ms-3" id="btnfilter"><i class="bi bi-sliders me-2"></i>filter</button>
    <p class="ms-auto mb-0" id="shownumpage">⟵ 1 ⟶</p>
</div>
<div class="mt-4 shadow-sm border d-flex align-items-center" style="width: 100%; border-radius: 10px 10px 0px 0px; background-color: #E8E8E8; overflow: hidden;">
    <div class="p-2 d-flex justify-content-center border-end statusAPH                                                                                  " style="width: 20%; background-color: <?php if ($this->session->userdata('table_session') == 'notapproveyet') {echo '#D3D3D3';} ?>;">
        <a class="text-decoration-none sarabun text-dark" href="<?php echo site_url('Approve/setsessionTable/notapproveyet'); ?>">ยังไม่ได้รับการอนุมัติ</a>
        <p class="ms-2 mb-0 text-light bg-danger ps-2 shadow-sm pe-2 rounded"><?php echo $notapnum ?></p>
    </div>
    <div class="p-2 d-flex justify-content-center border-end statusAPHover" style="width: 20%; background-color: <?php if ($this->session->userdata('table_session') == 'approve') {echo '#D3D3D3';} ?>;">
        <a class="text-decoration-none sarabun text-dark" href="<?php echo site_url('Approve/setsessionTable/approve'); ?>">ได้รับการอนุมัติแล้ว</a>
    </div>
    <div class="p-2 d-flex justify-content-center border-end statusAPHover" style="width: 20%; background-color: <?php if ($this->session->userdata('table_session') == 'notapprove') {echo '#D3D3D3';} ?>;">
        <a class="text-decoration-none sarabun text-dark" href="<?php echo site_url('Approve/setsessionTable/notapprove'); ?>">ไม่อนุมัติ</a>
    </div>
</div>
<table class="table table-hover border shadow-sm" style="width: 100%; border-radius: 0px 0px 10px 10px" id="table">
    <thead>
        <tr>
            <th style="width: 15%;">หมายเลขอ้างอิง</th>
            <th style="width: 15%;">ผู้เบิกสินค้า</th>
            <th style="width: 15%;">จากคลัง</th>
            <th style="width: 15%;">จำนวน</th>
            <th style="width: 15%;">ราคารวม (บาท)</th>
            <th style="width: 10%;">status</th>
        </tr>
    </thead>
    <tbody id="prdtable">
        <?php $stockname = array("p_stock_main" => "คลังกลาง");
        $state = array("notapproveyet" => "ยังไม่ได้รับการอนุมัติ", "approve" => "ได้รับการอนุมัติแล้ว", "notapprove" => "ไม่อนุมัติ");
        $notapproveNum = 0;
        foreach ($WithdrawLogQuery as $getLQ) { if( $state[$this->session->userdata('table_session')] == $getLQ->status){ $notapproveNum++; ?>
            <tr>
                <td class="text-primary"><a class="text-decoration-none" href=""><?php echo $getLQ->code_report; ?></a></td>
                <td><?php echo $getLQ->picker; ?></td>
                <td><?php echo $stockname[$getLQ->origin]; ?></td>
                <td><?php echo $getLQ->total_qty; ?></td>
                <td>฿<?php echo number_format($getLQ->total_price, 2); ?></td>
                <td>
                    <?php if($this->session->userdata('table_session') == 'notapproveyet'){ ?>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $getLQ->status; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo site_url('Approve/changestatus/'.'ได้รับการอนุมัติแล้ว_'.$getLQ->code_report) ?>">อนุมัติ</a></li>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo site_url('Approve/changestatus/'.'ไม่อนุมัติ_'.$getLQ->code_report) ?>">ไม่อนุมัติ</a></li>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </td>
            </tr>
        <?php } } ?>
    </tbody>
</table>
<!-- Add product view -->
<div id="Add_product"></div>
<div id="editView"></div>
<!-- <button id="btnHide">Hide Table</button> -->

<script>
    $(document).ready(function() {
        /* Search table */
        $("#inputSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#prdtable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>