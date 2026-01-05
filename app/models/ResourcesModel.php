<?php
require_once __DIR__ . "/../database/connection.php";

function getResourcesBySkillId($skillId) {
    $config = getConnection();
    $pdo = null;
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM resources WHERE skill_id = :skillId");
        $stmt->execute(['skillId' => $skillId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        error_log("getResourcesBySkillId error: " . $th->getMessage());
        throw $th;
    } finally {
        $pdo = null;
    }
}
?>
