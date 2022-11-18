<form action="<?php echo site_url('Stock/addProduct') ;?>" method="post" enctype="multipart/form-data">
    <div class="d-flex mt-4 mb-4">
        <p class="h4 hft">เพิ่มสินค้าใหม่</p>
    </div>
    <div class="mt-4 p-4 shadow-sm" style="background-color: #fff; border-radius: 10px;">
        <div class="d-flex align-items-center">
            <p class="h4 hft">ภาพสินค้า</p>
            <a type="button" class="ms-auto addimage">+ อัปโหลดภาพสินค้า</a>
        </div>
        <div class="pt-3 pb-3 mt-3 dotborder d-flex flex-column align-items-center">
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
            <label for="quiiEditor" class="form-label mb-1 fb d-flex">รายละเอียดสินค้า<p
                        class="mb-0 text-danger">*</p></label>
            <div id="editor" style="height: 200px;"></div>
            <input type="hidden" name="p_des" id="desinput">
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
        <a href="" class="btn btn-outline-secondary" style="width: 100px; font-family: 'kanit', sans-serif;" >ยกเลิก</a>
    </div>

    <!-- <button type="submit">SAVE</button> -->
</form>

<!-- Quill -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    var form = document.querySelector("form");
    var desinput = document.querySelector('#desinput');

    form.addEventListener('submit', function(e) {
        desinput.value = quill.root.innerHTML;
    });
</script>

<script>
let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let divShowimg = document.getElementById("divShowimg");
let imgnoimg = document.getElementById("imgnoimg");
let textnoproduct = document.getElementById("textnoproduct");
let descriptionupload = document.getElementById("descriptionupload");

function preview() {
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

</script>