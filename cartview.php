 <?php
      error_reporting(0);
     if (isset($_POST['submit'])) {
      $memb = $_POST['member'];
      $theme = $_POST['theme'];

      $GLOBALS['memb']=$memb;
      $GLOBALS['theme']=$theme;
      echo "<script> insert('$memb','$theme');</script>";
     }

 ?>
 <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
        <div class="cart-body">
        </div>
      </div>
      <div class="modal-footer" >
        <select name="member">
          <option selected="" disabled="">select members</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
        <select name="theme">
          <option selected="" disabled="">select Theme</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" onclick="insert($memb,$theme)" class="btn btn-primary checkout-btn">AddToCart</button>
        <?php //echo "<button type='submit' name='submit' onclick='insert('$memb','$theme')' class='btn btn-primary checkout-btn'>AddToCart</button>" ?>
      </form>
     
      </div>
    </div>
  </div>
</div>

<div id="toast">hey,this is toast</div>

