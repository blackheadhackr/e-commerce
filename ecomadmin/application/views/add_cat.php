<!DOCTYPE html>
<html dir="ltr" lang="en">
<?= include 'common/onlycss.php'?>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?= include 'common/new.php'?>
        <div class="page-wrapper">
            <div class="row">
                <!-- <div class="col-12">
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle mx-2" ></i> 
                        <div>
                            <strong>Remember</strong> your img should be 5 and img size is not more than 500kb
                        </div>
                    </div>
                    
                </div> -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title">Add product category</h4>
                            </div>
                            <?=$this->session->flashdata('msg');?>
                            <div class="table-responsive">
                                <form action="<?=base_url('homepage/catg_add')?>" method="POST">
                                    <div class="mb-3">
                                        <label for="ProductTitle" class="form-label">Product category</label>
                                        <input type="text" name="catg" class="form-control" id="ProductTitle"
                                            placeholder="charger , cable , powerbank , etc..... ">
                                        <div class="text-danger"><?php echo form_error('catg'); ?> </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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