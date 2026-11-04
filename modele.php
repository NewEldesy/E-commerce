<?php
include_once "config.php";

/* ─────────────── UPLOAD ─────────────── */

function upload_file(array $files): string {
    $uploadDir  = __DIR__ . '/uploads/';
    $filename   = basename($files['file']['name']);
    move_uploaded_file($files['file']['tmp_name'], $uploadDir . $filename);
    return $filename;
}

/* ─────────────── PRODUITS ─────────────── */

function get_products(): array {
    $stmt = db()->prepare("SELECT * FROM product");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_products_by_category(int $id): array {
    $stmt = db()->prepare("SELECT * FROM product WHERE category = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_products_by_id(int $id): array|false {
    $stmt = db()->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function set_product(array $data, array $files): void {
    $stmt = db()->prepare(
        "INSERT INTO product (name, description, price, category, filename)
         VALUES (:name, :description, :price, :category, :filename)"
    );
    $stmt->execute([
        ':name'        => $data['name'],
        ':description' => $data['description'],
        ':price'       => $data['price'],
        ':category'    => $data['category'],
        ':filename'    => upload_file($files),
    ]);
}

function remove_product(int $id): void {
    $stmt = db()->prepare("DELETE FROM product WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

/* ─────────────── CATÉGORIES ─────────────── */

function get_categories(): array {
    $stmt = db()->prepare("SELECT * FROM category");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_categories_by_id(int $id): array|false {
    $stmt = db()->prepare("SELECT * FROM category WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function set_category(array $data): void {
    $stmt = db()->prepare("INSERT INTO category (name) VALUES (:name)");
    $stmt->bindParam(':name', $data['name']);
    $stmt->execute();
}

function remove_category(int $id): void {
    $stmt = db()->prepare("DELETE FROM category WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

/* ─────────────── UTILISATEURS ─────────────── */

function get_users(bool $isAdmin = false): array {
    $flag = $isAdmin ? 1 : 0;
    $stmt = db()->prepare("SELECT * FROM user WHERE admin = :admin");
    $stmt->bindParam(':admin', $flag, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function set_user(array $data): void {
    $stmt = db()->prepare(
        "INSERT INTO user (email, password, admin) VALUES (:email, :password, :admin)"
    );
    $stmt->execute([
        ':email'    => $data['email'],
        ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
        ':admin'    => isset($data['admin']) ? (int) $data['admin'] : 0,
    ]);
}

function remove_user(int $id): void {
    $stmt = db()->prepare("DELETE FROM user WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function find_user_by_email_and_password(array $data): array|null {
    $stmt = db()->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $data['email']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user) && password_verify($data['password'], $user['password'])) {
        return $user;
    }
    return null;
}

/* ─────────────── COMMANDES ─────────────── */

function create_order(int $userId, array $cart): int {
    $db = db();
    $db->beginTransaction();

    $stmt = $db->prepare("INSERT INTO user_order (statut, user) VALUES ('pending', :user)");
    $stmt->bindParam(':user', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $orderId = (int) $db->lastInsertId();

    $stmt2 = $db->prepare(
        "INSERT INTO order_product (product, quantity, user_order) VALUES (:product, :qty, :order_id)"
    );
    foreach ($cart as $productId => $item) {
        $stmt2->execute([
            ':product'  => (int) $productId,
            ':qty'      => (int) $item['quantity'],
            ':order_id' => $orderId,
        ]);
    }

    $db->commit();
    return $orderId;
}

function get_orders_by_user(int $userId): array {
    $stmt = db()->prepare(
        "SELECT uo.*, op.product, op.quantity, p.name, p.price
         FROM user_order uo
         JOIN order_product op ON op.user_order = uo.id
         JOIN product p ON p.id = op.product
         WHERE uo.user = :user
         ORDER BY uo.id DESC"
    );
    $stmt->bindParam(':user', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_all_orders(): array {
    $stmt = db()->prepare(
        "SELECT uo.id, uo.statut, u.email,
                GROUP_CONCAT(p.name ORDER BY p.id SEPARATOR ', ') AS products,
                SUM(op.quantity * p.price) AS total
         FROM user_order uo
         JOIN user u ON u.id = uo.user
         JOIN order_product op ON op.user_order = uo.id
         JOIN product p ON p.id = op.product
         GROUP BY uo.id
         ORDER BY uo.id DESC"
    );
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_order_status(int $orderId, string $status): void {
    $stmt = db()->prepare("UPDATE user_order SET statut = :statut WHERE id = :id");
    $stmt->execute([':statut' => $status, ':id' => $orderId]);
}
