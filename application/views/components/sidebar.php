<div class="container-fluid p-0" style="margin-top: 52px;">
    <div class="d-flex p-0">
        <div class="bg-dark shadow" style="width: 200px;">
            <div class="d-flex flex-column align-items-start pt-4 min-vh-100 sidemenubar" style="margin-left: 30px;">
                <div class="sidebar">
                    <?php $goto = array("จัดการสต็อก" => "Stock", "เบิกสินค้า" => "Cart", "การอนุมัติ" => "Approve", "ข้อมูลลูกค้า" => "Customer");
                    foreach ($sidebarmenuQuery as $sbQ) { ?>
                        <?php $pst = explode(",", $sbQ->menu_privi);
                        for ($i = 0; $i < count($pst); $i++) {
                            if ($pst[$i] == $this->session->userdata('position')) { ?>
                                <a style="font-family: 'kanit', sans-serif;" href="<?php echo site_url($goto[$sbQ->sbm_name]); ?>" class="mb-4"><i class="<?php echo $sbQ->sbm_icon; ?>" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo $sbQ->sbm_name; ?></a>
                            <?php } ?>
                        <?php } ?>
                    <?php }; ?>
                </div>
            </div>
        </div>
        <div class="col" style="margin-left: 5rem; margin-right: 5rem; margin-top: 2rem;">