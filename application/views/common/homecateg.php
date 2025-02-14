<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <ul>
        <?php
            $this->db->select('*');
            $a = $this->db->get('catg')->result();

            foreach($a as $row){
                $pro_type = base64_encode($row->catg_name);
            ?>
            <li><a href="<?=base_url('Type/index/').$pro_type?>"><?=$row->catg_name?></a></li>
          <?php  }
        ?>
       
        
    </ul>
</div>

