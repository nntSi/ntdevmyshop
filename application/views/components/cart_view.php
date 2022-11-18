<?php
$ordernum = 0;
foreach ($this->cart->contents() as $items) {
    $ordernum++;
}
?>
<div class="pt-4">
    <p class="h4 mb-4 hft">เลือกสินค้า</p>
    <div class="d-flex align-items-center">
        <div class="input-group mb-0 w-25 mb-0">
            <input type="text" class="form-control" placeholder="product name, product type" aria-label="Recipient's username" aria-describedby="basic-addon2" id="inputSearch">
            <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
        </div>
        <div class="ms-3">
            <a class="d-flex align-items-center text-decoration-none p-1 rounded border" href="<?php echo site_url('Order') ?>">
                <i class="fs-5 bi bi-basket text-dark me-2"></i>
                <div class="ps-2 pe-2 bg-danger rounded-4">
                    <p class="mb-0 text-light"><?php echo $ordernum ?></p>
                </div>
            </a>
        </div>
    </div>
    <div class="pt-4 pb-4" id="boxmain" style="border-radius: 5px; overflow: hidden;">
        <div style="width:1200px;">
            <div style="clear:both; margin:0; padding:0; height:0px;" id="prdtable"></div>
            <?PHP foreach ($queryAllproduct as $qap) { ?>
                <div class="card" style="list-style:none; width: 13rem; height: 22rem; float:left; margin:9px;">
                    <img src="<?php echo base_url('img/products_img/'); ?>/<?php echo $qap->img_0 ?>" class="card-img-top" style="height: 200px;">
                    <div class="card-body">
                        <p class="mb-0" style="font-size: 12px;"><?php echo $qap->p_name ?></p>
                        <p class="mb-0" style="font-size: 14px;"><i class="bi bi-box-seam"></i> <?php echo $qap->p_stock ?></p>
                    </div>
                    <div class="d-flex pb-2 ms-3 pe-3 mt-auto align-items-center">
                        <p class="text-danger mb-0">฿<?php echo $qap->p_price ?></p>
                        <button type="button" class="btn btn-outline-dark btn-sm ms-auto cartbtn" data-bs-toggle="modal" data-bs-target="#addcartmodal" id="<?php echo $qap->p_code; ?>"><i class="bi bi-cart2"></i></button>
                    </div>
                </div>
            <?PHP } ?>
            <div style="clear:both; margin:0; padding:0;"></div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addcartmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <form action="<?php echo site_url('Cart/addingTocart') ?>" method="post">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มสินค้าลงตะกร้า</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                    <div style="width: 40%">
                        <img id="imgproduct" src="">
                    </div>
                    <div class="ms-3" style="width: 60%">
                        <div class="d-flex mb-2">
                            <p class="mb-0" id="p_name"></p>
                        </div>
                        <div class="p-2 mb-1" style="background-color: #F0F0F0	;">
                            <h5 class="text-danger mb-0" id="p_price"></h5>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <p class="mb-0 fw-bold me-2">จำนวน</p>
                            <input type="number" name="qrt" id="qrt" class="form-control" placeholder="ระบุจำนวน" required>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <i class="bi bi-box-seam me-2"></i>
                            <p class="mb-0" id="p_stock"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="p_code" id="p_code">
                    <input type="hidden" name="p_cost" id="p_cost">
                    <input type="hidden" name="p_price_modal" id="p_price_modal">
                    <input type="hidden" name="img_0" id="img_0">
                    <input type="hidden" name="p_name_modal" id="p_name_modal">
                    <input type="hidden" name="p_total_price" id="p_total_price">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script -->
<script>
    $(".cartbtn").click(function() {
        var id = $(this).attr("id");
        console.log();
        $.ajax({
            url: "<?php echo site_url('Cart/getProductByCode'); ?>",
            method: 'post',
            dataType: "json",
            data: {
                'p_code': id,
            },
            success: function(data) {
                    let totalprice = data[0].p_price * $("#qrt").val();
                    console.log('success');
                    /* img */
                    let img = document.getElementById("imgproduct");
                    img.setAttribute("src", "<?php echo base_url('img/products_img/') ?>" + data[0].img_0);
                    img.setAttribute("style", "width: 100%; border-radius: 5px;");
                    img.setAttribute("class", "shadow-sm");
                    /* product name */
                    $("#p_name").text(data[0].p_name);
                    $("#p_price").text("฿" + data[0].p_price);
                    $("#p_stock").text(data[0].p_stock);
                    /* value */
                    $("#p_code").val(data[0].p_code);
                    $("#p_cost").val(data[0].p_cost);
                    console.log(data[0].p_price);
                    $("#p_price_modal").val(data[0].p_price);
                    $("#img_0").val(data[0].img_0);
                    $("#p_name_modal").val(data[0].p_name);
                    $("#p_total_price").val(totalprice);    
            }
        });
        /* document.getElementById("demo").innerHTML = text; */
    });
</script>