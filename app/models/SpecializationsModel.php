<?php
require_once __DIR__ . "/../database/connection.php";

function getAllSpecializations() {
    $config = getConnection();
    $pdo = null;
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("
            SELECT 
                s.*,
                (SELECT COUNT(*) FROM skills sk WHERE sk.specialization_id = s.id) as skills_count,
                (SELECT COUNT(*) FROM resources r JOIN skills sk ON r.skill_id = sk.id WHERE sk.specialization_id = s.id) as resources_count
            FROM specializations s
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        error_log("getAllSpecializations error: " . $th->getMessage());
        throw $th;
    } finally {
        $pdo = null;
    }
}

function getSpecializationById($id) {
    $config = getConnection();
    $pdo = null;
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("
            SELECT 
                s.*,
                (SELECT COUNT(*) FROM skills sk WHERE sk.specialization_id = s.id) as skills_count,
                (SELECT COUNT(*) FROM resources r JOIN skills sk ON r.skill_id = sk.id WHERE sk.specialization_id = s.id) as resources_count,
                (SELECT COALESCE(SUM(sk.estimated_hours), 0) FROM skills sk WHERE sk.specialization_id = s.id) as total_estimated_hours
            FROM specializations s
            WHERE s.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        error_log("getSpecializationById error: " . $th->getMessage());
        throw $th;
    } finally {
        $pdo = null;
    }
}
?>
