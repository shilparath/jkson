<div class="fixed-sidebar-left">
  <ul class="nav navbar-nav side-nav nicescroll-bar">
    <li class="navigation-header">
      <span>Main</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "dashboard.php") echo "class='active'"; ?> href="dashboard.php"  ><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
    </li>
    <li class="navigation-header">
      <span>Supplier</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create-buyer.php") echo "class='active'"; ?> href="create-buyer.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Create Supplier</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "buyer-details.php") echo "class='active'"; ?> href="buyer-details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Manage Supplier</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "invoice-archive.php") echo "class='active'"; ?> href="invoice-archive.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Supplier Invoice Archieve</span></div><div class="clearfix"></div></a>
    </li>
    
    
	 <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_distributer.php") echo "class='active'"; ?> href="create_distributer.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Create Retailer</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "distributer_view.php") echo "class='active'"; ?> href="distributer_view.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Manage Retailer</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "invoice_archive_distributer.php") echo "class='active'"; ?> href="invoice_archive_distributer.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Retailer Invoice Archieve</span></div><div class="clearfix"></div></a>
    </li>
    <li><hr class="light-grey-hr mb-10"/></li>
   <!-- -->
   <li class="navigation-header">
      <span>Search</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "supplierwise.php") echo "class='active'"; ?> href="supplierwise.php"  ><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Supplier Wise</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "distributer_wise.php") echo "class='active'"; ?> href="distributer_wise.php"  ><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Retailer Wise</span></div><div class="clearfix"></div></a>
    </li>
    <li class="navigation-header">
     

    <li><hr class="light-grey-hr mb-10"/></li>
<!-- -->

    <li class="navigation-header">
      <span>Product</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "addcmobilecompany.php") echo "class='active'"; ?> href="addcmobilecompany.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Product Company</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "addproductname.php") echo "class='active'"; ?> href="addproductname.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Product Name</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "addmobilecolor.php") echo "class='active'"; ?> href="addmobilecolor.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Product Colour</span></div><div class="clearfix"></div></a>
    </li>
     
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "addphonedetails.php") echo "class='active'"; ?> href="addphonedetails.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Product Details</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "supplier-invoice-form.php") echo "class='active'"; ?> href="supplier-invoice-form.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Purchase Product </span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "return-product.php") echo "class='active'"; ?> href="return-product.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Return Product </span></div><div class="clearfix"></div></a>
    </li>

    <li>
      <li class="navigation-header">
      <span>Product Return</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "purchase-return.php") echo "class='active'"; ?> href="purchase-return.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Return To Supplier</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "supplier-return-list.php") echo "class='active'"; ?> href="supplier-return-list.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Supplier Return List</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "return-or-replace-product.php") echo "class='active'"; ?> href="return-or-replace-product.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Customer Return</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "return-product-list.php") echo "class='active'"; ?> href="return-product-list.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Customer Return List</span></div><div class="clearfix"></div></a>
    </li>

      <hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>Features</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "tax-invoice.php") echo "class='active'"; ?> href="tax-invoice.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Tax Invoice</span></div><div class="clearfix"></div></a>
    </li>
   
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "tax-invoice-archieve.php") echo "class='active'"; ?> href="tax-invoice-archieve.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Tax Invoice Archieve</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "tax-invoice-withoutgst.php") echo "class='active'"; ?> href="tax-invoice-withoutgst.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Invoice</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "tax-invoice-withoutgst-archieve.php") echo "class='active'"; ?> href="tax-invoice-withoutgst-archieve.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Invoice Archieve</span></div><div class="clearfix"></div></a>
    </li>
     <li><hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>Reports</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "addexpence.php") echo "class='active'"; ?> href="addexpence.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Add Expense</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "expensereport.php") echo "class='active'"; ?> href="expensereport.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Expense Report</span></div><div class="clearfix"></div></a>
    </li> 
        <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "balancesheet.php") echo "class='active'"; ?> href="balancesheet.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Balance sheet</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "stock-details.php") echo "class='active'"; ?> href="stock-details.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Stock Details</span></div><div class="clearfix"></div></a>
    </li>
       

   
    
	    
    <li>
      <a href="logout.php"><div class="pull-left"><i class="fa fa-sign-out mr-20" ></i><span class="right-nav-text">Log Out</span></div><div class="clearfix"></div></a>
    </li>
  </ul>
</div>
