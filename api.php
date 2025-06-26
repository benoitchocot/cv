<?php
header("Content-Type: application/json");
include "config.php";
$file = "cv.json";

// Lire les données JSON
function readData() {
    global $file;
    return file_exists($file) ? json_decode(file_get_contents($file), true) : [];
}

// Écrire dans le fichier JSON
function writeData($data) {
    global $file;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}


// Gestion des requêtes API
$method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"), true);
$cv = readData();

switch ($method) {
    case "GET":
        usort($cv, fn($a, $b) => $b['id'] <=> $a['id']); // Tri décroissant
        echo json_encode($cv);
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
            // Validation et Nettoyage
            $entreprise = isset($data["entreprise"]) ? trim(htmlspecialchars($data["entreprise"], ENT_QUOTES | ENT_HTML5)) : '';
            $poste = isset($data["poste"]) ? trim(htmlspecialchars($data["poste"], ENT_QUOTES | ENT_HTML5)) : '';
            $periode = isset($data["periode"]) ? trim(htmlspecialchars($data["periode"], ENT_QUOTES | ENT_HTML5)) : '';
            $description = isset($data["description"]) ? trim(htmlspecialchars($data["description"], ENT_QUOTES | ENT_HTML5)) : '';

            if (empty($entreprise) || empty($poste)) {
                http_response_code(400);
                echo json_encode(["error" => "L'entreprise et le poste sont requis."]);
                exit;
            }

            $newExperience = [
                "id" => count($cv) > 0 ? max(array_column($cv, 'id')) + 1 : 1, // Génération d'ID plus robuste
                "entreprise" => $entreprise,
                "poste" => $poste,
                "periode" => $periode,
                "description" => $description
            ];
            $cv[] = $newExperience;
            writeData($cv);
            echo json_encode(["status" => "success", "new_item" => $newExperience]);
        } else if ($method === "DELETE") {
            $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : false;
            if ($id === false) {
                http_response_code(400);
                echo json_encode(["error" => "ID invalide pour la suppression."]);
                exit;
            }
            $cv = array_values(array_filter($cv, fn($exp) => $exp["id"] != $id));
            writeData($cv);
            echo json_encode(["status" => "deleted"]);
        } else if ($method === "PUT") {
            $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : false;
            if ($id === false) {
                http_response_code(400);
                echo json_encode(["error" => "ID invalide pour la mise à jour."]);
                exit;
            }

            $updated = false;
            foreach ($cv as &$exp) {
                if ($exp["id"] == $id) {
                    if (isset($data["entreprise"])) {
                        $exp["entreprise"] = trim(htmlspecialchars($data["entreprise"], ENT_QUOTES | ENT_HTML5));
                    }
                    if (isset($data["poste"])) {
                        $exp["poste"] = trim(htmlspecialchars($data["poste"], ENT_QUOTES | ENT_HTML5));
                    }
                    if (isset($data["periode"])) {
                        $exp["periode"] = trim(htmlspecialchars($data["periode"], ENT_QUOTES | ENT_HTML5));
                    }
                    if (isset($data["description"])) {
                        $exp["description"] = trim(htmlspecialchars($data["description"], ENT_QUOTES | ENT_HTML5));
                    }
                    // S'assurer que les champs obligatoires ne deviennent pas vides si on les modifie
                    if (empty($exp["entreprise"]) || empty($exp["poste"])) {
                         http_response_code(400);
                         echo json_encode(["error" => "L'entreprise et le poste ne peuvent pas être vides lors de la mise à jour."]);
                         exit;
                    }
                    $updated = true;
                    break; 
                }
            }

            if ($updated) {
                writeData($cv);
                // Trouver l'élément mis à jour pour le renvoyer peut être utile
                $updatedItem = null;
                foreach ($cv as $item) {
                    if ($item['id'] == $id) {
                        $updatedItem = $item;
                        break;
                    }
                }
                echo json_encode(["status" => "updated", "updated_item" => $updatedItem]);
            } else {
                http_response_code(404); // Not found
                echo json_encode(["error" => "Aucune expérience trouvée avec cet ID pour la mise à jour."]);
            }
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}

?>
