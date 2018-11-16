 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <li>
                    <a href="companyDetails.php"><i class="menu-icon fa fa-building"></i>Company Details</a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>
                    Employees</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-users"></i><a href="employees.php">All Employees</a></li>
                        <li><i class="menu-icon fa fa-user-plus"></i><a href="createEmployee.php">Add Employee</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Salaries</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php
                            $advanceCounter=0;
                            $currentDate= date('d');
                            if ($currentDate>=25) {
                                $get="select * from employees where advanceStatus='0'";
                                $exe=mysqli_query($con,$get);
                                while($data=mysqli_fetch_array($exe)){
                                    $advanceCounter++;
                                }
                            }
                            $leftCounter=0;
                            $get="select * from employees where advanceStatus='1' && salaryLeft!='0'";
                                $exe=mysqli_query($con,$get);
                                while($data=mysqli_fetch_array($exe)){
                                    $leftCounter++;
                            }                     
                        ?>
                        <li><i class="menu-icon fa fa-money"></i><a href="payAdvanceSalary.php">Pay Advance Salary <?php echo "($advanceCounter)"; ?></a></li>
                        <li><i class="menu-icon fa fa-money"></i><a href="payLeftSalary.php">Pay Left Salary <?php echo "($leftCounter)"; ?></a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-basket"></i>Stock</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-shopping-basket"></i><a href="stockItems.php">All Stock Items</a></li>
                        <li><i class="menu-icon fa fa-shopping-basket"></i><a href="createStockItem.php">Add new Stock Item</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tags"></i>Products</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-tags"></i><a href="products.php">All Products</a></li>
                        <li><i class="menu-icon fa fa-tag"></i><a href="createProduct.php">Add new Product</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-street-view"></i>
                    Customers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-street-view"></i><a href="customers.php">All Customers</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="createCustomer.php">Add Customers</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>
                    Suppliers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-users"></i><a href="suppliers.php">All Suppliers</a></li>
                        <li><i class="menu-icon fa fa-user-plus"></i><a href="createSupplier.php">Add Supplier</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="createPurchaseOrder.php"><i class="menu-icon fa fa-file-word-o"></i>Purchase Order</a>
                </li>

                <li>
                    <a href="createSalesOrder.php"><i class="menu-icon fa fa-credit-card"></i> Sales Order</a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-window-maximize"></i>
                    Bills</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-window-maximize"></i><a href="allBills.php">All Bills</a></li>
                        <li><i class="menu-icon fa fa-window-maximize"></i><a href="companyWiseBills.php">Company-Wise Bills</a></li>
                        <li><i class="menu-icon fa fa-window-maximize"></i><a href="dateWiseBills.php">Date-Wise Bills</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-word-o"></i>
                    Reports</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-street-view"></i><a href="customersReport.php">Customers Report</a></li>
                        <li><i class="menu-icon fa fa-tags"></i><a href="productsReport.php">Products Report</a></li>
                        <li><i class="menu-icon fa fa-file-word-o"></i><a href="allPurchaseOrders.php">All Purchase Orders</a></li>
                        <li><i class="menu-icon fa fa-file-word-o"></i><a href="companyWisePurchaseOrders.php">Company-Wise P.Orders</a></li>
                        <li><i class="menu-icon fa fa-file-word-o"></i><a href="dateWisePurchaseOrders.php">Date-Wise P.Orders</a></li>
                    </ul>
                </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>