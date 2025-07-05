<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <?php
        if (session()->get('role') == 'admin') {
        ?>
          <li class="nav-item">
              <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
                  <i class="bi bi-cart-check"></i>
                  <span>Keranjang</span>
              </a>
          </li><!-- End Keranjang Nav -->
          <li class="nav-item">
              <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
                  <i class="bi bi-receipt"></i>
                  <span>Produk</span>
              </a>
          </li><!-- End Produk Nav -->
          <li class="nav-item">
              <a class="nav-link <?php echo (uri_string() == 'diskon') ? "" : "collapsed" ?>" href="diskon">
                  <i class="bi bi-receipt"></i>
                  <span>Diskon</span>
              </a>
          </li><!-- End Produk Nav -->
          <li class="nav-item">
              <a class="nav-link <?php echo (uri_string() == 'produk_kategori') ? "" : "collapsed" ?>" href="produk_category">
                  <i class="bi bi-receipt"></i>
                  <span>Produk kategori</span>
              </a>
          </li><!-- End Produk Kategori Nav -->
          <li class="nav-item">
              <a class="nav-link <?php echo (uri_string() == 'contact') ? "" : "collapsed" ?>" href="contact">
                  <i class="bi bi-receipt"></i>
                  <span>Contact</span>
              </a>
          </li><!-- End Produk Nav -->
          <li class="nav-item">
    <a class="nav-link <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="profile">
        <i class="bi bi-person"></i>
        <span>Profile</span>
    </a>
</li><!-- End Profile Nav -->
        <?php
        }
        ?>
    </ul>

</aside><!-- End Sidebar-->