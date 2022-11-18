<div class="d-flex mt-4 mb-4" id="dvt">
    <p class="h4 hft" id="h4">รายการสินค้า</p>
    <!-- <a type="button" id="btnadp" href="<?php echo site_url('Stock/addstock_view'); ?>" class="btn btn-primary ms-auto">+
        เพิ่มสินค้า</a> -->
    <a type="button" id="btnadp" class="btn btn-primary ms-auto">
        <p class="mb-0 text-light">+ เพิ่มสินค้าใหม่</p>
    </a>
</div>
<div class="d-flex align-items-center" id="search">
    <div class="input-group mb-0 w-25">
        <input type="text" class="form-control" placeholder="product name, product type" aria-label="Recipient's username" aria-describedby="basic-addon2" id="inputSearch">
        <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
    </div>
    <div class="dropdown ms-3">
        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            คลังสินค้า
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo site_url('Stock/setsessionStock/main') ?>">Main</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('Stock/setsessionStock/line') ?>">Line</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('Stock/setsessionStock/telesale') ?>">Telesale</a></li>
        </ul>
    </div>
    <!-- <div class="dropdown ms-3">
        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            คลังสินค้า
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo site_url('Stock/setsessionStock/main') ?>">Main</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('Stock/setsessionStock/line') ?>">Line</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url('Stock/setsessionStock/telesale') ?>">Telesale</a></li>
        </ul>
    </div> -->
    <!-- <button type="button" class="btn btn-outline-dark ms-3" id="btnfilter"><i class="bi bi-sliders me-2"></i>filter</button> -->
    <button type="button" class="btn btn-warning ms-3" id="btnfilter"><i class="bi bi-arrow-left-right me-2"></i>Tranfer stock</button>
    <!-- <button type="button" class="btn btn-info ms-3" data-bs-toggle="modal" data-bs-target="#IncomeModal">
        <p class="mb-0">การนำเข้า</p>
    </button> -->
    <p class="ms-auto mb-0" id="shownumpage">⟵ 1 ⟶</p>
</div>
<table class="table table-hover border shadow-sm mt-4" style="width: 100%;" id="table">
    <thead>
        <tr>
            <th style="width: 32%;">Products name</th>
            <th style="width: 10%;">Stock</th>
            <th style="width: 10%;">Code</th>
            <th style="width: 15%;">Brand</th>
            <th style="width: 10%;">Cost price</th>
            <th style="width: 15%;">Price</th>
            <th style="width: 8%;"></th>
        </tr>
    </thead>
    <tbody id="prdtable">
        <?php foreach ($queryAllproduct as $getAP) { ?>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="<?php echo base_url('img/products_img'); ?>/<?php echo $getAP->img_0; ?>" alt="" width="30px" height="30px" style="border-radius: 5px;">
                        <p class="ms-2 mb-0 text-primary fw-bold"><?php echo $getAP->p_name; ?></p>
                    </div>
                </td>
                <td>
                    <?php if ($this->session->userdata('StockTableName') == 'main') {
                        echo $getAP->p_stock;
                    }
                    if ($this->session->userdata('StockTableName') == 'line') {
                        echo $getAP->p_stock_line;
                    }
                    if ($this->session->userdata('StockTableName') == 'telesale'){
                        echo $getAP->p_stock_telesale;
                    }else{
                        
                    }?>
                </td>
                <td><?php echo $getAP->p_code; ?></td>
                <td><?php echo $getAP->p_brand; ?></td>
                <td>฿<?php echo $getAP->p_cost; ?></td>
                <td>฿<?php echo $getAP->p_price; ?></td>
                <td>
                    <a type="button" class="editdata01 text-secondary" name="p_name" value="edit" id="<?php echo $getAP->p_name; ?>"><i class="bi bi-pencil-square"></i></a>
                    <a onclick="showAddStockModal(this.id)" data-bs-toggle="modal" data-bs-target="#IncomeModal" type="button" class="ms-3 addstock01 text-success" name="add" value="add" id="<?php echo $getAP->p_code; ?>"><i class="bi bi-plus-circle"></i></a>
                    <a type="button" class="delete ms-3 text-danger" value="delete" id="<?php echo $getAP->p_name; ?>"><i class="bi bi-x-circle"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- Add product view -->
<div id="Add_product"></div>
<div id="editView"></div>
<!-- <button id="btnHide">Hide Table</button> -->

<!-- Modal for addStock -->
<div class="modal fade" id="IncomeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?php echo site_url('Stock/increaseStock'); ?>" method="post">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">การนำเข้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body d-flex">
                        <div style="width: 30%">
                            <img id="imgproductAdd" class="shadow-sm" src="" style="height: 200px; width: 200px; border-radius: 10px;">
                        </div>
                        <div style="width: 60%">
                            <p class="ms-0 mb-0" id="ProductNameModal"></p>
                            <div class="d-flex mt-2 mb-2">
                                <p class="mb-0"><b>รหัสสินค้า : </b></p>
                                <p class="ms-1 mb-0" id="ProductCodeModal"></p>
                                <input type="hidden" id="ProductCodeModalHidden" name="ProductCode">
                            </div>
                            <div class="mt-2 d-flex">
                                <p class="mb-0 me-1" style="width: 23%"><b>นำเข้าจาก :</b></p>
                                <div class="input-group input-group-sm mb-0">
                                    <input class="form-control" type="text" name="origin" id="origin" placeholder="แหล่งที่นำเข้า" required>
                                </div>
                            </div>
                            <div class="mt-2 d-flex">
                                <p class="mb-0 me-1" style="width: 23%"><b>จำนวน :</b></p>
                                <div class="input-group input-group-sm mb-0">
                                    <input class="form-control" type="number" name="qtyModal" id="qtyModal" placeholder="จำนวน" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Add modal script -->
<script>
    let addStock01 = document.getElementsByClassName("addstock01");
    let ProductNameModal = document.getElementById("ProductNameModal");
    let imgproductAdd = document.getElementById("imgproductAdd");
    let ProductCodeModal = document.getElementById("ProductCodeModal");
    let ProductCodeModalHidden = document.getElementById("ProductCodeModalHidden");

    function showAddStockModal(show_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Stock/getProductbyCode'); ?>",
            data: {
                'p_code': show_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data[0].p_name);
                ProductNameModal.innerHTML = data[0].p_name;
                ProductCodeModal.innerHTML = data[0].p_code;
                ProductCodeModalHidden.value = data[0].p_code;
                imgproductAdd.setAttribute("src", "<?php echo base_url('img/products_img/') ?>" + data[0].img_0)
            },
        });
    }
