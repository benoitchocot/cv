<?php
header("Content-Type: application/json");
include "config.php";
$fileSkills = "skills.json";

// Lire les compétences JSON
function readSkills() {
    global $fileSkills;
    return file_exists($fileSkills) ? json_decode(file_get_contents($fileSkills), true) : [];
}

// Écrire dans le fichier JSON des compétences
function writeSkills($data) {
    global $fileSkills;
    file_put_contents($fileSkills, json_encode($data, JSON_PRETTY_PRINT));
}

$method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"), true);
$skills = readSkills();

switch ($method) {
    case "GET":
        usort($skills, fn($a, $b) => $b['id'] <=> $a['id']); // Tri décroissant
        echo json_encode($skills);
        break;

    case "POST":
    case "DELETE":
    case "PUT":
        if (!isAdmin()) {
            http_response_code(403);
            echo json_encode(["error" => "Accès interdit"]);
            exit;
        }

        if ($method === "POST") {
            $newSkill = [
                "id" => count($skills) + 1,
                "nom" => $data["nom"]
            ];
            $skills[] = $newSkill;
            writeSkills($skills);
            echo json_encode(["status" => "success"]);
        } else if ($method === "DELETE") {
            $id = $data["id"];
            $skills = array_values(array_filter($skills, fn($skill) => $skill["id"] != $id));
            writeSkills($skills);
            echo json_encode(["status" => "deleted"]);
        } else if ($method === "PUT") {
            $id = $data["id"];
            foreach ($skills as &$skill) {
                if ($skill["id"] == $id) {
                    $skill["nom"] = $data["nom"] ?? $skill["nom"];
                }
            }
            writeSkills($skills);
            echo json_encode(["status" => "updated"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}
?>
