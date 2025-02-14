<!DOCTYPE html>
<html dir="ltr" lang="en">


<?= include 'common/onlycss.php'?>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?= include 'common/new.php'?>
        <div class="page-wrapper">

            <div class="page-breadcrumb">

            </div>
            <div class="container">


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Add product</h4>
                                </div>
                                <?=$this->session->flashdata('msg');?>
                                <div class="table-responsive">
                                    <form action="<?=base_url('homepage/product_insert')?>" method="POST">
                                        <div class="mb-3">

                                            <label for="ProductTitle" class="form-label">Product Title</label>
                                            <input type="text" name="ProductTitle" class="form-control"
                                                id="ProductTitle"
                                                placeholder="ovdc-001 v8 datacable red color type USB / TC ">
                                            <div class="text-danger"><?php echo form_error('ProductTitle'); ?> </div>
                                        </div>
                                        <div class="mb-3">

                                            <label for="Mainprice" class="form-label">Main Price</label>
                                            <input type="number" name="Mainprice" class="form-control" id="Mainprice"
                                                placeholder="0123456789">
                                            <div class="text-danger"><?php echo form_error('Mainprice'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Discount" class="form-label">Discount</label>
                                            <input type="number" name="Discount" class="form-control" id="Discount"
                                                placeholder="% is not required">
                                            <div class="text-danger"><?php echo form_error('Discount'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Warranty" class="form-label">Warranty</label><br>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Warranty"
                                                    id="inlineRadio1" value="yes">
                                                <label class="form-check-label" for="inlineRadio1">Warrenty is
                                                    available</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Warranty"
                                                    id="inlineRadio2" value="no">
                                                <label class="form-check-label" for="inlineRadio2">Warrenty is not
                                                    available</label>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('Warranty'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Stockqty" class="form-label">Stock Quantity</label>
                                            <input type="number" name="Stockqty" class="form-control" id="Stockqty">
                                            <div class="text-danger"><?php echo form_error('Stockqty'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Bra_name" class="form-label">Brand name</label>
                                            <input type="text" name="Bra_name" class="form-control" id="Bra_name"
                                                placeholder="ovista">
                                            <div class="text-danger"><?php echo form_error('Bra_name'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Mod_name" class="form-label">Model name</label>
                                            <input type="text" name="Mod_name" class="form-control" id="Mod_name"
                                                placeholder="ovdc 001">
                                            <div class="text-danger"><?php echo form_error('Mod_name'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Color" class="form-label">Color</label>
                                            <input type="text" name="Color" class="form-control" id="Color">
                                            <div class="text-danger"><?php echo form_error('Color'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Warrantysum" class="form-label">Warranty Summary</label>
                                            <input type="text" name="Warrantysum" class="form-control" id="Warrantysum"
                                                placeholder="1 Year Warranty from the Date of Purchase">
                                            <div class="text-danger"><?php echo form_error('Warrantysum'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Warrantycov" class="form-label">Warranty Cover</label>
                                            <input type="text" name="Warrantycov" class="form-control" id="Warrantycov"
                                                placeholder="Manufacturing Defects">
                                            <div class="text-danger"><?php echo form_error('Warrantycov'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Warrantyna" class="form-label">Warranty not cover</label>
                                            <input type="text" name="Warrantyna" class="form-control" id="Warrantyna"
                                                placeholder="Physical Damage">
                                            <div class="text-danger"><?php echo form_error('Warrantyna'); ?> </div>
                                        </div>
                                        
                                        <div class="mb-3">

                                            <label for="type" class="form-label">Product type</label>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="type1">Options</label>
                                                <select class="form-select" id="type1" name="type">
                                                    <option selected="" value="">Choose your product type ...........
                                                    </option>
                                                    <?php foreach($data as $row){ ?>
                                                    <option value="<?=$row->catg_name ?>"><?=$row->catg_name ?></option>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="text-danger"><?php echo form_error('type'); ?> </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="discription" class="form-label">discription</label>
                                            <textarea class="form-control" id="discription" name="discription"
                                                rows="3"></textarea>
                                        </div>



                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php $this->load->view('common/footer') ?>

        </div>
    </div>
    <script>
    $('.ui.dropdown').dropdown();
    </script>

</body>

</html>