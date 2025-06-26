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
            $nom = isset($data["nom"]) ? trim(htmlspecialchars($data["nom"], ENT_QUOTES | ENT_HTML5)) : '';
            if (empty($nom)) {
                http_response_code(400);
                echo json_encode(["error" => "Le nom de la compétence est requis."]);
                exit;
            }
            $newSkill = [
                "id" => count($skills) > 0 ? max(array_column($skills, 'id')) + 1 : 1,
                "nom" => $nom
            ];
            $skills[] = $newSkill;
            writeSkills($skills);
            echo json_encode(["status" => "success", "new_item" => $newSkill]);
        } else if ($method === "DELETE") {
            $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : false;
            if ($id === false) {
                http_response_code(400);
                echo json_encode(["error" => "ID invalide pour la suppression."]);
                exit;
            }
            $skills = array_values(array_filter($skills, fn($skill) => $skill["id"] != $id));
            writeSkills($skills);
            echo json_encode(["status" => "deleted"]);
        } else if ($method === "PUT") {
            $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : false;
            if ($id === false) {
                http_response_code(400);
                echo json_encode(["error" => "ID invalide pour la mise à jour."]);
                exit;
            }
            $nom = isset($data["nom"]) ? trim(htmlspecialchars($data["nom"], ENT_QUOTES | ENT_HTML5)) : null;

            if ($nom !== null && empty($nom)) {
                 http_response_code(400);
                 echo json_encode(["error" => "Le nom de la compétence ne peut pas être vide lors de la mise à jour."]);
                 exit;
            }
            
            $updated = false;
            foreach ($skills as &$skill) {
                if ($skill["id"] == $id) {
                    if ($nom !== null) { // Vérifie si "nom" a été fourni dans la requête
                        $skill["nom"] = $nom;
                    }
                    $updated = true;
                    break;
                }
            }

            if ($updated) {
                writeSkills($skills);
                $updatedItem = null;
                foreach ($skills as $item) {
                    if ($item['id'] == $id) {
                        $updatedItem = $item;
                        break;
                    }
                }
                echo json_encode(["status" => "updated", "updated_item" => $updatedItem]);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Aucune compétence trouvée avec cet ID pour la mise à jour."]);
            }
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}
?>
