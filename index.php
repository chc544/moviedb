<?php include 'includes/top.php'; ?>

<div class="products">

    <div class="filter p-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <input type="search" class="form-control nameSearch" placeholder="Search...">
            </div>
        </div>

    </div>
    <div class="items">

    </div>
</div>

    <div class="top-spacer"></div>

    <script type="module">
        import Products from "./js/products.js";
        const products = new Products();
        products.init();
    </script>

<?php include 'includes/bottom.php'; ?>