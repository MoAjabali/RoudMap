<?php 
require_once __DIR__ . "/../models/SpecializationsModel.php";
require_once __DIR__ . "/../models/SkillsModel.php";

function indexSpecializations() {
    try {
        $specializations = getAllSpecializations();
        return [
            'success' => true,
            'data' => $specializations
        ];
    } catch (\Throwable $th) {
        return [
            'success' => false,
            'message' => $th->getMessage()
        ];
    }
}

function showSpecialization($id) {
    try {
        $specialization = getSpecializationById($id);
        if (!$specialization) {
            throw new Exception("التخصص غير موجود", 404);
        }

        $skills = getSkillsBySpecializationId($id);
        $specialization['skills'] = $skills;

        return [
            'success' => true,
            'data' => $specialization
        ];
    } catch (\Throwable $th) {
        return [
            'success' => false,
            'message' => $th->getMessage()
        ];
    }
}
?>
