<?php
require_once __DIR__ . "/../database/connection.php";

function getSkillsBySpecializationId($specId) {
    $config = getConnection();
    $pdo = null;
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM skills WHERE specialization_id = :specId");
        $stmt->execute(['specId' => $specId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        error_log("getSkillsBySpecializationId error: " . $th->getMessage());
        throw $th;
    } finally {
        $pdo = null;
    }
}
function getSkillById($id) {
    $config = getConnection();
    $pdo = null;
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT s.*, sp.name AS specialization_name 
                               FROM skills s 
                               LEFT JOIN specializations sp ON s.specialization_id = sp.id 
                               WHERE s.id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        error_log("getSkillById error: " . $th->getMessage());
        throw $th;
    } finally {
        $pdo = null;
    }
}
?>