</script>

<script>
    let html = `<form id="formAction" action="<?php echo site_url('Stock/addProduct'); ?>" method="post" enctype="multipart/form-data">
    <div class="d-flex mt-4 mb-4">
        <input type="hidden" name="p_id" id="p_id" value="">
        <p class="h4 hft">เพิ่มสินค้าใหม่</p>
    </div>
    <div class="mt-4 p-4 shadow-sm" style="background-color: #fff; border-radius: 10px;">
        <div class="d-flex align-items-center">
            <p class="h4 hft">ภาพสินค้า</p>
            <a type="button" class="ms-auto addimage">+ อัปโหลดภาพสินค้า</a>
        </div>
        <div id="image-block" class="pt-3 pb-3 mt-3 dotborder d-flex flex-column align-items-center">
            <div class="d-flex flex-column align-items-center" id="divShowimg">
                <img src="https://cdn-icons-png.flaticon.com/512/2912/2912799.png" alt=""
                    style="opacity: 50%; height: 150px;" id="imgnoimg">
                <p class="mb-0 mt-4 text-dark " id="textnoproduct">ยังไม่มีภาพสินค้า</p>
                <p class="mb-4 mt-3 text-center secondtextfirst" id="descriptionupload">รองรับสัดส่วนภาพ 1:1 เท่านั้น
                    (สี่เหลี่ยมจตุรัส)
                    <br>ขนาดรูปแนะนำคือ 900 x 900 พิกเซล<br>ขนาดไฟล์สูงสุด 5 MB<br>การอัพโหลดสูงสุด 5 ไฟล์
                </p>
                <div id="images" class="d-flex mb-0 ms-0"></div>
            </div>
            <input id="file-input" style="width: 300px;" onchange="preview()" type="file" name="files[]" href=""
                class="form-control" accept="image/*" multiple=""></input>
        </div>
        <p class="mt-3 secondtextfirst">
            · รองรับสัดส่วนภาพ 1:1 เท่านั้น (สี่เหลี่ยมจตุรัส)<br>
            · ขนาดรูปแนะนำคือ 900 x 900 พิกเซล<br>
            · ขนาดไฟล์สูงสุด 5 MB<br>
            · การอัพโหลดสูงสุด 5 ไฟล์<br>
        </p>
    </div>
    <div class="mt-4 p-4 shadow-sm" style="background-color: #fff; border-radius: 10px;">
        <p class="h4 hft mb-3">รายละเอียดสินค้า</p>
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label mb-0 fb d-flex">ชื่อสินค้า<p
                    class="mb-0 text-danger">*</p>
                <p class="ms-auto" style="font-size: 12px;">(2-100 ตัวอักษร)</p>
            </label>
            <input type="text" id="p_name" name="p_name" class="form-control inputfnt" placeholder="กรุณาระบุชื่อสินค้า" required>
        </div>
        <div class="mb-3 mt-3 d-flex" style="width: 100%;">
            <div style="width: 50%;">
                <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">หมวดหมู่สินค้า<p
                        class="mb-0 text-danger">*</p></label>
                <input type="text" id="p_type" name="p_type" class="form-control inputfnt" placeholder="กรุณาระบุหมวดหมู่สินค้า" required>
            </div>
            <div class="ms-3" style="width: 50%;">
                <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">แบรนด์ / ยี่ห้อ<p
                        class="mb-0 text-danger">*</p></label>
                <input type="text" name="p_brand" id="p_brand" class="form-control inputfnt" placeholder="กรุณาระบุแบรนด์ / ยี่ห้อ" required>
            </div>
        </div>
        <!-- Quill -->
        <div>
            <label for="quiiEditor" class="form-label mb-1 fb d-flex">รายละเอียดสินค้า</label>
            <div id="editor" style="height: 200px;"></div>
        </div>

        <div class="mb-3 mt-3 d-flex" style="width: 100%;">
            <div style="width: 50%;">
                <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">รหัสสินค้า<p
                        class="mb-0 text-danger">*</p></label>
                <input type="text" id="p_code" name="p_code" class="form-control inputfnt" placeholder="กรุณาระบุรหัสสินค้า" required>
            </div>
            <div class="ms-3" style="width: 50%;">
                <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">รหัสบาร์โค้ด</label>
                <input type="text" name="p_partno" id="p_partno" class="form-control inputfnt" placeholder="กรุณาระบุรหัสบาร์โค้ด">
            </div>
        </div>
    </div>
    <div class="d-flex mt-4" style="width: 100%;">
        <div class="shadow-sm p-4 me-4" style="width: 50%; border-radius: 10px; background-color: #fff;">
            <p class="h4 mb-2 hft">คลังสินค้า</p>
            <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">มีสินค้า<p class="mb-0 text-danger">*</p></label>
            <input type="number" id="p_stock" name="p_stock" class="form-control inputfnt" placeholder="กรุณาระบุจำนวนสินค้า" required>
            <p style="font-size: 12px;" class="mb-0 mt-3 secondtextfirst">* ตรวจสอบจำนวนสินค้าคงเหลือเสมอ เมื่อจำนวนสินค้าเป็น 0 ชิ้น ลูกค้าจะไม่สามารถสั่งสินค้าผ่านหน้า Storefront ได้ ร้านค้าจะสามารถสร้างรายการสั่งซื้อผ่าน Chat ได้เท่านั้น</p>
        </div>
        <div class="shadow-sm p-4" style="width: 50%; border-radius: 10px; background-color: #fff;">
        <p class="h4 mb-2 hft">น้ำหนัก</p>
            <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">น้ำหนัก<p class="mb-0 text-danger">*</p></label>
            <div class="input-group">
                <span class="input-group-text" style="font-family: sans-serif; opacity: 0.7;" id="kk">กก.</span>
                <input type="number" id="p_weight" name="p_weight" step="0.01" class="form-control inputfnt" aria-describedby="kk" placeholder="0.00" required>
            </div>
            <p style="font-size: 12px;" class="mb-0 mt-3 secondtextfirst">* น้ำหนักของสินค้าจะถูกใช้สำหรับคำนวณอัตราค่าส่งแบบ "ค่าจัดส่งตามน้ำหนัก” ในขั้นตอนตั้งค่าการจัดส่งสินค้า</p>
        </div>
    </div>
    <div class="d-flex mt-4" style="width: 100%;">
        <div class="shadow-sm p-4 me-4" style="width: 50%; border-radius: 10px; background-color: #fff;">
            <p class="h4 mb-2 hft">ราคาสินค้า</p>
            <div class="d-flex align-items-center" style="width: 100%;">
                <div style="width: 50%;">
                    <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">ราคาต้นทุน<p class="mb-0 text-danger">*</p></label>
                    <div class="input-group">
                        <span class="input-group-text" style="font-family: sans-serif; opacity: 0.7;" id="bath">฿</span>
                        <input type="number" id="p_cost" name="p_cost" step="0.01" class="form-control inputfnt" aria-describedby="bath" placeholder="0.00" required>
                    </div>
                </div>
                <div class="ms-3" style="width: 50%;">
                    <label for="exampleFormControlInput1" class="form-label mb-1 mt-0 fb d-flex">ราคาขาย<p class="mb-0 text-danger">*</p></label>
                    <div class="input-group">
                        <span class="input-group-text" style="font-family: sans-serif; opacity: 0.7;" id="bath">฿</span>
                        <input type="number" id="p_price" name="p_price" step="0.01" class="form-control inputfnt" aria-describedby="bath" placeholder="0.00" required>
                    </div>
                </div>
            </div>
            <!-- <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">ราคาต้นทุน<p class="mb-0 text-danger">*</p></label>
            <div class="input-group">
                <span class="input-group-text" style="font-family: sans-serif; opacity: 0.7;" id="bath">฿</span>
                <input type="number" id="p_cost" name="p_cost" step="0.01" class="form-control inputfnt" aria-describedby="bath" placeholder="0.00" required>
            </div>
            <label for="exampleFormControlInput1" class="form-label mb-1 mt-2 fb d-flex">ราคาเต็ม<p class="mb-0 text-danger">*</p></label>
            <div class="input-group">
                <span class="input-group-text" style="font-family: sans-serif; opacity: 0.7;" id="bath">฿</span>
                <input type="number" id="p_price" name="p_price" step="0.01" class="form-control inputfnt" aria-describedby="bath" placeholder="0.00" required>
            </div> -->
        </div>
        <div class="shadow-sm p-4" style="width: 50%; border-radius: 10px; background-color: #fff;">
        <p class="h4 mb-2 hft">ส่วนลด</p>
            <label for="exampleFormControlInput1" class="form-label mb-1 fb d-flex">ส่วนลด</p></label>
            <div class="input-group">
                <span class="input-group-text" style="font-family: sans-serif; opacity: 0.7;" id="bath">฿</span>
                <input type="number" id="p_discount" step="0.01" name="p_discount" class="form-control inputfnt" aria-describedby="bath" placeholder="0.00">
            </div>
        </div>
    </div>
    <div class="d-flex mt-4 mb-5">
        <button class="btn btn-primary btntanpri me-3" type="submit"><p>บันทึก</p></button>
        <a class="btn btn-outline-secondary" id="cancelback" style="width: 100px; font-family: 'kanit', sans-serif;" >ยกเลิก</a>
    </div>
    <!-- <button type="submit">SAVE</button> -->
</form>`;


    var k = 0;
    $(document).ready(function() {
        $("#btnadp").click(function() {
            k += 1;
            if (k == 1) {
                $("#inputSearch").hide();
                $("#basic-addon2").hide();
                $("#table").hide();
                $("#h4").hide();
                $("#btnfilter").hide();
                $('#shownumpage').hide();
                $("#btnadp").hide();
                $("#Add_product").html(html);
                /* Quill */
                var quill = new Quill('#editor', {
                    theme: 'snow'
                });
                var form = document.querySelector("form");
                var desinput = document.querySelector('#desinput');
                form.addEventListener('submit', function(e) {
                    desinput.value = quill.root.innerHTML;
                });
            }
            if (k > 1) {
                $("#inputSearch").hide();
                $("#basic-addon2").hide();
                $("#table").hide();
                $("#h4").hide();
                $("#btnfilter").hide();
                $('#shownumpage').hide();
                $("#btnadp").hide();
                $("#Add_product").show();
            }

            $("#cancelback").click(function() {
                $("#inputSearch").show();
                $("#basic-addon2").show();
                $("#table").show();
                $("#h4").show();
                $("#btnfilter").show();
                $('#shownumpage').show();
                $("#btnadp").show();
                $("#Add_product").hide();
            });
        });
        /* Search table */
        $("#inputSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#prdtable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });





    });

    function preview() {

        let fileInput = document.getElementById("file-input");
        let imageContainer = document.getElementById("images");
        let divShowimg = document.getElementById("divShowimg");
        let imgnoimg = document.getElementById("imgnoimg");
        let textnoproduct = document.getElementById("textnoproduct");
        let descriptionupload = document.getElementById("descriptionupload");

        divShowimg.removeAttribute("class");
        divShowimg.setAttribute("class", "mt-1 d-flex");
        imgnoimg.remove();
        textnoproduct.remove();
        descriptionupload.remove();

        imageContainer.innerHTML = "";
        for (i of fileInput.files) {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            figure.setAttribute("class", "pb-0");
            let figCap = document.createElement("figcapion");
            figure.appendChild(figCap);
            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                img.setAttribute("style", "height: 200px; border-radius: 10px; margin-right: 10px;");
                img.setAttribute("class", "shadow-sm");
                figure.insertBefore(img, figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }
    var j = 0;
    $(".editdata01").click(function() {
        j++;
        var id = $(this).attr("id");
        $.ajax({
            url: "<?php echo site_url('Stock/editProductShowview'); ?>",
            method: 'post',
            dataType: "json",
            data: {
                'p_name': id
            },
            success: function(data) {
                console.log(j)
                $("#inputSearch").hide();
                $("#basic-addon2").hide();
                $("#table").hide();
                $("#h4").hide();
                $("#btnfilter").hide();
                $('#shownumpage').hide();
                $("#btnadp").hide();
                if (j == 1) {
                    $("#editView").html(html);
                    var quill = new Quill('#editor', {
                        theme: 'snow'
                    });
                    var form = document.querySelector("form");
                    var desinput = document.querySelector('#desinput');
                    form.addEventListener('submit', function(e) {
                        desinput.value = quill.root.innerHTML;
                    });
                }
                if (j > 1) {
                    $("#editView").show();
                }
                $("#p_name").val(data[0].p_name);
                $("#p_id").val(data[0].p_id);
                $("#p_stock").val(data[0].p_stock);
                $("#p_type").val(data[0].p_type);
                $("#p_brand").val(data[0].p_brand);
                $("#p_code").val(data[0].p_code);
                $("#p_partno").val(data[0].p_partno);
                $("#p_weight").val(data[0].p_weight);
                $("#p_price").val(data[0].p_price);
                $("#p_cost").val(data[0].p_cost);
                $("#p_discount").val(data[0].p_discount);
                $(document).ready(function() {
                    $("#cancelback").click(function() {
                        $("#inputSearch").show();
                        $("#basic-addon2").show();
                        $("#table").show();
                        $("#h4").show();
                        $("#btnfilter").show();
                        $('#shownumpage').show();
                        $("#btnadp").show();
                        $("#editView").hide();
                    });
                });
                let formAction = document.getElementById("formAction");
                formAction.removeAttribute("action");
                formAction.setAttribute("action", "<?php echo site_url('Stock/updateProduct'); ?>");
                let element = document.getElementById("image-block");
                while (element.firstChild) {
                    element.removeChild(element.firstChild);
                }
                const img_all = [data[0].img_0, data[0].img_1, data[0].img_2, data[0].img_3, data[0].img_4];
                console.log(img_all);

                let img_block = document.getElementById("image-block");
                let imgB = document.createElement("div");
                imgB.setAttribute("class", "d-flex");
                img_block.appendChild(imgB);

                for (let x in img_all) {
                    console.log(x);

                    img = img_all[x];
                    if (img != '' && img != "''") {
                        let linkImg = '<?php echo base_url('img/products_img/'); ?>' + img;
                        let img1 = document.createElement("img");
                        img1.setAttribute("src", linkImg);
                        img1.setAttribute("style", "height: 200px; border-radius: 10px; margin-right: 10px;");
                        img1.setAttribute("class", "shadow-sm me-3");
                        imgB.appendChild(img1);
                    }
                }
            }
        })
    });
    $(".delete").click(function() {
        let text = "ยืนยันการลบข้อมูล";
        var id = $(this).attr("id");
        if (confirm(text) == true) {
            text = "You pressed OK!";
            $.ajax({
                url: "<?php echo site_url('Stock/deleteProduct'); ?>",
                method: 'post',
                dataType: "json",
                data: {
                    'p_name': id,
                },
                success: function(data) {
                    console.log('success');
                }
            });
        } else {
            text = "You canceled!";
        }
        /* document.getElementById("demo").innerHTML = text; */
    });
    //add stock
</script>