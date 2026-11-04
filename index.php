<?php session_start(); ?>
<?php include_once "modele.php";?>
<?php include_once "controllers.php";?>

<?php
function require_admin(): void {
    if (empty($_SESSION['logged']) || empty($_SESSION['admin']) || $_SESSION['admin'] != 1) {
        header('Location: /E-commerce/index.php/login');
        exit();
    }
}
?>

<?php
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if(strpos($uri, "admin") !== false){
        include_once "_partials/header_admin.php";
    }
    else{
        include_once "_partials/header.php";
    }
?>

<?php

    if($uri == '/E-commerce/index.php'){
        echo index();
    }
    elseif($uri == '/E-commerce/index.php/products' && isset($_GET['id'])){
        echo products($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/product' && isset($_GET['id'])){
        echo product($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/login'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo try_login();
        }else{
            echo login();
        }
    }
    elseif($uri == '/E-commerce/index.php/logout'){
        session_destroy();
        header('location: /E-commerce/index.php');
        exit();
    }
    elseif($uri == '/E-commerce/index.php/panier'){
        echo panier();
    }
    elseif($uri == '/E-commerce/index.php/panier/add' && isset($_GET['id'])){
        echo add_panier($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/panier/del' && isset($_GET['id'])){
        echo del_panier($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/panier/checkout'){
        checkout();
    }
    elseif($uri == '/E-commerce/index.php/thanks'){
        echo thanks();
    }
    elseif($uri == '/E-commerce/index.php/register'){
        echo register();
    }
    elseif($uri == '/E-commerce/index.php/admin/index' || $uri == '/E-commerce/index.php/admin/'){
        require_admin();
        echo admin_index();
    }
    elseif($uri == '/E-commerce/index.php/admin/admins'){
        require_admin();
        echo admin_admins();
    }
    elseif($uri == '/E-commerce/index.php/admin/categories'){
        require_admin();
        echo admin_categories();
    }
    elseif($uri == '/E-commerce/index.php/admin/categories/add'){
        require_admin();
        echo admin_category_add();
    }
    elseif($uri == '/E-commerce/index.php/admin/categories/del'){
        require_admin();
        echo admin_category_del($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/admin/categories/import'){
        require_admin();
        echo admin_categories_import();
    }
    elseif($uri == '/E-commerce/index.php/admin/products'){
        require_admin();
        echo admin_products();
    }
    elseif($uri == '/E-commerce/index.php/admin/product/add'){
        require_admin();
        echo admin_product_add();
    }
    elseif($uri == '/E-commerce/index.php/admin/product/del'){
        require_admin();
        echo admin_remove_product($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/admin/users'){
        require_admin();
        echo admin_users();
    }
    elseif($uri == '/E-commerce/index.php/admin/users/add'){
        require_admin();
        echo admin_user_add();
    }
    elseif($uri == '/E-commerce/index.php/admin/users/del'){
        require_admin();
        echo admin_remove_user($_GET['id']);
    }
    elseif($uri == '/E-commerce/index.php/admin/users/import'){
        require_admin();
        echo admin_user_import();
    }
    elseif($uri == '/E-commerce/index.php/admin/orders'){
        require_admin();
        echo admin_orders();
    }
    else{
        echo index();
    }
?>

<?php
    if(strpos($uri, "admin") !== false){
        include_once "_partials/footer_admin.php";
    }
    else{
        include_once "_partials/footer.php";
    }
?>
