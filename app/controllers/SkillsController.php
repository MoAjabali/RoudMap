<?php 
require_once __DIR__ . "/../models/SkillsModel.php";
require_once __DIR__ . "/../models/ResourcesModel.php";

function showSkill($id) {
    try {
        $skill = getSkillById($id);
        if (!$skill) {
            throw new Exception("المهارة غير موجودة", 404);
        }

        $resources = getResourcesBySkillId($id);
        $skill['resources'] = $resources;

        return [
            'success' => true,
            'data' => $skill
        ];
    } catch (\Throwable $th) {
        return [
            'success' => false,
            'message' => $th->getMessage()
        ];
    }
}
?>
